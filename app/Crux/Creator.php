<?php namespace Crux;

use Validator;
use Input;
use Redirect;

class Creator {
    protected $listener;
    protected $model;
    protected $files;
    protected $input;

    public function __construct($listener,$model)
    {
        $class_str      = ucwords($model);

        $this->listener = $listener;
        $this->files    = ['image','file'];
        $this->model    = new $class_str;
        $this->input    = Input::all();

        unset($this->input['_token']);
    }

    public function create()
    {
        foreach($this->files as $file)
        {
            if(isset($this->input[$file]))
            {
                if(Input::hasFile($file))
                {
                    $temp_file = Input::file($file);
                    $name = time() . '-' . $temp_file->getClientOriginalName();
                    $temp_file = $temp_file->move(public_path() . '/uploads/',$name);
                    $this->input[$file] = $name;
                } else {
                    unset($this->input[$file]);
                }
            }
        }

        $this->model->create($this->input);

        return true;
    }
}
