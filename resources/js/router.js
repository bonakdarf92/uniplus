import Vue from 'vue'
import Router from 'vue-router'
import store from './store'

Vue.use(Router)


const ifNotAuthenticated = (to, from, next) => {
    if (!store.getters.isAuthenticated) {
        next()
        return
    }
    next('/')
}
const ifAuthenticated = (to, from, next) => {
    if (store.getters.isAuthenticated) {
        next()
        return
    }
    next('/login')
}

export default new Router({
    // mode: 'history',
    // hash: false,
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('./components/Home.vue')
        },
        {
            path: '/register',
            name: 'registration',
            component: ()=> import('./components/registration.vue'),
            beforeEnter: ifNotAuthenticated,
            meta: {
                auth: false
            }
        },
        {
            path: '/login',
            name: 'login',
            component: ()=> import('./components/login.vue'),
            beforeEnter: ifNotAuthenticated,
            meta: {
                auth: false
            }
        },
        {
            path: '/showTeezer/:category_id/:slug',
            name: 'showteeezer4',
            component: ()=> import('./components/showTeezer.vue'),
            meta: {
                auth: false
            }
        },
        {
            path: '/product/:category_id/:fake_id',
            name: 'showteeezer',
            component: ()=> import('./components/showTeezer.vue'),
            meta: {
                auth: false
            }
        },
        {
            path: '/profile/:user_id',
            name: 'userprofile',
            component: ()=> import('./components/comp/profile/UserProfile.vue'),
            meta: {
                auth: false
            }
        },
        {
            path: '/showlist/:category_id',
            name: 'showlist',
            component: ()=> import('./components/comp/lists/showlist.vue'),
            meta: {
                auth: false
            }
        },
        {
            path: '/profile/:user_id',
            name: 'UserProfile',
            component: ()=> import('./components/comp/profile/UserProfile.vue'),
            meta: {
                auth: false
            }
        },
        // USER ROUTES
        {
            path: '/myteezer',
            name: 'myteezer',
            component: ()=> import('./components/myTeezer.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true
            }
        },
        {
            path: '/editTeezer/:category_id/:slug',
            name: 'editteezer',
            component: ()=> import('./components/editTeezer.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true
            }
        },
        {
            path: '/contactUs',
            name: 'contactus',
            component: ()=> import('./components/contactUs.vue'),

        },
        {
            path: '/aboutUs',
            name: 'aboutUs',
            component: ()=> import('./components/aboutUs.vue'),

        },
        {
            path: '/roles',
            name: 'roles',
            component: ()=> import('./components/roles.vue'),

        },
        // ADMIN ROUTES
        {
            path: '/admin/login',
            name: 'adminlogin',
            component: ()=> import('./components/comp/Admin/adminlogin.vue'),
            beforeEnter: ifNotAuthenticated,
            meta: {
                auth: false
            }
        },
        {
            path: '/admin/dashboord',
            name: 'admindashboard',
            component: ()=> import('./components/comp/Admin/adminteezerslist.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true

            }
        },
        { path: '/confirmteezer/:category_id/:slug',
            name: 'confirmteezer',
            component: ()=> import('./components/comp/Admin/confirmteezer.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true
            }
        },
        { path: '/AdminShowTeezer/:category_id/:slug',
            name: 'AdminShowTeezer',
            component: ()=> import('./components/comp/Admin/AdminShowTeezer.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true
            }
        },
        {
            path: '/createTeezer',
            name: 'create',
            component: ()=> import('./components/createTeezer.vue'),
            beforeEnter: ifAuthenticated,
            meta: {
                auth: true

            }
        },
    ]
})
