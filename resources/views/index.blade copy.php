<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <script defer src="js/main.js"></script>
</head>
<body>
    @php
        $table_n = session()->get('table_n');
        $WholeTable = session()->get('WholeTable');
        $Directions_of_expenses = session()->get('Directions_of_expenses');
        
    @endphp
    <header>
        <button class="button" id="burgerA">
            Создать Наименование преобразований
        </button>
        <button class="button" id="burgerB">
            Направление расходования
        </button>
        <button class="button" id="burgerС">
            Юридический отдел
        </button>
        <button class="button" id="burgerD">
            Финансовый отдел
        </button>
        
    </header>
    <div class="workspace">
        <div class="formA div" id="formA">
            <form class="form" method="POST" action="{{ route('index') }}"  >
                @csrf
                <p>{{$table_n[0]->name}}:</p>
                <textarea class="formT" name="name" placeholder="{{$table_n[0]->name}}"></textarea>
                
                <div class="divButton"><button type="submit" class="button"><b>заполнить</b></button></div>
                
            </form>
        </div>
        <div class="formB div none"id="formB">
            <form class="form" method="POST" action="{{ route('index') }}"  class="login-card-formT">
                @csrf
                <div>
                    
                    
                    <select name="name_id" class="formID">
                    @foreach($WholeTable as $t)
                        <option >{{$t['id']}}</option>
                    @endforeach
                        
                    </select>
                </div>

                    <textarea class="formT" name="Direction_Spending" placeholder="{{$table_n[1]->name}}"></textarea>
                
                
                <textarea class="formT" name="Total_Approved" placeholder="{{$table_n[2]->name}}"></textarea>       
                <textarea class="formT" name="11acc" placeholder="{{$table_n[3]->name}}"></textarea>    
                <textarea class="formT" name="12acc" placeholder="{{$table_n[4]->name}}"></textarea>        
                <textarea class="formT" name="13acc" placeholder="{{$table_n[5]->name}}"></textarea>        
                <textarea class="formT" name="Subproject_KPI" placeholder="{{$table_n[6]->name}}"></textarea>   
                <textarea class="formT" name="plan" placeholder="{{$table_n[7]->name}}"></textarea>   
                <textarea class="formT" name="fact" placeholder="{{$table_n[8]->name}}"></textarea>
                <textarea class="formT" name="Name_and_Meaning" placeholder="{{$table_n[9]->name}}"></textarea>

                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>
        <div class="formС div none"id="formС">
            <form class="form" method="POST" action="{{ route('index') }}"  class="login-card-formT">
                @csrf
                
                <div>
                    
                    
                    <select name="directions_of_expenses_id" class="formID">
                    @foreach($WholeTable as $t)
                        @php
                            $ii=1;
                            $c=1;
                        @endphp
                        @foreach($t['i'] as $p)
                            <option >{{$ii++}}{{")"}}{{ $t['id'].'/'.$c++}}{{"= id)"}}{{$p['id']}}</option>
                        @endforeach
                        
                    @endforeach
                        
                    </select>
                </div>
                
                
                <textarea class="formT" name="term" placeholder="{{$table_n[10]->name}}"></textarea>       
                <textarea class="formT" name="Performance_Information" placeholder="{{$table_n[11]->name}}"></textarea>    
                <textarea class="formT" name="Start_Date" placeholder="{{$table_n[12]->name}}"></textarea>        
                <textarea class="formT" name="Result_Competitive_Procedures" placeholder="{{$table_n[13]->name}}"></textarea>        
                <textarea class="formT" name="Amount_Contract" placeholder="{{$table_n[14]->name}}"></textarea>   
                
                
                <textarea class="formT" name="Purchase_Method" placeholder="{{$table_n[23]->name}}"></textarea>
                <textarea class="formT" name="Date_Conclusion_Contract" placeholder="{{$table_n[24]->name}}"></textarea>   
                <textarea class="formT" name="Responsible_Person" placeholder="{{$table_n[25]->name}}"></textarea>   
                <textarea class="formT" name="Supplier" placeholder="{{$table_n[26]->name}}"></textarea>
                <textarea class="formT" name="Security_Amount" placeholder="{{$table_n[27]->name}}"></textarea>
                <textarea class="formT" name="Planned_Amount_Contract" placeholder="{{$table_n[28]->name}}"></textarea>   
                <textarea class="formT" name="Date_Delivery_According_Contract" placeholder="{{$table_n[29]->name}}"></textarea>   
                <textarea class="formT" name="Actual_DeliveryDateUnderContract" placeholder="{{$table_n[30]->name}}"></textarea>
                <textarea class="formT" name="Date_Payment_Contract" placeholder="{{$table_n[31]->name}}"></textarea>
                <textarea class="formT" name="Actual_Date_Payment_Under_Contract" placeholder="{{$table_n[32]->name}}"></textarea>   
                <textarea class="formT" name="Cumulative_Payment_Amount" placeholder="{{$table_n[33]->name}}"></textarea>
                <textarea class="formT" name="Failure_Information" placeholder="{{$table_n[34]->name}}"></textarea>
                <textarea class="formT" name="Failure_Information" placeholder="{{$table_n[35]->name}}"></textarea>
                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>
        <div class="formD div none"id="formD">
            <form class="form" method="POST" action="{{ route('index') }}"  class="login-card-formT">
                @csrf
                <div>
                    
                    <input type="text"name="idF" class="formID" placeholder="id">
                </div>
                <textarea class="formT" name="Total_Agreed" placeholder="{{$table_n[15]->name}}"></textarea>
                <textarea class="formT" name="21acc" placeholder="{{$table_n[16]->name}}"></textarea>
                <textarea class="formT" name="22acc" placeholder="{{$table_n[17]->name}}"></textarea>
                <textarea class="formT" name="23acc" placeholder="{{$table_n[18]->name}}"></textarea>
                <textarea class="formT" name="Total_Balance" placeholder="{{$table_n[19]->name}}"></textarea>
                <textarea class="formT" name="31acc" placeholder="{{$table_n[20]->name}}"></textarea>
                <textarea class="formT" name="32acc" placeholder="{{$table_n[21]->name}}"></textarea>
                <textarea class="formT" name="33acc" placeholder="{{$table_n[22]->name}}"></textarea>

                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>

    </div>
    <div class="table div">
    <?php $i=1; ?>
        <div class="line div">
            <div class="columnAA div">
                
            </div>
            @foreach($table_n as $t)
                   
                <div class="columnA div">
                    {{$t->name}}
                </div>
                
            @endforeach
            
        </div>
        
        <div class="line div">

            <div class="columnAA div">
                {{0}}
            </div>
            @foreach($table_n as $t)
                
                <div class="columnB div">
                    {{$i++}}
                </div>
                
            @endforeach
            
        </div>
        
        <div class="line">
        
        
        </div>
        @php
            
            if(isset($WholeTable[0]['i'][0])){
                $a=array_keys($WholeTable[0]['i'][0]);
                
            };
            
            
            $t = 0;
            $o=2;
        @endphp
        @foreach($WholeTable as $t)
        
                <div class="line div">
                    
                    <div class="columnAA div">
                        {{$t['id']}}
                    </div>
                    
                    <div class="columnA div">
                        {{$t['name']}}
                    </div>
                    <div class="columnTable ">
                   
                        @foreach($t['i'] as $d)
                            <div class="line ">    
                                @foreach($d as $l)
                                    
                                        
                                    @if($d[$a[0]]!=$l && $d[$a[1]]!=$l && $d[$a[11]]!=$l)
                                    <div class="columnA div">
                                        @if(!isset($l))
                                            {{'null'}}
                                        @else
                                            {{$l}}
                                        @endif

                                    </div>
                                    
                                    @endif
                                    
                                @endforeach
                                <div class="columnTable ">
                                @foreach($d['i'] as $l)
                                    <div class="line ">
                                        @foreach($l as $gh)
                                        
                                            @php 
                                                $y = array_keys($l);
                                            @endphp
                                            
                                            
                                            
                                                @if($l[$y[0]]!=$gh && $l[$y[1]]!=$gh )
                                                
                                                    <div class="columnA div">
                                                    @if(!isset($gh))
                                                        {{'null'}}
                                                    @else
                                                        {{$gh}}
                                                    @endif
                                                    </div>
                                            
                                                @endif
                                                    
                                                
                                            
                                            
                                        
                                        @endforeach
                                    
                                    
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            
                        @endforeach

                        
                    </div>
                </div>
        @endforeach          
              
        
        
    </div>
</body>
</html>