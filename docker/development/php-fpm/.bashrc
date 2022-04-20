#aliases container php
alias app='php artisan'
alias app-env='env | grep APP_ENV'
alias app-env-test='
    export APP_ENV=testing
    export APP_DEBUG=0
'
alias app-env-dev='
    export APP_ENV=local
    export APP_DEBUG=1
'
alias app-env-prod='
    export APP_ENV=production
    export APP_DEBUG=0
'

# database
alias migrate='app migrate'
alias db-rebuild='
app db:wipe --drop-views
composer dump-autoload
app migrate:fresh --seed
app db:seed --class=CashbackSeeder
'

alias import='appx magnit:import:new 20211110'

# database with xDebug
alias migratex='appx migrate'
alias xdb-rebuild='
appx db:wipe --drop-views
composer dump-autoload
appx migrate:fresh --seed
appx db:seed --class=CashbackSeeder
'

alias build='
composer install
app cache:clear
app config:cache
db-rebuild
'

# debug
alias appx='php -d zend_extension=xdebug.so artisan'
alias test-unit-x='phpx bin/codecept run unit -f'
