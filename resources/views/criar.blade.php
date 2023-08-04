@extends('layouts.header')



@section('title', 'Criar')


@section('content')
<div class="form-create">
  <form action="/process/create_process.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label for="title">Título:</label>
      <div><img src="" alt=""></div>
      <input type="text" name="title">
    </div>
    <div class="form-group">
      <label for="image">Imagem:</label>
      <div><img src="" alt=""></div>
      <input type="file" name="image">
    </div>
    <div class="form-group">
      <label for="cep">CEP:</label>
      <input type="text" name="cep">
    </div>
    <div class="form-group">
      <label for="num">Número</label>
      <input type="text" name="num">
    </div>
    <div class="form-group">
      <label for="price">Preço</label>
      <input type="text" name="price">
    </div>
    <div class="form-group">
      <label for="category">Categoria</label>
      <input type="text" name="category">
    </div>
    <div class="form-group">
      <label for="description">Descrição</label>
      <input type="description" name="description">
    </div>
    <div class="form-group">
      <input type="submit" value= "Criar">
    </div>
  </form>
</div>
@endsection