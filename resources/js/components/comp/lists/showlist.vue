<template>
    <div id="tezeer-content" class="margin-create">
        <headers/>
        <div>
            <div class="col-sm-12 col-md-10 col-lg-8 m-auto p-0 pl-1 pr-1 pt-3" style="padding-bottom: 5rem !important;">
                <div class="row rtl">
                    <div v-for="(product, index ) in this.$store.state.teezers" :key="index" class="col-lg-4 col-md-6 col-sm-12 mt-2 mb-2  a-none">
                        <router-link v-bind:to="'/showTeezer/'+product.category_id+'/'+product.slug">
                            <div class="col-12 m-auto p-0">
                                <div class=" col-12 p-0 card m-auto">
                                    <img :src="product.image1" v-show="product.image1 !== null" class="image-card">
                                    <img src="../../../../../public/1.jpg" v-show="product.image1 === null" v-if="product.category_id === 1" class="image-card">
                                    <img src="../../../../../public/2.jpg" v-show="product.image1 === null" v-if="product.category_id === 2" class="image-card">
                                    <img src="../../../../../public/3.jpg" v-show="product.image1 === null" v-if="product.category_id === 3" class="image-card">
                                    <img src="../../../../../public/4.jpg" v-show="product.image1 === null" v-if="product.category_id === 4" class="image-card">
                                    <img src="../../../../../public/5.jpg" v-show="product.image1 === null" v-if="product.category_id === 5" class="image-card">
                                    <img src="../../../../../public/6.jpg" v-show="product.image1 === null" v-if="product.category_id === 6" class="image-card">
                                </div>
                                <div class="col-12 p-0">
                                    <div class="col-11 card card-1 information-box">

                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col-8 p-0">
                                                    <h6 class="text-right text-sormei rtl">
                                                        {{ product.title }}
                                                    </h6>
                                                </div>
                                                <div class="col-4  text-light br-myTeezerpink f-10">
                                                    <div
                                                        class="text-center rtl text-pink"
                                                        v-if="product.category_id === 1"
                                                    >کتاب و جزوه
                                                    </div>
                                                    <div class="text-center rtl text-pink" v-if="product.category_id === 2">
                                                        وسایل خونه
                                                    </div>
                                                    <div class="text-center rtl text-pink" v-if="product.category_id === 3">هم
                                                        مسیر
                                                    </div>
                                                    <div class="text-center rtl text-pink" v-if="product.category_id === 4">
                                                        پروزه و مقاله
                                                    </div>
                                                    <div class="text-center rtl text-pink" v-if="product.category_id === 5">هم
                                                        خونه
                                                    </div>
                                                    <div class="text-center rtl text-pink" v-if="product.category_id === 6">
                                                        تدریس
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 mt-3 mb-1">
                                            <div class="row">
                                                <div class="col-6 p-0 text-right text-sormei f-10">
                                                    <i class="fas fa-map-marker-alt text-new-red"></i>
                                                    {{ product.city }}
                                                </div>
                                                <div class="col-6 p-0 pt-1 text-sormei f-10">
                                                    {{ product.university }}
                                                    <i class="fas fa-university text-new-red"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 mb-2">
                                            <div class="row">
                                                <div class="col-6 p-0 text-right text-sormei f-10">
                                                    <i class="far fa-calendar-alt pl-1 text-new-red"></i>{{ product.created_at}}
                                                </div>
                                                <div class="col-6 p-0 pt-1 text-sormei f-10">
                                                    <div v-if="product.price">{{product.price}} تومان</div>
                                                    <div v-if="!product.price">توافقی</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-sm-12 " style="padding-bottom: 5rem" v-show="this.$store.state.teezers.length >=19 || this.$store.state.page.last_page_num >= 2" >
                <div class="col-lg-4 col-md-12 col-sm-12 m-auto text-center">
                    <div class="row" style="margin: 0 auto !important">
                        <button class="add-tezeer border-0 m-auto f-12 f-w-0" v-on:click="fetchPaginateProductsback()"
                                :disable="! this.$store.state.page.prev_page_url">
                            قبل
                        </button>

                        <span class="pt-2 m-auto">صفحه {{ this.$store.state.page.current_page}} از {{ this.$store.state.page.last_page_num}}</span>
                        <button class="add-tezeer border-0 m-auto f-12 f-w-0" v-on:click="fetchPaginateProducts()"
                                :disable="! this.$store.state.page.next_page_url"  >
                            بعد
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4" style="height: 300px" v-show="this.$store.state.teezers.length ==0">
                <h1 class="text-center rtl"> آگهی موجود نیست!</h1>
            </div>
        </div>
        <footerr/>
    </div>
</template>

<script>
    import headers from '../../comp/header/index'
    import footerr from '../../comp/footer/index'

    import BackToTop from 'vue-backtotop'
    import $ from "jquery";

    export default {
        name: "index",
        components: {
            headers,
            footerr,
            BackToTop
        },
        watch: {
            category_id(newVal, oldVal){
                this.getProducts();
            },
        },
        data() {
            return {
                page:'',
                showpagination:'',
                views: true,
                product: {
                    id: '0',
                    title: '',
                    created_at: '',
                    category_id: '',
                    slug:'',
                    fake_id:''
                },
                url: '/api/'+this.$route.params.category_id,
                pagination: [],
            }
        },
        mounted() {
            this.$store.state.searchindex=0
        },
        methods: {
            fetchPaginateProducts() {
                if(this.$store.state.searchindex==0){
                    this.url = this.$store.state.page.next_page_url
                    this.getProducts()
                    $("html,body").animate({scrollTop: 0}, 1000)
                }
                else {
                    this.url = this.$store.state.page.next_page_url
                    this.getProductssearch()
                    $("html,body").animate({scrollTop: 0}, 1000)

                }
            },
            fetchPaginateProductsback() {
                if(this.$store.state.searchindex==0){
                    this.url = this.$store.state.page.prev_page_url
                    this.getProducts()
                    $("html,body").animate({scrollTop: 0}, 1000)
                }
                else {
                    this.url = this.$store.state.page.prev_page_url
                    this.getProductssearch()
                    $("html,body").animate({scrollTop: 0}, 1000)
                }
            },
            getProducts() {
                let $this = this
                axios.get(this.url).then(response => {

                    for (let i=0; i< response.data.data.length; i++){
                        if(response.data.data[i].price !== null){
                            const result = response.data.data[i].price
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            Vue.nextTick(() => (response.data.data[i].price = result));
                        }
                    }
                    this.$store.state.teezers=[]
                    this.$store.state.teezers=response.data.data
                    if(response.data.data.length >=18)
                    {
                        this.page="yes"
                    }
                    $this.makepagination(response.data)
                }).catch(error => {
                    console.log(error)
                })
            },
            getProductssearch() {
                let $this = this
                axios.post(this.url,this.$store.state.searchbox).then(response => {

                    for (let i=0; i< response.data.data.length; i++){
                        if(response.data.data[i].price !== null){
                            const result = response.data.data[i].price
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            Vue.nextTick(() => (response.data.data[i].price = result));
                        }
                    }
                    this.$store.state.teezers=[]
                    this.$store.state.teezers=response.data.data
                    if(response.data.data.length >=18)
                    {
                        this.page="yes"
                    }

                    $this.makepagination(response.data)
                }).catch(error => {
                    console.log(error)
                })
            },
            makepagination(data) {
                this.$store.state.page.current_page= data.meta.current_page,
                    this.$store.state.page.last_page=data.links.last,
                    this.$store.state.page.next_page_url= data.links.next,
                    this.$store.state.page.prev_page_url= data.links.prev,
                    this.$store.state.page.last_page_num= data.meta.last_page

            },
            change_tag: function () {
                this.views = !this.views;
            },
        },
        created(){
            this.getProducts()
            $("html,body").animate({scrollTop: 0}, 1000);
        },
    }
</script>

<style scoped>
    .active-tag {
        border-radius: 5px;
        background-color: #E76F51 !important;
        color: white !important;
    }

    @media (max-width: 576px) {
        .box-content {
            width: 95.8%;
            margin: 0 auto !important;
        }
    }

</style>
