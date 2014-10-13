<?php namespace Crux;

use Validator;
use Input;
use Redirect;

/* THIS FILE STILL NEEDS WORK! */

class Updater {
    protected $listener;
    protected $model;
    protected $files;
    protected $input;
    protected $id;

    public function __construct($listener,$model,$id)
    {
        $class_str      = ucwords($model);

        $this->listener = $listener;
        $this->files    = ['thumbnail','image','file'];
        $this->model    = new $class_str;
        $this->input    = array_except(Input::all(),['_token','_method'];
        $this->id       = $id;

    }

    // public function update()
    // {
    //     foreach($this->files as $file)
    //     {
    //         if(isset($this->input[$file]))
    //         {
    //             if(Input::hasFile($file))
    //             {
    //                 $temp_file = Input::file($file);
    //                 $name = time() . '-' . $temp_file->getClientOriginalName();
    //                 $temp_file = $temp_file->move(public_path() . '/uploads/',$name);
    //                 $this->input[$file] = $name;
    //             } else {
    //                 unset($this->input[$file]);
    //             }
    //         }
    //     }
    //
    //     $this->model->create($this->input);
    //     return true;
    // }

    public function update()
    {
        $validation = Validator::make($this->input, $this->model->rules);

        if ($validation->fails())
        {
            // Do something different here
            return Redirect::route('pages.edit', $id)->withInput()->withErrors($validation);
        }

        $page = Page::find($id);
        $page->update($input);

        return Redirect::route('pages.index');
    }

}
