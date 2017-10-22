<?php
namespace xerotic;

use xcontrollers;
use xerotic\Routes;

class Accelerator{

    protected $_class = null;
    protected $_method = null;
    protected $_param = null;
    protected $url = null;
    protected $options = null;
    protected $routes;
    protected $controller = null;


    /**
     * -Construct calls the the routes set in the Routes object
     */
    public function __construct() {
        $this->routes = new Routes();
        $this->routes->init();
    }

    /**
     * function - sets the url and parameters then initializes controllers
     * @param - $request is the request url
     * @param - $option is the parameter for the controller function - null by default
     */

    public function accelerate($request, $options = null){
        $requestWithOption = rtrim($request, $options);
        $requestWithOption = rtrim($requestWithOption, '/');
        if(in_array($request, $this->routes->getUrls())){
            $this->url = $request;
            $options = null;
        }elseif(in_array($requestWithOption, $this->routes->getUrls())){
            $this->url = $requestWithOption;
        }else{
            $this->showError();
            die();
        }
        if($options != null && array_key_exists($this->url, $this->routes->getParams())){
            $this->_param = $options;
        }elseif($options != null && !array_key_exists($this->url, $this->routes->getParams())){
            $this->showError();
            die();
        }elseif($options == null && array_key_exists($this->url, $this->routes->getParams())){
            $this->showError();
            die();
        }else{
            $this->_param = null;
        }
        if(isset($this->routes->_controller[$this->url])){
            $classMethodParam = explode('@', $this->routes->_controller[$this->url]);
            $this->_class = $classMethodParam[0];
            $call_class = 'xcontrollers\\'.$this->_class;
            if(class_exists($call_class)){
                $this->controller = new $call_class();
                $this->_method = $classMethodParam[1];
                $this->initialize();
            }else{
                $this->showError();
            }
        }else{
            $this->showError();
        }
    }

    /**
     * function - initialize - calls the method in the controller class
     */

    public function initialize(){
        if(method_exists($this->controller, $this->_method)){
            if($this->_param != null){
                $this->controller->{$this->_method}($this->_param);
            }else{
                $this->controller->{$this->_method}();
            }
        }else{
            $this->showError();
        }
    }

    /**
     * function - showError() - goes to the 404 Not Found page
    */
    public function showError(){
        header("HTTP/1.0 404 Not Found");
        die();
    }

}

