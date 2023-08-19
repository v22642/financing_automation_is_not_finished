<template>
    <div>
        <header class="two">
            <button class="button" @click="sample1">
                выборка строк 
            </button>
            <button class="button" @click="sample2">
                выборка столбцов
            </button>
            
        </header>
        <div v-if="columnSelection">
            <form @submit.prevent>
                <!-- <div id="staggered-list-demo">
                <input class="inputD" v-model="query" @focus="handleFocus" @blur="handleBlur">
                
                <transition-group 
                    name="staggered-fade"
                    tag="ul"
                    v-bind:css="false"
                    v-on:before-enter="beforeEnter"
                    v-on:enter="enter"
                    v-on:leave="leave"
                    class="list"
                >
                
                    <li
                    v-for="(item, index) in computedList"
                    v-bind:key="item.msg"
                    v-bind:data-index="index"
                    class="li"
                    @click="formLi(item.msg)"
                    >{{ item.msg }}</li>
                
                    
                </transition-group>
                </div> -->
                <div >
                    <select name="name_id" class="formID" v-model="selectionForm[1]" >
                        <option value="">ничего</option>
                        <option v-for="t in tableData" :key="t.id" :value="t[2]" >{{ t[1]}}</option> 
                    </select>
                    
                </div>
                <textarea v-model="selectionForm[2]"  class="formT" name="name"  placeholder="Наименование преобразований, стратегического проекта, подпроекта, мероприятия"></textarea>
                <div class="divButton"><button type="submit" class="button" @click="search"><b>заполнить</b></button></div>
                
            </form>
        </div>
        
        <div v-if="rowFetch">
            <header class="two">
                <button class="button" @click="burgerС">
                    отдел 1
                </button>
                <button class="button" @click="burgerD">
                    отдел 2
                </button>
                <button class="button" @click="burgerE">
                    отдел 3 
                </button>
                <button class="button" @click="burgerE">
                    всё
                </button>
            </header>
            <div>
                <button class="buttonA" @click="containerMinu = !containerMinu">
                    <span v-if="containerMinu" class="arrow-down"></span> <span v-else class="arrow-down2"></span>
                </button> 
            </div>
            <div class="containerMinu" v-if="containerMinu">

                <div v-for="(checked, index) in tableData" :key="index" class="boxSelection">

                        
                    <input type="checkbox" v-model="checked[0]" class="checkbox" @input="updateMessage(index,checked[0])">
                    
                    
                    <div class="nameCheckbox">
                        <label >{{ checked[1] }}</label>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

</template>
<script>

export default {
   
    // el: '#staggered-list-demo',
    data(){

        return{
            isActive:false,
            columnSelection:true,
            rowFetch:false,
            containerMinu:true,
            i:1,

            selectionForm:[
                'line',
                '',
                ,
                ,
            ],

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
                [true,'Сумма договора, тыс. рублей (Сумма договора Ю)','Contract_amount_thousand_rubles',3],
                [true, '№ Договора','Contract_number',3],
                [true, 'Дата заключения договора','Contract_conclusion_date',3],
                [true, 'Ответственное лицо','Responsible_person',3],
                [true, 'Поставщик','Supplier',3],
                [true, 'Плановая сумма договора','Planned_contract_amount',3],
                [true, 'Экономия','Savings',3],
                [true, 'Дата поставки по договору','Delivery_date_according_to_the_contract',3],
                [true, 'Фактическая дата поставки','Actual_delivery_date',3],
                [true, 'Дата оплаты по договору','Payment_date_under_the_contract',3],
                [true, 'Фактическая дата оплаты','Actual_payment_date',3],
                [true, 'Сумма оплаты нарастающим итогом','Accumulative_payment_amount',3],
                [true, 'Информация о невыполнении','Information_on_non_fulfillment',3],
                
                [true,'KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)','subproject_kpі',2],
                [true,'План','plan',2],
                [true,'Факт','fact',2],
                [true, 'абвгд','abcd',2],
            ],
            query: '',
            list: [
                
            ],
            
                

            
        }
    },
    
    methods: {
        input(){
            
            

        },
        search(){
            if(this.selectionForm[1]){

                for(var i=0;i <= this.tableData.length; i++){
                if(this.tableData[i][2] == this.selectionForm[1]){
                    this.selectionForm[3] = this.tableData[i][3];
                    console.log(this.tableData[i][2]);
                    break;
                }
                console.log('no');
                }

            }else{
                this.selectionForm[3] = 4;
            }
            
            console.log(this.selectionForm);
            this.$emit('formName',this.selectionForm);

        },
        sample1(){
            this.list = [];
            this.columnSelection = true;
            this.rowFetch = false;
            for (let t = 0; t < this.tableData.length;t++){
                // console.log(this.tableData[t][1]);
                if(this.tableData[t][0]){
                    this.list.push(this.tableData[t][1]);
                }
            }

        },
        sample2(){

            this.columnSelection = false;
            this.rowFetch = true;

        },

        updateMessage(id, bool) {
            
            
            this.formData = ['column',id, !bool];
            // console.log(this.formData[1]);
            this.$emit('formName',this.formData);

            // setTimeout(function() {

            // console.log('Продолжение');
            
            // }, 1000);

        }
        // handleFocus(){
        //     this.isActive = true;
        //     if(this.isActive){
        //         for (let t = 0; t < this.tableData.length; t++){
        //         // console.log(this.tableData[t][1]);
        //         if(this.tableData[t][0]){
        //             this.list.push({msg: this.tableData[t][1]});
        //         }
                
        //     }
        //     }
        // },
        // handleBlur(){
        //     this.isActive = false;
        //     this.list.splice(0,this.list); 
        // },
        // formLi(ii){
        //     this.query = ii;
        //     console.log(ii)
        //     this.list.splice(0,this.list);
        // },
        // beforeEnter: function (el) {
        // el.style.opacity = 0
        // el.style.height = 0
        // },
        // enter: function (el, done) {
        //     var delay = el.dataset.index * 1
        //     setTimeout(function () {
        //     Velocity(
        //         el,
        //         { opacity: 1, height: '1.6em' },
        //         { complete: done }
        //     )
        //     }, delay)
        // },
        // leave: function (el, done) {
        //     var delay = el.dataset.index * 1
        //     setTimeout(function () {
        //     Velocity(
        //         el,
        //         { opacity: 0, height: 0 },
        //         { complete: done }
        //     )
        //     }, delay)
        // }
    },
    // computed: {
    //     computedList: function () {
    //         var vm = this
                
    //         return this.list.filter(function (item) {
    //         return item.msg.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
            
    //         })           
    //     }
        
    // },
    
}

</script>
<style>
.buttonA{
    position: relative;
    left: 928px;
    bottom: 21px;
}
</style>