import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        teezers: {
            slug: '',
            category_id: '',
            id: '',
            title: '',
            price: '',
            created_at: '',
        },
        page: {
            current_page: '',
            last_page: '',
            next_page_url: '',
            prev_page_url: '',
            last_page_num: ''
        },
        searchbox: {
            category: '',
            title: '',
            city: '',
            uni: '',

        },
        profile: {
            name: null,
            lastName: null,
            cityName: null,
            universityName: null,
            karshenasi: null,
            arshad: null,
            doctori: null,
            profileGender: null,
            profileDescription: null,

        },
        token: localStorage.getItem('user-token') || '',
        searchindex: '',
        status: '',
        user: {},
        // counter:localStorage.getItem('user-token')
    },
    mutations: {
        AUTH_REQUEST(state) {
            state.status = 'loading'
        },
        AUTH_SUCCESS(state, token) {
            state.status = 'success'
            state.token = token
        },
        AUTH_ERROR(state) {
            state.status = 'error'
        }
    },
    actions: {
        AUTH_REQUEST({commit, dispatch}, user) {
            return new Promise((resolve, reject) => {
                commit('AUTH_REQUEST')
                axios({url: '/api/auth/registerlogin', data: user, method: 'POST'})
                    .then(resp => {
                        const token = resp.data.token
                        localStorage.setItem('user-token', 'Bearer ' + token)
                        // Add the following line:
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
                        commit('AUTH_SUCCESS', resp)
                        // dispatch(USER_REQUEST)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('AUTH_ERROR', err)
                        localStorage.removeItem('user-token')
                        reject(err)
                    })
            })
        },
        AUTH_REQUEST_login({commit, dispatch}, user) {
            return new Promise((resolve, reject) => {
                commit('AUTH_REQUEST')
                axios({url: '/api/auth/login', data: user, method: 'POST'})
                    .then(resp => {
                        console.log(resp)
                        const token = resp.data.token
                        localStorage.setItem('user-token', 'Bearer ' + token)
                        // Add the following line:
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
                        commit('AUTH_SUCCESS', resp)
                        // dispatch(USER_REQUEST)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('AUTH_ERROR', err)
                        localStorage.removeItem('user-token')
                        reject(err)
                    })
            })
        },
        AUTH_LOGOUT({commit, dispatch}) {
            return new Promise((resolve, reject) => {
                commit('AUTH_LOGOUT')
                localStorage.removeItem('user-token')
                // remove the axios default header
                delete axios.defaults.headers.common['Authorization']
                resolve()
            })
        }
    },

    getters: {
        isAuthenticated: state => !!state.token,
        authStatus: state => state.status,
    }
})
