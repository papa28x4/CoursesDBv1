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
        name: 'home',
        meta: { title: 'Home' }
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: { title: 'Login' }
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
        meta: { title: 'Register' }
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: { title: 'Dashboard' }
    },
    {
        path: '/students',
        component: Students,
        name: 'students',
        meta: { title: 'Students' }
    },
    {
        path: '/courses',
        component: Courses,
        name: 'courses',
        meta: { title: 'Courses' }
    },
    {
        path: '/students/:id',
        component: Student,
        name: 'student',
        meta: { title: 'Student' }
    },
    {
        path: '*',
        component: NotFound,
        name: '404',
        meta: { title: '404' }
    }
];



export default new Router({
    routes,
    mode: 'history'
})