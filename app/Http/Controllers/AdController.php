<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
       return view('index');
    }
    public function create()
    {
        return view('create');
    }
    public function ads()
    {
        //Chamar o método que pega os anúncios
        return view('ads');
    }
    public function ad()
    {
        //Chamar o método que pega os anúncios
        return view('ad');
    }
}