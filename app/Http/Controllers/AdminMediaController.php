<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{
    //
    protected $fillable = ['file'];

    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        //
        return view('admin.media.create');
    }

    public function store()
    {
        //
    }
}
