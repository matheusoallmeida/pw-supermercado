<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\FornecedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', [ProdutosController::class, 'listar']);
Route::get('/produtos/novo', 
    [ProdutosController::class, 'novo'])
    ->name('prod.novo');
Route::post('/produtos/novo/{id?}',
    [ProdutosController::class, 'salvar'])
    ->name('prod.salvar');
Route::get('/produtos/edit/{id}', 
    [ProdutosController::class, 'edit'])
    ->name('prod.edit');
Route::get('/produtos/delete{id}', [ProdutosController::class, 'delete'])->name('prod.delete');

Route::get('/fornecedores', [FornecedorController::class, 'listar']);
Route::get('/fornecedores/novo', 
    [FornecedorController::class, 'novo'])
    ->name('forn.novo');
Route::post('/fornecedores/novo/{id?}',
    [FornecedorController::class, 'salvar'])
    ->name('forn.salvar');
Route::get('/fornecedores/edit/{id}', 
    [FornecedorController::class, 'edit'])
    ->name('forn.edit');
Route::post('/fornecedores/delete/{id}', [FornecedorController::class, 'delete'])->name('forn.delete');