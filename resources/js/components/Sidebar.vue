<template>
  
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header d-flex">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 102.5 102.5" style="enable-background:new 0 0 102.5 102.5;" xml:space="preserve">
                <g>
                    <g>
                        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-14.647" y1="27.6825" x2="656.5567" y2="27.6825">
                            <stop  offset="1.502404e-03" style="stop-color:#FFFFFF"/>
                            <stop  offset="1" style="stop-color:#FFFFFF"/>
                        </linearGradient>
                        <path class="st0" d="M100.2,24L53.1,0.4c-1.2-0.6-2.5-0.6-3.7,0L2.3,24C0.9,24.7,0,26.1,0,27.7s0.9,3,2.3,3.7l47.1,23.5
                            c0.6,0.3,1.2,0.4,1.9,0.4c0.6,0,1.3-0.1,1.9-0.4l47.1-23.5c1.4-0.7,2.3-2.1,2.3-3.7C102.5,26.1,101.6,24.7,100.2,24z M51.2,46.6
                            L13.4,27.7L51.2,8.8l37.8,18.9L51.2,46.6z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="-14.647" y1="86.5418" x2="656.5567" y2="86.5418">
                            <stop  offset="1.502404e-03" style="stop-color:#FFFFFF"/>
                            <stop  offset="1" style="stop-color:#FFFFFF"/>
                        </linearGradient>
                        <path class="st1" d="M102,72.9c-1-2-3.5-2.9-5.6-1.9L51.2,93.7L6,71.1c-2-1-4.5-0.2-5.6,1.9c-1,2-0.2,4.5,1.9,5.6L49.4,102
                            c0.6,0.3,1.2,0.4,1.9,0.4c0.6,0,1.3-0.1,1.9-0.4l47.1-23.5C102.2,77.4,103,75,102,72.9z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-14.647" y1="62.9979" x2="656.5567" y2="62.9979">
                            <stop  offset="1.502404e-03" style="stop-color:#FFFFFF"/>
                            <stop  offset="1" style="stop-color:#FFFFFF"/>
                        </linearGradient>
                        <path class="st2" d="M102,49.4c-1-2-3.5-2.9-5.6-1.9L51.2,70.1L6,47.5c-2-1-4.5-0.2-5.6,1.9c-1,2-0.2,4.5,1.9,5.6l47.1,23.5
                            c0.6,0.3,1.2,0.4,1.9,0.4c0.6,0,1.3-0.1,1.9-0.4l47.1-23.5C102.2,53.9,103,51.4,102,49.4z"/>
                    </g>
                </g>
            </svg>
            <h4 class="ml-2">CoursesDB</h4>
        </div>

        <ul class="list-unstyled components">
            <div class="media" v-if="getAuthUser">
                <img class="side-avatar mr-3" :src="getAuthUser.avatar" alt="">
                <div class="media-body align-self-center text-secondary">
                    <h5 class="mt-0 mb-1 text-white">{{getAuthUser.name}}</h5>
                    {{getAuthUser.is_admin ? 'Admin' : 'Student'}}
                </div>
            </div>
             <li :class="`${this.$route.name === 'dashboard' ? 'active': ''}`">
                <router-link :to="{name: 'dashboard'}" >Dashboard</router-link>
            </li>
             <li :class="`${this.$route.name === 'students' ? 'active': ''}`">
                <router-link :to="{name: 'students'}" >Students</router-link>
            </li>
             <li :class="`${this.$route.name === 'courses' ? 'active': ''}`">
                <router-link :to="{name: 'courses'}" >Courses</router-link>
            </li>
            <li >
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Security</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Roles</a>
                    </li>
                    <li>
                        <a href="#">Permissions</a>
                    </li>
                    <li>
                        <a href="#">Assignations</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>

    </nav>
    <!-- Page Content -->
 
</template>

<script>
import { mapGetters } from 'vuex'
export default {
   name: 'sidebar',
   computed: {
       ...mapGetters([
           'getAuthUser'
       ])
   },
   mounted(){
       
   }
}
</script>

<style scoped>
h4{
    font-size: 26px;
    line-height: 32px;
}
.media{
    padding-left: 16px;
    padding-bottom: 20px;
}
.media-body, 
.media-body h5{
    line-height: 100%
}
.side-avatar{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
SVG{
  height: 30px;
}

.st0{fill:url(#SVGID_1_);}
.st1{fill:url(#SVGID_2_);}
.st2{fill:url(#SVGID_3_);}
	
p {
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 16px 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px 10px 10px 16px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}


#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 999;
    /* background: #7386D5; */
    background: #343a40 !important;
    color: #fff;
    transition: all 0.3s;
}
#sidebar.active {
    margin-left: -250px;
}
a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}
</style>