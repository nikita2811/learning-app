// store/index.js
import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
    state() {
        return {
            isAuthenticated: false,
            user: null,
        };
    },
    mutations: {
        SET_AUTHENTICATION(state, { isAuthenticated, user }) {
            state.isAuthenticated = isAuthenticated;
            state.user = user;
        },
    },
    actions: {
        async login({ commit }, credentials) {
            try {
                // Call your authentication API here
                const response = await axios.post('/api/login', credentials);
                const user = response.data.user;

                commit('SET_AUTHENTICATION', { isAuthenticated: true, user });

                // Optional: Save the token to localStorage or cookies
                // localStorage.setItem('token', response.data.token);

                return user;
            } catch (error) {
                // Handle authentication error
                console.error('Authentication failed:', error);
                throw error;
            }
        },
        async logout({ commit }) {
            try {
                // Call your logout API here (if needed)
                // await axios.post('/api/logout');

                commit('SET_AUTHENTICATION', { isAuthenticated: false, user: null });

                // Optional: Remove the token from localStorage or cookies
                // localStorage.removeItem('token');
            } catch (error) {
                // Handle logout error
                console.error('Logout failed:', error);
                throw error;
            }
        },
    },
    getters: {
        isAuthenticated: (state) => state.isAuthenticated,
        currentUser: (state) => state.user,
    },
});
