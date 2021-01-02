<template>
  <div class="home container text-center pt-5">
    <h1>Welcome To CoursesDB</h1>
  </div>
</template>

<script>
export default {
    name: 'home'
}
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
  .home{
    height: calc(100vh - 56px);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .home h1{
    margin-top: -80px;
    color: #fff;
    font-size: 56px;
    font-family: 'Courgette', cursive;
  }
</style>