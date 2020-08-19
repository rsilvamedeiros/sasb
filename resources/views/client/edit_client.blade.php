@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-list">Editar Instituição</h1>
<div class="ls-box">
  <form method="POST" action="{{ route('client.edit', $client->id) }}" class="ls-form row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Nome da Instituição</b>
        <input value="{{ $client->name }}" type="text" data-ls-module="charCounter" maxlength="50" name="name" placeholder="Nome do Produto" required >
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">CPF/CNPJ</b>
        <input value="{{ $client->cpf }}" class="ls-no-spin" maxlength="11" type="text" name="cpf" placeholder="Cpf" required>
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">E-mail</b>
        <input value="{{ $client->email }}" class="ls-no-spin" maxlength="80" type="text" name="email" placeholder="Email" required>
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Endereco</b>
        <input value="{{ $client->address }}" class="ls-no-spin" maxlength="80" type="text" name="address" placeholder="Endereço" required>
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">Telefone</b>
        <input value="{{ $client->phone }}" class="ls-no-spin" maxlength="11" type="text" name="phone" placeholder="Telefone" required>
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">Data de abertura/Data Nascimento</b>
        <input value="{{ $client->birth_date }}" class="ls-no-spin" type="date" name="birth_date" placeholder="00/00/0000" required>
      </label>
    </fieldset>
    <div class="ls-actions-btn ls-no-padding-bottom">
      <input type="submit" value="Atualizar" class="ls-btn" title="update">
      <a href="{{ route('clients') }}" class="ls-btn-danger">Cancelar</a>
    </div>
  </form>
</div>
@stop