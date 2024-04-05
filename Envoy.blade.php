@servers(['web' => $host])

@story('deploy')
maintenance-mode-on
update-code
install-dev-dependencies
migrate-database
build-assets
install-prod-dependencies
optimize
maintenance-mode-off
@endstory

@task('update-code')
cd {{ $path }}
git pull origin main
@endtask

@task('install-dev-dependencies')
cd {{ $path }}
composer install
npm install
@endtask

@task('install-prod-dependencies')
cd {{ $path }}
composer install --optimize-autoloader --no-dev
@endtask

@task('maintenance-mode-on')
cd {{ $path }}
php artisan down
@endtask

@task('optimize')
cd {{ $path }}
php artisan config:cache
php artisan route:cache
php artisan view:cache
@endtask

@task('build-assets')
cd {{ $path }}
npm run build
@endtask

@task('migrate-database')
cd {{ $path }}
php artisan migrate --force
@endtask

@task('maintenance-mode-off')
cd {{ $path }}
php artisan up
@endtask
