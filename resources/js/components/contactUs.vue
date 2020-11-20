<template>
    <div>
        <headers></headers>
        <div class="margin-create">

            <div class="">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h3 class="create-subject-title">ارتباط با ما</h3>
                    </div>

                    <div class="col-sm-12 col-md-10 col-lg-8 m-auto p-0">


                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 rtl text-right mt-5">
                                <h4 style="line-height: 2.2rem;">
                                    اگر پیشنهاد یا انتقادی دارید یا می‌خواهید ما را از وجود مشکلی در سیستم آگاه کنید، با یونی پلاس از طریق پل ارتباطی زیر در ارتباط باشید.
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Teezer information-->
                    <!--      <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                              <div class="row rtl">
                                  <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                      <div class="row rtl">
                                          <div class="col-6">
                                              <h4 class="divide-title pb-2">ارتباط با ما</h4>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>-->
                    <!--                    <div class="col-12 p-0 br-create-title"></div>-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-12">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نام و نام خانوادگی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changename"
                                             v-bind:class="{'border-danger' : this.errname }">
                                            <input class="my-input-create" v-model="contact.name" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">ایمیل</span>
                                </div>
                                <div class="my-input-box"  v-on:click="changeemail"
                                     v-bind:class="{'border-danger' : this.erremail }">
                                    <input class="my-input-create"  v-model="contact.email"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box"  v-on:click="changesubject"
                                     v-bind:class="{'border-danger' : this.errsubject }">
                                    <textarea class="create-desc"
                                              v-model="contact.description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <button class="send-teezer" v-on:click="create_book()">
                                ارسال
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footerr></footerr>

    </div>
</template>
<script>

    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'

    import headers from './comp/header/index'
    import footerr from './comp/footer/index'
    import $ from "jquery";
    export default {
        name: "createTeezer",
        components: {
            headers,
            footerr,
            datePicker: VuePersianDatetimePicker
        },
        data() {
            return {
                erremail: false,
                errname: false,
                errsubject: false,
                contact:
                    {
                        name:'',
                        email: '',
                        description: '',
                    },
            }
        },
        created() {
            $("html,body").animate({scrollTop: 0}, 1000);
        }
    ,
        methods: {
            changeemail: function () {
                this.erremail = false;
            },
            changename: function () {
                this.errname = false;
            },
            changesubject: function () {
                this.errsubject = false;
            },

            create_book() {
                if (this.contact.name === "") {
                    this.errname = true;
                }
                if (this.contact.email === "") {
                    this.erremail = true;
                }
                if (this.contact.description === "") {
                    this.errsubject = true;
                }
                if(   !this.errname &&
                    !this.erremail &&
                    !this.errsubject) {


                    // console.log(this.user.telegram)
                    axios.post('/api/contactUs', this.contact
                    ).then(response => {
                        this.$router.push('/')
                    }).catch(error => {
                        console.log(error)
                    })

                }},

        },

    }
</script>

<style scoped>

    .vpd-input-group > input{
        background-color: #faf3f3 !important;
    }
</style>


