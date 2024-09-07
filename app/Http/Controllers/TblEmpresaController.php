<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tbl_empresa;

class TblEmpresaController extends Controller
{
    //Mostrar todos os registro
    //Crud -> Read(leitura) Select/aVisualizar
    public function index(){

        $regBook = tbl_empresa::All();
        $contador = $regBook->count();

        return "Empresa: ".$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/aVisualizar
    // A função show busca a id e retorna se o Empresa foram localizados
    public function show(string $id){ 
        $regBook = tbl_empresa::find($id);

        if($regBook){
            return "Empresa Localizados ".$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Empresa não localizados: ".Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //cadastrar registros
    //Crud -> Create(Criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeEmpresa"=>'required',
            "donoEmpresa"=>'required',
            "anoEmpresa"=>'required',
        ]);
        if ($regVerifq->fails()) {
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }

        $regBookCad = tbl_empresa::create($regBook);

        if ($regBookCad) {
            return 'Empresa Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }else {
            return 'Empresa não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //alterar registros
    //Crud -> update(alterar)
    public function update(Request $request,string $id){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeEmpresa"=>'required',
            "donoEmpresa"=>'required',
            "anoEmpresa"=>'required',
        ]);

        if ($regVerifq->fails()) {
            return 'registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        
        $regBookBanco = tbl_empresa::Find($id);
        $regBookBanco->nomeEmpresa = $regBook['nomeEmpresa'];
        $regBookBanco->donoEmpresa = $regBook['donoEmpresa'];
        $regBookBanco->anoEmpresa = $regBook['anoEmpresa'];

        $retorno = $regBookBanco->save();

        if ($retorno) {
            return "Empresa atulizado com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        } else {
            return "Atenção... Erro: Empresa não atualizado.".Response()->json([],Response::HTTP_NO_CONTENT);
        }
        

    }

    //deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

        $regBook = tbl_empresa::Find($id);

        if ($regBook->delete()) {
        return"O Empresa foi deletado com sucesso".Response()->json([],Response::HTTP_NO_CONTENT);
    }
        return "Algo deu errado: Empresa não deletado".Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //crud
    // c reate
    // r ead
    // u pdate
    //d elete
}