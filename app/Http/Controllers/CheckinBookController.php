<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class CheckinBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book)
    {
        try{

            $book->checkin(auth()->user());
        }
        catch(\Exception $e){
            return response([],404);
        }
    }

}
