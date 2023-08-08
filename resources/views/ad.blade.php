@extends('layouts.header')

<link rel="stylesheet" href="/css/anuncio.css">

@php
    require_once "process/ad_process.php";
@endphp

@section('title', 'Anúncio')
  
@section('content')
    <section id="detalhe" class="sec1">
    <div class="foto">
        <img src="<?=$images[0]->image?>" width="100%" alt="" id="foto-p">

        <div class="fotos">
            @foreach($images as $Image) 
                <div class="col-foto-s">
                    <img src="<?=$Image->image?>" width="100%" alt="" class="foto-s">
                </div>
            @endforeach
        </div>
    </div>

    <div class="txt">
        <h6>CEP:<?=$Ad->cep?> > <?=$Ad->category?> </h6>
        <h4 class="nome"><?=$Ad->title?></h4>
        <P>Publicado em 03/08 às 19:34 - cód. <?=$Ad->token?></P>
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