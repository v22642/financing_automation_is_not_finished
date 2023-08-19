<template>

    <div class="line backgroundGray div ">
    <div >
      <template v-if="!showForm">
        <div class="sizeDivFormCreate boxB div  backgroundWhite divAnimation" @click="toggleHover">
          <p>Создать...</p>
        </div>
        
      </template>
      <template v-else>
        <form>

          <div><textarea></textarea></div>
          <div >
            <button class="boxB">Создать</button>
          </div>
          
        </form> 
      </template>
    </div>
    
      
    
  </div>

</template>
<script>
export default {
    data() {
        return {
            showForm: false,
            hover: false,
        };
    },
    methods: {
        toggleHover() {
        this.showForm = !this.showForm;
        },
    },
};
</script>
<style scoped>
form {
    display: flex;
}
.sizeDivFormCreate{

    width: 255px;
    height: 60px;

}
.boxB {
  
    display: flex;
    align-items: center;
    justify-content: center;
    
    cursor: pointer;
}

</style>