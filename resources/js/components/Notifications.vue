<template>
  <div class="notifications">
    <table class="table mx-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          
        <tr v-for="(notification, index) in getNotifications" :key="notification.id">
          <th scope="row">{{index + 1}}</th>
          <td> New Student, <strong>{{notification.data.name}}</strong>, signed up with <strong>{{notification.data.email}}</strong></td>
          <td>{{formatDate(notification.created_at)}}</td>
          <td>
              <router-link :to="{path: `/students/${notification.data.id}`}"><button class="btn btn-secondary">View</button></router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: 'notifications',
    data(){
        return{

        }
    },
    computed: {
        ...mapGetters([
            'getNotifications'
        ])
    },
    mounted(){
        console.log('noti', this.getNotifications)
    }
}
</script>

<style scoped>
  .notifications .table{
    box-sizing: border-box;
    width: calc(100% - 48px);
    color: #343a40;
  }
</style>