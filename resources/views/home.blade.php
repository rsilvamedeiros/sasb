@extends('layouts.application')

@section('content')
<h3 class="ls-title-intro" style="text-align: center; font-weight: bold; text-transform: uppercase;">Bem vindo ao Painel SASB</h3>

<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3"><b>Informações do Sistema</b></h2>
    <p class="ls-float-right ls-float-none-xs ls-small-info">Quantidade válida até <strong><?php echo (new DateTime())->format('d-m-Y'); ?></strong></p>
  </header>
  <div id="sending-stats" class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>INSTITUIÇÕES CADASTRADAS</b></h6>
        </div>
        <div class="ls-box-body">
          <strong>{{ App\Client::count() }}</strong>
          <small>Instituiçõe(s)</small>
        </div>
        <div class="ls-box-footer">
          <a href="{{ route('clients') }}" aria-label="Buscar Instituição" class="ls-btn ls-btn-sm" title="Buscar Instituição">Buscar Instituição</a>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>DOCUMENTO DE EMPRÉSTIMO</b></h6>
        </div>
        <div class="ls-box-body">
          <strong>{{ App\Vehicle::count() }}</strong>
          <small>Documento(s)</small>
        </div>
        <div class="ls-box-footer">
          <a href="{{ route('vehicles') }}" aria-label="Buscar Documento" class="ls-btn ls-btn-sm" title="Buscar Documento">Buscar Empréstimo(s)</a>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>SERVIÇOS CADASTRADOS</b></h6>
        </div>
        <div class="ls-box-body">
          <strong>{{ App\service::count() }}</strong>
          <small>Serviço(s)</small>
        </div>
        <div class="ls-box-footer">
          <a href="{{ route('services') }}" aria-label="Buscar servicos" class="ls-btn ls-btn-sm" title="Buscar Servico">Buscar Serviço</a>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>DOCUMENTOS DE TRANSFERÊNCIA</b></h6>
        </div>
        <div class="ls-box-body">
          <strong>{{ App\Transferencia::count() }}</strong>
          <small>Transferência(s)</small>
        </div>
        <div class="ls-box-footer">
          <a href="{{ route('clients') }}" aria-label="Buscar Documento" class="ls-btn ls-btn-sm" title="Buscar Documento">Buscar Transferência</a>
        </div>
      </div>
    </div>
    <!-- <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">SERVIÇOS EM ABERTO</h6>
        </div>
        <div class="ls-box-body">
          <div class="ls-box-body">
            <strong>100.000</strong>
            <small>ATUAL</small>
          </div>
          <div class="ls-box-footer">
          <a href="#" aria-label="Comprar mais envios" class="ls-btn ls-btn-sm" title="Ver Servicos">Ver Serviços</a>
        </div>
        </div>
      </div>
    </div> -->
  </div>
</div>

@endsection
