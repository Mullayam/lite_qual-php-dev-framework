<?php
/** User: ENJOYS ...*/ 
namespace app\models;
/*
* @author Mulayam <su@enjoys.in>
* @package enjoys\LiteQual
* @namespace app\models;
*/ 
abstract class Model
{
     public const REQUIRED ='required';
     public const EMAIL ='email';
     public const MIN ='min';
     public const MAX ='max';
     public const MATCH ='match';
     public const NUMERIC ='number';
     public const UNIQUE ='unique';
      
     public function loadData($data)
     {
          foreach ($data as $key => $value) {
             if(property_exists($this,$key)){
               $this->{$key} = $value;
             }
          }
          
     }
     abstract public function rules(): array;
    public array $errors = [];
     public function validate()
     {
       foreach ($this->rules() as $attr => $rules) {
          $value = $this->{$attr};
          foreach ($rules as $rule) {
               $ruleName = $rule;
               if(!is_string($ruleName)){
                    $ruleName = $rule[0];
               }
               if($ruleName === self::REQUIRED && !$value){
                    $this->setError($attr,self::REQUIRED);
               }
               if($ruleName === self::EMAIL && !filter_var($value,FILTER_SANITIZE_EMAIL)){
                    $this->setError($attr,self::EMAIL  );
               }
               if($ruleName === self::MIN && strlen($value) < $rule['min']){
                    $this->setError($attr,self::MIN,$rule );
               }
               if($ruleName === self::MAX &&  strlen($value) > $rule['min']){
                    $this->setError($attr,self::MAX,$rule  );
               }
               if($ruleName === self::MATCH &&  $value !== $this->{$rule['match']}){
                    $this->setError($attr,self::MATCH,$rule);
               }
          }
       }  
       return empty($this->errors) ;
     }
     public function setError(string $attr,string $rule,$params = [])
     {
       $message = $this->errorMessage()['$rule'] ??'';
       foreach ($params as $key => $value) {
         $message = str_replace("{{$key}}","$value","$message");
       }
        $this->errors[$attr][]="";
     }
     public function errorMessage()
     {
          return [
               self::REQUIRED =>"This {field} field is required",
               self::EMAIL    =>"This field msut be a valid email address",
               self::MIN      =>"Minimum length of this field must be {min}",
               self::MAX      =>"Maximum length of this field must be {max}",
               self::MATCH    =>"This field must be the same as {match}",
               self::UNIQUE   =>"This field must be unique",
               self::NUMERIC  =>"This field must be numeric",
          ];
     }
     public function hasError($attr)

     {
      return $this->errors[$attr] ?? false;
     }
     public function getError($attr)

     {
      return $this->errors[$attr][0] ?? false;
     }

}