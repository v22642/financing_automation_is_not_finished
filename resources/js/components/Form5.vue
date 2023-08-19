<template>
    
    <header class="two">
        <button class="button" @click="burgerA">
            Экспорт
        </button>
        <button class="button" @click="burgerB">
            Импорт
        </button>
        
        
         
    </header>
    <div>
        <button class="buttonA" @click="containerMinu = !containerMinu">
            <span v-if="containerMinu" class="arrow-down"></span> <span v-else class="arrow-down2"></span>
        </button> 
    </div>
    <template v-if="containerMinu">
    <div class="formA divH" id="formA" v-if="i==0">
        
        <form class="form"  @submit.prevent > 
            <!-- <input type="file" name="f"> -->
            
            
            <div class="divButton"><button type="submit" class="button" @click="form"><b>заполнить</b></button></div>
            
        </form>
    </div>
    <div class="formA divH" id="formB" v-else-if="i==1">
        
        <form class="form"  @submit.prevent > 
            <input type="file"  @change="fail" >
            
            
            <!-- <div class="divButton"><button type="submit" class="button" @click="fail"><b>заполнить</b></button></div> -->
            
        </form>
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
            formData:{
                action:'export',
                fail: null,
            },
            i:0,
            containerMinu:true,  
        }
        
    },
    methods:{
        burgerA(){
            this.formData.action ='export'
            this.i = 0;
        },
        burgerB(){
            this.formData.action ='import'
            this.i = 1;
        },
        input(event){
            this.name = event.target.value;
            
            // console.log(event.target.value);
        },
        form(){
            
            this.$emit('formName', this.formData);
            
        },
        fail(event){
            this.formData.fail =event.target.files[0];

            console.log(this.formData.fail);

            this.$emit('formName', this.formData);

        }
        
        
    }
    
}
</script>

<style scoped>

</style>