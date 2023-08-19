<template>
    <header class="two">
        <button class="button" @click="burgerA">
            Создать 
        </button>
        <button class="button" @click="burgerB">
            Изменить  
        </button>
        <button class="button" @click="burgerС">
            Удалить
        </button>
        
         
    </header>
    <div>
        <button class="buttonA" @click="containerMinu = !containerMinu">
            <span v-if="containerMinu" class="arrow-down"></span> <span v-else class="arrow-down2"></span>
        </button> 
    </div>
    <template v-if="containerMinu">

    
    <div class="formA divH" id="formA" v-if="i==1">
        <!-- <form class="form" method="POST" action="{{ route('index') }}"  > -->
        <form class="form"  @submit.prevent > 
            <h2>Создать Наименование преобразований</h2>

            
            <div><input class="formIn" type="text" v-model="formData.number" @input="input" name="name" placeholder="Номер"></div>
            <div><textarea v-model="formData.name" @input="input" class="formT" name="name" placeholder="Наименование преобразований, стратегического проекта, подпроекта, мероприятия"></textarea></div>
            
            
            <div class="divButton"><button type="submit" class="button" @click="form"><b>заполнить</b></button></div>
            
        </form>
    </div>
    <div class="formA divH" id="formA" v-else-if="i==2">
        
        <form class="form"  @submit.prevent > 
            <h2>Изменить Наименование преобразований</h2>
            <div>
                <select name="name_id" class="formID" v-model="formData.name_transformation_id">
                    <option disabled value="">Выберите</option>
                    <option v-for="t in table" :key="t.id" :value="t.id">{{ t.id + ') ' + t.name }}</option> 
                </select>
            </div>
            
            <textarea  v-model="formData.name" @input="input" class="formT" name="name" placeholder="Наименование преобразований, стратегического проекта, подпроекта, мероприятия"></textarea>
            
            <div class="divButton"><button type="submit" class="button" @click="put"><b>заполнить</b></button></div>
            
        </form>
    </div>
    <div class="formA divH" id="formA" v-else-if="i==3">
        <div class="padding">
            <form class="form"  @submit.prevent > 
                <h2>Удалить Наименование преобразований</h2>
                <select name="name_id" class="formID" v-model="formData.name_transformation_id">
                    <option disabled value="">Выберите</option>
                    <option v-for="t in table" :key="t.id" :value="t.id">{{ t.id + ') ' + t.name }}</option> 
                </select>
                <div class="divButton"><button type="submit" class="button" @click="delet"><b>заполнить</b></button></div>
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
    data(){
        return{
            name:'',
            i:1,
            formData:{
                HTTP:'POST',
                name_transformation_id:'',
                number:'',
                name:'',
            },
            containerMinu:true,    

            

        }
        
    },
    methods:{
        input(event){
            this.name = event.target.value;
            
            // console.log(event.target.value);
        },
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
        delet(){
            
            this.$emit('formName',this.formData)
            this.formData.name = '';
            this.formData.name_transformation_id = '';
        },
        // переключалки функци
        burgerA() {
            this.formData.HTTP = 'POST';
            this.i=1;
            this.containerMinu=true;
        },
        burgerB(){
            this.formData.HTTP = 'PUT';
            this.i=2;
            this.containerMinu=true;
        },
        burgerС(){
            this.formData.HTTP = 'DELETE';
            this.i=3;
            this.containerMinu=true;
        },
        
    },
    
    
}
</script>

<style scoped>

</style>