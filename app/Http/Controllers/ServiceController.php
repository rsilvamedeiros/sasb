<?php

namespace App\Http\Controllers;

use DB;
use \App\Service;
use \App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;


class ServiceController extends Controller
{
  private $service;
  private $client;
  private $clients;

  public function __construct(Service $service, Client $client)
  {
    $this->services = $service;
    $this->service = $service;

    $this->client = $client;
    $this->clients = $client;

    $this->middleware('auth');
  }

  //--------------------- Listar Serviços ----------------------//

  public function list_services()
  {                       
    $services = $this->services->getServices();
    $clients = $this->clients->getclients();
    return view('service/list_service', compact('services'));
  }

  //---------------- Listar Serviço Específico -----------------//
  public function get_list_service()
  {
    return list_services();
  }

  public function post_list_service(Request $field)
  {
    if(is_null($field['name']) && is_null($field['description'])) {
      $services = $this->services->getServices();
    } else {
      $services = $this->service->getService($field);
    }
    return view('service/list_service', compact('services'));
  }
  
  //-------------------- Adicionar Serviços --------------------//
  public function get_add_service()
  {
    $clients = Client::all();
    return view('service/add_service', compact('clients'));
  }

  public function post_add_service(Request $info)
  {
    $service = $this->service->addService($info);
    return redirect()->route('services');
  }

  //-------------------- Editar Serviço --------------------//
  public function get_edit_service($id)
  {
    $service = $this->service->find($id);
    return view('service/edit_service', compact('service'));
  }

  public function post_list_service_rel(Request $field)
  {
    $services = $this->services->getServices();

    return view('service/list_service_rel', compact('services'));
  }

  public function list_services_rel()
  {                       
    $services = $this->services->getServices();
    return view('service/list_service_rel', compact('services'));
  }
  //------------------------------------------------------------//

  public function post_edit_service(Request $info, $id)
  {
    $service = $this->service->find($id);
    $service->name = $info['name'];
    $service->description = $info['description'];
    $service->value = $info['value'];
    $service->save();
    return redirect()->route('services');
  }
  
  public function destroy($id)
  {
    $service = Service::find($id);

    if (isset($service)) {
      if($service->delete()){
        return response()->json([
          'title' => 'Sucesso',
          'msg' => 'Serviço excluído com sucesso!',
          'type' => 'success'
        ], 200);
      }
    }

    return response()->json([
      'title' => 'Atenção',
      'msg' => 'Não foi encontrado nenhum registro',
      'type' => 'warning'
    ], 200);
  }
  
}

