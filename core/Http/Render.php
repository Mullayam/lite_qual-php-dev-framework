<?php
/** User: ENJOYS ...*/ 

namespace app\core\Http;

/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\core\Http;
*/ 

use app\core\Application;


class Render {

     
/// views function
            public function view($view,$params=[])
            {
               $layout = $this->LayoutContent();
               $viewContent = $this->renderOnlyView($view,$params);
               $new= str_replace('<%= content %>',"$viewContent","$layout");
                        return $new ;
                        
            }            

            protected function LayoutContent()
            {
                  $layout = Application::$app->controller->layout;
                  ob_start();
                  include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
                  return ob_get_clean();
            } 

            protected function renderOnlyView($view,$params)
            {
                  foreach ($params as $key => $value) {
                        $$key=$value;
                  }
                  ob_start();
                  include_once Application::$ROOT_DIR."/views/$view.php";
                  return ob_get_clean();
            }
    
     


}