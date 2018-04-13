<?php

define('BASE_DIR', __DIR__);
define('APP_DIR', BASE_DIR. DIRECTORY_SEPARATOR. 'app');


set_include_path(get_include_path(). PATH_SEPARATOR. APP_DIR);



require BASE_DIR. DIRECTORY_SEPARATOR. 'vendor'. DIRECTORY_SEPARATOR. 'autoload.php';

require APP_DIR. DIRECTORY_SEPARATOR. 'Registry.php';
require APP_DIR. DIRECTORY_SEPARATOR. 'App.php';
require APP_DIR. DIRECTORY_SEPARATOR. 'Factory.php';

spl_autoload_register('Factory::autoload');

App::run();