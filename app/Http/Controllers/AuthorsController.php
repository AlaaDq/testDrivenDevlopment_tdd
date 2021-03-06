<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    public function create(){
        return view('authors.create');
    }

    public function store()
    {
        // $data = $this->validateData();
        
        // Author::create(request()->only(['name', 'dob',]));
        Author::create($this->validateRequest());
    }

    protected function validateRequest(){
        return request()->validate([
            'name'=>'required',
            'dob'=>'required'
        ]);
    }
}
