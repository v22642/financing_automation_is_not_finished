<template>
     <header class="two">
        <button class="button" @click="burgerA">
            Создать 
        </button>
        <button class="button" @click="burgerB">
          изменить 
        </button>
        <button class="button" @click="burgerС">
          удалить
        </button>
        
    </header>
    <div>
        <button class="buttonA" @click="containerMinu = !containerMinu">
            <span v-if="containerMinu" class="arrow-down"></span> <span v-else class="arrow-down2"></span>
        </button> 
    </div>
    <template v-if="containerMinu">
    <div class="formA divH " id="formA" v-if="i==1">
      <form class="form" @submit.prevent>
              
        <div>
          <select name="name_id" class="formID" v-model="formData.name_transformation_id">
            <option disabled value="">Выберите</option>
            <option v-for="t in table" :key="t.id" :value="t.id">{{ t.id + ') ' + t.name }}</option> 
          </select>
        </div>
        <textarea class="formT" name="Direction_Spending" placeholder="Направление расходования средств (основное и вспомогательное оборудование, ремонт и др.)" v-model="formData.direction_of_spending" @input="logFormData" />
        <textarea class="formT" name="Total_Approved" placeholder="ВСЕГО утверждено" v-model="formData.total_approved" @input="logFormData" />
        <textarea class="formT" name="11acc" placeholder="КБК 075 0706 47 2 S4 12100 613 Наука ВО" v-model="formData['11_agree']" @input="logFormData" />
        <textarea class="formT" name="12acc" placeholder="КБК 075 0708 47 2 S4 12100 613 НАУКА" v-model="formData['12_agree']" @input="logFormData" />
        <textarea class="formT" name="13acc" placeholder="БК 075 0706 47 2 D8 64733 613 ЦИФРА" v-model="formData['13_agree']" @input="logFormData" />
        <textarea class="formT" name="Subproject_KPI" placeholder="KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)" v-model="formData.subproject_kpi" @input="logFormData" />
        <textarea class="formT" name="plan" placeholder="План" v-model="formData.plan" @input="logFormData" />
        <textarea class="formT" name="fact" placeholder="Факт" v-model="formData.fact" @input="logFormData" />
        <textarea class="formT" name="abcd" placeholder="абвгд" v-model="formData.abcd" @input="logFormData" />
        <div class="divButton"><button class="button" type="submit" @click="form"><b>заполнить</b></button></div>
      </form>
    </div>
    <div class="formA div" id="formB" v-else-if="i==2">
      <form class="form" @submit.prevent>

        

        <div>
          <select name="name_id" class="formID" v-model="j" @change="handleOptionChange">
            <option disabled value="">Выберите</option>
            <option v-for="t in items" :key="t.id" :value="[t.name_transformation_id, t.id]" ><p >{{ t.name_transformation_id}}/{{t.id}}){{ t.direction_of_spending }}</p></option>
          </select>
        </div>
        <textarea class="formT"  name="Direction_Spending" placeholder="Направление расходования средств (основное и вспомогательное оборудование, ремонт и др.)" v-model="formData.direction_of_spending" @input="logFormData" />
        <textarea class="formT" name="Total_Approved" placeholder="ВСЕГО утверждено" v-model="formData.total_approved" @input="logFormData" />
        <textarea class="formT" name="11acc" placeholder="КБК 075 0706 47 2 S4 12100 613 Наука ВО" v-model="formData['11_agree']" @input="logFormData" />
        <textarea class="formT" name="12acc" placeholder="КБК 075 0708 47 2 S4 12100 613 НАУКА" v-model="formData['12_agree']" @input="logFormData" />
        <textarea class="formT" name="13acc" placeholder="БК 075 0706 47 2 D8 64733 613 ЦИФРА" v-model="formData['13_agree']" @input="logFormData" />
        <textarea class="formT" name="Subproject_KPI" placeholder="KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)" v-model="formData.subproject_kpi" @input="logFormData" />
        <textarea class="formT" name="plan" placeholder="План" v-model="formData.plan" @input="logFormData" />
        <textarea class="formT" name="fact" placeholder="Факт" v-model="formData.fact" @input="logFormData" />
        <textarea class="formT" name="abcd" placeholder="абвгд" v-model="formData.abcd" @input="logFormData" />
        <div class="divButton"><button class="button" type="submit" @click="put"><b>заполнить</b></button></div>
      </form>
    </div>
    <div class="formA div" id="formB" v-else-if="i==3">
      <div class="padding">
        <form class="form"  @submit.prevent > 
          <div>
            <select name="directions_of_expenses_id" class="formID" v-model="formData.name_transformation_id"  >
            
              <option disabled value="">Выберите</option>
            
              <option v-for="t in items" :key="t.id" :value="t.id"><p >{{t.name_transformation_id}}/{{t.id}}){{ t.direction_of_spending }}</p></option> 
            </select>
            <div class="divButton"><button type="submit" class="button" @click="delet"><b>заполнить</b></button></div>
          </div>
          
        </form>
      </div>
        
    </div>
  </template>
</template>

<script>
export default {
    props: {
      table: {
        type: Array,
        required: true
      }
    },
    data() {
      return {
        i:1,
        j:null,
        formData: {
          HTTP: 'POST',
          name_transformation_id:'',
          direction_of_spending: '',
          total_approved: '',
          ['11_agree']: '',
          ['12_agree']: '',
          ['13_agree']: '',
          subproject_kpi: '',
          
          plan: '',
          fact: '',
          abcd:'',
          
          
        },
        items: [],
        containerMinu:true,  
      };
  },
  methods: {
    null(){

      this.formData.name_transformation_id='';
      this.formData.direction_of_spending='';
      this.formData.total_approved='';
      this.formData['11_agree']='';
      this.formData['12_agree']='';
      this.formData['13_agree']='';
      this.formData.subproject_kpi='';
      
      this.formData.plan='';
      this.formData.fact='';
      this.formData.abcd='';

    },
    form(){
      this.$emit('formName',this.formData)
      this.null();
      
    },
    put(){
      this.$emit('formName',this.formData)
      this.null();

    },
    delet(){
      this.$emit('formName',this.formData)
      this.null();
      this.burgerС();
    },
    
    burgerA() {
      this.items = [];
      this.formData.HTTP = 'POST';
      this.i=1;
    },
    burgerB(){
      this.items = [];
      this.formData.HTTP = 'PUT';
      this.i=2;
      for (let t = 0; t < this.table.length; t++) {
        for (let p = 0; p < this.table[t].DirectionsOfExpenses.length; p++){
          const item = {id:this.table[t].DirectionsOfExpenses[p].id,name_transformation_id:this.table[t].DirectionsOfExpenses[p].name_transformation_id, name: this.table[t].name ,direction_of_spending:this.table[t].DirectionsOfExpenses[p].direction_of_spending}; 
          this.items.push(item); 
        }
      
      }
    },
    burgerС(){
      this.items = [];
      this.formData.HTTP = 'DELETE';
      this.i=3;
      for (let t = 0; t < this.table.length; t++) {
        for (let p = 0; p < this.table[t].DirectionsOfExpenses.length; p++){
          const item = {id:this.table[t].DirectionsOfExpenses[p].id,name_transformation_id:this.table[t].DirectionsOfExpenses[p].name_transformation_id, name: this.table[t].name ,direction_of_spending:this.table[t].DirectionsOfExpenses[p].direction_of_spending}; 
          this.items.push(item); 
        }
      
      }
    },

    handleOptionChange() {
      
      // for (let i = 0; i < items.length; i++) {
      //   if (this.table[i].id === this.j[0]) {
      //     break;
      //   }
        
      // }
      for (let i of this.table) {
        if (i.id === this.j[0]) {
          console.log('ok '+ i.id );
          for (let a of i.DirectionsOfExpenses) {
            if (a.id == this.j[1]) {
              console.log('ok 2 '+ a.id);
              // console.log('ok'+ this.table[0]);
              this.formData.name_transformation_id = this.j[1];      
              this.formData.direction_of_spending = a.direction_of_spending;
              this.formData.total_approved= a.total_approved;
              this.formData['11_agree']= a['11_agree'];
              this.formData['12_agree']= a['12_agree'];
              this.formData['13_agree']= a['13_agree'];
              this.formData.subproject_kpi= a.subproject_kpі;
                
              this.formData.plan= a.plan;
              this.formData.fact= a.fact;
              this.formData.abcd=a.abcd;
              break;
            }
            console.log('del 2 ='+ a.id);
            
          }
          break;
        }
        console.log('del ='+ i.id );
      }
        // console.log('ok'+ this.table[0]);
        // this.formData.name_transformation_id = this.j[0];      
        // this.formData.direction_of_spending = this.table[this.j[0]].DirectionsOfExpenses[this.j[1]].direction_of_spending;
        // this.formData.total_approved=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]].total_approved;
        // this.formData['11_agree']=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]]['11_agree'];
        // this.formData['12_agree']=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]]['12_agree'];
        // this.formData['13_agree']=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]]['13_agree'];
        // this.formData.subproject_kpi=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]].subproject_kpi;
          
        // this.formData.plan=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]].plan;
        // this.formData.fact=this.table[this.j[0]].DirectionsOfExpenses[this.j[1]].fact;
      

      // if (this.formData.name_transformation_id ) {
      //   this.doSomethingForOption1();
      // } else if (this.selectedOption === 'option2') {
      //   this.doSomethingForOption2();
      // } else if (this.selectedOption === 'option3') {
      //   this.doSomethingForOption3();
      // }

    },
    doSomethingForOption1() {
      // ...
    },
    doSomethingForOption2() {
      // ...
    },
    doSomethingForOption3() {
      // ...
    },

  }
}
</script>

<style scoped>
.padding{
    padding-bottom: 25px;
}
</style>