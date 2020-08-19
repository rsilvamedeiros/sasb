<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Service;
use \App\Client;

class Service extends Model{
  protected $fillable = ['name', 'description'];

  public function getClient($field)
  {
    if(!is_null($field['name']) || !is_null($field['cpf'])) {
      $client = Client::where('name', 'LIKE', '%'.$field['name'].'%')
                         ->orWhere('cpf', $field["cpf"])->get();
    }
    return $client;
  }

  public function getService($field)
  {
    if(!is_null($field['name']) || !is_null($field['description'])) {
      $service = Service::where('name', 'LIKE', '%'.$field['name'].'%')
                         ->orWhere('description', $field["description"])->get();
    }
    return $service;
  }

  public function getServices()
  {
    $services = Service::all();
    return $services;
  }

  public function addService($field)
  {
    $service = new Service();
    $service->name = $field['name'];
    $service->description = $field['description'];
    $service->value = $field['value'];
    $service->client_id = $field['codCliente'];
    $service->save();
  }

  public function client(){
    return $this->belongsTo('App\Client');
  }
}
