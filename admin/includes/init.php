<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
// deze lijn aanpassen bij online plaats, de site root vragen aan je hosting
// C:\wamp64\www\blogoop
define('SITE_ROOT', DS . 'wamp64' . DS . 'www' . DS . 'blogoop');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
defined('IMAGE_PATH') ? null : define('IMAGES_PATH', SITE_ROOT . DS . 'admin' . DS . 'img');


require_once (INCLUDES_PATH . DS . 'functions.php');
require_once (INCLUDES_PATH . DS . 'config.php');
require_once (INCLUDES_PATH . DS . 'Database.php');
require_once (INCLUDES_PATH . DS . 'Db_object.php');
require_once (INCLUDES_PATH . DS . 'User.php');
require_once (INCLUDES_PATH . DS . 'Photo.php');
require_once (INCLUDES_PATH . DS . 'Session.php');
require_once (INCLUDES_PATH . DS . 'Comment.php');
require_once (INCLUDES_PATH . DS . 'Paginate.php');
?>
