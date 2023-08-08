@extends('layouts.header')

@php
  require_once "process/find_ads_process.php";  
@endphp


@section('title', 'Anúncios')
  
@section('content')
  @if (count($ads))
    @foreach($ads as $ad) 
      <div class="ad-container">
        <p><?=$ad->title?></p>
        <img src="<?=$ad->image?>" alt="">
        <p><?=$ad->price?></p>
      </div>
    @endforeach
    @else
      <p>Não há anúncios para mostrar.</p>
  @endif
@endsection

