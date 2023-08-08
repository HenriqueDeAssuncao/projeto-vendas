@extends('layouts.header')

<link rel="stylesheet" href="/css/anuncios.css">

@php
  require_once "process/find_ads_process.php";  
@endphp

@section('title', 'Anúncios')
  
@section('content')
  @if (count($ads))
    @foreach($ads as $ad) 
      <section id="anuncios">
        <div class="bloco">
          <div class="img">
            <img src="<?=$ad->image?>" alt="">
          </div>
          <div class="dtl">
            <h3><?=$ad->title?></h3>
            <p><?=$ad->description?></p>
            <a href="/ad?id=<?=$ad->productId?>">Saiba Mais</a>
          </div>
        </div>
      </section>
    @endforeach
    @else
      <p>Não há anúncios para mostrar.</p>
  @endif
@endsection