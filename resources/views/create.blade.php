@extends('layouts.header')

<link rel="stylesheet" href="/css/form.css">


@section('title', 'Criar')


@section('content')
<div class="container">
    <header>Cadastro</header>

    <form action="/process/create_process.php" method="post" enctype="multipart/form-data">

      <div class="field">
        <div class="input-field">
          <label for="title">Título*</label>
          <input type="text" name="title">
        </div>
      </div>  

      <div class="field">
        <div class="input-field">
          <label for="images">Imagens:*</label>
          <input type="file" name="images[]" multiple>
        </div>
      </div>

      <div class="field">
        <div class="input-field">
          <label for="cep">Localização:*</label>
          <input type="text" placeholder="digite o CEP" name="cep" required>
        </div>
      </div>

      <div class="field">
        <div class="input-field">
          <label for="num">Número:*</label>
          <input type="text" id="num" name="num" required>
        </div>
      </div>

      <div class="field">
        <div class="input-field">
          <label for="category">Categoria:*</label>
          <select id="cat" name="category" size="1">
            <option value="" selected></option>
            <option value="Eletrônicos e celulares">Eletrônicos e celulares</option>
            <option value="Para sua casa">Para sua casa</option>
            <option value="Esportes e lazer">Esportes e lazer</option>
            <option value=">Músicas e hobbies">Músicas e hobbies</option>
            <option value="Moda e Beleza">Moda e Beleza</option>
            <option value="Agro e indústria">Agro e indústria</option>
            <option value="Imóveis">Imóveis</option>
            <option value="Automóveis e peças">Automóveis e peças</option>
            <option value="Vagas de emprego">Vagas de emprego</option>
            <option value="Serviços">Serviços</option>
          </select>
        </div>
      </div>

      <div class="field">
        <div class="input-field">
          <label for="price">Preço:*</label>
          <input type="text" name="price" required>
        </div>
      </div>

      <div class="field">
        <div class="input-field">
          <label for="description">Descrição:</label>
          <textarea name="description" style="width: 265px; height: 100px;"></textarea>
        </div>
      </div>
      <button type="submit">Enviar</button>

    </form>
  </div>
@endsection