<!DOCTYPE html>
<html class="ls-theme-yellow-gold">

<head>
  <title>SASB</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="Insira aqui a descrição da página.">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link href="{{ asset('css/locastyle.css') }}" rel="stylesheet" type="text/css">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
  <link id=favicon rel=icon type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}">
</head>

<body>
  <div class="ls-topbar ">

    <!-- Barra de Notificações -->
    <div class="ls-notification-topbar">

      <!-- Links de apoio -->
      <div class="ls-alerts-list">
        <a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain" data-target="#ls-notification-curtain"><span>Notificações</span></a>
      </div>

      <!-- Dropdown com detalhes da conta de usuário -->
      <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
        <a href="#" class="ls-ico-user">
          <span class="ls-name">{{ Auth::user()->name }}</span>
        </a>

        <nav class="ls-dropdown-nav ls-user-menu">
          <ul>
            <!--<li><a href="#">Meus dados</a></li>-->
            <li><a href="{{ route('logout') }}">Sair</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <span class="ls-show-sidebar ls-ico-menu"></span>

    <a href="{{ route('home') }}" class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a>

    <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="{{ route('home') }}" class="ls-ico-hours">
        <small>SISTEMA DE AUXÍLIO DE SERVIÇOS E BENS</small>
        SASB
      </a>
    </h1>

    <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
  </div>


  <aside class="ls-sidebar">

    <div class="ls-sidebar-inner">
      <a href="/locawebstyle/documentacao/exemplos//pre-painel" class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>

      <nav class="ls-menu">
        <ul>
          <li><a href="/" class="ls-ico-home" title="Pagina Inicial">Pagina Inicial</a></li>
          <li>
            <a href="#" class="ls-ico-users" title="Instituições">Instituições</a>
            <ul>
              <li><a href="{{ route('client.add') }}">Cadastrar</a></li>
              <li><a href="{{ route('clients') }}">Buscar</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="ls-ico-folder-open" title="Documento de Empréstimo">Documento de Empréstimo</a>
            <ul>
              <li><a href="/vehicle/add/#searchclient">Criar</a></li>
              <li><a href="{{ route('vehicles') }}">Buscar</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="ls-ico-download" title="Documento de Transferência">Documento de Transferência</a>
            <ul>
            <li><a href="/transferencia/add/#searchclient">Criar</a></li>
              <li><a href="{{ route('transferencias') }}">Buscar</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="ls-ico-panel-backup" title="Servicos">Serviços</a>
            <ul>
              <li><a href="/service/add/#searchclient">Cadastrar</a></li>
              <li><a href="{{ route('services') }}">Buscar</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ route('relatorios') }}" class="ls-ico-text" title="Relatório de Serviços">Relatório de Serviços</a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <main class="ls-main ">
    <div class="container-fluid">


      @yield('content')

    </div>
  </main>

  <aside class="ls-notification">
    <nav class="ls-notification-list" id="ls-notification-curtain" style="left: 1716px;">
      <h3 class="ls-title-2">Notificações</h3>
      <ul>
        <li class="ls-dismissable">
          <!-- <a href="#">Novo cliente adicionado !</a> -->
          <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- We recommended use jQuery 1.10 or up -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="http://assets.locaweb.com.br/locastyle/3.10.0/javascripts/locastyle.js" type="text/javascript"></script>
</body>

</html>