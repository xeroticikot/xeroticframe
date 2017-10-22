<?php

use Jenssegers\Blade\Blade;

class Controller {

    public $template;

    public $postData = array();

    public function __construct(){

        $this->template = new Blade('views', 'cache');

        if($_POST != null){
            foreach($_POST as $key => $value){
                $this->postData[$key] = $value;
            }
        }

    }

    public function getAll(){
        return $this->postData;
    }

    public function input($key){
        if(isset($this->postData[$key]))
            return $this->postData[$key];
        return null;
    }

    public function redirect($url, $data = null){
        $url = site_url.'/'.$url;
        $form = '<script src="http://code.jquery.com/jquery-latest.js"></script>';
        $form .= '<form method="post" action="'.$url.'">';
        foreach($data as $key => $value){
            $form .= '<input type="hidden" name="'.$key.'" value="'.$value.'">';
        }
        $form .= '<input type="submit" value="Loading..." id="submit" style="opacity:0;"></form>';
        $form .= '<script type="text/javascript">'.
            '$(document).ready(function() {'.
                '$("#submit").click();'.
            '});'.
            '</script>';
        echo $form;
//        $data['url'] = $url;
//        $options = [
//            'http' => [
//                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
//                'method' => 'POST',
//                'content' => http_build_query($data)
//            ]
//        ];
//        $context = stream_context_create($options);
//        $result = file_get_contents($url, false, $context);
//        if($result === false){
//            return 'Unable to send!!';
//        }
//        return $result;
    }

}