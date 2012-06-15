# Application settings.
set :application, "belgian-police-intranet"
server "", :app, :web, :db, :primary => true

# Server user settings.
set :user, ""
set :use_sudo, false

# Deployment settings.
set :deploy_to, ""
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
    
    # Do nothing in these tasks.
    task :cold do; end
    task :start do; end
    task :stop do; end
end

# Hook into default tasks.
after "deploy:update", "deploy:cleanup"
after "deploy:migrate", "deploy:cleanup"