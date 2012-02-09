# INITIAL CONFIGURATION
set :application, "artesanos.jnda.gob.ec"
set :export, :remote_cache
set :keep_releases, 5
set :cakephp_app_path, "app"
set :cakephp_core_path, "cake"
#default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "public_html/artesanos"

# USER & PASSWORD
set :user, 'jndagobe'
set :password, 'Kw@Jalein43'

# ROLES
role :app, "artesanos.jnda.gob.ec"
role :web, "artesanos.jnda.gob.ec"
role :db, "artesanos.jnda.gob.ec", :primary => true

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
    run "chmod 755 public_html/artesanos/ -R"
    run "cp public_html/artesanos/current/. public_html/artesanos/ -R"
    run "chmod 777 public_html/artesanos/app/tmp/ -R"
  end
  
end