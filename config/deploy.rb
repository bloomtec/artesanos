# INITIAL CONFIGURATION
set :application, "jnda.bloomweb.co"
set :export, :remote_cache
set :keep_releases, 5
set :cakephp_app_path, "app"
set :cakephp_core_path, "cake"
#default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "/home/embalao/jnda.bloomweb.co"

# USER & PASSWORD
set :user, 'embalao'
set :password, 'Cobr@Verde'

# ROLES
role :app, "jnda.bloomweb.co"
role :web, "jnda.bloomweb.co"
role :db, "jnda.bloomweb.co", :primary => true

# DREAMHOST INFORMATION
set :user, "embalao"

# VERSION TRACKER INFORMATION
set :scm, :git
set :use_sudo, false
set :repository,  "git@github.com:bloomtec/artesanos.git"
set :branch, "master"

# TASKS
namespace :deploy do
  
  task :start do ; end
  
  task :stop do ; end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "cp /home/embalao/jnda.bloomweb.co/current/. /home/embalao/jnda.bloomweb.co/ -R"
    run "chmod 777 /home/embalao/jnda.bloomweb.co/app/tmp/ -R"
    run "chmod 777 /home/embalao/jnda.bloomweb.co/app/webroot/files/uploads/ -R"
    run "chmod 777 /home/embalao/jnda.bloomweb.co/app/Config/database.php"
    run "cp /home/embalao/jnda.bloomweb.co/app/Config/database.srv /home/embalao/jnda.bloomweb.co/app/Config/database.php"
  end
  
end