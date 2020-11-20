<template>
    <div id="teezer-footer">
        <div class="col-lg-12 col-md-12 col-sm-12 bg-purple pb-2">
            <div class="row rtl footer-sm">
                <div class="col-lg-11 col-md-11 col-sm-11 m-auto card card-fo pb-4"
                     style="margin-top: -50px !important; border-radius: 0 !important;">
                    <div class="col-lg-10 col-md-11 col-sm-12 m-auto">
                        <div class="row p-0">
                            <div class="col-lg-2 col-md-12 col-sm-12 pt-3">
                                <div>
                                    <img src="../../../../../public/logo2.png" class="logo-iteezer"/>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="desc-teezer">
                                    <p class="cursor-d" align="justify">سامانه تحت وب و اپلیکیشن یونی پلاس، به عنوان اولین
                                        و تنها سامانه دانشجویی در کشور با اهداف
                                        مدیریت هزینه های دانشجویان در تهیه نیازشان طراحی شده است. دانشجویان می توانند به
                                        صورت رایگان نسبت به ثبت آگهی اقدام کنند و یا از بین آگهی های موجود به جستجوی
                                        آگهی مورد نظر خود بپردازند.</p>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12 col-sm-12 pt-3">
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <h6 class="text-right cursor-d">راه های ارتباطی با یونی پلاس</h6>

                                        <div class="row p-0 m-auto text-center">
                                            <div class="p-1">
                                                <a href="https://www.instagram.com/uniplus.app">
                                                    <img src="../../../../../public/social/instagram.svg"
                                                         class="social-svg"/>
                                                </a>
                                            </div>
                                            <div class="p-1 px-2">
                                                <a href="http://t.me/uniplus1">
                                                    <img src="../../../../../public/social/telegram.svg"
                                                         class="social-svg"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row p-0 mt-4 text-center">
                                            <div class="mt-1 a-none">
                                                    <a href="https://cafebazaar.ir/app/?id=app.uniplus&ref=share">
                                                        <img src="../../../../../public/bazar.png" class="logo-bazar"/>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <h6 class="text-right cursor-d">لینک های دیگر</h6>
                                        <div class="site-links">
                                            <div class="col-lg-12 col-sm-12 col-md-12" v-on:click="contactus">ارتباط با
                                                یونی پلاس
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12" v-on:click="aboutUs">درباره یونی پلاس

                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12" v-on:click="roles">قوانین یونی پلاس

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 pt-2">
                    <h5 class="policy-text cursor-d">تمام حقوق این سایت محفوظ و متعلق به گروه <b>یونی پلاس</b> می
                        باشد</h5>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        methods: {
            contactus: function () {
                this.$router.replace({name: 'contactus'})
            },
            aboutUs: function () {
                this.$router.replace({name: 'aboutUs'})
            },
            roles: function () {
                this.$router.replace({name: 'roles'})
            }
        }
    }
</script>
<style>
    @media (max-width: 991px) {
        .footer-sm {
            padding: 0 10px !important;
        }
    }

</style>
