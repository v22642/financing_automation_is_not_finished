<template>
    <header class="one">
        <button class="button buttonMenu" @click="burger1">
            Создать Наименование преобразований
        </button>
        <button class="button buttonMenu" @click="burger2">
            Направление расходования
        </button>
        <button class="button buttonMenu" @click="burger3">
            Юридический отдел
        </button>
        <button class="button buttonMenu" @click="burger4">
            Финансовый отдел
        </button>
        <button class="button buttonMenu" @click="burger6">
            Выборка
        </button>
        <button class="button buttonMenu" @click="burger5">
            Экспорт Импорт 
        </button>
        
    </header>

</template>

<script>
export default {
    data() {
      return {
        i: 1,
      };
    },
    methods: {
        burger1() {
            this.i=1;
            this.$emit('create',this.i)
        },
        burger2(){
            this.i=2;
            this.$emit('create',this.i)
        },
        burger3(){
            this.i=3;
            this.$emit('create',this.i)
        },
        burger4(){
            this.i=4;
            this.$emit('create',this.i)
        },
        burger5(){
            this.i=5;
            this.$emit('create',this.i)
        },
        burger6(){
            this.i=6;
            this.$emit('create',this.i)
        }
    }
}
</script>

<style scoped>

</style>