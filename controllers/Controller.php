<?php
/** User: ENJOYS ...*/ 
namespace app\controllers;

/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\controllers;
*/ 
use app\core\Application;

class Controller {

     public string $layout = 'main';
     
          public function setLayout($layoutPath)
          {
                $this->layout = $layoutPath;
                        
          }
          public function __construct()
          {
               // echo "COntorller";
          }
          public function render($view,$params=[])
          {
               return Application::$app->router->view($view,$params);
          }

          public function dd()
          {
              $body =  Application::$app->request->body();
                return $body;
          }
          

}