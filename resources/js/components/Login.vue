<template>
    <div class="login container">
        <h1 class="mb-4">Login</h1>
        <form @submit.prevent="submitHandler">
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email" v-model="form.email">
              <small></small>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="form.password">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>
            <button  type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name: 'login',
    data(){
        return{
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
      ...mapActions([
          'loginUser'
      ]),
      async submitHandler(){
        const res = await this.loginUser(this.form)
        if(res.status === 200){
          this.$emit('signedIn')
          this.$router.replace('/dashboard')
        }else{

        }
      }
    }
}
</script>

<style scoped>
  .container.login{
    width:500px;
    border: 1px solid #777;
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
    padding: 32px;
    margin-top: 100px;
    color: #fff;
  }
  input{
    background-color: #777;
  }
</style>