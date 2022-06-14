<template>
    <loading-view :loading="loading">
        <heading class="mb-6 font-bold bg-green-500 p-4 text-white rounded " >Contest List</heading>
        <div  class="container mx-auto">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="mt-6" v-for="row in contest" :key="row.id" @click="viewSubmission(row.id)">
                    <div  class=" bg-white rounded border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center py-6">
                            <img  class="mb-3 w-36 h-36 rounded shadow-lg object-cover" :src="row.coverPhoto" :alt="row.name">
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{row.name}}</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </loading-view>
</template>

<script>

export default {
    metaInfo() {
        return {
          title: 'Event submission',
        }
    },

    data(){
        return{
            contest:null,
            modalOpen: false,
            selectedImg:null,
            name:null,
            url:null,
            loading: true,
        }
    },
    created() {
        this.url = Nova.config.url;
        this.fetchContest();
        this.loading = false;
    },

    methods: {
        viewSubmission(id){
            this.$router.push('/contest-submission/'+ id);
        },

       async fetchContest(){
            const  {data}  = await Nova.request().get(
                "/nova-vendor/contest-submission"
            );
           this.contest = data;
       }
    }

}
</script>

<style>
/* Scoped Styles */
</style>
