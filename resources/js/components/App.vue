<template>
    <div>
       
        <div class="wrapper">
            <Sidebar @logout="logoutHandler" v-if="loggedIn"/>
            <div :class="`${loggedIn ? 'content' : 'content loggedIn'}`">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <router-link v-if="!loggedIn" class="navbar-brand" :to="{name: 'home'}">Home</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <template v-if="!loggedIn">
                            <li class="nav-item">
                             <router-link class="nav-link" :to="{name: 'login'}">Login</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{name: 'register'}">Register</router-link>
                            </li>
                        </template>
                        <template v-else>
                             <li class="nav-item mr-auto">
                                <button type="button" id="sidebarCollapse" class="btn">
                                     <svg height="24" class="menu nav-icons" viewBox="0 0 16 16" version="1.1" width="24" aria-hidden="true"><path fill-re="evenodd" d="M1 2.75A.75.75 0 011.75 2h12.5a.75.75 0 110 1.5H1.75A.75.75 0 011 2.75zm0 5A.75.75 0 011.75 7h12.5a.75.75 0 110 1.5H1.75A.75.75 0 011 7.75zM1.75 12a.75.75 0 100 1.5h12.5a.75.75 0 100-1.5H1.75z"></path></svg>
                                </button>
                             </li>
                           
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{name: 'dashboard'}">Dashboard</router-link>
                            </li>
                             <li class="nav-item">
                                <a href="" class="nav-link msg-link">
                                    <svg class="notification nav-icons" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path></svg>
                                    <span id="notification-ball"></span>
                                </a>
                            </li>
                             <!-- <router-link class="nav-link" :to="{name: 'dashboard'}">Logout</router-link> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img v-if="getAuthUser" class="avatar" :src="getAuthUser.avatar" alt="">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item">Signed in as <strong v-if="getAuthUser">{{getAuthUser.name}}</strong></span>
                                    <div class="dropdown-divider"></div>
                                    <a @click.prevent="logoutHandler" class="logout nav-link" href="#">Logout</a>
                                </div>
                            </li>

                        </template>
                    </ul>
                </div>
                </nav>
                <router-view @signedIn="change"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import Sidebar from './Sidebar'
export default {
    name: 'app',
    components: {
        Sidebar
    },
    data(){
        return{
           loggedIn: localStorage.getItem('coursesDB.token') != null
        }
    },
    computed: {
        ...mapGetters([
            'getAuthUser'
        ]),
    },
    methods: {
        ...mapActions([
            'signOut'
        ]),
        async logoutHandler(){
            // localStorage.removeItem('coursesDB.token')
            // localStorage.removeItem('coursesDB.user')
           
            await this.signOut()
            // console.log('log state in logouthandler A', this.loggedIn )
            this.change()
            this.$router.replace('/')
            
        },
        change(){
            // console.log(this.loggedIn, !this.loggedIn)
            this.loggedIn =  !this.loggedIn
            // console.log('log state in change', this.loggedIn )
        }
    },
    mounted(){
       if(localStorage.getItem('coursesDB.token') === null && this.$route.name !== 'login'){
            this.$router.replace('/login')
       }
        let externalScript = document.createElement('script')
        externalScript.setAttribute('src', '/js/scrollbar.js')
        document.head.appendChild(externalScript)
    }
}
</script>

<style>
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
    .content{
        margin-left: 250px;
        transition: all 0.3s;
        flex: 1;
    }
    @media (max-width: 768px) {
        .content{
            margin: 0
        }
    }
    .content.active{
        margin-left: 0px;
    }
    .content.loggedIn{
        margin-left: 0px;
    }
    .dropdown-menu{
        right: 0;
        left: auto;
    }
    .navbar-dark .navbar-nav .nav-link,
    .navbar-dark .navbar-brand {
        color: rgba(255, 255, 255, 0.8);
    }
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-brand:hover {
        color: rgba(255, 255, 255, 1);
    }
    .navbar-dark .navbar-nav .nav-link.logout{
        color: #222;
        cursor: pointer;
    }
    .navbar-dark .navbar-nav .nav-link.logout:hover{
        color: #222;
    }
    .navbar-nav {
       flex: 1;
       justify-content: flex-end;
    }
    .dropdown-menu .nav-link{
        padding-left: 1.5rem;
    }
    .navbar-expand-lg .navbar-nav {
        align-items: center;
    }
    .avatar{
        width: 32px;
        height: 32px;
        border-radius: 50%;
    }
    #sidebarCollapse:focus{
        border: none;
        box-shadow: none;
    }
    #sidebarCollapse svg,
    .msg-link svg{
        fill: rgba(255, 255, 255, 0.8);
    }
    #sidebarCollapse svg:hover,
    .msg-link svg:hover{
        fill: rgba(255, 255, 255, 1);
    }
    .msg-link{
        position: relative;
    }
    .msg-link:after{
        content: 'You have unread notifications';
        position: absolute;
        background-color:#24292e;
        font-size: 12px;
        line-height: 18px;
        width: 170px;
        right: 0;
        top: 140%;
        padding: 4px;
        border-radius: 6px;
        text-align: center;
        font-weight: 300;
        color: #fff;
        font-family: 'Segoe UI';
        display: none;
    }
    .msg-link:hover:after{
        display: block;
    }
    #notification-ball{
        position: absolute;
        top: 3px;
        right: 4px;
        z-index: 20;
        width: 14px;
        height: 14px;
        color: #fff;
        background-image: linear-gradient(#ff5457,#ed0096);
        background-clip: padding-box;
        border: 2px solid#343a40;
        border-radius: 50%;
    }
    .page-item.active .page-link {
    background-color:#7386d5;
    border-color: rgba(115, 134, 213, 1);
  }
  .page-item.active .page-link:hover {
    background-color:rgba(115, 134, 213, 0.8);
    border-color: rgba(115, 134, 213, 0.8);
  }
  .pagination {
    margin-top: 30px;
    justify-content: center;
  }
  .page-item.pagination-page-nav{
      width: 40px;
      height: 40px;
      text-align: center;
  }
  span.dropdown-item{
      padding-left: 8px;
  }
    
</style>