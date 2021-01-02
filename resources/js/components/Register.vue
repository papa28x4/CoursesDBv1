<template>
    <div class="register container">
       <h1 class="mb-4">Register</h1>
        <form @submit.prevent="submitHandler">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" placeholder="Enter Name" id="name"  v-model="form.name">
            </div>
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email" v-model="form.email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="form.password">
            </div>
            <div class="form-group">
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="form.c_password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name: 'register',
    data(){
        return{
            form: {
                name: '',
                email: '',
                password: '',
                c_password: ''
            }
        }
    },
    methods: {
        ...mapActions([
          'registerUser'
      ]),
      async submitHandler(){
        const res = await this.registerUser(this.form)
        if(res.status === 201){
          this.$emit('signedIn')
          this.$router.replace('/dashboard')
        }else{

        }
      }
    }
}
</script>

<style scoped>
   .container.register{
    width:500px;
    border: 1px solid #777;
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
    padding: 32px;
    margin-top: 50px;
    color: #fff;
  }
</style>