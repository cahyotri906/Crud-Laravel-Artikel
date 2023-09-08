<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'ini function index dari home controller';
    }

    public function about()
    {
        return 'ini function about dari home controller';
    }

    public function contact()
    {
        return 'ini function contact dari home controller';
    }
}
