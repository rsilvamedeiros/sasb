<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// ROTAS PARA DESLOGAR E ENVIAR PARA VIEW DE LOGIN
Route::get('/logout', 'Auth\LoginController@logout');

// ROTAS PARA A CONTROLLER HOME - METODO INDEX
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//================================== ROTAS PARA CLIENTE ==================================//
// ROTAS PARA ADICIONAR INSTITUIÇÃO
Route::get('/client/add', 'ClientController@get_add_client')->name('client.add'); // Rota da view
Route::post('/client/add', 'ClientController@post_add_client')->name('client.postAdd'); // Rota do formulário

// ROTAS PARA LISTAR INSTITUIÇÃO
Route::get('/client', function() { return redirect()->route('clients'); });
Route::post('/client', 'ClientController@post_list_client')->name('client.list');
Route::get('/clients', 'ClientController@list_clients')->name('clients');

// ROTAS PARA EDITAR INSTITUIÇÃO NO BANCO DE DADOS
Route::get('/client/edit/{id}', 'ClientController@get_edit_client')->name('client.edit');
Route::post('/client/edit/{id}', 'ClientController@post_edit_client')->name('client.postEdit');
// Route::get('/client/delete/{id}', 'ClientController@delete_client')->name('client.delete');

// ROTAS PARA DELETAR INSTITUIÇÃO
Route::delete('/client/destroy/{id}', 'ClientController@destroy')->name('client.destroy');
//========================================================================================//

//================================== ROTAS PARA DOCUMENTOS DE EMPRÉSTIMO ==================================//
// ROTAS PARA CRIAR DOCUMENTO DE EMPRÉSTIMO
Route::get('/vehicle/add/searchclient', 'VehicleController@get_search_client')->name('vehicle.addSearchClient'); // Rota para procurar cliente

Route::get('/vehicle/add', 'VehicleController@get_add_vehicle')->name('vehicle.add'); // Rota da view
Route::post('/vehicle/add', 'VehicleController@post_add_vehicle')->name('vehicle.postAdd'); // Rota do formulário

// ROTAS PARA LISTAR DOCUMENTO DE EMPRÉSTIMO
Route::get('/vehicle', function() { return redirect()->route('vehicles'); });
Route::post('/vehicle', 'VehicleController@post_list_vehicle')->name('vehicle.list');
Route::get('/vehicles', 'VehicleController@list_vehicles')->name('vehicles');

// ROTAS PARA EDITAR DOCUMENTO DE EMPRÉSTIMO
Route::get('/vehicle/edit/{id}', 'VehicleController@get_edit_vehicle')->name('vehicle.edit');
Route::post('/vehicle/edit/{id}', 'VehicleController@post_edit_vehicle')->name('vehicle.postEdit');
Route::get('/vehicle/delete/{id}', 'VehicleController@delete_vehicle')->name('vehicle.delete');

// ROTAS PARA DELETAR DOCUMENTO DE EMPRÉSTIMO
Route::delete('/vehicle/destroy/{id}', 'VehicleController@destroy')->name('vehicle.destroy');

//========================================================================================//

//================================== ROTAS PARA DOCUMENTOS DE TRANSFERÊNCIAS ==================================//
// ROTAS PARA CRIAR DOCUMENTO DE TRANSFERÊNCIAS
Route::get('/transferencia/add/searchclient', 'TransferenciaController@get_search_client')->name('transferencia.addSearchClient'); // Rota para procurar cliente

Route::get('/transferencia/add', 'TransferenciaController@get_add_transferencia')->name('transferencia.add'); // Rota da view
Route::post('/transferencia/add', 'TransferenciaController@post_add_transferencia')->name('transferencia.postAdd'); // Rota do formulário

// ROTAS PARA LISTAR DOCUMENTO DE TRANSFERÊNCIAS
Route::get('/transferencia', function() { return redirect()->route('transferencias'); });
Route::post('/transferencia', 'TransferenciaController@post_list_transferencia')->name('transferencia.list');
Route::get('/transferencias', 'TransferenciaController@list_transferencias')->name('transferencias');

// ROTAS PARA EDITAR DOCUMENTO DE TRANSFERÊNCIAS
Route::get('/transferencia/edit/{id}', 'TransferenciaController@get_edit_transferencia')->name('transferencia.edit');
Route::post('/transferencia/edit/{id}', 'TransferenciaController@post_edit_transferencia')->name('transferencia.postEdit');
Route::get('/transferencia/delete/{id}', 'TransferenciaController@delete_transferencia')->name('transferencia.delete');

// ROTAS PARA DELETAR DOCUMENTO DE TRANSFERÊNCIAS
Route::delete('/transferencia/destroy/{id}', 'TransferenciaController@destroy')->name('transferencia.destroy');

//========================================================================================//

//================================== ROTAS PARA SERVICO ==================================//
// ROTAS PARA ADICIONAR SERVICO
Route::get('/service/add/searchclient', 'ServiceController@get_search_client')->name('service.addSearchClient'); // Rota para procurar cliente

Route::get('/service/add', 'ServiceController@get_add_service')->name('service.add'); // Rota da view
Route::post('/service/add', 'ServiceController@post_add_service')->name('service.postAdd'); // Rota do formulário

// ROTAS PARA LISTAR SERVIÇOS
Route::get('/service', function() { return redirect()->route('services'); });
Route::post('/service', 'ServiceController@post_list_service')->name('service.list');
Route::get('/services', 'ServiceController@list_services')->name('services');

// ROTAS PARA LISTAR SERVIÇOS - RELATÓRIO
Route::get('/relatorio', function() { return redirect()->route('relatorios'); });
Route::post('/relatorio', 'ServiceController@post_list_service_rel')->name('relatorio.list');
Route::get('/relatorios', 'ServiceController@list_services_rel')->name('relatorios');

//ROTAS PARA EDITAR SERVIÇOS
Route::get('/service/edit/{id}', 'ServiceController@get_edit_service')->name('service.editPage');
Route::post('/service/edit/{id}', 'ServiceController@post_edit_service')->name('service.postEdit');
Route::get('/service/delete/{id}', 'ServiceController@delete_service')->name('service.delete');

// ROTAS PARA DELETAR SERVIÇOS
Route::delete('/service/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');