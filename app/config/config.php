<?php

define("ROOT", preg_replace("/\/app.*$/", "", __DIR__));
define("APP", ROOT."/app");
define("DEV", preg_match("/htdocs/", __DIR__));

require_once(APP."/core/Loader.php");

core\Loader::initialize();
