<template>
    <v-container fluid>
        <event-component></event-component>
    </v-container>
</template>
<script>
    import EventComponent from './EventComponent.vue'

    export default {
        data(){
            return {
                events:[]
            }
        },
        components:{
            EventComponent
        },
        methods:{
            // fetchEvents(){
            //     axios.get('/api/events')
            //     .then(response=>{
            //         console.log(response);
            //         this.events=response.data.data;
            //     })
            // }
        },
        mounted(){
            // this.fetchEvents();
        },
        created(){
        }
    }
</script>
