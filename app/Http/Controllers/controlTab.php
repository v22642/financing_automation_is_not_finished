<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NameTransformationExport;
use App\Imports\NameTransformationImports;
use App\Models\NameTransformation;
use App\Http\Requests\NameTransformationRequest;
use App\Http\Resources\Resources_name_transformations;
use Illuminate\Support\Facades\Validator;

class controlTab extends Controller
{
    public function export(){
        $return = Excel::download(new NameTransformationExport, 'users.xlsx');
        ob_end_clean();
        return $return;
    }
    
    public function upload(Request $request ){

        // if ($request->hasFile('file')) {
            // $file = $request->file('file');

            // $filePath = $file->storeAs('excel', 'file.xlsx');

            
            $data = Excel::toArray(new NameTransformationImports, 'ДК_2023_Влад.xlsx');
            // $i=0;
            // foreach($data[0] as $tur){
            //     $ror[$i++]
            // }
            $y=0;
            $a=[];
            $b=[];
            $c=[];
            
            for($i=0;$i<count($data[0]);$i++){
                $data[0][$i] =array_values($data[0][$i]);
                
                if(empty($data[0][$i][0]) || preg_match('/^[0-9.]+$/', $data[0][$i][0])){
                    
                    if($data[0][$i][1]!='Итого'){
                        foreach ($data[0][$i] as $key => $array) {
                            if (!empty($array)) {
                                $a[$i] = $data[0][$i];
                                // $g[$i] = $array;
                            }
                        }
                        
                        if(isset($a[$i])){
                            $b[]=$a[$i];
                            
                            
                        }
                        
                        // $g[$i]['number'] = ;
                        // $g[$i]['name'] = isset($a[0][$i][1]) ? $a[0][$i][1] : null;
                        // $g[$i]['direction_of_spending'] = $data[0][$i][2];
                        // $g[$i]['total_approved'] = $data[0][$i][3];
                        // $g[$i]['11_agree'] = $data[0][$i][5];
                        // $g[$i]['12_agree'] = $data[0][$i][6];
                        // $g[$i]['13_agree'] = $data[0][$i][7];
                        // $g[$i]['Accumulative_payment_amount'] =$data[0][$i][12];
                        // $g[$i]['Contract_amount_thousand_rubles'] =$data[0][$i][8];
                        // $g[$i]['Savings'] =$data[0][$i][13];
                    }
                    
                }
                
                
                // $k=0;
                // $g[$i]['directions_of_expenses'][$a]['direction_of_spending'] = $data[0][$i][2];
                // $g[$i]['directions_of_expenses'][$a]['total_approved'] = $data[0][$i][3];
                // $g[$i]['directions_of_expenses'][$a]['11_agree'] = $data[0][$i][4];
                // $g[$i]['directions_of_expenses'][$a]['12_agree'] = $data[0][$i][5];
                // $g[$i]['directions_of_expenses'][$a]['13_agree'] = $data[0][$i][6];
                
                // $g[$i]['directions_of_expenses'][$a]['legal_administrations']
                // $a++;
                // $g[$i]['directions_of_expenses']['subproject_kpі'] = $data[0][$i][2];
                // $g[$i]['directions_of_expenses']['name_and_value'] = $data[0][$i][2];
                // $g[$i]['directions_of_expenses']['plan'] = $data[0][$i][2];
                // $g[$i]['directions_of_expenses']['fact'] = $data[0][$i][2];
                // $g[$i]['directions_of_expenses']['abcd'] = $data[0][$i][2];
                
                
                // $g[$i]['fff'] =array_slice($data[0][$i],0);

            };
            $ro='';
            $po='';
            $id=0;
            // for($i=0;$i<count($b);$i++){
            //     // $g[$i] = isset($a[$i]) ? $a[$i] : null;
            //     if(isset($b[$i][0])){

            //         $s = [
            //             'number' => $b[$i][0],
            //             'name' => $b[$i][1],
            //             // 'directions_of_expenses'=> [array_slice($b[$i],1,14)]
            //         ];
            //         // $ro=$i;
            //         // $g[]['number']=$b[$i][0];
            //         // $g[]['name']=$b[$i][0];
            //         $ro = $b[$i][0];
                    
            //     $validator = Validator::make($s, [
            //         'number' => 'required',
            //         'name' => 'required',
            //         // Дополнительные правила валидации
            //     ]);

                
            //         // Валидация успешна
            //         $validatedData = $validator->validated();
                
            //         $created = NameTransformation::create($validatedData);
                
            //         $id++;
            //     }
            //     // else{

            //     //     $t[] = [
            //     //         'number' => null,
            //     //         'name' => $b[$i][1],
            //     //         // 'directions_of_expenses'=> [array_slice($b[$i],1,14)]
            //     //     ];
                    
            //     //     // $g[]['number']=$ro;
            //     //     // $g[]['name']=$b[$i][0];
            //     //     // $g[$ro]['directions_of_expenses'][] = array_slice($b[$i],0);
            //     // }
            // }
            
            // $e=0;
            // for($i=0;$i<count($t);$i++){
            //     $s =$t[$i];
            //     $validator = Validator::make($s, [
            //         'number' => 'required',
            //         'name' => 'required',
            //         // Дополнительные правила валидации
            //     ]);

                
            //         // Валидация успешна
            //         $validatedData = $validator->validated();
                
            //         $created = NameTransformation::create($validatedData);
                
            //         $id++;
                
            //         // return new Resources_name_transformations($created);
                

            // }
            dd($id);
            // while ($e < count($t)){
                
            //     $e++;
                
            // };
            // for($i=0;$i<count($g);$i++){
            //     $c[$i]['name_transformations']['number'] =$data[0][$i][0];
            //     $c[$i]['name_transformations']['name'] =$data[0][$i][1];
                
            //     $c[$i]['name_transformations']['directions_of_expenses'] = [];
                
            // }
            // for($i=0;$i<count($g);$i++){
            //     $b[$i]['direction_of_spending'] = $data[0][$i][2];
            //     $b[$i]['total_approved'] = $data[0][$i][3];
            //     $b[$i]['11_agree'] = $data[0][$i][4];
            //     $b[$i]['12_agree'] = $data[0][$i][5];
            //     $b[$i]['13_agree'] = $data[0][$i][6];
            //     $b[$i]['legal_administrations'] = [];
            // }
            // for($i=0;$i<count($g);$i++){
            //     $a[$i]['Accumulative_payment_amount'] =$data[0][$i][11];
            //     $a[$i]['Contract_amount_thousand_rubles'] =$data[0][$i][7];
            //     $a[$i]['Savings'] =$data[0][$i][12];
            // }
            // for($i=0;$i<count($g);$i++){
                
                
            //     $c[$i]['name_transformations']['directions_of_expenses'] = array_merge([$b[$i]]);
                
            // }
            // for($i=0;$i<count($g);$i++){
                
                
            //     $c[$i]['name_transformations']['directions_of_expenses'][0]['legal_administrations'] = array_merge([$a[$i]]);
                
            // }


            // for($i=0;$i<count($data[0]);$i++){
            //     if(preg_match('/^[0-9.]+$/', $data[0][$i][0])){

            //         if($data[0][$i][0]){

            //         }

            //     }
            // }
            
            // dd($data);
            
            
            // return response()->json($data);

           
        // }
    
        // return response()->json([
        //     'error' => 'Файл не найден',
        // ], 400);
    }
}
