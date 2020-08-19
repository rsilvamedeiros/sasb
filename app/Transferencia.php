<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Transferencia;
use \App\Client;

class Transferencia extends Model
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

  public function getTransferencia($field)
  {
    if(!is_null($field['brand']) || !is_null($field['model'])) {
      $transferencia = Transferencia::where('brand', 'LIKE', '%'.$field['brand'].'%')
                         ->where('model', 'LIKE', '%' . $field["model"] .'%')->get();
    }
    return $transferencia;
  }

  public function getTransferencias()
  {
    $transferencia = Transferencia::all();
    return $transferencia;
  }
	public function addTransferencia($field)
  {
    $transferencia = new Transferencia();
    $transferencia->brand = $field['brand'];
    $transferencia->model = $field['model'];
    $transferencia->modelo = $field['modelo'];
    $transferencia->year = $field['year'];
    $transferencia->client_id = $field['codCliente'];
    $transferencia->save();
  }

  public function client(){
    return $this->belongsTo('App\Client');
  }
}