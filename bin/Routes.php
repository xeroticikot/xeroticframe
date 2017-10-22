<?php

namespace xerotic;

class Routes {

    public $_url = array();
    public $_controller = array();
    public $_param = array();

    public function __construct(){}

    public function init(){

        // Set your links here along with the controller and method

        $this->route('/', 'HomeController@index');
        $this->route('amar/nam', 'TestController@index');
        $this->route('great/{param}', 'TestController@funcWithParam');
        $this->route('test', 'TestController@testParam');
        $this->route('test-form', 'TestController@testForm');


    }

    public function route($url, $controller = null){
        $show = explode('/', $url);
        if(strchr($show[sizeof($show) - 1], '{') && strchr($show[sizeof($show) - 1], '}')){
            $option = $show[sizeof($show) - 1];
            $url = $this->delete_all_between('{', '}', $url);
            $url = rtrim($url, '/');
            $this->_url[$url] = $url;
            $option = ltrim($option, '{');
            $option = rtrim($option, '}');
            $this->_param[$url] = $option;
        }else{
            $this->_url[$url] = $url;
        }
        if($controller != null){
            $this->_controller[$url] = $controller;
        }
    }

    public function getUrls(){
        return $this->_url;
    }

    public function getController($url){
        return $this->_controller[$url];
    }

    public function getParam($url){
        return $this->_param[$url];
    }

    public function getParams(){
        return $this->_param;
    }

    public function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return str_replace($textToDelete, '', $string);
    }

}