<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NameTransformation;
use App\Http\Requests\DirectionsOfExpensesRequest;
use App\Http\Resources\DirectionsOfExpensesResource;
use App\Http\Resources\LegalAdministrationResource;
use App\Models\Directions_of_expenses;
use App\Models\LegalAdministration;
use App\Http\Resources\name_transformations;

class DirectionsOfExpensesControlle extends Controller
{
    public function index()
    {
        $directions = DirectionsOfExpensesResource::collection(Directions_of_expenses::all());
        return response()->json(['data' => $directions]);
    }

    // POST /api/directions_of_expenses
    public function store(DirectionsOfExpensesRequest $request)
    {
        $direction =  Directions_of_expenses::create($request->validated());
        
        return new DirectionsOfExpensesResource($direction);
    }

    // GET /api/directions_of_expenses/{id}
    public function show($id)
    {

        // $direction = Directions_of_expenses::findOrFail($id);
        // return response()->json(['data' => $direction]);
        $board = new DirectionsOfExpensesResource(Directions_of_expenses::with('LegalAdministration')->findOrFail($id));
        if (!$board) {
            return response()->json(['error' => 'NameTransformation not found'], 404);
        }
        return response()->json($board);
    }
    public function update(Request $request, string $id)
    {
        $DirectionsOfExpenses = Directions_of_expenses::findOrFail($id);
        $DirectionsOfExpenses->update($request->all());
        return new DirectionsOfExpensesResource($DirectionsOfExpenses);
    }
    public function destroy(string $id)
    {
        $directionsOfExpenses = Directions_of_expenses::with('LegalAdministration')->findOrFail($id);

        $legalAdministrations = LegalAdministrationResource::collection($directionsOfExpenses->LegalAdministration);
        
        foreach ($legalAdministrations as $legalAdministration) {
            
            
            $legalAdministration->delete();
        }
        $directionsOfExpenses->delete();
        return response()->noContent();
    }
}
