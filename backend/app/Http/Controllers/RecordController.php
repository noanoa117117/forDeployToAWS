<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Review;

class RecordController extends Controller
{
    
    public function hasmany()
    {
        return view('record.hasmany',[
            'book'=>Book::find(1)
        ]);
    }

    





   
}
