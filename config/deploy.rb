require 'capistrano/ext/multistage'
set :stages, ["staging"]
set :default_stage, "staging"
set :application, "Drinkking"
set :scm, :git
set :repository,  :repository, "git@bitbucket.org:drinkking-club/drinkkingclub.git"

set :deploy_via, :copy
set :user, "ubuntu"
set :use_sudo, false
set :ssh_options, { :forward_agent => true }

# set :scm, :git # You can set :scm explicitly or Capistrano will make an intelligent guess based on known version control directory names
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

# if you want to clean up old releases on each deploy uncomment this:
# after "deploy:restart", "deploy:cleanup"

# if you're still using the script/reaper helper you will need
# these http://github.com/rails/irs_process_scripts

# If you are using Passenger mod_rails uncomment this:
# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end