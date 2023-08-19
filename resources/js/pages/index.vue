<!-- 
    таблица чего нужно сделать 

    задача в файле table
    задача в файле Form3

    сделать в каждой Form меню с 3 кнопками добавить изменить удалить 
    и для кждой кнопке сделать свою форму 
    и свою функцию 
    

    ЗАПРОС НА ПОТОМ
    vue сделай так чтобы при пролистовании вниз блок с id tot фиксировался в верху экрана
 
////////////////////////////

    задача  A|1|2|3|AAA|1|2|3|AAA|1|2|3|AAA|1|A
    бек     A|o|o|o|AAA|o|o|o|AAA|o|o|o|AAA|x|A
    фронт   A|o|o|o|AAA|o|o|o|AAA|o|x|x|AAA|x|A

    формы в таблици 

    задача  A|1|2|3|AAA|1|2|3|AAA|1|2|3|AAA|1|A
    бек     A|o|o|o|AAA|o|o|o|AAA|o|o|o|AAA|x|A
    фронт   A|o|o|x|AAA|x|x|x|AAA|x|x|x|AAA|x|A
    связано A|х|х|x|AAA|x|x|x|AAA|x|x|x|AAA|x|A

 -->


 <template>
    <!-- <sample/> -->
    
    <div class="fixed ">
        
            <Menu class="calor" @create="formActive"/>
        
        
    <!-- //это формы -->


    <div class="workspace">
        <component :is="'Form' + isActive" @formName="methods['form' + isActive]" v-bind:table="table"/>
    </div>
    <div class="scroll-container div">
        <div class="scroll-content">
            <div class=" tableT">
            <TableColumnsName :tableData="tableData"/>
            </div>
    
        </div>

        
        <div v-if="error[0]" class="line backgroundPing errorForm">
            <div>
                <p>Ошибка!!!</p>
        
                <p>{{ error[0] }}</p>
                <p>{{ error[1] }}</p>
            </div>
            
        
        </div>

        <div v-if="this.loading" class="line backgroundGray errorForm">
        <h3>Загрузка</h3>
        
            
        
        </div>

        <div class="table div">
            <Table :table="table" :tableData="tableData" :selectionForm="selectionForm" @create="formTables"/>
        </div>

    </div>



    
  </div>
    







</template>

<script>
import Menu from "@/components/Menu";
//здесь я подключаю формы сделал код  импортируещий компоненты Form2, Form3, Form4 в 
//папке components и зарегестрируй его как компонент  'Form2', 'Form3', 'Form4'
import Form1 from "@/components/Form1";
import Form2 from '@/components/Form2';
import Form3 from '@/components/Form3';
import Form4 from '@/components/Form4';
import Form5 from '@/components/Form5';
import Form6 from '@/components/Form6';

import sample from '@/components/sample';

import Table from '@/components/table';
import TableGop from '@/components/TableGop'

import axios from 'axios';

import TableColumnsName from '@/components/TableColumnsName';

export default {
components:{
    'Menu':Menu,
    Form1,
    Form2,
    Form3,
    Form4,
    Form5,
    Form6,
    TableColumnsName,
    Table,
    TableGop,
    sample,
    

},

data(){
    return{
        i: 0,
        isActive: 1,
        table:[],
        ProjectPlanName:'',
        loading:false,
        
        tableData:[
            
            [true, 'Наименование преобразований, стратегического проекта, подпроекта, мероприятия','name',1],
            [true, 'Направление расходования средств (основное и вспомогательное оборудование, ремонт и др.)','direction_of_spending',2],
            [true, 'ВСЕГО утверждено','total_approved',2],
            [true, 'КБК 075 0706 47 2 S4 12100 613 Наука ВО','11_agree',2],
            [true, 'КБК 075 0708 47 2 S4 12100 613 НАУКА','12_agree',2],
            [true, 'КБК 075 0706 47 2 D8 64733 613 ЦИФРА','13_agree',2],
            
            [true,'срок','Deadline',3],
            [true,'инфомация об исполнениии','Performance_information',3],
            [true, 'Всего согласовано','Total_agreed',3],
            [true, 'согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА','21_agree',3],
            [true, 'согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО','22_agree',3],
            [true, 'согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА','23_agree',3],
            [true, 'Всего остаток по дорожной карте','Total_remaining_on_the_roadmap',3],
            [true, 'согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА','31_agree',3],
            [true, 'согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО','32_agree',3],
            [true, 'согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА','33_agree',3],
            
            [true,'Способ закупки','Procurement_method',3],
            [true,'Начало проведения (дата)','Start_of_conduct',3],
            [true,'Результат проведения конкурентных процедур','Results_of_competitive_procedures',3],
                [true,'Сумма договора, тыс. рублей (Сумма договора Ю)','Contract_amount_thousand_rubles',3],//2
            [true, '№ Договора','Contract_number',3],
            [true, 'Дата заключения договора','Contract_conclusion_date',3],
            [true, 'Ответственное лицо','Responsible_person',3],
            [true, 'Поставщик','Supplier',3],
            [true, 'Плановая сумма договора','Planned_contract_amount',3],
                [true, 'Экономия','Savings',3],//3
            [true, 'Дата поставки по договору','Delivery_date_according_to_the_contract',3],
            [true, 'Фактическая дата поставки','Actual_delivery_date',3],
            [true, 'Дата оплаты по договору','Payment_date_under_the_contract',3],
            [true, 'Фактическая дата оплаты','Actual_payment_date',3],
                [true, 'Сумма оплаты нарастающим итогом','Accumulative_payment_amount',3],//1
            [true, 'Информация о невыполнении','Information_on_non_fulfillment',3],
            
            [true,'KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)','subproject_kpі',2],
            [true,'План','plan',2],
            [true,'Факт','fact',2],
            [true, 'абвгд','abcd',2],
        ],
        selectionForm:[],
        loadingIndicator: false,

        selectS:'',

        error: [],
    }
    
},
methods: {
    handleClick() {
    console.log('Кликнули на кнопку!');
    },
    formTables(i) {
        console.log();
        console.log(i);
        if(i.table == 1){
            this.form1(i);
        }
    },
    form1(i){
        if(i.HTTP == 'POST'){

            this.formData = {
                number:i.number,
                name:i.name,
            };
           
            console.log(this.formData);
            
            axios.post('http://127.0.0.1:8000/api/NameTransformation', this.formData)
            
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
                this.loading = false;
                this.error[0] = "Ошибка при загрузке"
                this.error[1] = e;
                
            });

        }
        else if(i.HTTP == 'PUT'){

            this.formData = {
                name:i.name,
            };
            
            console.log(this.formData);
            
            axios.put('http://127.0.0.1:8000/api/NameTransformation/'+i.name_transformation_id, this.formData)
            
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });

        }
        else if(i.HTTP == 'DELETE'){

            console.log(i);
            axios.delete('http://127.0.0.1:8000/api/NameTransformation/'+i.name_transformation_id,)
            // axios.delete('http://127.0.0.1:8000/api/NameTransformation/'+i.name_transformation_id,)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });

        }
        
    },
    form2(i){

        if(i.HTTP == 'POST'){

            this.formData = {

                name_transformation_id: i.name_transformation_id,
                direction_of_spending: i.direction_of_spending,
                total_approved: i.total_approved,
                '11_agree': i['11_agree'],
                '12_agree': i['12_agree'],
                '13_agree': i['13_agree'],
                subproject_kpі: i.subproject_kpi,
                
                plan: i.plan,
                fact: i.fact,
                abcd: i.abcd

            }
            console.log(this.formData);
            // axios.post('http://127.0.0.1:8000/api/DirectionsOfExpenses', this.formData
            axios.post('http://127.0.0.1:8000/api/DirectionsOfExpenses', this.formData)
            // axios.post('http://127.0.0.1:8000/api/DirectionsOfExpenses', this.formData)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });

        }else if(i.HTTP == 'PUT'){
            
            this.formData = {

                
                direction_of_spending: i.direction_of_spending,
                total_approved: i.total_approved,
                '11_agree': i['11_agree'],
                '12_agree': i['12_agree'],
                '13_agree': i['13_agree'],
                subproject_kpі: i.subproject_kpi,
                
                plan: i.plan,
                fact: i.fact,
                abcd: i.abcd

            }
            console.log(this.formData);
            // axios.post('http://127.0.0.1:8000/api/DirectionsOfExpenses', this.formData
            axios.put('http://127.0.0.1:8000/api/DirectionsOfExpenses/'+i.name_transformation_id, this.formData)
            // axios.put('http://127.0.0.1:8000/api/DirectionsOfExpenses/'+i.name_transformation_id, this.formData)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });

        }else if(i.HTTP == 'DELETE'){

            console.log(i);
            axios.delete('http://127.0.0.1:8000/api/DirectionsOfExpenses/'+i.name_transformation_id,)
            // axios.delete('http://127.0.0.1:8000/api/DirectionsOfExpenses/'+i.name_transformation_id,)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });
            
        }
    },
    form3(i){
        console.log(i)
        
        if(i.HTTP == 'POST'){

            this.formData = {

                directions_of_expenses_id: i.directions_of_expenses_id ,
                Deadline: i.Deadline ,
                Performance_information: i.Performance_information ,
                Total_agreed: i.Total_agreed ,
                '21_agree': i['21_agree'] ,
                '22_agree': i['22_agree'] ,
                '23_agree': i['23_agree'] ,
                Total_remaining_on_the_roadmap: i.Total_remaining_on_the_roadmap ,
                '31_agree': i['31_agree'] ,
                '32_agree': i['32_agree'] ,
                '33_agree': i['33_agree'] ,
                Procurement_method: i.Procurement_method ,
                Start_of_conduct: i.Start_of_conduct ,
                Results_of_competitive_procedures: i.Results_of_competitive_procedures ,
                Contract_amount_thousand_rubles: i.Contract_amount_thousand_rubles ,
                Contract_number: i.Contract_number ,
                Contract_conclusion_date: i.Contract_conclusion_date ,
                Responsible_person: i.Responsible_person ,
                Supplier: i.Supplier ,
                Planned_contract_amount: i.Planned_contract_amount ,
                Savings: i.Savings ,
                Delivery_date_according_to_the_contract: i.Delivery_date_according_to_the_contract ,
                Actual_delivery_date: i.Actual_delivery_date ,
                Payment_date_under_the_contract: i.Payment_date_under_the_contract ,
                Actual_payment_date: i.Actual_payment_date ,
                Accumulative_payment_amount: i.Accumulative_payment_amount ,
                Information_on_non_fulfillment: i.Information_on_non_fulfillment 
            }
            console.log(this.formData);
            
            // axios.post('http://127.0.0.1:8000/api/LegalAdministration', this.formData)
            axios.post('http://127.0.0.1:8000/api/LegalAdministration', this.formData)
            .then(response => {
            console.log(response.data);
            this.fetchPost();
            this.formData = [];
            })
            .catch(error => {
            console.log(error.response.data);
            });
            
            console.log(i);

        }else if(i.HTTP == 'PUT'){
            this.formData = {

                name_transformation_id: i.name_transformation_id,
                direction_of_spending: i.direction_of_spending,
                total_approved: i.total_approved,
                '11_agree': i['11_agree'],
                '12_agree': i['12_agree'],
                '13_agree': i['13_agree'],
                subproject_kpі: i.subproject_kpi,
                
                plan: i.plan,
                fact: i.fact,
                abcd: i.abcd

            }
            console.log(this.formData);
            
            // axios.put('http://127.0.0.1:8000/api/LegalAdministration/'+i.directions_of_expenses_id, this.formData)
            axios.put('http://127.0.0.1:8000/api/LegalAdministration/'+i.directions_of_expenses_id, this.formData)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });
        }else if(i.HTTP == 'DELETE'){

            console.log(i);
            // axios.delete('http://127.0.0.1:8000/api/LegalAdministration/'+i.directions_of_expenses_id,)
            axios.delete('http://127.0.0.1:8000/api/LegalAdministration/'+i.directions_of_expenses_id,)
            .then(response => {
                console.log(response.data);
                this.fetchPost();
                this.formData = [];
            })
            .catch(error => {
                console.log(error.response.data);
            });

        }
    },
    form4(i){
        console.log(i);
    },
    async form5(i){
        console.log(i);
        if(i.action == 'export'){
            
        }else if(i.action == 'import'){
            const file = i.fail;
            const formData = new FormData();
            formData.append('file', file);

            try {
            const response = await axios.post('/api/upload', formData, {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
            });

            // Обработка полученного JSON
            console.log(response.data);
            } catch (error) {
            console.error(error);
            }
        }
        
    },
     
    
    form6(i){

        if(i[0]=='column'){

            this.tableData[i[1]][0] = i[2]

        }else if(i[0]=='line'){
            this.selectionForm = i
        }
        
        // this.tableDatap[i[0]][0]=i[1]
        // console.log( this.tableData[i[0]][0] );
    },
    
    formActive(i){
        this.isActive = i
    },
    async fetchPost(){
        this.loading = true
        try{
            const response = await axios.get('http://127.0.0.1:8000/api/NameTransformation')

            console.log(response.data.data);

            this.table = response.data.data;
            this.loading = false;

        } catch(e){
            // alert('Ошибка '+e);
            this.loading = false;
            this.error[0] = "Не могут загрузится данные из базы данных"
            this.error[1] = e;
            
        }
    }
},
mounted(){
    this.fetchPost();
},
computed: {
    methods() {
    return {
    form1: this.form1,
    form2: this.form2,
    form3: this.form3,
    form4: this.form4,
    form5: this.form5,
    form6: this.form6,
  }
},

}

}

</script>

<style >

h2{
    margin-bottom: 25px;
}
.scroll-container {
  overflow: auto; /* Установите горизонтальную прокрутку */
  /* white-space: nowrap; Предотвращает перенос строк внутри блока */
  max-height:61.9vh;

}

/* .scroll-content {
  display: inline-block; Установите элементы в строчно-блочный режим
  white-space: nowrap; Предотвращает перенос строк внутри элементов
} */

/* Опционально: добавьте стили для полос прокрутки */
.scroll-container::-webkit-scrollbar {
  width: 6px;
}

.scroll-container::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 3px;
}

.scroll-container::-webkit-scrollbar-track {
  background-color: #f1f1f1;
}


.list{
    position: absolute;
    top:55px;
    z-index: 9;
}
.li{
    background-color: rgb(255, 255, 255);
    margin: 3px;
    padding: 0px 5px;
    border: solid 1px rgb(192, 192, 192);
    
    transition: background-color 0.3s ease; /* анимация перехода цвета фона */
    cursor: pointer;
}
.inputD{
    width: 930px;
    height: 25px;
}

.li:hover {
  background-color: #c0c0c0; /* новый цвет фона при наведении */
}
.fixedd{
    width: 100%;
    
    /* border-color: rgb(255, 255, 255); */
    position: fixed;
    /* position:sticky;  */
    top:0px;
    left: 0px;
}
.fixed{
    width: 100%;
    
    /* border-color: rgb(255, 255, 255); */
    /* position: fixed; */
    position:sticky; 
    top:0px;
    left: 0px;

    /* background-color: aliceblue; */
}
.calor{
    background-color: aliceblue;
}
.fixed .gg,.fixed .workspace{
    background-color: rgb(255, 255, 255);
}

.arrow-down {
  /* position: relative; */
  display: inline-block;
  width: 10px;
  height: 10px;
  
}
.arrow-down2 {
  position: relative;
  /* display: inline-block; */
  width: 10px;
  height: 10px;
}

.arrow-down::after {
  content: "";
  position: relative;
  right: 5px;
  top: 13px;
  width: 0;
  height: 0;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid black;
}
.arrow-down2::after {
  content: "";
  position: relative;
  /* right: 5px; */
  bottom: 13px;
  width: 0;
  height: 0;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid black;
  
}
*{
    margin: 0;
    padding: 0;
}
.one{
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);
    z-index: 10;
    margin-bottom: 5px;
}
.two{
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);
    z-index: 8;
    margin-bottom: 5px;
}
.divH{
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);
    
}
div.div{
    border:1px solid rgb(0, 0, 0);
    
    
}
header{
    width: 99.9%;
    height: 60px;
}
.divButton{
    margin: 10px;
}
.buttonA{
    box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.3);
    width: 30px;
    height: 30px;
    border-radius: 100px;
    background-color: white;
    border: 1px solid;
    outline: none;
}
.buttonMenu{
    margin-top: 10px;
    margin-left: 25px;
}
.button {
    
    padding:  0 10px 0 10px;
    
    
    width: auto;
    height: 40px;
    background-color: white;
    border: none;
    outline: none;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
    color: black;
    transition: background-color 0.3s, transform 0.3s;
}

.button:hover {
  background-color: rgb(201, 200, 200);
  transform: scale(1.1);
}
.divAnimation{
    
  background-color: white;
  transition: background-color 0.3s, transform 0.3s;

}
.divAnimation:hover{
    
  background-color: rgb(238, 238, 238);
  transform: scale(1.1);
}

.backgroundGray{
    background-color: rgb(233, 233, 233);
}
.backgroundWhite{
    background-color: white;
}
.backgroundPing{
    background-color: rgb(254, 207, 207);
}
.workspace{
    width: 99.9%;
    min-height: 100px;
}
.table{
    display: grid; 
    grid-auto-columns:1fr; 
    grid-template-columns: 1fr; 
    
    gap: 0px 0px; 
    
    justify-content: stretch; 
    justify-items: stretch; 
    align-items: stretch; 
    
}
.tableT{
    background-color: white;
}
.con4 {

    display: grid; 
    grid-auto-columns: 1fr; 
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr; 
    gap: 0px 0px; 
    justify-content: stretch; 
    justify-items: stretch; 
    align-items: stretch; 
}
.con5 {

display: grid; 
/* grid-template-columns: 1fr 1fr 1fr; */
grid-template-rows: 1fr 1fr; 
}
.con6 {

display: grid; 
/* grid-template-columns: 1fr 1fr 1fr 1fr; */
grid-template-rows: 1fr 1fr; 
}
.box4{

    /* width: 100%;
    height: 100%; */
    grid-column:1/4;

}

.box5{

/* width: 100%;
height: 100%; */
grid-column:1/4;

}
.box6{

/* width: 100%;
height: 100%; */
grid-column:1/5;

}



  
  .t1 { grid-area: t1;
    width: 150px;
    height: 100%;
    
}
  .t2 { 
    width: 150px;
    height: 100%;
    
    grid-area: t2; }
  .t3 { 
    width: 150px;
    height: 100%;
    
    grid-area: t3; }

    
      
    .e1 { 
        width: 150px;
        height: auto; 
    }
    .e2 { 
        width: 150px;
        height: auto;
    }
    .e3 { 
        width: 150px;
        height: auto;
    }
    .e4 { 
        width: 150px;
        height: auto;
     }
    .container {
        
        display: grid; 
        grid-template-columns: 1fr; 
        grid-template-rows: 1fr ; 
        gap: 0px 0px; 
        grid-template-areas: 
        "f1"
        "f2"; 
        
    }
    
    .containerMinu{
        display: grid;
        width: 500px;
        min-height: 50px;
        grid-template-columns: repeat(6, 1fr);
        
    }
    .boxSelection{
        display: grid; 
    grid-template-columns: 0.1fr 1fr; 
    grid-template-rows: 1fr; 

        border:1px solid rgb(188, 188, 188);
    }
    .nameCheckbox{
        padding: 10px;
        width: 200px;
        align-self: center; 
    }
    .checkbox{
        align-self: center; 
        width: 20px;
        height: 20px;
    }
.f1 { 
    
    grid-area: f1; 
    height: 150px;
    }
.f2 {

  grid-area: f2; 
}
.f3{
    display: grid; 
}
.r2{
    display: grid;
     
    grid-template-columns: repeat(2, 1fr);
    
}
.r3{
    display: grid;
     
    grid-template-columns: repeat(3, 1fr);
    
}      
.r4{
    display: grid;
     
    grid-template-columns: repeat(4, 1fr);
    
}

      
      .y { 
        width: 150px;
        height: 150px;
       }
      

.form{
    padding: 10px;
}

.formT{
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);
    width: 200px;
    height: 100px;
}

.formIn{
    margin-bottom: 10px;
    /* box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3); */
    /* border: 3px; */
    /* border-color: black; */
}
.formID{
    font-size: 16px;
    width: 200px;
    height: 50px;
}
.columnA{
    
    
    width: 150px;
    min-height: 100%;
    transition: min-height 1s ease;
    
    
}
.columnCreate{

    height: 60px;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;

}
/* .columnA:hover{
    
    
    
    
    transition: min-height 3s ease;
    
    
} */
.line{
    
    display: flex;
    height: auto;
    /* min-height: 30px; */
    flex-direction: row;

    justify-content: flex-start;

    /* background-color: white; */
    transition: min-height 1s ease;
   
}

.columnAA{
    float: left;
    
    

    width: 50px;
    height: 100%;
    
}
.columnB{
    float: left;
    
    width: 150px;
    height: auto;
    
}
.columnС{
    float: left;
    
    width: 150px;
    height: auto;
    
}
.columnTable{
    display: grid; 
    grid-auto-columns:1fr; 
    grid-template-columns: 1fr; 
    
    gap: 0px 0px; 
    
    justify-content: stretch; 
    justify-items: stretch; 
    align-items: stretch; 
}

.formB .form{
    margin: 0;
    padding: 0;
    font-size: 0;
}
.formB.none .form .formT,.formB.none .form .divButton,.formB.none{
    margin: 0;
    padding: 0;
    font-size: 0;
    width: 0;
    height: 0;
    border: none;
    background-color: none;
    display: none;
    position: none;
    
}
.formA.none .form .formT,.formA.none .form .divButton,.formA.none{
    margin: 0;
    padding: 0;
    font-size: 0;
    width: 0;
    height: 0;
    border: none;
    background-color: none;
    display: none;
    position: none;
    
}
.formС.none .form .formT,.formС.none .form .divButton,.formС.none{
    margin: 0;
    padding: 0;
    font-size: 0;
    width: 0;
    height: 0;
    border: none;
    background-color: none;
    display: none;
    position: none;
    
}
.formD.none .form .formT,.formD.none .form .divButton,.formD.none{
    margin: 0;
    padding: 0;
    font-size: 0;
    width: 0;
    height: 0;
    border: none;
    background-color: none;
    display: none;
    position: none;
    
}



</style>