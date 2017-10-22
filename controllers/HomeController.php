<?php

namespace xcontrollers;

use Controller;

class HomeController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->template->render('main-layout');
    }

    public function index(){
        $data = array();
        echo $this->template->make('home-page', ['data' => $data]);
    }

}