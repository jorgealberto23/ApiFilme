<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tblfilme;

class TblFilmeController extends Controller
{   
    //Mostrar todos os registro
    //Crud -> Read(leitura) Select/aVisualizar
    public function index(){

        $regBook = tblfilme::All();
        $contador = $regBook->count();

        return "filmes: ".$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/aVisualizar
    // A função show busca a id e retorna se o filme foram localizados
    public function show(string $id){ 
        $regBook = tblfilme::find($id);
        dd($regBook);

        if($regBook){
            return "Filmes Localizados ".$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Filmes não localizados: ".Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //cadastrar registros
    //Crud -> Create(Criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeFilme"=>'required',
            "generoFilme"=>'required',
            "classificacaoFilme"=>'required',
            "anoFilme"=>'required',
        ]);
        if ($regVerifq->fails()) {
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }

        $regBookCad = tblfilme::create($regBook);

        if ($regBookCad) {
            return 'Filmes Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }else {
            return 'Filmes não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //alterar registros
    //Crud -> update(alterar)
    public function update(Request $request,string $id){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeFilme"=>'required',
            "generoFilme"=>'required',
            "classificacaoFilme"=>'required',
            "anoFilme"=>'required',
        ]);

        if ($regVerifq->fails()) {
            return 'registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        
        $regBookBanco = tblfilme::Find($id);
        $regBookBanco->nomeFilme = $regBook['nomeFilme'];
        $regBookBanco->generoFilme = $regBook['generoFilme'];
        $regBookBanco->classificacaoFilme = $regBook['classificacaoFilme'];
        $regBookBanco->anoFilme = $regBook['anoFilme'];

        $retorno = $regBookBanco->save();

        if ($retorno) {
            return "filme atulizado com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        } else {
            return "Atenção... Erro: filme não atualizado.".Response()->json([],Response::HTTP_NO_CONTENT);
        }
        

    }

    //deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

        $regBook = tblfilme::find($id);

        if ($regBook->delete()) {
        return"O filme foi deletado com sucesso";
    }
        return "Algo deu errado: filme não deletado".Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //crud
    // c reate
    // r ead
    // u pdate
    //d elete
}