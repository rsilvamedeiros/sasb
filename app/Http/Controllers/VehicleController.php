<?php

namespace App\Http\Controllers;

use DB;
use \App\Vehicle;
use \App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;

class VehicleController extends Controller
{
  private $vehicle;
  private $client;
  private $clients;

  public function __construct(Vehicle $vehicle, Client $client)
  {
    $this->vehicle = $vehicle;
    $this->vehicles = $vehicle;

    $this->client = $client;
    $this->clients = $client;
    $this->middleware('auth');
  }

  public function list_vehicles()
  {
    $vehicles = $this->vehicles->getVehicles();
    $clients = $this->clients->getclients();
    return view('vehicle/list_vehicle', compact('vehicles'));
  }

  public function get_list_vehicle()
  {
    return list_vehicles();
  }

  public function post_list_vehicle(Request $field)
  {
    if (is_null($field['brand']) && is_null($field['model'])) {
      $vehicles = $this->vehicles->getVehicles();
    } else {
      $vehicles = $this->vehicle->getVehicle($field);
    }
    return view('vehicle/list_vehicle', compact(['vehicles']));
  }

  public function get_add_vehicle(Request $field)
  {
    $clients = Client::all();
    return view('vehicle/add_vehicle', compact('clients'));
  }

  public function post_add_vehicle(Request $info)
  {
    $vehicle = $this->vehicle->addVehicle($info);
    return redirect()->route('vehicles');
  }

  public function get_edit_vehicle($id)
  {
    $vehicle = $this->vehicle->find($id);
    //dd($vehicle);
    return view('vehicle/edit_vehicle', compact('vehicle'));
  }

  public function post_edit_vehicle(Request $info, $id)
  {
    $vehicle = $this->vehicle->find($id);
    $vehicle->brand = $info['brand'];
    $vehicle->model = $info['model'];
    $vehicle->modelo = $info['modelo'];
    $vehicle->year = $info['year'];
    $vehicle->save();
    return redirect()->route('vehicles');
  }

  public function destroy($id)
  {
    $vehicle = Vehicle::find($id);

    if (isset($vehicle)) {
      if($vehicle->delete()){
        return response()->json([
          'title' => 'Sucesso',
          'msg' => 'Documento de Empréstimo excluído com sucesso!',
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


