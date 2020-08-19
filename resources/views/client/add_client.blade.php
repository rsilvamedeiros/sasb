@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-user-add">Adicionar Instituição</h1>
<div class="ls-box">
  <form method="POST" action="{{ route('client.postAdd') }}" class="ls-form row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Nome da Instituição:</b>
        <input type="text" data-ls-module="charCounter" maxlength="50" name="name" placeholder="Nome da Instituição" required >
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">CPF/CNPJ:</b>
        <input class="ls-no-spin" maxlength="11" type="text" name="cpf" placeholder="CPF" required >
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Email:</b>
        <input class="ls-no-spin" maxlength="80" type="text" name="email" placeholder="Email" required >
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Endereço:</b>
        <input class="ls-no-spin" maxlength="80" type="text" name="address" placeholder="Endereco" required >
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Telefone:</b>
        <input class="ls-no-spin" maxlength="11" type="number" name="phone" placeholder="(00) 00000-0000" required>
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Data de abertura/Data Nascimento:</b>
        <input class="ls-no-spin" type="date" name="birth_date" placeholder="00/00/0000" required>
      </label>
    </fieldset>
    <div class="ls-actions-btn">
      <input type="submit" value="Inserir" class="ls-btn" title="Inserir">
      <input class="ls-btn-danger" type="reset" value="Limpar">
    </div>
  </form>
</div>
@stop