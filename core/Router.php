<?php
/** User: ENJOYS ...*/ 
namespace app\core;

/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\core;
*/ 
use \app\core\Request;
use \app\core\Http\Render;

class Router extends Render{

      protected array $routes = [];
      public Request $request;
      public Response $response;
       
                
      // public Render $render;


            public function __construct(Request $request,Response $response)
            {
                  $this->request = $request;
                  $this->response = $response;
                  // $this->Render = $render;
                  
            } 
            public function get($urlPath,$callBack)
            {
                  $this->routes['get'][$urlPath] = $callBack;  
            } 
            public function post($urlPath,$callBack)
            {
                  $this->routes['post'][$urlPath] = $callBack;  
            }           
            
            public function resolve()
            {
                 
              $path   =  $this->request->getPath();
              $method =  $this->request->method();
              $callBack = $this->routes[$method][$path] ?? false;
                if($callBack===false){
                         $this->response->setStatusCode(404);
                        // Application::$app->response->setStatusCode(404);
                        return $this->view('error/404');
                          
                      } 
                  if (is_string($callBack)) {
                        
                        return $this->view($callBack);
                        // Application::$app->render->view($callBack);
                      
                  }
                  //   return call_user_func($callBack); [new Callback()]
                    return call_user_func($this->isCheck($callBack),$this->request);
            }

            public function run()
            {
                  $this->router->resolve();
                 
            }

            //improtant cotollers
            private function isCheck($callBack)
            {
            if(is_array($callBack))
            Application::$app->controller = new $callBack[0];
            $callBack[0] = Application::$app->controller;

            return $callBack;
            }


                
            // /// views function
            // public function view($view,$params=[])
            // {
            //    $layout = $this->LayoutContent();
            //    $viewContent = $this->renderOnlyView($view,$params);
            //    $new= str_replace('<%= content %>',"$viewContent","$layout");
            //             return $new ;
                        
            // }
            

            // protected function LayoutContent()
            // {
            //       ob_start();
            //       include_once Application::$ROOT_DIR."/views/layouts/main.php";
            //       return ob_get_clean();
            // } 

            // protected function renderOnlyView($view,$params)
            // {
            //       foreach ($params as $key => $value) {
            //             $$key=$value;
            //       }
            //       ob_start();
            //       include_once Application::$ROOT_DIR."/views/$view.php";
            //       return ob_get_clean();
            // }
              
           

            
}          