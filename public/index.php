<?php
/** User: ENJOYS ...*/ 
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;


use app\controllers\AuthController;
use app\controllers\SiteController;
/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
 
*/  

$app =  new Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'handlePostRequest']);
$app->router->get('/Auth/Login',[AuthController::class,'login']);
$app->router->post('/Auth/Login',[AuthController::class,'login']);
$app->router->get('/Auth/NewUser',[AuthController::class,'register']);
$app->router->post('/Auth/NewUser',[AuthController::class,'register']);


$app->run();
