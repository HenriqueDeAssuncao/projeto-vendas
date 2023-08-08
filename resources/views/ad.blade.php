@extends('layouts.header')

<link rel="stylesheet" href="/css/anuncio.css">

@php
    require_once "dao/AdDAO.php";  
    require_once "helpers/db.php";
    $id = $_GET["id"];
    $AdDao = new AdDAO($conn);
    $Ad = $AdDao->findProduct($id);
@endphp

@section('title', 'Anúncio')
  
@section('content')
    <section id="detalhe" class="sec1">
    <div class="foto">
        <img src="<?=$Ad->image?>" width="100%" alt="" id="foto-p">

        <div class="fotos">
        <div class="col-foto-s">
        <img src="b.jpg" width="100%" alt="" class="foto-s">
        </div>
        <div class="col-foto-s">
        <img src="c.jpg" width="100%" alt="" class="foto-s">
        </div>
        <div class="col-foto-s">
        <img src="d.jpg" width="100%" alt="" class="foto-s">
        </div>
        <div class="col-foto-s">
        <img src="e.jpg" width="100%" alt="" class="foto-s">
        </div>
        </div>
    </div>

    <div class="txt">
        <h6>CEP:<?=$Ad->cep?> > <?=$Ad->category?> </h6>
        <h4 class="nome"><?=$Ad->title?></h4>
        <P>Publicado em 03/08 às 19:34 - cód. 1218244598</P>
        <h2>R$<?=$Ad->price?></h2>
        <button class="comprar">Comprar</button>
        <button class="chat">Chat</button>
        <h4 class="desc">Descrição</h4>
        <span>
            <?=$Ad->description?>
        </span>
    </div>
    </section>
@endsection