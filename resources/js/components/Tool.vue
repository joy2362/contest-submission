<template>
    <div>

        <div class="mt-6" v-for="row in contest" :key="row.id">

            <heading class="mb-6 font-bold bg-green-500 p-4 text-white rounded " >{{row.name}}
<!--                <a :href="downloadUrl(row.id)" class="float-right " disabled target="_blank" >-->
<!--                    <svg class="animate-bounce" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="var(&#45;&#45;sidebar-icon)"  class="heroicon-ui" d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"/></svg>-->
<!--                </a>-->
            </heading>
            <div v-if="row.submission && row.submission.length >0">

                <div v-if="row.type == 'photography'" class="container mx-auto">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                        <div class="" v-for="img in row.submission" :key="img.id">
                            <div  class=" bg-white rounded border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex flex-col items-center py-6">
                                    <img @click="setImgFullView(img.submission,img.sellerName)" class="mb-3 w-36 h-36 rounded shadow-lg object-cover" :src="img.submission" :alt="img.status">
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{img.sellerName}}
                                        <span v-if="img.position" class="text-green-600">{{img.position}}</span>
                                    </h5>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white" v-if="img.avgRating">{{img.avgRating}}</p>
                                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white" v-else >No rating yet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="container mx-auto">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                        <div class="" v-for="vid in row.submission " :key="vid.id">
                            <div  class=" bg-white rounded border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex flex-col items-center py-6">
                                    <video class="mb-3 w-36 h-36 rounded shadow-lg" loop autoplay muted controls>
                                        <source :src="vid.submission" type="video/mp4">
                                        Your browser does not support HTML video.
                                    </video>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{vid.sellerName}}
                                        <span v-if="vid.position" class="text-green-600">{{vid.position}}</span>
                                    </h5>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white" v-if="vid.avgRating">{{vid.avgRating}}</p>
                                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white" v-else >No rating yet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div v-else class="text-center"> No submission yet</div>

            <!-- Extra Large Modal -->
            <div id="img-view" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" v-if="modalOpen">
                <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                {{name}}
                            </h3>
                            <button @click="modalOpen= false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="extralarge-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <img class="max-w-full h-auto object-center" :src="selectedImg" :alt="name">
                        </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    metaInfo() {
        return {
          title: 'Contest submission',
        }
    },

    data(){
        return{
            contest:null,
            modalOpen: false,
            selectedImg:null,
            name:null,
            url:null,
        }
    },
    created() {
        this.contest = Nova.config.data.contest;
        this.url = Nova.config.data.url;
        console.log(this.contest);
    },

    methods: {
        setImgFullView(url,sellerName){
            this.selectedImg = url;
            this.name = sellerName;
            this.modalOpen = true;
        },
        downloadUrl(id) {
            return `${this.url}/api/contest/${id}/downloadFile`;
        },
    }

}
</script>

<style>
/* Scoped Styles */
</style>
