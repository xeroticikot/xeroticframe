<?php

namespace xmodels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\Factory;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class TestTable extends Model {

    protected $translation_file_loader;
    protected $translator;
    protected $validation;
    protected $validator;

    protected $table = 'test_table';

    protected $fillable = ['username', 'password'];

    private $rules = [
        'username' => 'required|min:8|max:100',
        'password' => 'required|min:8|max:100'
    ];

    public function __construct(){
        $this->translation_file_loader = new FileLoader(new Filesystem(), 'resources/lang');
        $this->translator = new Translator($this->translation_file_loader, 'en');
        $this->validation = new Factory($this->translator);
    }

    public function validation($data){
        $this->validator = $this->validation->make($data, $this->rules);
        return $this->validator;
    }

}