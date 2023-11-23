import * as VueRouter from 'vue-router';




const routes = [
    {
        path: '/',
        name: "Dashboard",
        component: () => import('./components/Home.vue')
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
    },
    {
        path: '/forgot-password',
        name: "forgot-password",
        component: () => import('./components/Auth/ForgotPassword.vue')
    },
    {
        path: '/reset-password',
        name: "reset-password",
        component: () => import('./components/Auth/ResetPassword.vue'),
        props: route => ({ query: route.query.token })
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