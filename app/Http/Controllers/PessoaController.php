<?php

namespace App\Http\Controllers;

use App\Pessoas;
use Auth;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pessoas::orderBy('id', 'asc')->get();
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
        $data = $request->all();
        $pessoas = new Pessoas();
        $pessoas->fill($data);
        $pessoas->user_id = Auth::user()->id;
        $pessoas->save();

        return response()->json($pessoas, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pessoas::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Pessoas::find($id);
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
        $pessoa = Pessoas::find($id);

        if (!$pessoa) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        if (Auth::user()->id != $pessoa->user_id) {
            return response()->json([
                'message' => 'Sem permissão',
            ], 401);
        }
        $pessoa->fill($request->all());
        $pessoa->save();

        return response()->json($pessoa, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoas::find($id);

        if (!$pessoa) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        if (Auth::user()->id != $pessoa->user_id) {
            return response()->json([
                'message' => 'Sem permissão',
            ], 401);
        }
        $pessoa->delete();
    }
}
