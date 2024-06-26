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
        $this->categorias = Categoria::all()->pluck("nome", "id");
        $this->telefones = new Telefone;
        $this->tipos = Tipo::all()->pluck("nome", "id");
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

        return view("contatos.create", compact("categorias", "tipos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $contato = $this->contatos->create([
            'nome' => $request->nome,
            'endereco_id' => $this->enderecos->create([
                'rua' => $request->rua,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
            ])->id,
        ]);
        for ($i = 0; $i < count($request->telefones); $i++) {
            $this->telefones->create([
                'numero' => $request->telefones[$i],
                'contato_id' => $contato->id,
                'tipo_id' => $request->tipos[$i],
            ]);
        }

        $contato->categoriaRelationship()->attach($request->categoria);

        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $form = 'disabled';

        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $telefones = $this->telefones;


        return view('contatos.show', compact('categorias', 'telefones', 'form', 'contato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $telefones = $this->telefones;
        $tipos = $this->tipos;

        return view('contatos.edit', compact('contato', 'categorias', 'telefones', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contato = $this->contatos->find($id);

        $contato->update([
            'nome' => $request->nome,
            'endereco_id' => tap($this->enderecos->find($contato->endereco->id))->update([
                'rua' => $request->rua,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
            ])->id,
        ]);

        for ($i = 0; $i < count($request->telefones); $i++) {
            if ($contato->telefone->get($i) != null) {
                $contato->telefone->get($i)->update([
                    'numero' => $request->telefones[$i],
                    'contato_id' => $contato->id,
                    'tipo_id' => $request->tipos[$i],
                ]);
            } else {
                $this->telefones->create([
                    'numero' => $request->telefones[$i],
                    'contato_id' => $contato->id,
                    'tipo_id' => $request->tipos[$i],
                ]);
            }
        }

        $contato->categoriaRelationship()->sync($request->categoria);

        return redirect()->route('contatos.show',['id' => $contato->id])->with('success', 'Contato editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = $this->contatos->find($id);
        $contato->categoriaRelationship()->sync(null);
        // $contato->telefoneRelationship()->delete();
        foreach ($contato->telefone as $telefone) {
             $telefone->delete();
        }
        $endereco = $contato->endereco;
        $contato->delete();
        $endereco->delete();
        return redirect()->route('contatos.index');
    }
}
