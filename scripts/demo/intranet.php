#!/usr/bin/env php
<?php

namespace Nooku;

// Run the class from request if the script is called directly from the command line
if (!count(debug_backtrace())) {
    Installer::fromInput($argv);
}

class Installer
{
    public static $files = array(
        'sample.sql', 'views.sql'
    );

    public $task;
    public $database = 'manager';
    public $www = '/var/www/intranet.openpolice.be';

    public function __construct($task)
    {
        if (!in_array($task, array('install', 'reinstall'))) {
            throw new \InvalidArgumentException('Invalid task: '.$task);
        }

        $this->task = $task;
    }

    public static function fromInput($argv)
    {
        $task = isset($argv[1]) ? $argv[1] : '';

        $instance = new self($task);
        $instance->run();
    }

    public function run()
    {
        try {
            $this->precheck();

            $task = $this->task;
            $this->$task();
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function install()
    {
        `cd $this->www && git pull origin master`;

        $this->createDatabase();
        $this->modifyConfiguration();
    }

    public function uninstall()
    {
        $this->deleteFiles();

        $this->deleteDatabase();
    }

    public function reinstall()
    {
        $this->uninstall();
        $this->install();
    }

    public function precheck()
    {
    }

    public function createDatabase()
    {
        $result = `echo 'SHOW DATABASES LIKE "$this->database"' | mysql -udemo -pdemo`;
        if (!empty($result))
        {
            $this->out("Database table exists.\nRun 'intranet reinstall' if you would like to re-create it");

            return;
        }

        $result = shell_exec("echo 'CREATE DATABASE `$this->database` CHARACTER SET utf8' | mysql -udemo -pdemo");
        if (!empty($result)) { // MySQL returned an error
            throw new \Exception(sprintf('Cannot create database %s. Error: %s', $this->database, $result));
        }

        $dir = $this->www.'/install/custom/mysql';

        foreach (self::$files as $file)
        {
            $result = `mysql -pdemo -udemo $this->database < $dir/$file`;
            if (!empty($result)) { // MySQL returned an error
                throw new \Exception(sprintf('Cannot import file %s. Error: %s', $file, $result));
            }
        }
    }

    public function deleteDatabase()
    {
        $result = shell_exec("echo 'DROP DATABASE IF EXISTS `$this->database`' | mysql -udemo -pdemo");
        if (!empty($result)) { // MySQL returned an error
            throw new \Exception(sprintf('Cannot delete database %s. Error: %s', $this->database, $result));
        }
    }

    public function deleteFiles()
    {
        `cd $this->www && git reset --hard HEAD`;
        `cd $this->www && git clean -d -x -f`;
    }

    public function modifyConfiguration()
    {
        $input    = $this->www.'/configuration.php-dist';
        $output   = $this->www.'/configuration.php';

        $contents = file_get_contents($input);
        $replace  = function($name, $value) use(&$contents) {
            $pattern     = sprintf("#%s = '.*?'#", $name);
            $replacement = sprintf("%s = '%s'", $name, $value);

            $contents = preg_replace($pattern, $replacement, $contents);
        };

        $replace('sendmail', '/usr/bin/env catchmail');
        $replace('user', 'demo');
        $replace('password', 'demo');
        $replace('db', $this->database);

        $replace('mailer', 'smtp');
        $replace('smtphost', 'localhost');
        $replace('smtpport', 1025);
        $replace('mailfrom', 'policebox@localhost.home');
        $replace('fromname', 'Police Box');

        $replace('sef', 1);
        $replace('sef_rewrite', 1);

        file_put_contents($output, $contents);
        chmod($output, 0644);
    }

    public function out($text = '', $nl = true)
    {
        fwrite(STDOUT, $text . ($nl ? "\n" : null));

        return $this;
    }

    public function error($text = '', $nl = true)
    {
        fwrite(STDERR, $text . ($nl ? "\n" : null));

        return $this;
    }
}
