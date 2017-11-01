<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
      return view ('sinhvien.index')->with('home','class="active"');
    }
    public function about()
    {
      return view('pages.about')->with('about','class="active"');
    }
}
