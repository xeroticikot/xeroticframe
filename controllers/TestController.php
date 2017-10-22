<?php

namespace xcontrollers;

use Controller;
use xmodels\TestTable;

class TestController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->template->render('layout');
    }

    public function index(){
        $testUser = new TestTable();
        if($this->getAll() != null){
            $validator = $testUser->validation($this->getAll());
            if($validator->fails()){
                $errors = $validator->errors();
                foreach($this->getAll() as $key => $value){
                    echo $errors->first($key).'<br>';
                }
            }
            die();
            $testUser->username = $this->input('username');
            $testUser->password = $this->input('password');
            if($testUser->save()){
                echo 'Data saved!!';
            }else{
                $this->redirect('test-form', $this->getAll());
            }
        }

        $users = $testUser->all();

        echo $this->template->make('home', ['users' => $users]);
    }

    public function testForm(){
        $inputData = null;
        if($this->getAll() != null){
            $inputData = $this->getAll();
        }
        echo $this->template->make('test-form', ['input' => $inputData]);
    }

    public function funcWithParam($param){
        echo $param;
    }

    public function testParam(){
        $this->template->render('main-layout');
        echo $this->template->make('home-page');
    }

}