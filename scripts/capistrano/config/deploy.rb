require "capistrano/ext/multistage"

## Stage settings.
set :stages, ["production", "development", "office"]

# Application settings.
set :application, "belgian-police-intranet"
set :app_symlinks, ["cache", "sites", "configuration.php"]

# Server user settings.
set :user, "root"
set :use_sudo, false

# Deployment settings.
set :deploy_to, "/var/www/intranet/capistrano"
set :deploy_via, :copy
set :copy_cache, true
set :copy_exclude, [".git/*", ".gitignore"]
set :keep_releases, 3

# Repository settings.
set :repository, "git@git.assembla.com:timble-belgian-police-intranet.git"
set :scm, :git
set :scm_username, "deploy@timble.net"

namespace :deploy do
    desc "Finalize the update."
    task :finalize_update, :roles => :app, :except => { :no_release => true } do
        run "chmod -R g+w #{release_path}" if fetch(:group_writable, true)
    end
    
    desc "Create symbolic links for shared directories."
    task :symlink_shared, :roles => :app do
        if app_symlinks
            app_symlinks.each do |link|
                run "ln -fns #{shared_path}/#{link} #{release_path}/code/#{link}"
            end
        end
    end
    
    # Do nothing in these tasks.
    task :cold do; end
    task :restart do; end
    task :start do; end
    task :stop do; end
end

# Hook into default tasks.
after "deploy:update_code", "deploy:symlink_shared"
after "deploy:update", "deploy:cleanup"