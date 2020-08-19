@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-list">Listar Instituições</h1>
<div class="ls-box">
  <h5 class="ls-title-5">Procurar Instituição Específica:</h5>
  <form method="post" action="{{ route('client.list') }}" class="ls-form ls-form-horizontal row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-4 col-xs-12">
        <b class="ls-label-text">Nome da Instituição:</b>
        <input type="text" name="name" placeholder="Nome da Intituição" class="ls-field ls-no-spin">
      </label>
      <label class="ls-label col-md-4 col-xs-12">
        <b class="ls-label-text">CPF/CNPJ:</b>
        <input type="text" name="cpf" maxlength="11" placeholder="CPF/CNPJ da Instituição" class="ls-field">
      </label>
    </fieldset>
    <div class="ls-actions-btn ls-no-padding-bottom">
      <input type="submit" value="Buscar" class="ls-btn" title="Buscar">
      <input class="ls-btn-danger" type="reset" value="Limpar">
    </div>
  </form>

  <table class="ls-table ls-table-striped ls-bg-header">
    <thead>
      <tr>
        <th>Nome da Instituição</th>
        <th class="hidden-xs ls-data-ascending">
          <a href="">Email</a>
        </th>
        <th>Endereço</th>
        <th class="hidden-xs">Telefone</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      @if (count($clients))
      @foreach ($clients as $client)
      <tr>
        <td><a href="" title="">{{ $client->name }}</a></td>
        <td class="hidden-xs">{{ $client->email }}</td>
        <td>{{ $client->address }}</td>
        <td class="hidden-xs">{{ $client->phone }}</td>
        <td class="ls-regroup ">
          <div data-ls-module="dropdown" class="ls-dropdown ">
            <a href="#" class="ls-btn ls-btn-sm ">Editar</a>
            <ul class="ls-dropdown-nav">
              <li><a href="{{ route('client.edit', $client->id) }}">Alterar</a></li>
              <li><a onclick="javascript:confirmaExcluir('{{ route('client.destroy', $client->id) }}')" style="cursor: pointer;">Excluir</a></li>
            </ul>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td>Instituições não encontrada(s)!</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

<script type="text/javascript">
  function confirmaExcluir(link) {
    Swal.fire({
      title: 'Deseja realmente excluir uma Instituição?',
      text: "Você não poderá reverter isso!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
            url: link,
            type: 'DELETE',
            dataType: "JSON",
            context: this,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
              Swal.fire({
                title: data.title,
                text: data.msg,
                icon: data.type,
                button: "Ok",
              });
              location.reload();
            },
            error: function(){
              Swal.fire({
                title: "Erro!",
                text: "Houve um erro ao remover a instituição!",
                icon: "error",
                button: "Fechar",
              });
            },
        })
      }
    });
  }
</script>
@stop