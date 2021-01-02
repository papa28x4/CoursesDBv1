<template>
  <div class="student-wrapper">
      <div class="_input_field space mt-3 d-flex justify-content-start assign">
          <Button  @click="showModal()" > <span class="mr-1">+</span> Assign Courses</Button>
      </div>
      <div class="mt-3 d-flex">
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                  <div class="text-center"> 
                      <img :src="getStudent.details.avatar" class="rounded-circle" width="150">
                      <h4 class="card-title mt-3">{{getStudent.details.name}}</h4>
                      <p class="card-subtitle">{{getStudent.details.department}}</p>
                      <div>
                         <span class="stats ml-1">
                          <a href="javascript:void(0)" class="link"><font class="font-medium mr-1">{{getStudent.courses ? getStudent.courses.length : 0 }}</font>{{getStudent.courses.length === 1 ? 'Course' : 'Courses'}}</a>
                          <a href="javascript:void(0)" class="link"><font class="font-medium mr-1">{{getStudent.credits ? getStudent.credits : 0 }}</font>{{getStudent.credits.length === 1 ? 'Credit' : 'Credits'}}</a>
                        </span>
                      </div>
                  </div>
              </div>
              <hr class="mb-0"> 
              <div class="card-body text-center"> 
                  <small class="text-muted d-block">Email address </small>
                  <h6>{{getStudent.details.email}}</h6>                   
              </div>
          </div>
      </div>
      <div class="col-md-6">
         <div class="card" style="width: 18rem;">
            <div class="card-header">
              Courses
               
            </div>
            <ul class="list-group list-group-flush">
              <li v-for="course in getStudent.details.courses" :key="course.id" class="list-group-item">{{course.title}} <span style="color:#2b85e4">({{course.units}})</span></li>
            </ul>   
        </div>
      </div>
      
      <Modal
					v-model="modal"
					title="Add/Remove Courses"
					:mask-closable="false"
					:closable="true"
				>
  
          <Select  v-model="data.courses" filterable multiple placeholder="Select course">
            <Option v-for="course in courses" :key="course.id" :value="course.id">{{course.title}} ({{course.units}})</Option>
          </Select>
          <div class="space"></div>

					<div slot="footer">
					  <div class="_input_field space">
                <Button @click="update" :loading="isUpdating" :disabled="isUpdating">{{isUpdating ? "Updating..." : "Update Course" }}</Button>
            </div>
					</div>
				</Modal>
  </div>
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
        modal: false
      }
    },
    computed:{
      ...mapGetters([
        'getStudent',
      ])
    },
    methods:{
      ...mapActions([
        'fetchStudent',
        'assignCoursesToStudent'
      ]),
      showModal(course){
        this.modal=true
      },
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
          this.modal=false
        }
    },
    async created(){
        this.data.id = this.$route.params.id
        await this.fetchStudent(this.data.id)
        this.fetchCourses()
        this.data.courses = this.getStudent.courses
    }
}
</script>

<style scoped>
  .assign{
    padding-left: 16px;
  }
  .student-wrapper{
    padding: 0 32px 0 16px;
  }
  .stats{
    display: flex;
    justify-content: center;
  }
  .stats a{
    margin: 15px 20px;
    color: #6c757d;
  }
  .stats a font{
    color:#2b85e4;
    font-weight: 600;
  }
</style>