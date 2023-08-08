<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        //é posssível passar valores para a view
        // $nome = "henrique";
        // return view('home', ['nome' => $nome]);
    }
    public function criar()
    {
        return view('criar');
    }
    public function findProducts()
    {
        //Chamar o método que pega os anúncios
        return view('anuncios');
    }
}