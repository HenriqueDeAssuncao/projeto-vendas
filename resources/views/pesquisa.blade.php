@extends('layouts.header')
 
@section('title', 'Pesquisa')

@section('content')
  @if ($busca != "") 
    <p>O usuário está buscando por {{$busca}}</p>
  @endif
@endsection


