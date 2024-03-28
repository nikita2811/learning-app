// store.js
import { createStore } from 'vuex';

export default createStore({
    state: {
        isAuthenticated: false,
        user: null,
    },
    mutations: {
        login(state, user) {
            state.isAuthenticated = true;
            state.user = user;
        },
        logout(state) {
            state.isAuthenticated = false;
            state.user = null;
        },
    },
    actions: {
        login({ commit }, user) {
            // You can perform authentication here (e.g., API call)
            // On successful authentication, commit the login mutation
            commit('login', user);
        },
        logout({ commit }) {
            // Perform logout actions if necessary
            commit('logout');
        },
    },
    getters: {
        isAuthenticated: state => state.isAuthenticated,
        currentUser: state => state.user,
    },
});
