<?php namespace Crux;

use Validator;
use Input;
use Redirect;

class Store {
    protected $model;
    protected $files;
    protected $input;
    protected $after;

    public function __construct($model, $after = null)
    {
        $class_str      = ucwords($model);

        /***** Defaults Redirects *****/
        $default_after  = (object)[];
        $default_after->success =
        $default_after->error = '/' . str_plural($model);

        $this->files    = ['thumbnail','image','file'];
        $this->model    = new $class_str;
        $this->input    = array_except(Input::all(), ['_token']);
        $this->after    = ($after ? $after : $default_after);
    }

    public function create()
    {
        foreach($this->files as $file)
        {
            if(Input::hasFile($file))
            {
                $temp_file = Input::file($file);
                $name = time() . '-' . $temp_file->getClientOriginalName();
                $temp_file = $temp_file->move(public_path() . '/uploads/',$name);
                $this->input[$file] = $name;
            }
        }

        // Create Entry
        $this->model->create($this->input);

        return Redirect::to($this->after->success);
    }

    public function update($id)
    {
        foreach($this->files as $file)
        {
            if(Input::hasFile($file))
            {
                $temp_file = Input::file($file);
                $name = time() . '-' . $temp_file->getClientOriginalName();
                $temp_file = $temp_file->move(public_path() . '/uploads/', $name);
                $this->input[$file] = $name;
            }
        }

        // Modify Entry
        $this->model->find($id)->update($this->input);

        return Redirect::to($this->after->success);
    }

}
