import * as VueRouter from 'vue-router';




const routes = [
    {
        path: '/dashboard',
        name: "dashboard",
        component: () => import('./components/Dashboard.vue')
    },

    {
        path: '/login',
        name: "login",
        component: () => import('./components/Auth/Login.vue')
    },
    {
        path: '/register',
        name: "register",
        component: () => import('./components/Auth/Register.vue')
    }

]

//Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
