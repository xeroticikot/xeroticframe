<?php

namespace xerotic;

use xerotic\Config;
use xerotic\Accelerator;
use xerotic\Migration;

class Engine{
    protected $sends;
    protected $url_builder;
    protected $_options;
    protected $request;
    protected $mirgation;
    public function __construct() {

        $config = new Config();
        $this->sends = new Accelerator();
        $this->mirgation = new Migration(0.9);
    }
    protected function _urlBuilder(){
        $this->request = null;
        $this->url_builder = '';
        $whole_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path = parse_url($whole_url)['path'];
        define('site_url', (isset($_SERVER['HTTPS']) ? "https://" : "http://").parse_url($whole_url)['host'].(dirname($_SERVER['PHP_SELF']) == '/' ? '' : dirname($_SERVER['PHP_SELF'])));
        $actual_path = str_replace((dirname($_SERVER['PHP_SELF']) == '/' ? '' : dirname($_SERVER['PHP_SELF'])), '', $path);
        $actual_path = rtrim($actual_path, '/');
        $url = filter_var($actual_path, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        foreach ($url as $key => $value){
            if($value != null){
                $this->request[] = $value;
            }
        }
        if($this->request == null){
            $this->url_builder = '/';
        }else{
            foreach($this->request as $key => $value){
                $this->url_builder .= $value.'/';
            }
            $this->url_builder = rtrim($this->url_builder, '/');
        }
        $this->_options = '';
        $show = explode('/', $this->url_builder);
        if(sizeof($show) > 1){
            $this->_options = $show[sizeof($show)-1];
        }else{
            $this->_options = null;
        }
    }

    public function init(){
        $this->_urlBuilder();
        $this->sends->accelerate($this->url_builder, $this->_options);
    }

}