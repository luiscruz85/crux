<?php namespace Crux\Post;

use Validator;
use Post;
use Input;
use Redirect;

class Creator {
    protected $listener;

    public function __construct($listener)
    {
        $this->listener = $listener;
    }

    public function create($input)
    {
		$validation = Validator::make($input, Post::$rules);

        if (Input::hasFile('banner'))
        { 
            $file = Input::file('banner');
            $name = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path().'/uploads/', $name);
            $input['banner'] = $name;
        } else {
            unset($input['banner']);
        }

		if ($validation->fails())
		{
            return Redirect::route('posts.create')->withInput()->withErrors($validation);
		}
        Post::create($input);
        return Redirect::to('/posts');
    }
}
