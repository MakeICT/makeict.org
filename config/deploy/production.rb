set :stage, :production
set :tmp_dir, "/home/makeict/tmp"

# Simple Role Syntax
# ==================
#role :app, %w{deploy@example.com}
#role :web, %w{deploy@example.com}
#role :db,  %w{deploy@example.com}

# Extended Server Syntax
# ======================
server 'makeict.org', user: 'makeict', roles: %w{web app db}

fetch(:default_env).merge!(wp_env: :production)

