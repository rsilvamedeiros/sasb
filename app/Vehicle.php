<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Vehicle;
use \App\Client;

class Vehicle extends Model
{
  protected $fillable = ['name', 'cpf'];

  public function getClient($field)
  {
    if(!is_null($field['name']) || !is_null($field['cpf'])) {
      $client = Client::where('name', 'LIKE', '%'.$field['name'].'%')
                         ->orWhere('cpf', $field["cpf"])->get();
    }
    return $client;
  }

  public function getVehicle($field)
  {
    if(!is_null($field['brand']) || !is_null($field['model'])) {
      $vehicle = Vehicle::where('brand', 'LIKE', '%'.$field['brand'].'%')
                         ->where('model', 'LIKE', '%' . $field["model"] .'%')->get();
    }
    return $vehicle;
  }

  public function getVehicles()
  {
    $vehicle = Vehicle::all();
    return $vehicle;
  }

	public function addVehicle($field)
  {
    $vehicle = new Vehicle();
    $vehicle->brand = $field['brand'];
    $vehicle->model = $field['model'];
    $vehicle->modelo = $field['modelo'];
    $vehicle->year = $field['year'];
    $vehicle->client_id = $field['codCliente'];
    $vehicle->save();
  }

  public function client(){
    return $this->belongsTo('App\Client');
  }
}