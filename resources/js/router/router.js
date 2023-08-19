import index from "@/pages/index.vue";
import test from "@/pages/test.vue";
import {createRouter, createWebHashHistory} from "vue-router";


const routes = [
    {
        path:'/',
        component: index
    },
    {
        path:'/test',
        component: test
    },
    
]

const router = createRouter({
    routes,
    history:createWebHashHistory()
})


export default router;