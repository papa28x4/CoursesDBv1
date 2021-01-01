<template>
  <div class="students">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Courses</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          
        <tr v-for="(student, index) in getStudents" :key="student.id">
          <th scope="row">{{index + 1}}</th>
          <td>{{student.name}}</td>
          <td>{{student.email}}</td>
          <td>{{student.courses.length}}</td>
          <td>
              <router-link :to="{path: `/students/${student.id}`}"><button class="btn btn-secondary">View</button></router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: 'students',
    computed: {
        ...mapGetters([
            'getStudents'
        ])
    },
    methods:{
        ...mapActions([
            'fetchStudents'
        ])
    },
    mounted(){
        this.fetchStudents()
    }
}
</script>

<style scoped>
  .students{
    margin: auto;
    margin-top: 48px;
    padding: 0 32px;
  }
  .students .table{
    border-color: #7386D5
  }
  .students .table thead{
     background-color: #7386D5;
     color: #fff;
  }

</style>