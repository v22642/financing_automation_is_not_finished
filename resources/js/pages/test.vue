<template>
  <div class="line backgroundGray div ">
    <div >
      <template v-if="!showForm">
        <div class="boxB div columnCreate" @click="toggleHover">
          <p>Создать</p>
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

/* ee */
.boxA {
  background-color: gray;
  display: flex;
}

.boxB {
  
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s, transform 0.3s;
  cursor: pointer;
}
.boxB:hover {
  background-color: gray;
  transform: scale(1.05);
}
/* opppp */
div.div {
    border: 1px solid rgb(0, 0, 0);
}
.line{
    display: flex;
    
    flex-direction: row;

    justify-content: flex-start;

    
    transition: min-height 1s ease;
   
}
.backgroundGray{
    background-color: rgb(233, 233, 233);
}

.columnA{
    
    
    width: 150px;
    min-height: 100%;
    transition: min-height 1s ease;
    
    
}



form {
  display: flex;
}

.template {
  flex: 1;
}

.button {
  margin-left: 10px;
}
.columnCreate {
    height: 60px;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
}
</style>
