<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalAdministration;
use App\Http\Requests\LegalAdministrationRequest;

use App\Http\Resources\LegalAdministrationResource;
class LegalAdministrationСontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = LegalAdministration::all();
        return response()->json(['data' => $directions]);
        // return LegalAdministrationResource::collection(LegalAdministration::all());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LegalAdministrationRequest $request)
    {
        
        $legal = LegalAdministration::create($request->validated());
        // return response()->json('ok');
        return new LegalAdministrationResource($legal);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return LegalAdministrationResource::collection(LegalAdministration::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $legalAdministration = LegalAdministration::findOrFail($id);
        $legalAdministration->update($request->all());
        return new legalAdministrationResource($legalAdministration);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legalAdministrations = LegalAdministration::findOrFail($id);
        $legalAdministrations->delete();
        return response()->noContent();
    }
}
