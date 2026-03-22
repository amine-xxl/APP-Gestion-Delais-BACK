<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /courriers
     */
    public function index()
    {
        return response()->json(Courrier::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /courriers
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['priority'] = isset($data['delais_recu']) && $data['delais_recu'] <= 7 ? 'urgent' : 'normal';
        $courrier = Courrier::create($data);
        return response()->json($courrier, 201); // Code 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Courrier::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courrier $courrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /courriers/{id}
     */
    public function update(Request $request, $id)
    {
        $courrier = Courrier::findOrFail($id);
        $courrier->update($request->all());
        return response()->json($courrier);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /courriers/{id}
     */
    public function destroy($id)
    {
        $courrier = Courrier::findOrFail($id);
        $courrier->delete();
        return response()->json(null, 204); // Code 204 No Content
    }
}