<template>
    
    <form class="form"  @submit.prevent > 
            
        <textarea v-model="formData" @input="input" class="formT" name="name" placeholder="Наименование преобразований, стратегического проекта, подпроекта, мероприятия"></textarea>
        
        <div class="divButton"><button type="submit" class="button" @click="sample"><b>заполнить</b></button></div>
        
    </form>

</template>

<script>


export default {
    
    
    data(){
        return{
            
            
            formData:'',
            

        }
        
    },
    methods:{
       
        sample(){

        }

    },
    
    
}

</script>

<style scoped>
    
</style>