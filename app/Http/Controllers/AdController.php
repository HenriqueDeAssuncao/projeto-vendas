<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        //é posssível passar valores para a view
        $nome = "henrique";
        return view('home', ['nome' => $nome]);
    }
    public function create()
    {
        return view('events.create');
    }
    public function getProducts()
    {
        //Chamar o método que pega os anúncios
    }
    public function getProduct()
    {

    }
}