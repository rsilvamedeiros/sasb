@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-user-add">Criar Novo Documento de Empréstimo</h1>
<div class="ls-box">
  <div class="ls-no-padding-bottom">
    <button data-ls-module="modal" data-target="#searchclient" class="ls-btn-primary">Buscar Instituição</button>
  </div>
  <!-- INICIO modal -->
  <div class="ls-modal" id="searchclient">
    <div class="ls-modal-large">
      <div class="ls-modal-header">
        <button data-dismiss="modal">&times;</button>
        <h4 class="ls-modal-title">Buscar Instituições Cadastradas</h4>
      </div>
      <div class="ls-modal-body" id="myModalBody">

        <div class="ls-box-filter">
          <form action="" class="ls-form ls-form-inline">
            <input type="hidden" name="status" value="">
            <label class="ls-label col-md-6 col-sm-4">
              <b class="ls-label-text">Nome da Instituição:</b>
              <input type="text" maxlength="80" name="name" placeholder="Nome da Instituição">
            </label>
            <label class="ls-label col-md-4 col-sm-4">
              <b class="ls-label-text">CPF/CNPJ:</b>
              <input type="text" maxlength="12" name="cpf" placeholder="000.000.000-00">
            </label>
            <label class="ls-label col-md-1 col-sm-1">
              <input type="submit" class="ls-btn-primary" value="Buscar">
            </label>
          </form>
        </div>
        <table class="ls-table ls-table-striped ls-bg-header">
          <thead>
            <tr>
              <th class="ls-txt-center">CodCadastro</th>
              <th class="hidden-xs ls-data-ascending"><a href="">Instituição</a></th>
              <th>CPF/CNPJ</th>
              <th class="hidden-xs">Telefone</th>
              <th class="hidden-xs ls-txt-center">&nbsp;</th>
            </tr>
          </thead>
          @if (count($clients))
          @foreach ($clients as $client)
          <tbody>
            <tr>
              <td class="ls-txt-center"><a href="" title="">{{ $client->id }}</a></td>
              <td class="hidden-xs">{{ $client->name }}</td>
              <td>{{ $client->cpf }}</td>
              <td class="hidden-xs">{{ $client->phone }}</td>
              <td class="ls-float-center"><button class="ls-btn-primary ls-ico-user" onclick="selectClient({{ $client->id }})">Usar este</button></td>
            </tr>
          </tbody>
          @endforeach
          @else
          <p>Instituição não encontrada!</p>
          @endif
        </table>
      </div>
      <div class="ls-modal-footer">
        <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
        <button type="submit" id="confirmar_busca" class="ls-btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
  <!-- FIM modal -->
  <hr>
  <h5 class="ls-title-5">Criar Documento de Empréstimo:</h5>
  <form method="POST" action="{{ route('vehicle.postAdd') }}" class="ls-form row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-2">
        <b class="ls-label-text">CodCliente (Proprietário):</b>
        <input id="codClient" class="ls-no-spin" type="number" min="1" name="codCliente" placeholder="Código" required>
      </label>
      <label class="ls-label col-md-2">
        <b class="ls-label-text">Descrição do Item (Item emprestado):</b>
        <input class="ls-no-spin" type="text" name="model" placeholder="Descrição" required>
      </label>
      <label class="ls-label col-md-3">
        <b class="ls-label-text">Observação:</b>
        <input type="text" maxlength="20" name="brand" placeholder="Observação" required>
      </label>

      <label class="ls-label col-md-2">
        <b class="ls-label-text">Modelo:</b>
        <input class="ls-no-spin" type="text" name="modelo" placeholder="Modelo" required>
      </label>
      <label class="ls-label col-md-2">
        <b class="ls-label-text">Ano de fabricação:</b>
        <input class="ls-no-spin" type="number" min="1900" max="3000" name="year" placeholder="Ano" required>
      </label>
    </fieldset>
    <div class="ls-actions-btn">
      <input type="submit" value="Inserir" class="ls-btn" title="Inserir">
      <input class="ls-btn-danger" type="reset" value="Limpar">
    </div>
  </form>
</div>
<script>
  function selectClient(client_id) {
    document.getElementById('codClient').value = client_id;
  };
</script>
@stop