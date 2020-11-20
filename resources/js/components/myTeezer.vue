<template>
    <div class="margin-myteezer">
        <headers></headers>

        <!-- Awards Modal -->
        <div class="modal fade" id="awardModel" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel1"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-right" v-show="Awardstate=='1'">
                        تبریک! شما جایزه خود را انتخاب کردید. بعد از اتمام کامل کرونا منتظر تماس ما باشید
                    </div>
                    <div class="modal-body text-right" v-show="Awardstate=='2'">
                        متاسفیم! شما جایزه خود را قبلا انتخاب کرده اید
                    </div>
                    <div class="modal-footer float-right ">
                        <button type="button" class="btn btn-secondary  delete-btn-no"
                                data-dismiss="modal">باشه
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-right">
                        آیا برای حذف آگهی مطمئن هستید؟
                    </div>
                    <div class="modal-footer float-right ">
                        <button type="button" class="btn btn-secondary  delete-btn-no"
                                data-dismiss="modal">خیر
                        </button>
                        <button type="button" v-on:click="deleteproduct(deleteModal)"
                                class="btn btn-primary delete-btn-yes">
                            بله
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 p-0">
            <div class="col-sm-12 col-md-10 col-lg-8 m-auto p-0">
                <!--Buttons-->
                <div class="col-12">
                    <div class="br-myTeezer">
                        <div class="text-center">
                            <button
                            class="myTeezer-btn"
                            :class="{'myTeezer-btn-active' : activeProfile}"
                            name="myProfile"
                            v-on:click="isActivedProfile"
                        >پروفایل من
                        </button>
                            <button
                                class="myTeezer-btn"
                                :class="{'myTeezer-btn-active' : activeLike}"
                                name="like"
                                v-on:click="isActivedLike"
                            >علاقه مندی ها
                            </button>
                            <button
                                class="myTeezer-btn"
                                :class="{'myTeezer-btn-active' : activeMy}"
                                name="myTeezer"
                                v-on:click="isActivedMy"
                            >آگهی های من
                            </button>
                            <button
                                class="myTeezer-btn"
                                :class="{'myTeezer-btn-active' : activeMyAward}"
                                name="myAward"
                                v-on:click="isActivedMyAward"
                            >جایزه های من
                            </button>
                        </div>
                    </div>
                </div>

                <!-- nothing to show -->
                <div class="col-12 mt-4" v-show="showTeezers === 'nothing'" style="height: 600px">
                    <h2 class="text-center rtl">آگهی موجود نیست!</h2>
                </div>
                <!-- user's profile-->
                <MyProfile v-show="showTeezers ==='profile'"/>

                <!-- Awards -->
                <div class="col-12 mt-4 mb-5" v-show="showTeezers === 'MyAward'"
                    >
                    <h4 class="text-center rtl">جایزه خود را انتخاب کنید.</h4>
                    <p class="text-center rtl">دقت داشته باشید در هر سطح فقط یک بار میتوانید جایزه خود را انتخاب کنید</p>
                    <p class="text-center rtl">سطح امتیاز شما:{{this.total_score}} </p>
                    <div  :class="{'mb-less-product' : Awardproducts.length < 3}"
                          data-toggle="modal" data-target="#awardModel">
                        <div class="row rtl">
                            <div
                                v-for="(awd,index) in Awardproducts"
                                :key="index"
                                class="col-lg-4 col-md-6 col-sm-10 m-auto my-box-content a-none"
                            >

                                <div :id="awd.id" v-on:click="getAward(awd.id)">
                                    <div class="col-12 m-auto p-0">
                                        <div class="col-12 p-0 card m-auto">
                                            <img
                                                src="../../../public/award.jpg"
                                                class="image-card"
                                            />
                                        </div>
                                        <div class="col-12 p-0">
                                            <div class="col-11 card card-1 information-box">
                                                <div class="col-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-8 p-0">
                                                            <h5 class="text-right text-sormei rtl">{{ awd.title }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3 mb-1">
                                                    <div class="row">
                                                        <div class="col-6 p-0 text-right text-sormei">
                                                            سطح امتیاز:
                                                            {{ awd.score }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



                <!-- liked Teezer's -->
                <div class="col-12 mt-4 mb-5" v-show="showTeezers === 'liked'"
                     :class="{'mb-less-product' : likeproducts.length < 3}"
                >
                    <div class="row rtl">
                        <div
                            v-for="(product,index) in likeproducts"
                            :key="index"
                            class="col-lg-4 col-md-6 col-sm-10 m-auto my-box-content a-none"
                        >
                            <router-link v-bind:to="'/showTeezer/'+product.category_id+'/'+product.slug">
                                <div class="col-12 m-auto p-0">
                                    <div class="col-12 p-0 card m-auto">
                                        <img :src="product.image1" v-show="product.image1 !== null" class="image-card"/>
                                        <img
                                            src="../../../public/1.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 1"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/2.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 2"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/3.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 3"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/4.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 4"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/5.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 5"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/6.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 6"
                                            class="image-card"
                                        />
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="col-11 card card-1 information-box">
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-8 p-0">
                                                        <h5 class="text-right text-sormei rtl">{{ product.title }}</h5>
                                                    </div>
                                                    <div class="col-4 text-light br-myTeezerpink f-10">
                                                        <div
                                                            class="text-center rtl text-pink"
                                                            v-if="product.category_id === 1"
                                                        >کتاب و جزوه
                                                        </div>
                                                        <div class="text-center rtl text-pink"
                                                             v-if="product.category_id === 2">
                                                            وسایل خونه
                                                        </div>
                                                        <div class="text-center rtl text-pink"
                                                             v-if="product.category_id === 3">هم
                                                            مسیر
                                                        </div>
                                                        <div class="text-center rtl text-pink"
                                                             v-if="product.category_id === 4">
                                                            پروژه
                                                        </div>
                                                        <div class="text-center rtl text-pink"
                                                             v-if="product.category_id === 5">هم
                                                            خونه
                                                        </div>
                                                        <div class="text-center rtl text-pink"
                                                             v-if="product.category_id === 6">
                                                            تدریس
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <div class="col-8 p-0 col-4 badge text-light "
                                                         v-if="product.status==0">
                                                        <div class="text-right text-pink rtl">در انتظار تایید</div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 mt-3 mb-1">
                                                <div class="row">
                                                    <div class="col-6 p-0 text-right text-sormei">
                                                        <i class="fas fa-map-marker-alt text-new-red"></i>
                                                        {{ product.city }}
                                                    </div>
                                                    <div class="col-6 p-0 pt-1 text-sormei">
                                                        {{ product.university }}
                                                        <i class="fas fa-university text-new-red"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--         <div class="col-12 mt-2 mb-2">
                                                         <div class="row">
                                                             <div class="col-6 p-0 text-right text-sormei">
                                                                 <i class="far fa-calendar-alt pl-2 text-new-red"></i>
                                                                 {{ product.created_at}}
                                                             </div>
                                                             &lt;!&ndash;  <div class="col-6 p-0 pt-1 text-sormei f-12">
                                                                                           <h6 class="font-vazir">{{ product.price }} تومان</h6>
                                                             </div>&ndash;&gt;
                                                             <div class="col-6 p-0 pt-1 text-sormei f-12">
                                                                 <div v-if="product.price">{{product.price}} تومان</div>
                                                                 <div v-if="!product.price">توافقی</div>
                                                             </div>
                                                         </div>
                                                     </div>-->
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-sm-12 " style="padding-bottom: 5rem"
                         v-show="page2==='yes'">
                        <div class="col-lg-4 col-md-12 col-sm-12 m-auto text-center">
                            <div class="row" style="margin: 0 auto !important">
                                <button class="add-tezeer border-0 m-auto f-12 f-w-0"
                                        v-on:click="fetchPaginateProducts2(pagination.prev_page_url)"
                                        :disable="!pagination.prev_page_url">
                                    قبل
                                </button>
                                <span class="pt-2 m-auto">صفحه {{pagination.current_page}} از {{pagination.last_page_num}}</span>
                                <button class="add-tezeer border-0 m-auto f-12 f-w-0"
                                        v-on:click="fetchPaginateProducts2(pagination.next_page_url)"
                                        :disable="!pagination.next_page_url">
                                    بعد
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Teezer's -->
                <div class="col-12 mt-4 mb-5" v-show="showTeezers === 'myTeezer'"
                     :class="{'mb-less-product' : products.length < 3}"
                >
                    <div class="row rtl">
                        <div
                            v-for="(product,index) in products"
                            :key="index"
                            class="col-lg-4 col-md-6 col-sm-10 my-box-content a-none" style="margin: 0 auto !important;"
                        >

                            <div class="col-12 m-auto p-0">
                                <router-link v-bind:to="'/showTeezer/'+product.category_id+'/'+product.slug">
                                    <div class="col-12 p-0 card m-auto">
                                        <img :src="product.image1" v-show="product.image1 !== null" class="image-card"/>
                                        <img
                                            src="../../../public/1.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 1"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/2.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 2"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/3.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 3"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/4.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 4"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/5.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 5"
                                            class="image-card"
                                        />
                                        <img
                                            src="../../../public/6.jpg"
                                            v-show="product.image1 === null"
                                            v-if="product.category_id === 6"
                                            class="image-card"
                                        />
                                    </div>
                                </router-link>

                                <div class="col-12 p-0">
                                    <div class="col-11 card card-1 information-box">
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-8 p-0 a-none">
                                                    <router-link
                                                        v-bind:to="'/showTeezer/'+product.category_id+'/'+product.slug">
                                                        <h5 class="text-right text-sormei rtl">{{ product.title }}</h5>
                                                    </router-link>
                                                </div>
                                                <div class="col-4  text-light br-myTeezerpink f-10">
                                                    <div
                                                        class="text-center rtl text-pink"
                                                        v-if="product.category_id === 1"
                                                    >کتاب و جزوه
                                                    </div>
                                                    <div class="text-center rtl text-pink"
                                                         v-if="product.category_id === 2">
                                                        وسایل خونه
                                                    </div>
                                                    <div class="text-center rtl text-pink"
                                                         v-if="product.category_id === 3">هم
                                                        مسیر
                                                    </div>
                                                    <div class="text-center rtl text-pink"
                                                         v-if="product.category_id === 4">
                                                        پروژه
                                                    </div>
                                                    <div class="text-center rtl text-pink"
                                                         v-if="product.category_id === 5">هم
                                                        خونه
                                                    </div>
                                                    <div class="text-center rtl text-pink"
                                                         v-if="product.category_id === 6">
                                                        تدریس
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-8 p-0 col-4 badge text-light " v-if="product.status==0">
                                                    <div class="text-right text-pink rtl">در انتظار تایید</div>
                                                </div>
                                            </div>

                                        </div>

                                        <!--<div class="col-12 mt-3 mb-1">
                                            <div class="row">
                                                <div class="col-6 p-0 text-right text-sormei">
                                                    <i class="fas fa-map-marker-alt text-new-red"></i>
                                                    {{ product.city }}
                                                </div>
                                                <div class="col-6 p-0 pt-1 text-sormei rtl">

                                                    {{ product.university }}
                                                    <i class="fas fa-university text-new-red"></i>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--              <div class="col-12 mt-2 mb-2">
                                                          <div class="row">
                                                              <div class="col-6 p-0 text-right text-sormei">
                                                                  <i class="far fa-calendar-alt pl-2 text-new-red"></i>
                                                                  {{ product.created_at}}
                                                              </div>
                                                              <div class="col-6 p-0 pt-1 text-sormei f-12">
                                                                  <div v-if="product.price">{{product.price}} تومان</div>
                                                                  <div v-if="!product.price">توافقی</div>
                                                              </div>
                                                          </div>
                                                      </div>-->
                                        <!--       <div class="col-12 mb-1 p-0">
                                                                  <div class="col-auto float-right badge text-light bg-new-blue" v-show="product.status==0">
                                                                    در انتظار تایید
                                                                  </div>
                                        </div>-->
                                        <div class="col-12 p-0 ex1">
                                            <div class="row ">
                                                <div class="col-6 btn-edit a-none ">
                                                    <router-link
                                                        v-bind:to="'/editTeezer/'+product.category_id+'/'+product.slug"
                                                    >
                                                        <h6 class="text-center text-sormei  font-vazir pt-2 rtl">
                                                            <i class="far fa-edit"></i>
                                                            ویرایش

                                                        </h6>
                                                    </router-link>
                                                </div>
                                                <div
                                                    class="col-6 btn-del a-none"
                                                >
                                                    <button data-toggle="modal" data-target="#exampleModal"
                                                            v-on:click="deleteModal = product.id"
                                                            class="w-100 bg-transparent border-0 f-12 text-center text-sormei font-vazir pt-2 rtl">
                                                        <i class="fas fa-trash"></i>
                                                        حذف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-sm-12 " style="padding-bottom: 5rem"
                         v-show="page==='yes'">
                        <div class="col-lg-4 col-md-12 col-sm-12 m-auto text-center">
                            <div class="row" style="margin: 0 auto !important">
                                <button class="add-tezeer border-0 m-auto f-12 f-w-0"
                                        v-on:click="fetchPaginateProducts1(pagination.prev_page_url)"
                                        :disable="!pagination.prev_page_url">
                                    قبل
                                </button>
                                <span class="pt-2 m-auto">صفحه {{pagination.current_page}} از {{pagination.last_page_num}}</span>
                                <button class="add-tezeer border-0 m-auto f-12 f-w-0"
                                        v-on:click="fetchPaginateProducts1(pagination.next_page_url)"
                                        :disable="!pagination.next_page_url">
                                    بعد
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footerr></footerr>
    </div>
</template>

<script>
    import headers from "./comp/header/index";
    import footerr from "./comp/footer/index";
    import MyProfile from "./comp/profile/MyProfile";
    import $ from "jquery";

    export default {
        name: "my-teezer",
        components: {
            MyProfile,
            headers,
            footerr
        },
        data() {
            return {
                deleteModal: '',
                awardsModal: '',

                AwardClick: false,
                success: false,
                faild: false,
                Awardstate: 0,
                page: '',
                page2: '',
                url1: '/api/myteezervue',
                url2: '/api/myfavoritevue',
                url3: '/api/myawards',
                showpagination: '',
                pagination: [],
                showTeezers: "",
                activeMy: true,
                activeLike: false,
                activeMyAward: false,
                activeProfile: false,

                products: {
                    id: "",
                    title: "",
                    image1: "",
                    city: "",
                    university: "",
                    counter: "",
                    status: ""
                },
                likeproducts: {
                    title: "",
                    image1: "",
                    city: "",
                    university: "",
                    counter: ""
                },
                Awardproducts: {
                    id: "",
                    title: "",
                },
                total_score:"",
            };
        },
        mounted() {
            $("html,body").animate({scrollTop: 0}, 1000);
            axios
                .get(this.url1)
                .then(response => {
                    this.products = response.data.data;
                    this.makepagination1(response.data)

                    if (response.data.data.length === 0) {
                        this.showTeezers = "nothing"
                    } else {

                        if (response.data.data.length >= 18) {
                            this.page = "yes"
                        }
                        this.showTeezers = "myTeezer"
                    }
                })
                .catch(error => {
                    app.has_error = true;
                });
        },
        created() {
            $("html,body").animate({scrollTop: 0}, 1000);
        },

        methods: {
            fetchPaginateProducts1(url) {
                this.url1 = url
                this.isActivedMy()
                $("html,body").animate({scrollTop: 0}, 1000)

            },
            fetchPaginateProducts2(url) {
                this.url2 = url
                this.isActivedLike()
                $("html,body").animate({scrollTop: 0}, 1000)

            },
            deleteproduct: function (id) {
                let obj = {id: id};
                axios
                    .post("/api/deleteproduct", obj)
                    .then(response => {
                        window.location.reload();
                        axios
                            .get("/api/myteezer")
                            .then(response => {
                                this.products = response.data.data;
                            })
                            .catch(error => {
                                app.has_error = true;
                            });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            goToCreate: function () {
                this.$router.replace({name: "home"});
            },
            isActivedMy: function () {
                this.activeProfile = false;
                this.activeMyAward = false;
                this.activeMy = true;
                this.activeLike = false;
                axios
                    .get(this.url1)
                    .then(response => {
                        this.products = response.data.data;
                        this.makepagination1(response.data)
                        if (response.data.data.length === 0) {
                            this.showTeezers = "nothing"
                        } else {
                            if (response.data.data.length >= 18) {
                                this.page = "yes"
                            }
                            this.showTeezers = "myTeezer"
                        }
                    })
                    .catch(error => {

                        app.has_error = true;
                    });
            },
            isActivedProfile() {
                this.activeProfile = true;
                this.activeMyAward = false;
                this.activeMy = false;
                this.activeLike = false;
                this.showTeezers ="profile"
            },
            isActivedLike: function () {
                this.activeProfile = false;
                this.activeMyAward = false;
                this.activeMy = false;
                this.activeLike = true;

                axios
                    .get(this.url2)
                    .then(response => {
                        this.likeproducts = response.data.data;
                        this.makepagination1(response.data)

                        if (response.data.data.length === 0) {
                            this.showTeezers = "nothing"
                        } else {

                            if (response.data.data.length >= 18) {

                                this.page2 = "yes"
                            }
                            this.showTeezers = "liked"
                        }
                    })
                    .catch(error => {
                        app.has_error = true;
                    });
            },
            isActivedMyAward: function () {
                this.activeProfile = false;
                this.activeMyAward = true;
                this.activeMy = false;
                this.activeLike = false;
                axios
                    .get(this.url3)
                    .then(response => {
                        this.Awardproducts = response.data.data;
                        this.showTeezers = "MyAward"

                    })
                    .catch(error => {
                        app.has_error = true;
                    });
                    axios.get('/api/auth/user').then(response => {
                       this.total_score= response.data.data.total_score

                    }).catch(err => {
                        console.log(err.response)
                    })

            },
            getAward: function (id) {
                axios
                    .post('/api/getAward', {award: id})
                    .then(response => {
                        this.AwardClick = true
                        if (response.data == 'success') {
                            this.Awardstate = 1
                        } else {
                            this.Awardstate = 2
                        }
                    })
                    .catch(error => {
                        app.has_error = true;
                    });
            },
            awarDone: function () {
                console.log("ghj")
                console.log(this.Awardstate)
                this.Awardstate = 3
            },
            viewTeezer: function (x) {
                this.$router.push({name: "showTeezer", params: {city: x}});
            },

            makepagination1(data) {
                let pagination =
                    {
                        current_page: data.meta.current_page,
                        last_page: data.links.last,
                        next_page_url: data.links.next,
                        prev_page_url: data.links.prev,
                        last_page_num: data.meta.last_page
                    }
                this.pagination = pagination
            }
        }
    };
</script>

<style>

    .my-box-content {
        z-index: 0 !important;
    }

    .mb-less-product {
        margin-bottom: 16rem !important;
    }

    .margin-myteezer {
        margin-top: 5.4rem;
    }

    .my-box-content {
        z-index: 0 !important;
    }

    .modal-backdrop {
        z-index: 900;
    }

    .modal-backdrop.show {
        opacity: 0.3 !important;
    }
</style>
