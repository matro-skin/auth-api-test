import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'

const config = {

    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'jwt-app-auth',
    tokenStore: [ 'localStorage' ],

    registerData: {
        url: 'auth/register',
        method: 'POST',
        redirect: '/login'
    },

    loginData: {
        url: 'auth/login',
        method: 'POST',
        redirect: '/',
        fetchUser: true
    },

    logoutData: {
        url: 'auth/logout',
        method: 'POST',
        redirect: '/',
        makeRequest: true
    },

    fetchData: {
        url: 'auth/me',
        method: 'GET',
        enabled: true
    },

    refreshData: {
        url: 'auth/refresh',
        method: 'GET',
        enabled: true,
        interval: 15
    }

};

export default config
