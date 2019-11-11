<?php
// workaround for header access within nginx web servers
// see https://stackoverflow.com/questions/13224615/get-the-http-headers-from-current-request-in-php
if (!function_exists('getallheaders')) 
{ 
    function getallheaders() 
    { 
       $headers = array (); 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
    } 
} 
?>