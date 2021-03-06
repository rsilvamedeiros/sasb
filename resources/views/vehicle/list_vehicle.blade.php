@extends('layouts.application')

@section('content')
<h1 class="ls-title-intro ls-ico-list">Listar Documentos de Empréstimo</h1>
<div class="ls-box">
  <h5 class="ls-title-5">Procurar - Documento de Empréstimo Específico:</h5>
  <form method="post" action="{{ route('vehicle.list') }}" class="ls-form ls-form-horizontal row">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <fieldset>
      <label class="ls-label col-md-4 col-xs-12">
        <b class="ls-label-text">Descrição do Item (Item emprestado)</b>
        <input type="text" name="brand" placeholder="Descrição do Item (Item emprestado)" class="ls-field ls-no-spin">
      </label>
      <label class="ls-label col-md-4 col-xs-12">
        <b class="ls-label-text">Observação</b>
        <input type="text" name="model" placeholder="Observação" class="ls-field">
      </label>
    </fieldset>
    <div class="ls-actions-btn">
      <input type="submit" value="Buscar" class="ls-btn" title="Buscar">
      <input class="ls-btn-danger" type="reset" value="Limpar">
    </div>
  </form>

  <table class="ls-table ls-table-striped ls-bg-header">
    <thead>
      <tr>
        <th>Descrição do Doc.</th>
        <th class="hidden-xs ls-data-ascending">
          <a href="">Observação</a>
        </th>
        <th>Modelo</th>
        <th>Ano de fabricação</th>
        <th>Instituição</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      @if (count($vehicles))
      @foreach ($vehicles as $vehicle)
      <tr>
        <td><a>{{ $vehicle->brand }}</a></td>
        <td>{{ $vehicle->model }}</td>
        <td>{{ $vehicle->modelo }}</td>
        <td class="text-center">{{ $vehicle->year }}</td>
        <td>{{ $vehicle->client->name }}</td>
        <td class="ls-regroup ">
          <div data-ls-module="dropdown" class="ls-dropdown ">
            <a href="#" class="ls-btn ls-btn-sm ">Editar</a>
            <ul class="ls-dropdown-nav">
              <li><a href="{{ route('vehicle.edit', $vehicle->id) }}">Alterar</a></li>
              <li><a onclick="javascript:confirmaExcluir('{{ route('vehicle.destroy', $vehicle->id) }}')" style="cursor: pointer;">Excluir</a></li>
            </ul>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="6" class="text-center">Documento(s) de Empréstimo não encontrado(s)!</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
<script type="text/javascript">
  function confirmaExcluir(link) {
    Swal.fire({
      title: 'Deseja realmente excluir um Documento de Empréstimo?',
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
                text: "Houve um erro ao remover um Documento de Empréstimo!",
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