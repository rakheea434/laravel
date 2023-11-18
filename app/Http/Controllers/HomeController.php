<?php

namespace App\Http\Controllers;

use App\Models\Blog;
//use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {      
        $blogs = Blog::with('user')->orderByDesc('id')->simplePaginate(5);
        return view('home', compact('blogs'));
    }

    public function show(Blog $blog)
    {
  
        return view('blog.show', compact('blogs'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Your store logic goes here
    }


}