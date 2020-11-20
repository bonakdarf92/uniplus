<template>

    <div id="tezeer-search-box" class="">

        <div class="col-sm-12 col-md-10 col-lg-8 m-auto big-search">
            <div class="row rtl">
                <!--   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">-->
                <div class="col-lg-4 col-md-6 px-1">
                    <input type="text" class="my-input" v-model="searchbox.title" placeholder="متن خود را جست و جو کنید"/>
                </div>
                <div class="col-lg-2 col-md-6 px-1">
                    <select class="my-select-search" v-model="searchbox.category">
                        <option value="">همه موضوعات</option>
                        <option value="3">هم سفر</option>
                        <option value="5"> هم خونه</option>
                        <option value="2">وسایل خونه</option>
                        <option value="1">کتاب و جزوه</option>
                        <option value="4">پروژه و مقاله</option>
                        <option value="6">تدریس</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 px-1">
                    <select name="city" id="city" class="my-select-search "  data-dependent="university2" v-on:change="getuni()" v-model="searchbox.city">
                        <option value="">همه شهر ها</option>
                        <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 px-1">
                    <select name="uni2" id="uni2" class="my-select-search "  data-dependent="university2" v-on:change="getuni()" v-model="searchbox.uni">
                        <option value="">همه دانشگاه ها</option>
                        <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                    </select>

                </div>
                <div class="col-lg-2 col-md-4 p-0">
                    <div class="col-12 p-0 m-auto">
                        <div class="col-12 text-center p-0">
                            <button type="button" class="find-btn" v-on:click="search">  <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="small-search col-12 p-2">
            <div class="row rtl m-auto">
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="my-input" placeholder="متن خود را جست و جو کنید"/>
                </div>
                <div class="col-md-3 col-sm-6">
                    <button class="small-search-btn" v-on:click="search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="col-md-3 col-sm-6">
                    <button class="small-search-btn" type="button" data-toggle="collapse" data-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample" v-on:click="changeAdvance">
                        فیلتر های بیشتر
                        <i class="fas fa-sort-down" v-show="advanceOption"></i>
                        <i class="fas fa-sort-up" v-show="!advanceOption"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="col-12">
                    <div class="row rtl">
                        <div class="col-lg-2 col-md-4">
                            <select class="my-select-search" v-model="searchbox.category">
                                <option value="">همه موضوعات</option>
                                <option value="3">هم سفر</option>
                                <option value="5"> هم خونه</option>
                                <option value="2">وسایل خونه</option>
                                <option value="1">کتاب و جزوه</option>
                                <option value="4">پروژه و مقاله</option>
                                <option value="6">تدریس</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <select name="city" id="city2" class="my-select-search dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="searchbox.city">
                                <option value="">همه شهر ها</option>
                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <select name="uni" id="uni" class="my-select-search "  data-dependent="university2" v-on:change="getuni()" v-model="searchbox.uni">
                                <option value="">همه دانشگاه ها</option>
                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    export default {
        name: "index",
        data() {
            return {
                cities:{
                    city:'',
                },
                unis:{
                    university:'',
                },
                advanceOption: true,
                searchbox:{
                    title:'',
                    city:'',
                    uni:'',
                    category:'',
                },
            }
        },
        mounted()
        {
            this.getcites()
            this.getunis()
        },
        methods: {
            getuni(){
                axios.post("/api/unis",
                    {
                        city: this.searchbox.city
                    }
                )
                    .then(response => {
                        this.unis=response.data
                    })
                    .catch(error => {
                    });
            },
            getunis(){
                axios.get('/api/allunis').then(response => {
                    this.unis=response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            getcites() {
                axios.get('/api/cities').then(response => {
                    this.cities=response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            changeAdvance: function () {
                this.advanceOption = !this.advanceOption;
            },
            search(){
                axios.post("/api/product/search",this.searchbox).then(response => {

                    this.$store.state.teezers=[]

                    this.$store.state.searchindex=0

                    this.$store.state.searchbox.uni=''
                    this.$store.state.searchbox.city=''
                    this.$store.state.searchbox.title=''
                    this.$store.state.searchbox.category=''

                    this.$store.state.page.current_page= ''
                    this.$store.state.page.last_page=''
                    this.$store.state.page.next_page_url=''
                    this.$store.state.page.prev_page_url= ''
                    this.$store.state.page.last_page_num= ''

                    if( response.data.data.length === 0 ) {
                        this.showTeezers = "nothing"

                    } else {

                        this.$store.state.searchindex=1
                        this.$store.state.teezers=response.data.data

                        this.$store.state.searchbox.uni=this.searchbox.uni
                        this.$store.state.searchbox.city=this.searchbox.city
                        this.$store.state.searchbox.title=this.searchbox.title
                        this.$store.state.searchbox.category=this.searchbox.category

                        this.$store.state.page.current_page= response.data.meta.current_page,
                            this.$store.state.page.last_page=response.data.links.last,
                            this.$store.state.page.next_page_url= response.data.links.next,
                            this.$store.state.page.prev_page_url= response.data.links.prev,
                            this.$store.state.page.last_page_num= response.data.meta.last_page

                    }
                }).catch(error => {
                    console.log(error)
                })
            }
        }

    }
</script>

<style>

    .big-search {
        border-radius: 10px;
        background-color: rgba(255,255,255,0.6);
        padding: 20px 30px !important;
    }

    .small-search {
        display: none;
    }

    @media (max-width: 991px) {
        .big-search {
            display: none;
        }

        .small-search {
            display: block !important;
            border-radius: 10px;
            background-color: rgba(255,255,255,0.6);
            padding: 20px 20px !important;
        }
    }

    @media (max-width: 575px) {
        .small-search {
            margin-top: 60px;
        }
    }
</style>
