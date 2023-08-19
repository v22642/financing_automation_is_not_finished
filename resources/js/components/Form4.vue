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
        <div class="formD divH " id="formD">
            <form class="form" method="POST" action=""  >
                
                <div>
                    
                    <input type="text" name="idF" class="formID" placeholder="id">
                </div>
                <textarea class="formT"  placeholder="" v-model="formData.Total_agreed" ></textarea>
                <textarea class="formT"  placeholder="i" v-model="formData['21_agree']"></textarea>
                <textarea class="formT"  placeholder="i" v-model="formData['22_agree']"></textarea>
                <textarea class="formT"  placeholder="i" v-model="formData['23_agree']"></textarea>
                <textarea class="formT"  placeholder="a" v-model="formData.Total_remaining_on_the_roadmap"></textarea>
                <textarea class="formT"  placeholder="a" v-model="formData['31_agree']"></textarea>
                <textarea class="formT"  placeholder="a" v-model="formData['32_agree']"></textarea>
                <textarea class="formT"  placeholder="a" v-model="formData['33_agree']"></textarea>

                <div class="divButton"><button class="button" type="submit"><b>заполнить</b></button></div>
            </form>
        </div>
    </template>
</template>

<script>
export default {
    data() {
        return {
            formData:{
                Total_agreed: '',
                '21_agree': '',
                '22_agree': '',
                '23_agree': '',
                Total_remaining_on_the_roadmap: '',
                '31_agree': '',
                '32_agree': '',
                '33_agree': '',
            },
            containerMinu:true,  
        }
    }
}
</script>

<style scoped>
.padding{
    padding-bottom: 25px;
}
</style>