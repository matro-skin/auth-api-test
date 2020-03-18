import VueRouter from 'vue-router'

// Pages
// import Home from './pages/Home'
// import About from './pages/About'
// import Register from './pages/Register'
// import Login from './pages/Login'
// import Dashboard from './pages/user/Dashboard'
// import AdminDashboard from './pages/admin/Dashboard'

// Routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import('./components/Home')
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('./components/Register'),
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('./components/Login'),
        meta: {
            auth: false
        }
    }
];

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
});

export default router
