@extends('layouts.application')

@section('content')

<script src="/js/jspdf.min.js"></script>
<script src="/js/jspdf.plugin.autotable.js"></script>

<h1 class="ls-title-intro ls-ico-list">Relatório de Serviços</h1>
<div class="ls-box">
  <h5 class="ls-title-5">Faça o download do relatório de serviços:</h5>
  <hr style="margin: 15px 0;">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <button onclick="downloadPDF()" class="ls-btn-success" type="buton" alt="Download Relatório" style="margin-bottom: 20px;">Download</button>
    </div>
  </div>

  <table class="ls-table ls-table-striped ls-bg-header" id="relatorio">
    <thead>
      <tr>
        <th>Nome</th>
        <th class="hidden-xs ls-data-ascending">
          <a href="">Descrição</a>
        </th>
        <th>Valor</th>
        <th>Instituição</th>
      </tr>
    </thead>
    <tbody>
      @if (count($services) > 1)
      @foreach ($services as $service)
      <tr>
        <td><a>{{ $service->name }}</a></td>
        <td>{{ $service->description }}</td>
        <td>{{ $service-> value }}</td>
        <td>{{ $service->client->name }}</td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4" class="text-center">Nenhum Serviço cadastrado</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

<script type="text/javascript">
   function downloadPDF() {
    var doc = new jsPDF();

    doc.autoTable({ html: '#relatorio' });

    doc.save('relatorio_servicos.pdf');
  }  
</script>
@stop