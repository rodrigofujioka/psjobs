<?php

namespace App\Http\Controllers;

use App\Oportunidades;
use Illuminate\Http\Request;

class OportunidadeController extends Controller
{

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vagas()
    {
        return view('admin.oportunidade');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Oportunidades::latest()->paginate(10);
        $response = [
            'pagination' => [
                'total' => $itens->total(),
                'per_page' => $itens->perPage(),
                'current_page' => $itens->currentPage(),
                'last_page' => $itens->lastPage(),
                'from' => $itens->firstItem(),
                'to' => $itens->lastItem()
            ],
            'data' => $itens
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'resumo' => 'required',
            'dt_inicio' => 'required',
            'dt_fim' => 'required'
        ]);
        $data = $request->all();
        $oportunidade = new Oportunidades();
        $oportunidade->fill($data);
        $oportunidade->user_id = Auth::user()->id;
        $oportunidade->save();

        return response()->json($oportunidade, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Oportunidades::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Oportunidades::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'resumo' => 'required',
            'dt_inicio' => 'required',
            'dt_fim' => 'required'
        ]);
        $oportunidade = Oportunidades::find($id);

        if (!$oportunidade) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        if (Auth::user()->id != $oportunidade->user_id) {
            return response()->json([
                'message' => 'Sem permissão',
            ], 401);
        }
        $oportunidade->fill($request->all());
        $oportunidade->save();

        return response()->json($oportunidade, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oportunidade = Oportunidades::find($id);

        if (!$oportunidade) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        if (Auth::user()->id != $oportunidade->user_id) {
            return response()->json([
                'message' => 'Sem permissão',
            ], 401);
        }
        $oportunidade->delete();

        return response()->json('success', 201);

    }
}
