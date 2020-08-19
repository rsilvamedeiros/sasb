<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Client;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
  protected $fillable = ['name', 'cpf'];

  public function getClient($field)
  {
    if (!is_null($field['name']) || !is_null($field['cpf'])) {
      $client = Client::where('name', 'LIKE', '%' . $field['name'] . '%')
        ->orWhere('cpf', $field["cpf"])->get();
    }
    return $client;
  }

  public function getClients()
  {
    $clients = Client::all();
    return $clients;
  }

  public function addClient($field)
  {
    $client = new Client();
    $client->name = $field['name'];
    $client->cpf = $field['cpf'];
    $client->email = $field['email'];
    $client->address = $field['address'];
    $client->phone = $field['phone'];
    $client->birth_date = $field['birth_date'];
    $client->save();
  }

  public function transferencias(){
    return $this->hasMany('App\Transferencia');
  }

  public function emprestimos(){
    return $this->hasMany('App\Vehicle');
  }

  public function servicos(){
    return $this->hasMany('App\Service');
  }
}
