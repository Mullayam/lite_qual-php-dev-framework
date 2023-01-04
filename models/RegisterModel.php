<?php
/** User: ENJOYS ...*/ 
namespace app\models;
/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\c;
*/ 
class RegisterModel extends Model
{
          public string $firstname;
          public string $lastname;
          public string $email;
          public string $password;
          public string $confirm_password;
          // public string $fir;
          public function register()
          {
               
          }
          public function rules():array
          {
               return [
                    'firstname'=>[self::REQUIRED],
                    'lastname'=>[self::REQUIRED],
                    'email'=>[self::REQUIRED,self::EMAIL],
                    'password'=>[self::REQUIRED,[self::MIN,'min'=>8]],
                    'confirm_password'=>[self::REQUIRED,[self::MATCH,'match'=>'password']],
               ];
          }
     
}