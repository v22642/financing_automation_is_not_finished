<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table;
use App\Models\NameTransformation;
use App\Models\Directions_of_expenses;
use App\Models\LegalAdministration;
class ControllerTable extends Controller
{
    public function index(){
        
        $NameTransformation = NameTransformation::all();
        $NameTransformation_m = $NameTransformation->toArray();
        
        $Directions_of_expenses = Directions_of_expenses::query()->oldest('name_transformation_id')->get();
        $LegalAdministration = LegalAdministration::query()->oldest('directions_of_expenses_id')->get();
        // LegalAdministration::find($a)
        // dd($LegalAdministration);
        $session = session()->put('WholeTable',$WholeTable);
        $i=0;
        $ii=0;
        $WholeTable=array();
        foreach($NameTransformation_m as $y){
            // $table[$i++] = [$y['id'],$y['name'], "i"=>"i"];
            
            $WholeTable[$i] = $y;
            $WholeTable[$i]['i']= $Directions_of_expenses->where('name_transformation_id', $y['id'])->toArray();
            
                foreach($WholeTable[$i]['i'] as $p){
                        $WholeTable[$i]['i'][$ii++]['i'] = $LegalAdministration->where('directions_of_expenses_id', $p['id'])->toArray();
                }
                
                // dd($ii);
            $i++;
            
            // foreach($Directions_of_expenses_m as $a){
            //     $table[$i++]['i'][$ii++] = $a;
            // }
            
        }
        // dd($NameTransformation);
        // $session->put('table_n',$table_n);
        $session;
        
        return view('index');
        // return redirect()->route('index');
    }

    public function store(Request $request){
        
        if(isset($request['name'])){
            NameTransformation::query()->create([
            
                'name' => $request['name'],
                
            ]);
            // dd($name);

            // return view('index',['name'=>$name]);
            return redirect()->route('index');
        }elseif(isset($request['name_id'])){
            // dd($request);
            Directions_of_expenses::query()->create([
            
                'name_transformation_id' => $request['name_id'],
                'Direction_Spending' => $request['Direction_Spending'],
                'Total_Approved' => $request['Total_Approved'],
                '11acc' => $request['11acc'],
                '12acc' => $request['12acc'],
                '13acc' => $request['13acc'],
                'Subproject_KPI' => $request['Subproject_KPI'],
                'plan' => $request['plan'],
                'fact' => $request['fact'],
                'Name_and_Meaning' => $request['Name_and_Meaning'],
                
            ]);
            return redirect()->route('index');
        }elseif(isset($request['directions_of_expenses_id'])){
            $a=explode( ')', $request['directions_of_expenses_id'] );
            
            LegalAdministration::query()->create([
            
                'directions_of_expenses_id'=>$a[2],
                'term'=>$request['term'],
                'Performance_Information'=>$request['Performance_Information'],
                'Start_Date'=>$request['Start_Date'],
                'Result_Competitive_Procedures'=>$request['Result_Competitive_Procedures'],
                'Amount_Contract'=>$request['Amount_Contract'],
                'Contract_Number'=>$request['Contract_Number'],

                'Purchase_Method'=>$request['Purchase_Method'],
                'Date_Conclusion_Contract'=>$request['Date_Conclusion_Contract'],
                'Responsible_Person'=>$request['Responsible_Person'],
                'Supplier'=>$request['Supplier'],
                'Security_Amount'=>$request['Security_Amount'],
                'Planned_Amount_Contract'=>$request['Planned_Amount_Contract'],
                'Date_Delivery_According_Contract'=>$request['Date_Delivery_According_Contract'],
                'Actual_DeliveryDateUnderContract'=>$request['Actual_DeliveryDateUnderContract'],
                'Date_Payment_Contract'=>$request['Date_Payment_Contract'],
                'Actual_Date_Payment_Under_Contract'=>$request['Actual_Date_Payment_Under_Contract'],
                'Cumulative_Payment_Amount'=>$request['Cumulative_Payment_Amount'],
                'Failure_Information'=>$request['Failure_Information'],
                
            ]);
            return redirect()->route('index');
        }elseif(isset($request['idF'])){

            $a=$request['idF'];
            
            LegalAdministration::find($a)->update([
            
                'Total_Agreed'=>$request['Total_Agreed'],
                '21acc'=>$request['21acc'],
                '22acc'=>$request['22acc'],
                '23acc'=>$request['23acc'],

                'Total_Balance'=>$request['Total_Balance'],
                '31acc'=>$request['31acc'],
                '32acc'=>$request['32acc'],
                '33acc'=>$request['33acc'],
                
            ]);
            return redirect()->route('index');
        }elseif(isset($request['Delete_id'])){

            NameTransformation::find($request['Delete_id'])->delete();
        };
        
        // dd($post);
        
        
    }
    public function i(){
        // NameTransformation
        // Directions_of_expenses
        // LegalAdministration

        $i=Directions_of_expenses::query()->updateOrInsert([
            'name_id'=>'1'
        ])->get();

        dd(json_encode($i, JSON_UNESCAPED_UNICODE));
    }
}
