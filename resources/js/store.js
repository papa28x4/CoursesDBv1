import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        token: null,
        user: null,
        students: [],
        student: {},
        courses: {},
        dashboard_stats: {},
        std_courses: []
    },
    getters: {
        getAuthUser(state){
            return state.user
        },
        getStudents(state){
            return state.students
        },
        getStudent(state){
            return state.student
        },
        getCourses(state){
            return state.courses
        },
        getDashboardStats(state){
            return state.dashboard_stats
        },
        getStdCourses(state){
            return state.std_courses
        }
    },
    mutations: {
        SET_TOKEN(state, token){
            state.token = token
        },
        SET_USER(state, user){
            state.user = user
        },
        SET_STUDENTS(state, students){
            state.students = students
        },
        SET_SINGLE_STUDENT(state, student){
            state.student = student
        },
        SET_COURSES(state, courses){
            state.courses = courses
        },
        SET_DASHBOARD_STATS(state, stats){
            state.dashboard_stats = stats
        },
        SET_SINGLE_STUDENT_COURSES(state, courses){
            state.std_courses = courses
        }
    },
    actions: {
        async registerUser({dispatch},formData){
            try{
                const response = await axios.post('/api/admin/register', formData)
                if(response.status === 201){
                    await dispatch('setUserProfile', response.data)         
                    return response;
                }
            }catch(e){
                return e.response
            }
           
        },
        async loginUser({dispatch}, formData){
            try{
                const response = await axios.post('/api/admin/login', formData)
                if(response.status === 200){
                    await dispatch('setUserProfile', response.data)
                    return response;
                }
            }catch(e){
                // if(e.response.status === 400){
                //     for (let error in e.response.data.error){
                //         console.log(e.response.data.error[error][0])
                //     }
                // }
                return e.response
            }
        },
        async signOut({commit}){
            try{
                const response = await axios.get('/api/admin/logout', {
                    headers: {
                         'Authorization': 'Bearer ' + localStorage.getItem('coursesDB.token')
                    }
                 })
                 localStorage.removeItem('coursesDB.token')
                 localStorage.removeItem('coursesDB.user')
                 commit('SET_TOKEN', null)
                 commit('SET_USER', null)
                
                 return response
            }catch(e){
                return e.response
            }
        },
        async setUserProfile({commit}, data){
            commit('SET_TOKEN', data.token)
            commit('SET_USER', data.user)
            localStorage.setItem('coursesDB.token', data.token)
            localStorage.setItem('coursesDB.user', JSON.stringify(data.user))
        },
        async fetchStudent({commit}, student_id){
            try{
                const response = await axios.get(`/api/admin/students/${student_id}`)
                console.log('fetch_std', response.data.courses)
                commit('SET_SINGLE_STUDENT', response.data.student)
                commit('SET_SINGLE_STUDENT_COURSES', response.data.courses)
                return response
            }catch(e){
                return e.response
            }
        },
        async fetchStudents({commit}){
            try{
                // const response = await axios.get('/api/admin/students', {
                //     headers: {
                //          'Authorization': 'Bearer ' + localStorage.getItem('coursesDB.token')
                //     }
                //  })
                const response = await axios.get('/api/admin/students')
                commit('SET_STUDENTS', response.data.students)
                return response
            }catch(e){
                return e.response
            }
        },
        async assignCoursesToStudent({dispatch}, data){
            console.log('assign triggered')
            try{
                const response = await axios.put(`/api/admin/course-list/${data.id}`, data)
                return dispatch('fetchStudent', data.id)

              }catch(e){
                 return e.response
              }
        },
        async fetchCourses({commit}, page=1){
            try{
                const response = await axios.get('/api/admin/courses?page=' + page)
                commit('SET_COURSES', response.data.courses)
                return response
            }catch(e){
                return e.response
            }
        },
        async addCourse({dispatch}, data){
            console.log('i triggered this action')
            try{
                const response = await axios.post('/api/admin/courses', data )
                return dispatch('fetchCourses')
            }catch(e){
                return e.response
            }
        },
        async updateCourse({dispatch}, data){
            try{
                const response = await axios.put(`/api/admin/courses/${data.id}`, data )
                return dispatch('fetchCourses')
            }catch(e){
                return e.response
            }
        },
        async deleteCourse({dispatch}, id){
            try{
                const response = await axios.delete(`/api/admin/courses/${id}`)
                return dispatch('fetchCourses')
            }catch(e){
                return e.response
            }
        },
        async fetchCurrentUser({commit}){
            
            if(localStorage.getItem('coursesDB.token') === null) return
            commit('SET_TOKEN', localStorage.getItem('coursesDB.token'))
            try{
                const response = await axios.get('/api/admin/me', {
                        headers: {
                             'Authorization': 'Bearer ' + localStorage.getItem('coursesDB.token')
                        }
                })
                if(response.status === 200){
                    // await dispatch('setUserProfile', response.data)
                    commit('SET_USER', response.data.user)
                    return response;
                }else{
                    console.log('Not 200')
                }
            }catch(e){
                console.log('I came to error')
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
                localStorage.removeItem('coursesDB.token')
                localStorage.removeItem('coursesDB.user')
            }
        },
        async fetchDashboardStats({commit}){
            try{
                const response = await axios.get('/api/admin/dashboard')
                console.log('ppp', response.data)
                commit('SET_DASHBOARD_STATS', response.data)
                return response
            }catch(e){
                return e.response
            }
        }
    }
})

export default store;