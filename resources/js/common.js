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
        },
        formatDate(dateString){
            let date = "";
            let num = "";
            let currentYr = new Date().getFullYear()
            let timestamp = new Date(dateString).getTime() 
            if(timestamp + (28*86400000) < Date.now()){
                let z = new Date(timestamp).toDateString()
                let t = z.split(" ")
                let filteredT = t.filter((item, index)=> index !== 0)  
                filteredT.forEach((t,i)=> {
                    if(i===1){
                        date += " "
                    }else if(i===2){
                        if(currentYr === +t) return
                        date +=  ", "
                    }
                    date += t
                })
            }else if(Date.now()-timestamp < 60000){
                num = `${Math.floor((Date.now()-timestamp) / 1000)}`
                date = num > 1? `${num} seconds ago` : `${num} second ago`
            }else if(Date.now()-timestamp < 3600000){
                num = `${Math.floor((Date.now()-timestamp) / 60000)}`
                date = num > 1? `${num} minutes ago` : `${num} minute ago`
            }else if(Date.now()-timestamp < 86400000){
                num = `${Math.floor((Date.now()-timestamp) / 3600000)}`
                date = num > 1? `${num} hours ago` : `${num} hour ago`
            }else if(Date.now()-timestamp < (2*86400000)){
                date = `Yesterday`
            }else if(Date.now()-timestamp < 2419200000){
                num = `${Math.floor((Date.now()-timestamp) / 86400000)}`
                date = num > 1? `${num} days ago` : `${num} day ago`
            }
            return date
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