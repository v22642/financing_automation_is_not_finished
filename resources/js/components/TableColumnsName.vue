<template>
    
    
    <div class="table div">

        

<div class="line div">
    <div class="columnAA div">
        
    </div>
    <div class="columnAA div">
        №
    </div>
    
    <div class="columnA div" v-if="tableData[0][0]">
        <p class="g">Наименование преобразований, стратегического проекта, подпроекта, мероприятия</p> 
    </div>
    
    <div class="columnA div" v-if="tableData[1][0]">
    Направление расходования средств (основное и вспомогательное оборудование, ремонт и др.)
    </div>
    <div class="columnA div" v-if="tableData[2][0]">
    ВСЕГО утверждено
    </div>
    <div class="columnA div" v-if="tableData[3][0]">
    КБК 075 0706 47 2 S4 12100 613 Наука ВО
    </div>
    <div class="columnA div" v-if="tableData[4][0]">
    КБК 075 0708 47 2 S4 12100 613 НАУКА
    </div>
    <div class="columnA div" v-if="tableData[5][0]">
    БК 075 0706 47 2 D8 64733 613 ЦИФРА
    </div>
    <div v-bind:class="[tableData[6][0]&& tableData[7][0] ? 'container' : '']" v-if="tableData[6][0] || tableData[7][0]">
        <div class="f1 div">
            
                Подготовка<br v-if="!tableData[6][0] || !tableData[7][0]"> справок обоснований<br> в правовое<br v-if="!tableData[6][0] || !tableData[7][0]"> управление
            
        </div>
        <div  class="f2">
            <div v-bind:class="['r'+ [tableData[6].filter((item) => typeof item === 'boolean' && item === true).length + tableData[7].filter((item) => typeof item === 'boolean' && item === true).length]]">
                <div class="y div" v-if="tableData[6][0]">
                    срок
                </div>
                <div class="y div" v-if="tableData[7][0]">
                    инфомация об исполнениии
                </div>
                
            </div>
            

        </div>
        
    </div>
    <div class="columnA div" v-if="tableData[8][0]">
    Всего согласовано
    </div>
    <div class="columnA div" v-if="tableData[9][0]">
    согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА
    </div>
    <div class="columnA div" v-if="tableData[10][0]">
    согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО
    </div>
    <div class="columnA div" v-if="tableData[11][0]">
    согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА
    </div>
    <div class="columnA div" v-if="tableData[12][0]">
    Всего остаток по дорожной карте
    </div>
    <div class="columnA div" v-if="tableData[13][0]">
    согл 075-15-2022-959 от 06.05.2022 КБК 07 06 47 1 D8 64733 ЦИФРА
    </div>
    <div class="columnA div" v-if="tableData[14][0]">
    согл 075-15-2021-1143 от 30.09.2021 КБК 07 06 47 1 S4 12100 Наука ВО
    </div>
    <div class="columnA div" v-if="tableData[15][0]">
    согл 075-15-2021-1143 от 30.09.2021 КБК 07 08 47 1 S4 12100 НАУКА
    </div>
    
    <div class="container" >
        <div class="f1 div" v-if="tableData[17][0] || tableData[18][0] || tableData[19][0] || tableData[20][0]">

            
            Информация о<br> проведение<br > конкурентных<br> процедур за счет <br>иных источников <br>(отв. за внесение <br>правовое управление)
            
            
        </div>
        <div class="f2 ">
            <div v-bind:class="['r'+ [tableData[16].filter((item) => typeof item === 'boolean' && item === true).length + tableData[17].filter((item) => typeof item === 'boolean' && item === true).length + tableData[18].filter((item) => typeof item === 'boolean' && item === true).length + tableData[19].filter((item) => typeof item === 'boolean' && item === true).length]]">

                <div class="y div" v-if="tableData[16][0]">
                    
                    Способ закупки
                </div>
                <div class="y div" v-if="tableData[17][0]">
                    Начало проведения (дата)
                </div>
                <div class="y div" v-if="tableData[18][0]">
                    Результат проведения конкурентных процедур
                </div>
                <div class="y div" v-if="tableData[19][0]">
                    Сумма договора, тыс. рублей (Сумма договора Ю)
                </div>
            </div>
        </div>    
    </div>
    <div class="columnA div" v-if="tableData[20][0]">
        № Договора
    </div>
    <div class="columnA div" v-if="tableData[21][0]">
        Дата заключения договора
    </div>
    <div class="columnA div" v-if="tableData[22][0]">
    Ответственное лицо
    </div>
    <div class="columnA div" v-if="tableData[23][0]">
    Поставщик
    </div>
    <div class="columnA div" v-if="tableData[24][0]">
    Плановая сумма договора
    </div>
    <div class="columnA div" v-if="tableData[25][0]">
    экономия
    </div>
    <div class="columnA div" v-if="tableData[26][0]">
    Дата поставки по договору
    </div>
    <div class="columnA div" v-if="tableData[27][0]">
    Фактическая дата поставки
    </div>
    <div class="columnA div" v-if="tableData[28][0]">
    Дата оплаты по договору
    </div>
    <div class="columnA div" v-if="tableData[29][0]">
    Фактическая дата оплаты
    </div>
    <div class="columnA div" v-if="tableData[30][0]">
    Сумма оплаты нарастающим итогом
    </div>
    <div class="columnA div" v-if="tableData[31][0]">
    Информация о невыполнении
    </div>
    <div class="container">
        <div class="f1 div" v-if="tableData[32][0] || tableData[33][0] || tableData[34][0]">

            
            KPI
            

        </div>
        <div class="f2">
            <div v-bind:class="['r'+ [tableData[32].filter((item) => typeof item === 'boolean' && item === true).length + tableData[33].filter((item) => typeof item === 'boolean' && item === true).length + tableData[34].filter((item) => typeof item === 'boolean' && item === true).length]]">
                
                <div class="y div" v-if="tableData[32][0]">
                    KPI подпроекта (наименование) прямой результат от выполнения действия (улучшение какого-то процесса, создание нового продукта)
                </div>
                <div class="y div" v-if="tableData[33][0]">
                    План
                </div>
                <div class="y div" v-if="tableData[34][0]">
                    Факт
                </div>
            </div>
        </div>
        
    </div>
    <div class="columnA div" v-if="tableData[35][0]">
    абвгд
    </div>
    
</div>
<div class="line div">
    <div class="columnAA div">
        
    </div>
    <div class="columnAA div">
        
    </div>
    <template v-for="(num, key) in tableData" :key="key">
        <div class="columnA div" v-if="tableData[key][0]">
            {{ key+1}}
        </div>
    </template>
    
    
</div>

</div>
   

</template>

<script>
export default {
    props: {
        tableData: {
            type: Array,
            required: true
        }
    
    },
    data(){
        return{
            
        }
    }

}
</script>

<style scoped>
 .g{
    width: 35px;
 }
</style>