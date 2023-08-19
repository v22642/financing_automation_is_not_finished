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
        <img src="" alt="">
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
                <p>:</p>
                <textarea class="formT" name="name" placeholder=""></textarea>
                
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

                    <textarea class="formT" name="Direction_Spending" placeholder=""></textarea>
                
                
                <textarea class="formT" name="Total_Approved" placeholder=""></textarea>       
                <textarea class="formT" name="11acc" placeholder=""></textarea>    
                <textarea class="formT" name="12acc" placeholder=""></textarea>        
                <textarea class="formT" name="13acc" placeholder=""></textarea>        
                <textarea class="formT" name="Subproject_KPI" placeholder=""></textarea>   
                <textarea class="formT" name="plan" placeholder=""></textarea>   
                <textarea class="formT" name="fact" placeholder=""></textarea>
                <textarea class="formT" name="Name_and_Meaning" placeholder=""></textarea>

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
                
                
                
                <textarea class="formT" name="Failure_Information" placeholder=""></textarea>
                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>
        <div class="formD div none"id="formD">
            <form class="form" method="POST" action="{{ route('index') }}"  class="login-card-formT">
                @csrf
                <div>
                    
                    <input type="text"name="idF" class="formID" placeholder="id">
                </div>
                

                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>

    </div>
    <div class="table div">
    <?php $i=1; ?>
        <div class="line div">
            <div class="columnAA div">
                
            </div>
            
                   
                <div class="columnA div">
                Наименование преобразований, стратегического проекта, подпроекта, мероприятия
                </div>
                <div class="columnA div">
                Направление расходования средств (основное и вспомогательное оборудование, ремонт и др.)
                </div>
                <div class="columnA div">
                ВСЕГО утверждено
                </div>
                <div class="columnA div">
                согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА
                </div>
                <div class="container3">
                    <div class="f3 div">
                    Подготовка  справок обоснований<br> в правовое управление
                    </div>
                    <div class="y1 columnA div">
                    срок
                    </div>
                    <div class="y2 columnA div">
                    инфомация об исполнениии
                    </div>
                </div>
                <div class="columnA div">
                Всего согласовано
                </div>
                <div class="columnA div">
                согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА
                </div>
                <div class="columnA div">
                Всего остаток по дорожной карте
                </div>
                <div class="columnA div">
                согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО
                </div>
                <div class="columnA div">
                согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА
                </div>
                
                <div class="container1 di">
                    <div class="r2  div">
                        Информация о проведение конкурентных процедур за счет <br>иных источников (отв. за внесение правовое управление)
                    </div>
                    <div class="e1 columnA div">
                        Способ закупки
                    </div>
                    <div class="e2 columnA div">
                        Начало проведения (дата)
                    </div>
                    <div class="e3 columnA div">
                        Результат проведения конкурентных процедур
                    </div>
                    <div class="e4 columnA div">
                        Сумма договора, тыс. рублей (Сумма договора Ю)
                    </div>
                </div>
                <div class="columnA div">
                    № Договора
                </div>
                <div class="columnA div">
                    Дата заключения договора
                </div>
                <div class="columnA div">
                Ответственное лицо
                </div>
                <div class="columnA div">
                Поставщик
                </div>
                <div class="columnA div">
                Плановая сумма договора
                </div>
                <div class="columnA div">
                экономия
                </div>
                <div class="columnA div">
                Дата поставки по договору
                </div>
                <div class="columnA div">
                Фактическая дата поставки
                </div>
                <div class="columnA div">
                Дата оплаты по договору
                </div>
                <div class="columnA div">
                Фактическая дата оплаты
                </div>
                <div class="columnA div">
                Сумма оплаты нарастающим итогом
                </div>
                <div class="columnA div">
                Информация о невыполнении
                </div>
                <div class="container">
                    <div class="r1 div">
                    KPI
                    </div>
                    <div class="t1 div">
                    KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)
                    </div>
                    <div class="t2 div">
                    план
                    </div>
                    <div class="t3 div">
                    факт
                    </div>
                </div>
        </div>
        
        <div class="line div">

            <div class="columnAA div">
                {{0}}
            </div>
            @for($i = 0; $i < 38; $i++)
                
                <div class="columnB div">
                    {{$i++}}
                </div>
                
            @endfor
            
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