<?php

namespace app\core;
/** User: ENJOYS ...**/ 
/* 
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\core;
*/

use app\controllers\Controller;
use app\core\Http\Render;
use app\core\Request;


class Application
{
          public static string $ROOT_DIR;
          public static Application $app;

          public Router $router;
          public Request $request;
          public Render $render;
          public Response $response;
          public Controller $controller;
          public function __construct($rootPath)
          {
               self::$app = $this;
               self::$ROOT_DIR = $rootPath;
               $this->request = new Request();
               $this->response = new Response(); 
               $this->router = new Router($this->request,$this->response);               
          }
          //getter
          public function getController() 
          {
            return $this->controller;
          }
          //ssetters
          public function setController(Controller $controller): void
          {
            $this->controller=$controller;
          }
          public function run(){
            echo $this->router->resolve();             
          }


}