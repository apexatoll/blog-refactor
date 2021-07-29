<?php

require_once(__DIR__."/../app/config/config.php");

use core\Router;

session_start();

$r = new Router();

$r->get("/", "Pages#index");
$r->get("/posts", "Pages#posts");
$r->get("/about", "Pages#about");
$r->get("/contact", "Pages#contact");

$r->post("/signup", "Popups#signup");
$r->post("/users/register", "Users#register");
$r->post("/footer/:menu", "Footer#show");
$r->post("/users/login", "Users#login");

$r->route();
