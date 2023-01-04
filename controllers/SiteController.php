<?php
/** User: ENJOYS ...*/ 
namespace app\controllers;
/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\controllers;
*/ 
use app\core\Application;
use app\core\Request;

class SiteController extends Controller{

          public function home()
          {
               $p= [
                    "name"=>"Enjoys"
               ];
               return $this->render("home",$p);

          }

         
          public function contact()
          {
               return Application::$app->router->view("test");
          }
          public function handlePostRequest(Request $request)
          {
               // $body =  $request->body();
               // return $body;
               return var_dump( $this->dd());
          }
}