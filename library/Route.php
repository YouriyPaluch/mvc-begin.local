<?php


class Route
{
    static public function init(){
        $controllerName = 'index';
        $actionName = 'index';
       $url =  $_SERVER["REDIRECT_URL"]??'';
       $url = ltrim($url, '/');
       $components = explode('/', $url);
       if(count($components)>2){
           exit('no page'); //TODO
       }
       if(!empty($components[0])){
           $controllerName = strtolower($components[0]);
       }
       if(!empty($components[1])){
           $actionName = strtolower($components[1]);
       }
       $controllerClass = 'controllers\\'.ucfirst($controllerName);
       if(!class_exists($controllerClass)){
           exit('no class'); //TODO
       }
       $controller = new $controllerClass();
       if(!method_exists($controller, $actionName)){
           exit('no method');// TODO
       }
       $controller->$actionName();

    }
    static public function redirect($url ='/'){
        header("Location: $url");
    }

    static public function url($controller, $action){
        return "/$controller/$action";
    }
}