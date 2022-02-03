<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function index(){

        //dd('olá mundo');
        
        // $nome = "jhoseph";
        // //retorna view 
        // return view('jogos.index',['nome' =>$nome]);

        //all() pega todos os campos da tabela jogos
        $jogos = Jogo::all();
        //dd($jogos);

        //a view jogos.index recebe a variavel 'jogos' com os dados vindos da classe Jogos
        //essa variavel sera utilizada no index, chamada variavel $jogos
        return view('jogos.index', ['jogos'=>$jogos]);
      

    }

    public function create(){
        //direciona para o pagina create
        return view('jogos.create');
    }

    //recebe a requisição vinda do formulario atraves da request
    public function store(Request $request){
         //pega os valores da request, chama o metodo create
        Jogo::create($request->all());
        //retorna para a listagem
        return redirect()->route('jogos-index');


    }

    public function edit($id){
        //variavel jogo recebe a model em seguida utiliza o where que vai buscar o id
        //na model
        $jogos = Jogo::where('id',$id)->first();

        if(!empty($jogos)){
           // dd($jogos);

           return view('jogos.edit',['jogos'=>$jogos]);


        }else{
            //se nao encontrar nenhum id, redireciona para o index
            return redirect()->route('jogos-index');
        }

    }

    public function update(Request $request, $id ){

        //variavel $data recebe a request
        $data = [
            'nome'=> $request->nome,
            'categoria'=> $request->categoria,
            'ano_criacao'=>$request->ano_criacao,
            'valor'=>$request->valor

        ];

        //executa update na variavel $data

        Jogo::where('id',$id)->update($data);
        //retorna pra listagem
        return redirect()->route('jogos-index');
    }

    public function destroy($id){

       Jogo::where('id',$id)->delete();
       return redirect()->route('jogos-index');

    }
}
