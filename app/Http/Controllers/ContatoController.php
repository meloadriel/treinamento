<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Categoria;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{

    public function __construct(Contato $contatos)
    {
        $this->contatos = $contatos;
        $this->enderecos = new Endereco;
        $this->categorias = Categoria::all()->pluck("nome","id");
        $this->telefones = Telefone::all()->pluck("numero","id");
        $this->tipos =Tipo::all()->pluck("nome","id");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = $this->contatos->all();

        return view("contatos.index", compact("contatos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = $this->categorias;
        $tipos = $this->tipos;

        return view("contatos.form", compact("categorias","tipos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
