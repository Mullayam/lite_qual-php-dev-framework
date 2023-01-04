<?php
/** User: ENJOYS ...*/ 
namespace app\controllers;
/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\controllers;
*/ 

use app\models\RegisterModel;
use app\core\Request;

class AuthController extends Controller
{
     public function login(Request $request)
     {
          if($request->isPost()){
               return "Post EMthod";
          }
          return $this->render('auth/login');
     }
     public function register(Request $request)
     { $errors = [];
          if($request->isPost()){
               $create = new RegisterModel();
               $create ->loadData($request->body());
               if($create->validate() && $create->register()){
                    return var_dump($errors);
               }
               
                echo var_dump($create->errors);



               //  $firstname = $request->body()['firstname'];
               //  $lastname = $request->body()['lasttname'];
               //  $firstname = $request->body()['email'];
               //  $email = $request->body()['email'];
               //  $password = $request->body()['password'];
               //  $c_password = $request->body()['confirm_password'];

               //  return $this->render('auth/registeration',['errors'=>$errors]);
              
          }
          return $this->render('auth/registeration',['errors'=>$errors]);
     }
}
