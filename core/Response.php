<?php
/** User: ENJOYS ...*/ 
namespace app\core;

/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\core;
*/ 
class Response{

     public function setStatusCode(int $code)
     {
          http_response_code($code);
     }
}