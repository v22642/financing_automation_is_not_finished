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
      <div class="formA divH" id="formA" v-if="i==1">
        <form class="form" @submit.prevent>
          
          <div>

            <select name="directions_of_expenses_id" class="formID" v-model="formData.directions_of_expenses_id"  >
            
              <option disabled value="">Выберите</option>
              
              <option v-for="t in items" :key="t.id" :value="t.id"><p >{{t.name_transformation_id}}/{{t.id}}){{ t.direction_of_spending }}</p></option> 
            
            </select>
          </div>
          
              <textarea class="formT"  placeholder="срок" v-model="formData.Deadline"></textarea>

              <textarea class="formT"  placeholder="инфомация об исполнениии" v-model="formData.Performance_information"></textarea>
              <textarea class="formT"  placeholder="Способ закупки" v-model="formData.Procurement_method"></textarea>
              <textarea class="formT"  placeholder="Начало проведения (дата)" v-model="formData.Start_of_conduct"></textarea>
              <textarea class="formT"  placeholder="Результат проведения конкурентных процедур" v-model="formData.Results_of_competitive_procedures"></textarea>
              <textarea class="formT"  placeholder="Сумма договора, тыс. рублей (Сумма договора Ю)" v-model="formData.Contract_amount_thousand_rubles"></textarea>
              <textarea class="formT"  placeholder="№ Договора" v-model="formData.Contract_number"></textarea>
              <textarea class="formT"  placeholder="Дата заключения договора" v-model="formData.Contract_conclusion_date"></textarea>
              <textarea class="formT"  placeholder="Ответственное лицо" v-model="formData.Responsible_person"></textarea>
              <textarea class="formT"  placeholder="Поставщик" v-model="formData.Supplier"></textarea>
              <textarea class="formT"  placeholder="Плановая сумма договора" v-model="formData.Planned_contract_amount"></textarea>
              <textarea class="formT"  placeholder="экономия" v-model="formData.Savings"></textarea>
              <textarea class="formT"  placeholder="Дата поставки по договору" v-model="formData.Delivery_date_according_to_the_contract"></textarea>
              <textarea class="formT"  placeholder="Фактическая дата поставки" v-model="formData.Actual_delivery_date"></textarea>
              <textarea class="formT"  placeholder="Дата оплаты по договору" v-model="formData.Payment_date_under_the_contract"></textarea>
              <textarea class="formT"  placeholder="Фактическая дата оплаты" v-model="formData.Actual_payment_date"></textarea>
              <textarea class="formT"  placeholder="Сумма оплаты нарастающим итогом" v-model="formData.Accumulative_payment_amount"></textarea>
              <textarea class="formT"  placeholder="Информация о невыполнении" v-model="formData.Information_on_non_fulfillment"></textarea>

          <div class="divButton"><button class="button" type="submit" @click="form"><b>заполнить</b></button></div>

        </form>
      </div>
      <div class="formA div" id="formA" v-else-if="i==2">
      <form class="form" @submit.prevent>

        <div>
                
          <!-- сделать функцию запуска цикла при запуске страници этой страници  -->


          <select name="directions_of_expenses_id" class="formID" v-model="formData.directions_of_expenses_id"  >
          
              <option disabled value="">Выберите</option>
              
              <option v-for="t in items" :key="t.id" :value="t.id"><p >{{t.id}}){{ t.Deadline }}</p></option> 
          </select>
        </div>
        <div>
          <select name="name_id" class="formID" v-model="j" @change="handleOptionChange">
            <option disabled value="">Выберите</option>
            <option v-for="t in items" :key="t.id" :value="[t.name_transformation_id, t.id]" ><p >{{ t.directions_of_expenses_id}}/{{t.id}}){{ t.Deadline }}</p></option>
          </select>
        </div>    


        <textarea class="formT"  placeholder="срок" v-model="formData.Deadline"></textarea>

        <textarea class="formT"  placeholder="инфомация об исполнениии" v-model="formData.Performance_information"></textarea>
        <textarea class="formT"  placeholder="Способ закупки" v-model="formData.Procurement_method"></textarea>
        <textarea class="formT"  placeholder="Начало проведения (дата)" v-model="formData.Start_of_conduct"></textarea>
        <textarea class="formT"  placeholder="Результат проведения конкурентных процедур" v-model="formData.Results_of_competitive_procedures"></textarea>
        <textarea class="formT"  placeholder="Сумма договора, тыс. рублей (Сумма договора Ю)" v-model="formData.Contract_amount_thousand_rubles"></textarea>
        <textarea class="formT"  placeholder="№ Договора" v-model="formData.Contract_number"></textarea>
        <textarea class="formT"  placeholder="Дата заключения договора" v-model="formData.Contract_conclusion_date"></textarea>
        <textarea class="formT"  placeholder="Ответственное лицо" v-model="formData.Responsible_person"></textarea>
        <textarea class="formT"  placeholder="Поставщик" v-model="formData.Supplier"></textarea>
        <textarea class="formT"  placeholder="Плановая сумма договора" v-model="formData.Planned_contract_amount"></textarea>
        <textarea class="formT"  placeholder="экономия" v-model="formData.Savings"></textarea>
        <textarea class="formT"  placeholder="Дата поставки по договору" v-model="formData.Delivery_date_according_to_the_contract"></textarea>
        <textarea class="formT"  placeholder="Фактическая дата поставки" v-model="formData.Actual_delivery_date"></textarea>
        <textarea class="formT"  placeholder="Дата оплаты по договору" v-model="formData.Payment_date_under_the_contract"></textarea>
        <textarea class="formT"  placeholder="Фактическая дата оплаты" v-model="formData.Actual_payment_date"></textarea>
        <textarea class="formT"  placeholder="Сумма оплаты нарастающим итогом" v-model="formData.Accumulative_payment_amount"></textarea>
        <textarea class="formT"  placeholder="Информация о невыполнении" v-model="formData.Information_on_non_fulfillment"></textarea>

        <div class="divButton"><button class="button" type="submit" @click="form"><b>заполнить</b></button></div>

      </form>
      </div>
      <div class="formA div" id="formA" v-else-if="i==3">
        <select name="directions_of_expenses_id" class="formID" v-model="formData.directions_of_expenses_id"  >
            
            <option disabled value="">Выберите</option>
            
            <option v-for="t in items" :key="t.id" :value="t.id"><p >{{t.id}}){{ t.Deadline }}</p></option> 
            
          </select>
          <div class="divButton"><button type="submit" class="button" @click="delet"><b>заполнить</b></button></div>
      </div>
      <!-- <div>
        <h1>My Component</h1>
        <ul>
          <li v-for="item in items">{{ item }}</li>
          <li v-if="items.length === 0">No items found</li>
        </ul>
      </div> -->
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

        checked: true,
        i:1,
        a:0,
        j:null,
        formData: {
          HTTP:'POST',
          directions_of_expenses_id: '',
          Deadline: '',
          Performance_information: '',
          // Total_agreed: 'null',
          // '21_agree': 'null',
          // '22_agree': 'null',
          // '23_agree': 'null',
          // Total_remaining_on_the_roadmap: 'null',
          // '31_agree': 'null',
          // '32_agree': 'null',
          // '33_agree': 'null',
          Procurement_method: '',
          Start_of_conduct: '',
          Results_of_competitive_procedures: '',
          Contract_amount_thousand_rubles: '',
          Contract_number: '',
          Contract_conclusion_date: '',
          Responsible_person: '',
          Supplier: '',
          Planned_contract_amount: '',
          Savings: '',
          Delivery_date_according_to_the_contract: '',
          Actual_delivery_date: '',
          Payment_date_under_the_contract: '',
          Actual_payment_date: '',
          Accumulative_payment_amount: '',
          Information_on_non_fulfillment: ''
          
        },
        items: [],
        containerMinu:true,  
        
      };
  },
  methods: {
    
    form(){
      this.$emit('formName',this.formData)
      this.formData.name = '';
      this.formData.name_transformation_id = '';
    },
    put(){
      this.$emit('formName',this.formData)
      this.formData.name = '';
      this.formData.name_transformation_id = '';
    },
    delete(){
      this.$emit('formName',this.formData)
      this.formData.name = '';
      this.formData.name_transformation_id = '';
    },
    
    burgerA() {
      
      this.items = [];
      this.formData.HTTP = 'POST';
      this.i=1;
      for (let t = 0; t < this.table.length; t++) {
        for (let p = 0; p < this.table[t].DirectionsOfExpenses.length; p++){
          const item = {id:this.table[t].DirectionsOfExpenses[p].id,name_transformation_id:this.table[t].DirectionsOfExpenses[p].name_transformation_id, name: this.table[t].name ,direction_of_spending:this.table[t].DirectionsOfExpenses[p].direction_of_spending}; 
          this.items.push(item); 
        }
      
      }
    },
    burgerB(){
      this.items = [];
      this.formData.HTTP = 'PUT';
      this.i=2;
      for (let t = 0; t < this.table.length; t++) {
        
        for (let p = 0; p < this.table[t].DirectionsOfExpenses.length; p++) {
          
          for (let a = 0; a < this.table[t].DirectionsOfExpenses[p].LegalAdministration.length; a++) {

            const item = {directions_of_expenses_id:this.table[t].DirectionsOfExpenses[p].LegalAdministration[a].directions_of_expenses_id,id:this.table[t].DirectionsOfExpenses[p].LegalAdministration[a].id, Deadline:this.table[t].DirectionsOfExpenses[p].LegalAdministration[a].Deadline};
            this.items.push(item);

          }

        }

      }

    },
    burgerС(){
      this.formData.HTTP = 'DELETE';
      this.i=3;
    },
    
    
  },
  mounted() {
    
    this.burgerA();
    
  },
  
}
</script>

<style scoped>
.padding{
    /* padding-bottom: 25px; */
}
</style>