<template>
  <div class="dashboard">
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <router-link class="card-router" :to="{name: 'students'}" >
            <div class="card-body">
              <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
              <h4 class="font-weight-normal mb-3">Students <i class="fas fa-user-graduate"></i>
              </h4>
              <h2 class="mb-5">{{getDashboardStats.students}}</h2>
              <h6 class="card-text">Decreased by 10%</h6>
            </div>
            </router-link>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <router-link class="card-router" :to="{name: 'admins'}" >
            <div class="card-body">
              <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
              <h4 class="font-weight-normal mb-3">Admins <i class="fas fa-user-shield"></i>
              </h4>
              <h2 class="mb-5">{{getDashboardStats.admins}}</h2>
              <h6 class="card-text">Decreased by 10%</h6>
            </div>
          </router-link>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <router-link class="card-router" :to="{name: 'courses'}" >
            <div class="card-body">
              <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
              <h4 class="font-weight-normal mb-3">Courses <i class="fas fa-book-open"></i>
              </h4>
              <h2 class="mb-5">{{getDashboardStats.courses}}</h2>
              <h6 class="card-text">Increased by 5%</h6>
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    name: 'dashboard',
    computed: {
        ...mapGetters([
            'getDashboardStats'
        ])
    },
    methods: {
         ...mapActions([
            'fetchDashboardStats'
        ])
    },
    created(){
      this.fetchDashboardStats()
    }
}
</script>

<style scoped>
  .dashboard{
    padding: 32px;
  }
  .stretch-card {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: stretch;
    -ms-flex-align: stretch; 
    align-items: stretch;
    -webkit-box-pack: stretch;
    -ms-flex-pack: stretch;
    justify-content: stretch;
    margin-bottom: 32px;
  }
  .card.card-img-holder {
    position: relative;
    border: 0;
  }
  .stretch-card > .card {
    width: 100%;
    min-width: 100%;
  }
  .card-router{
    color: #fff;
  }
  .bg-gradient-danger {
      background: linear-gradient(to right, #ffbf96, #fe7096) !important;
  }
  .bg-gradient-info {
      background: linear-gradient(to right, #90caf9, #047edf 99%) !important;
  }
  .bg-gradient-success {
      background: linear-gradient(to right, #84d9d2, #07cdae) !important;
  }
  .card.card-img-holder .card-img-absolute {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
  }
  h4 i{
    float: right;
  }
</style>