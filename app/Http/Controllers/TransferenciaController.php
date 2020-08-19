<?php

namespace App\Http\Controllers;

use DB;
use \App\Transferencia;
use \App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;

class TransferenciaController extends Controller
{
  private $transferencia;
  private $client;
  private $clients;

  public function __construct(Transferencia $transferencia, Client $client)
  {
    $this->transferencia = $transferencia;
    $this->transferencias = $transferencia;

    $this->client = $client;
    $this->clients = $client;
    $this->middleware('auth');
  }

  public function list_transferencias()
  {
    $transferencias = $this->transferencias->getTransferencias();
    $clients = $this->clients->getclients();
    return view('transferencia/list_transferencia', compact('transferencias'));
  }

  public function get_list_transferencia()
  {
    return list_transferencias();
  }

  public function post_list_transferencia(Request $field)
  {
    if (is_null($field['brand']) && is_null($field['model'])) {
      $transferencias = $this->transferencias->getTransferencias();
    } else {
      $transferencias = $this->transferencia->getTransferencia($field);
      //$clients = $this->client->getclient($field);
    }
    return view('transferencia/list_transferencia', compact('transferencias'));
  }

  public function get_add_transferencia(Request $field)
  {
    $clients = Client::all();
    return view('transferencia/add_transferencia', compact('clients'));
  }

  public function post_add_transferencia(Request $info)
  {
    $transferencia = $this->transferencia->addTransferencia($info);
    return redirect()->route('transferencias');
  }

  public function get_edit_transferencia($id)
  {
    $transferencia = $this->transferencia->find($id);
    //dd($transferencia);
    return view('transferencia/edit_transferencia', compact('transferencia'));
  }

  public function post_edit_transferencia(Request $info, $id)
  {
    $transferencia = $this->transferencia->find($id);
    $transferencia->brand = $info['brand'];
    $transferencia->model = $info['model'];
    $transferencia->modelo = $info['modelo'];
    $transferencia->year = $info['year'];
    $transferencia->save();
    return redirect()->route('transferencias');
  }

  public function destroy($id)
  {
    $transferencia = Transferencia::find($id);

    if (isset($transferencia)) {
      if($transferencia->delete()){
        return response()->json([
          'title' => 'Sucesso',
          'msg' => 'Documento de Transferência excluído com sucesso!',
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
