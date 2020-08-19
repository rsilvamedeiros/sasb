@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-list">Editar Documento de Transferência</h1>
<div class="ls-box">
  <form method="POST" action="{{ route('transferencia.edit', $transferencia->id) }}" class="ls-form row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Nome da Escola</b>
        <input value="{{ $transferencia->brand }}" class="ls-no-spin" type="text" name="brand" placeholder="Nome da escola" required >
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">Descrição do Item (Item emprestado)</b>
        <input value="{{ $transferencia->model }}" class="ls-no-spin" type="text" name="model" placeholder="Descrição" required>
      </label>
      <label class="ls-label col-md-12">
        <b class="ls-label-text">Modelo</b>
        <input value="{{ $transferencia->modelo }}" class="ls-no-spin" type="text"  name="modelo" placeholder="Modelo" required>
      </label>
       <label class="ls-label col-md-12">
        <b class="ls-label-text">Ano de fabricação</b>
        <input value="{{ $transferencia->year }}" class="ls-no-spin" type="number" min="1900" max="3000" name="year" placeholder="Ano de fab." required>
      </label>
    </fieldset>
    <div class="ls-actions-btn">
      <input type="submit" value="Atualizar" class="ls-btn" title="update">
      <a href="{{ route('transferencias') }}" class="ls-btn-danger">Cancelar</a>
    </div>
  </form>
</div>
@stop