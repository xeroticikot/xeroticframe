<?php

namespace xerotic;

class Config {
    public function __construct(){
        $conf['DB_TYPE'] = 'mysql';
        $conf['DB_HOST'] = 'localhost';
        $conf['DB_NAME'] = 'xeroticikot';
        $conf['DB_USER'] = 'root';
        $conf['DB_PASS'] = '';
        $conf['DB_PORT'] = 3306;
        $conf['HASH_PASS'] = '';
        $conf['HASH_RAND'] = '';

        foreach ($conf as $key => $value){
            define($key, $value);
        }
    }
}