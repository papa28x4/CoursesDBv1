<template>
  <div class="mt-5 d-flex">
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                  <div class="text-center"> 
                      <img :src="getStudent.avatar" class="rounded-circle" width="150">
                      <h4 class="card-title mt-3">{{getStudent.name}}</h4>
                      <p class="card-subtitle">{{getStudent.department}}</p>
                  </div>
              </div>
              <hr class="mb-0"> 
              <div class="card-body text-center"> 
                  <small class="text-muted d-block">Email address </small>
                  <h6>{{getStudent.email}}</h6>                   
              </div>
          </div>
      </div>
      <div class="col-md-6">
         <div class="card" style="width: 18rem;">
            <div class="card-header">
              Courses
                <span class="ml-1">
                  <a href="javascript:void(0)" class="link">(<font class="font-medium">{{getStudent.courses ? getStudent.courses.length : 0 }}</font>)</a>
                </span>
            </div>
            <ul class="list-group list-group-flush">
              <li v-for="course in getStudent.courses" :key="course.id" class="list-group-item">{{course.title}}</li>
            </ul>
            <Select  v-model="data.courses" filterable multiple placeholder="Select course">
              <Option v-for="course in courses" :key="course.id" :value="course.id">{{course.title}}</Option>
            </Select>
            <div class="space"></div>
            <div class="_input_field space">
                <Button @click="update" :loading="isUpdating" :disabled="isUpdating">{{isUpdating ? "Updating..." : "Update Course" }}</Button>
            </div>
        </div>
      </div>
       <!-- <div class="_input_field space">
            <Button @click="save" :loading="isUpdating" :disabled="isUpdating">{{isUpdating ? "Updating..." : "Update Blog" }}</Button>
      </div> -->
      
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: 'student',
    data(){
      return {
        data:{
          id: '',
          courses: []
        },
        courses: [],
        isUpdating: false,
      }
    },
    computed:{
      ...mapGetters([
        'getStudent',
        'getStdCourses'
      ])
    },
    methods:{
      ...mapActions([
        'fetchStudent',
        'assignCoursesToStudent'
      ]),
      async fetchCourses(){
            try{
                const response = await axios.get('/api/admin/course-list')
                this.courses = response.data.courses
            }catch(e){
                return e.response
            }
        },
      async update(){
          this.isUpdating = true;
          await this.assignCoursesToStudent(this.data)
          this.isUpdating = false;
        }
    },
    async created(){
      
        this.data.id = this.$route.params.id
        console.log(this.data.id, this.$route.params.id )
        await this.fetchStudent(this.data.id)
        this.fetchCourses()
        this.data.courses = this.getStdCourses
    }
}
</script>

<style>

</style>