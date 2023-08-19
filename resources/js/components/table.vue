<template>
    
        <!-- заметки
        
        блить поменяй у формы с кнопкой пораметор на grid

        блить надо учится писать код по правилам чтобы он был четабельным нахуй


        
        -->

        <!-- форма 1 создания -->
        
    
    <div class="line backgroundGray div ">
        <div >
            <template v-if="!showForm">
                <div class="sizeDivFormCreate boxB div backgroundWhite divAnimation" @click="showForm = !showForm">
                    <p>Создать наименование преобразований...</p>
                </div>
                
            </template>
            
            <template v-else>
                
                
                <form>
                    <div class="columnAA div" >
            
                        авто

                    </div>
                    
                    <input v-model="formData.number" class="columnAA div" type="text" placeholder="Номер">
                    
                    <textarea v-model="formData.name" class="columnA div sizeTextarea" ></textarea>
                    <div class="boxF">
                        <button class="button" @click="form('POST', null, 1)">Создать</button>
                    </div>
                    <div class="boxF" @click="showForm = !showForm">
                        <div class="X"></div>
                    </div>
                </form> 
                
                
            </template>
        </div>
        <!-- <div>
            <template v-if="!showForm">
                <div class="sizeDivFormCreate boxB div backgroundWhite divAnimation" @click="cellIllumination = !cellIllumination">
                    <p>Создать направление расходования ...</p>
                </div>
                
            </template>
        </div> -->
    
      
    
    </div>
    <!-- /форма 1 создание -->
    <!-- таблиц -->
        <!-- вывод таблици -->
        <div v-for="(post,key) in filteredItems" :key="key" class="line div" >
            
            
            <div class="columnAA div" >

                {{++key}}
                
            </div>
            <div class="columnAA div" v-if="tableData[0][0] ">
                
                <p>{{ post.number }}</p>
                
            </div>
            <!-- таблица форма 2 изменить удалить  -->
            <div class="columnA div " :class="{divAnimation: !disableAnimation[post.id] && !disableAllAnimations}" v-if="tableData[0][0]" >
                <template v-if="!formDisplay[post.id]">
                <!--  -->

                <div class="d" v-if="clickBorder" @click="d[post.id] = false,this.clickBorder = false,disableAnimation[post.id] = false,disableAllAnimations = false, subsections = null">
                    
                </div>
                <button type="submit" v-if="d[post.id]" class="button buttonA ZForm" @click=""><b>Изменить</b></button>

                <div class="flex" @mouseleave="showButtons[post.id] = false,disableAnimation[post.id] = false">
                    <div class="columnA" @click="this.showButtons[post.id] = !this.showButtons[post.id], disableAnimation[post.id] = !disableAnimation[post.id]">
                        <div class="boxG">
                            <p v-if="post.name">{{ post.name }}</p>
                            <p v-else>Пусто</p>
                        </div>
                        
                        
                    </div>
                    <div  v-if="this.showButtons[post.id]">
                        <div class="boxV">

                            <button @click=" showButtons[post.id] = false, this.clickBorder = true, this.subsections = post.id, this.disableAllAnimations= true" class="button" >Создать под строку</button>
                            <button @click="showButtons[post.id] = false, this.formDisplay[post.id] = true, this.clickBorder = true" class="button" >Изменить</button>
                            <button @click="form('DELETE', post.id, post.name), showButtons[post.id] = false" class="button" >Удалить</button>

                        </div>
                    </div>

                </div>
                </template>
                
                <template v-else>

                    <div class="d" v-if="clickBorder" @click="this.clickBorder = false, this.formDisplay[post.id] = false,deleteFormData(), disableAnimation[post.id] = false, disableAllAnimations = false"></div>
                    
                    <div class="ZForm">

                        
                        <textarea v-model="formData.content" @input="input" class="formTTable" name="name" placeholder="Наименование преобразований, стратегического проекта, подпроекта, мероприятия"></textarea>
                        <button type="submit" class="button formButton" @click=""><b>Изменить</b></button>

                    </div>

                </template>
                
                

            </div>
            
                
            
            <template v-if="post.DirectionsOfExpenses.length !== 0">
                <div class="columnTable" >
                    <div v-for="list in tableR(post.DirectionsOfExpenses, 1)" :key="list.id" class="line">
                        <div  class="columnA div" v-if="tableData[1][0]">
                            
                            <p v-if="list.direction_of_spending ">{{ list.direction_of_spending }}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div class="columnA div" v-if="tableData[2][0]">
                            
                            <p v-if="list.total_approved ">{{ list.total_approved }}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div  class="columnA div" v-if="tableData[3][0]">
                            
                            <p v-if="list['11_agree'] ">{{ list['11_agree'] }}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div  class="columnA div" v-if="tableData[4][0]">
                            
                            <p v-if="list['12_agree'] ">{{ list['12_agree'] }}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div  class="columnA div" v-if="tableData[5][0]">
                            
                            <p v-if="list['13_agree'] ">{{ list['13_agree'] }}</p>
                            <p v-else>Пусто</p>
                        </div>

                        

                        
                        
                            <template v-if="list.LegalAdministration.length !== 0">
                                <div class="columnTable" ></div>
                                <div v-for="Legal in tableR(list.LegalAdministration, 2)" :key="Legal.id" class="line">
                                    <div  class="columnA div" v-if="tableData[6][0]">
                                        
                                        <p v-if="Legal.Deadline">{{ Legal.Deadline}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[7][0]">
                                        
                                        <p v-if="Legal.Performance_information">{{ Legal.Performance_information}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[8][0]">
                                        
                                        <p v-if="Legal.Total_agreed">{{ Legal.Total_agreed}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[9][0]">
                                        <p v-if="Legal['21_agree']">{{ Legal['21_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[10][0]">
                                        
                                        <p v-if="Legal['22_agree']">{{ Legal['22_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[11][0]">
                                        
                                        <p v-if="Legal['23_agree']">{{ Legal['23_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[12][0]">
                                        
                                        <p v-if="Legal.Total_remaining_on_the_roadmap">{{ Legal.Total_remaining_on_the_roadmap}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[13][0]">
                                        
                                        <p v-if="Legal['31_agree']">{{ Legal['31_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[14][0]">
                                        
                                        <p v-if="Legal['32_agree']">{{ Legal['32_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[15][0]">
                                        
                                        <p v-if="Legal['33_agree']">{{ Legal['33_agree']}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[16][0]">
                                        
                                        <p v-if="Legal.Procurement_method">{{ Legal.Procurement_method}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[17][0]">
                                        
                                        <p v-if="Legal.Start_of_conduct">{{ Legal.Start_of_conduct}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[18][0]">
                                    
                                        <p v-if="Legal.Results_of_competitive_procedures">{{ Legal.Results_of_competitive_procedures}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[19][0]">
                                        
                                        <p v-if="Legal.Contract_amount_thousand_rubles">{{ Legal.Contract_amount_thousand_rubles}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[20][0]">
                                        
                                        <p v-if="Legal.Contract_number">{{ Legal.Contract_number}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[21][0]">
                                        
                                        <p v-if="Legal.Contract_conclusion_date">{{ Legal.Contract_conclusion_date}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[22][0]">
                                    
                                        <p v-if="Legal.Responsible_person">{{ Legal.Responsible_person}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[23][0]">
                                        
                                        <p v-if="Legal.Supplier">{{ Legal.Supplier}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[24][0]">
                                        
                                        <p v-if="Legal.Planned_contract_amount">{{ Legal.Planned_contract_amount}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[25][0]">
                                        
                                        <p v-if="Legal.Savings">{{ Legal.Savings}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[26][0]">
                                        <p v-if="Legal.Delivery_date_according_to_the_contract">{{ Legal.Delivery_date_according_to_the_contract}}</p>
                                        <p v-else>Пусто</p>
                                        
                                    </div>
                                    <div  class="columnA div" v-if="tableData[27][0]">
                                        <p v-if="Legal.Actual_delivery_date">{{ Legal.Actual_delivery_date}}</p>
                                        <p v-else>Пусто</p>
                                        
                                    </div>
                                    <div  class="columnA div" v-if="tableData[28][0]">
                                        <p v-if="Legal.Payment_date_under_the_contract">{{ Legal.Payment_date_under_the_contract}}</p>
                                        <p v-else>Пусто</p>
                                        
                                    </div>
                                    <div  class="columnA div" v-if="tableData[29][0]">
                                        
                                        <p v-if="Legal.Actual_payment_date">{{ Legal.Actual_payment_date}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[30][0]">
                                        
                                        <p v-if="Legal.Accumulative_payment_amount">{{ Legal.Accumulative_payment_amount}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    <div  class="columnA div" v-if="tableData[31][0]">
                                        
                                        <p v-if="Legal.Information_on_non_fulfillment">{{ Legal.Information_on_non_fulfillment}}</p>
                                        <p v-else>Пусто</p>
                                    </div>
                                    
                                </div>
                            </template>
                            <template v-else>
                                <div class="columnTable" >
                                        <div v-for="list in 1" :key="list" class="line">
                        
                                            <div v-for="li in 26" :key="list" class="line">
                                                
                                                <div class="columnA div" v-if="tableData && tableData[li - 1+1] && tableData[li - 1+1][0]">
                                                    ...
                                                </div>
                                            
                                            </div>
                                            
                                            
                                        </div>
                                </div>     
                            </template>
                        


                        <div  class="columnA div" v-if="tableData[32][0]">
                            
                            <p v-if="list.subproject_kpі">{{ list.subproject_kpі}}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div  class="columnA div" v-if="tableData[33][0]">
                        
                            <p v-if="list.plan">{{ list.plan}}</p>
                            <p v-else>Пусто</p>
                        </div>
                        
                        <div  class="columnA div" v-if="tableData[34][0]">
                            
                            <p v-if="list.fact">{{ list.fact}}</p>
                            <p v-else>Пусто</p>
                        </div>
                        <div  class="columnA div" v-if="tableData[35][0]">
                        
                            <p v-if="list.abcd">{{ list.abcd}}</p>
                            <p v-else>Пусто</p>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </template>    

            <template v-else-if="this.subsections == post.id">
                <div class="columnTable">
                    
                    <div v-for="list in 1" :key="list" class="line relative">
                        
                        <div v-for="li in 10" :key="li" class="line ZForm">

                            <div class="columnA div" v-if="tableData && tableData[li - 1+1] && tableData[li - 1+1][0]">
                                <textarea v-model="formData[tableData[li][2]]" @input="input" class="formTTable"  :placeholder="tableData[li][1]"></textarea>
                            </div>

                        </div>                      

                    </div>
                </div>
            </template>

            <template v-else>
                <div class="columnTable">
                    <div v-for="list in 1" :key="list" class="line">

                        

                        <div v-for="li in 36" :key="li" class="line">
                            <div class="columnA div" v-if="tableData && tableData[li - 1+1] && tableData[li - 1+1][0]">
                                ...
                            </div>
                        </div>                      
                        
                    </div>
                </div>
            </template>
        </div>
        
    
    
   
</template>

<script>

export default {
   
    props: {
        table: Object,
        tableData: Array,
        selectionForm:Array,
    },
    data(){
        return{
            
            // форма 1 создание
            showForm: false,
            
            // /форма 1 создание
            d:[],
            formData:{
                HTTP:'POST',
                name_transformation_id:'',
                
                table:'',
            },
            in:1,
            
            searchTerm: '',
            
            // таблица форма 2 изменить удалить  
            formDisplay:[],
            showButtons:[],
            clickBorder:false,

            disableAnimation:[],
            disableAllAnimations:false,

            subsections:0,
            // /таблица форма 2 изменить удалить  

            // 
            // error: false,
            // errorMessage:[],



            o: 0,
            showForm: false,
            newItem: "",
            search:[
                
                'line',
                
                'name',
                'e',
                1
            ],
            createLine: false,



        }
    },
    methods: {
        // форма 1 создание
        toggleHover(id) {
            this.showButtons[id] = !this.showButtons[id]
            // this.showForm = !this.showForm;
        },
        // /форма 1 создание
        form(HTTP,id,table){
            // let int = 0;
            if(HTTP =="POST"){
                this.formData.HTTP = HTTP;
                this.formData.table = table;
                this.formData.table = table;

                this.$emit('create',this.formData);

                console.log(this.formData);

            }
        },
        CreatingSubsection(){

        },
        deleteFormData(){
            this.formData.HTTP = '';
            this.formData.name_transformation_id = '';
            this.formData.table = '';
            this.formData.content= '';

        }
        ,
        tableR(table,k){
            
            if (this.selectionForm[1]) {
            return table.filter(item => {
                if(k==1){
                    if (item[this.selectionForm[1]]) {

                        
                            const value = item[this.selectionForm[1]];
                            if (typeof value === 'string') {
                                console.log('a');

                                return value.toLowerCase().includes(this.selectionForm[2].toLowerCase());
                            } else if (typeof value === 'number') {
                                console.log('b');
                            return value.toString().includes(this.selectionForm[2]);
                            }
                            console.log('A');
                            return false;
                    }
                    
                    if(this.selectionForm[2]){
                        
                        
                        if(item.LegalAdministration.some(la => {
                            return la[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase());
                            })){

                                return table;
                            
                        }else{
                            return false;
                        }

                        
                    }else{
                        return table;
                    }
                    
                    
                }
                if(k==2){
                    if (item[this.selectionForm[1]]) {
                        
                        if(item[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase())){
                            console.log('h');
                            return item[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase());
                        }
                        
                    }
                    console.log('H');
                    return false;
                }
                
            });
            }else {
                return table;
            }
            
            
        }

    },
    computed:{
        
        // tableR: async function() {
        //     if (this.table) {
        //         const tableData = await this.table;
        //         const po = Object.values(tableData);
        //         return Object.values(po[0]);
        //     }
        //     return [];
        // },
        // tableR:function(){
        //     const po = Object.values(this.table);
        //     // var o = Object.values(this.table).length;
        //     // var h = 0;
        //     // for(var i = 0 ; i < po.length; i++){
        //         return Object.values(po[0]);
        //         // if(this.search[1] == 1){
                    
                    

        //         // }else if(this.search[1]==2){

        //         // }else if(this.search[1]==3){

        //         // }

        //     // }
            
            
        // },
        
        filteredTable() {
            return this.table.filter(item => {
                const value = item[this.selectionForm[1]];
                if (value && typeof value === 'string') {
                    return value.toLowerCase().includes(this.selectionForm[2].toLowerCase());
                } else if (value && typeof value === 'number') {
                    return value.toString().includes(this.selectionForm[2]);
                }
                return false;
            });
        },
        
        filteredItems() {
            


            



            if(this.selectionForm[3] == 1){   
                // console.log(this.table.filter(item => {return item[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase());}))  
                return this.table.filter(item => {return item[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase());});
            }else if(this.selectionForm[3]==2){



                console.log('///////////');
                return this.table.filter(item => {
                    if (item.DirectionsOfExpenses) {
                        // console.log(item.DirectionsOfExpenses);
                    return item.DirectionsOfExpenses.some(expense => {

                        // console.log(expense);

                        if (expense[this.selectionForm[1]]) {
                        const value = expense[this.selectionForm[1]].toString().toLowerCase();
                        const searchTerm = this.selectionForm[2].toString().toLowerCase();
                        
                        if(value.includes(searchTerm)){
                            
                            return value.includes(searchTerm);
                        }else{
                            
                            return false;
                        }
                        
                        }
                        return false;
                    });
                    }
                    return false;
                });
                
                



            }else if(this.selectionForm[3]==3){

                // console.log(this.table.filter(item => {return item[this.selectionForm[1]].toLowerCase().includes(this.selectionForm[2].toLowerCase());}))


                return this.table.filter(item => {
                    if (item.DirectionsOfExpenses) {
                    return item.DirectionsOfExpenses.some(expense => {
                        if (expense.LegalAdministration) {
                            return expense.LegalAdministration.some(administration => {
                            const value = administration[this.selectionForm[1]];
                            if (typeof value === 'string') {
                                // console.log(1);

                                return value.toLowerCase().includes(this.selectionForm[2].toLowerCase());
                            } else if (typeof value === 'number') {
                                // console.log(2);
                            return value.toString().includes(this.selectionForm[2]);
                            }
                            return false;
                        });
                        }
                        return false;
                    });
                    }
                    return false;
                });



                


            }
            else{
                console.log('///////////');
                
                return this.table
            }
        },
        
    }
    
}
</script>

<style scoped>
/* форма 1 создание */

.relative{
    
    position: relative;

}
.buttonA{

    position: absolute;
   left: 0px;
   top: 0px;
}
.X:before, .X:after {
content: ""; 
position: absolute; 
width: 24px; 
height: 4px; 
background: gray;
}
.X:before {transform: rotate(45deg);}
.X:after {transform: rotate(-45deg);}
.sizeDivFormCreate{

    width: auto;
    height: 60px;
    padding: 0px 10px 0px 10px;
}

.boxB {
  
  display: flex;
  align-items: center;
  justify-content: center;
  
  cursor: pointer;
}
.boxF{
    position: relative; 
    display: flex;
    align-items: center;
    margin-left: 10px;
}

.columnAButton{



}
.columnA .boxF{

    /* margin-left: 10px; */

}
form {
  display: flex;
  height: 100%;
}
/* /форма 1 создание */

.boxG{
    width: inherit;
}
.boxV{
    position: relative;
    width: 150px;
    /* z-index: 10; */
    margin: 10px;
}
.boxV button{
    
    margin-top: 10px ;
}
.formTTable{
    position: relative;
    
    width: 148px;
    height: 196px;
    


}
.formButton{
    position: absolute;
    left: 158px;
    top: 15px;


}
.ZForm{
    position: relative;
    z-index: 41;
    /* padding: 0px; */
}
.d{

    
    position: absolute;
    z-index:30;
    background-color: rgba(0, 0, 0, 0.363);
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    
}
.on{

}
.hoverContainer  {
    
    /* width: 220px; */
    /* border:1px solid rgb(245, 255, 112); */
    /* transition: min-height 3s ease; */
    min-height: 200px;
    
}
.c{
    position: relative;
    /* background-color: rgba(175, 175, 175, 0.322); */
    /* border:1px solid rgb(0, 0, 0); */
    width: 245px;
    /* height: 230px; */
    /* top:-20px; */
}

.columnAButton{
    position: relative;
    display:block;
    left: 160px;
    /* background-color: rgb(126, 71, 71); */
    width: 0px;
   
    /* margin: 10px; */
}
.flex{
    display: flex;
    position: relative;
    width: fit-content;
    z-index: 10;
    /* border:1px solid rgb(0, 0, 0); */
}

.AB{
    background-color: white;
    display:block; 
    margin-bottom: 10px;
}
.lineHoverContainer{
    min-height: 200px;
    transition: min-height 1s ease;
}
/* .block {
  width: 100px;
  height: 100px;
  background-color: red;
  transition: min-width 0.3s ease;
} */

/* .hoverContainer:hover {
  
  transform: scale(1.2);
} */

.formT{
    padding: 0;
    margin: 0;
    width: 100px;
    height: 100px;
}
.p{
    color: #ff0000;
}
</style>