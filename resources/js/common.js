// import { mapGetters } from 'vuex'
export default{
    data(){
        return{

        }
    },
    methods: {
        info(desc, title="Hey"){
            this.$Notice.info({
                title: title,
                desc: desc
            });
        },
        success(desc, title="Great!"){
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        warning(desc, title="Caution!"){
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        error(desc, title="Ooops!"){
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        swr(desc='Something went wrong! Please try again', title="Ooops!"){
            this.$Notice.error({
                title: title,
                desc: desc
            });
        }
    },
    computed: {
        // ...mapGetters([
        //     'loggedInUser',
        //     'userPermissions'
        //  ]),
        // canAdd(){
        //     for(let permission of this.userPermissions){
        //         if(permission['name'] === this.$route.name){
        //             return permission['write']
        //         }
        //     }
        // },
        // canEdit(){
        //     for(let permission of this.userPermissions){
        //         if(permission['name'] === this.$route.name){
        //             return permission['update']
        //         }
        //     }
        // },
        // canDelete(){
        //     for(let permission of this.userPermissions){
        //         if(permission['name'] === this.$route.name){
        //             return permission['delete']
        //         }
        //     }
        // }
    }
}