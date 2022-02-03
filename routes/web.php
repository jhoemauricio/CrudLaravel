<?php

use App\Http\Controllers\JogosController;
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

// Route::get('/home', function () {
//     return view('welcome');
// });



/**
 * '/jogos'nome da rota em seguida a view chamada 'jogos'
 */
// Route::view('/jogos','jogos');



/**
 * parametros estaticos, name é o que vai ser passado
 */
//Route::view('/jogos','jogos',['name' =>'GTA']);



/**
 * parametros dinamicos 
 * a rota '/jogos{name}' recebe um parametro. O que for digitado na URL {} sera enviando para
 * a variavel $name
 */
//Route::get('/jogos/{name}', function($name){
   // a view retorna  uma variavel nomeJogo que recebe a variavel $name
   // return view('jogos',['nomeJogo'=>$name]);
// });


/**
 * parametro dinamico por ID
 */
// Route::get('/jogos/{id?}', function($id = null){
//     return view('jogos',['idJogo' =>$id]);
//     //where id de 0 a 9 ou 1 ou mais caracteres
// })->where('id','[0-9]+');


/**
 * pode ser passado ID e nome do jogo
 */
// Route::get('/jogos/{id}/{nome}', function($id=null, $name=null){
//     return view ('jogos', ['idJogo'=>$id, 'nomeJogo'=>$name]);

// });


/**
 * Nome da rota '/jogos', nome do controller e o nome da function criada no JogosController
 */
// Route::get('/jogos', [JogosController::class, 'index']);


/**
 * Retorna erro
 */
Route::fallback(function(){
   return "Erro!";
});



/**
 * Todas as rotas criadas dentro deste grupo de rotas, teram o mesmo prefixo chamado 'Jogos'
 */
Route::prefix('jogos')->group(function(){
   //a  '/' pega prefixo 'jogos', referencia a function 'Index' e nome da rota
   Route::get('/',[JogosController::class, 'index'])->name('jogos-index'); 
   //verbo Create, nome da public function action create E o nome da rota que é passada no method do form
   Route::get('/create',[JogosController::class, 'create'])->name('jogos-create');
   //verbo post, action store
   Route::post('/',[JogosController::class, 'store'])->name('jogos-store');
   //passa o id , action edit
   Route::get('/{id}/edit',[JogosController::class, 'edit'])->name('jogos-edit');

   Route::put('/{id}',[JogosController::class, 'update'])->name('jogos-update');

   Route::delete('/{id}', [JogosController::class, 'destroy'])->name('jogos-destroy');
});