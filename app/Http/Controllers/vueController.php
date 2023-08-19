<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NameTransformation;
use App\Http\Requests\NameTransformationRequest;
use App\Models\Directions_of_expenses;
use App\Models\LegalAdministration;
use App\Http\Resources\Resources_name_transformations;
use App\Http\Resources\DirectionsOfExpensesResource;
use App\Http\Resources\LegalAdministrationResource;
use App\Exports\NameTransformationExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
class vueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Resources_name_transformations::collection(NameTransformation::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NameTransformationRequest $request)
    {
        $created = NameTransformation::create($request->validated());

        return new Resources_name_transformations($created);
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $board = new Resources_name_transformations(NameTransformation::with('DirectionsOfExpenses')->findOrFail($id));
        if (!$board) {
            return response()->json(['error' => 'NameTransformation not found'], 404);
        }
        return response()->json($board);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nameTransformation = NameTransformation::findOrFail($id);
        $nameTransformation->update($request->all());
        return new Resources_name_transformations($nameTransformation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nameTransformation = NameTransformation::with('DirectionsOfExpenses')->findOrFail($id);
        $directionsOfExpenses = DirectionsOfExpensesResource::collection($nameTransformation->DirectionsOfExpenses);
        foreach ($directionsOfExpenses as $directionOfExpense) {
            $legalAdministrations = $directionsOfExpenses->map(function ($directionOfExpense) {
                return LegalAdministrationResource::collection($directionOfExpense->LegalAdministration);
            });
            foreach ($legalAdministrations as $legalAdministration) {
                $legalAdministration->each(function ($item) {
                    $item->delete();
                });
            }
            $directionOfExpense->delete();
        }
        $nameTransformation->delete();
        return response()->noContent();
    }
    
    public function export() 
    {
        // return Excel::store(new NameTransformationExport, 'NameTransformation.xlsx','s3');
        $return = Excel::download(new NameTransformationExport, 'users.xlsx');
        ob_end_clean();
        return $return;
        
    }
}
