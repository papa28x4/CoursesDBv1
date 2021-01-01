import Vue from 'vue';
import Router from 'vue-router';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import Dashboard from './components/Dashboard';
import Student from './components/Student';
import Students from './components/Students';
import Courses from './components/Courses';
import NotFound from './components/NotFound.vue'

Vue.use(Router);

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard'
    },
    {
        path: '/students',
        component: Students,
        name: 'students'
    },
    {
        path: '/courses',
        component: Courses,
        name: 'courses'
    },
    {
        path: '/students/:id',
        component: Student,
        name: 'student'
    },
    {
        path: '*',
        component: NotFound,
        name: '404'
    }
];

export default new Router({
    routes,
    mode: 'history'
})