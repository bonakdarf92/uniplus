<template>
    <div style="background-color: #f2f2f2 !important;">
        <headerr></headerr>

        <div class="loading" v-show="loading">
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="notif" v-show="wrongNum">
            <div class="alert alert-danger text-right" role="alert">شماره موبایل خود را به درستی وارد کنید</div>
        </div>

        <div class="notif" v-show="dosentExist">
            <div class="alert alert-danger text-right" role="alert">شماره موبایل در پایگاه داده موجود نیست</div>
        </div>

        <div class="notif" v-show="success_send">
            <div class="alert alert-success text-right" role="alert">پیامک با موفقیت ارسال شد</div>
        </div>

        <div class="notif" v-show="wrongCode">
            <div class="alert alert-danger text-right" role="alert">کد وارد شده درست نمی باشد</div>
        </div>

        <div class="notif" v-show="ratelimit">
            <div class="alert alert-danger text-right" role="alert">شما بیش تر از حد مجاز وارد شده اید. لطفا یک دقیقه
                صبر کنید
            </div>
        </div>

        <div class="notif" v-show="error_delay">
            <div class="alert alert-danger text-right" role="alert">مدت زمان کد شما منقضی شده است. لطفا مجدد برای دریافت
                کد اقدام کنید
            </div>
        </div>

        <div class="col-12"
             :class="[(wrongNum || dosentExist || success_send || wrongCode || ratelimit || error_delay) ? 'pt5-sm' : 'pt5']">
            <div class="login-box">
                <div class="col-12 m-auto title-box p-0">
                    <div class="col-12 pt-3 pb-2">
                        <h3 class="text-center">ورود به یونی پلاس</h3>
                    </div>
                </div>
                <div class="col-12 m-auto">
                    <div class="col-12 mt-4">
                        <div class="label-create">
                            <span class="bg-white px-2">شماره موبایل</span>
                        </div>
                        <div class="my-input-box">
                            <div class="row">
                                <div class="col-10">
                                    <input
                                        class="my-input-create"
                                        v-model="phone"
                                        placeholder="شماره موبایل خود را وارد کنید "
                                    />
                                </div>
                                <div class="col-2 text-success" v-show="(/^(\+98|0)?9\d{9}$/.test(phone))">
                                    <i class="fas fa-check float-left pt-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" v-if="success=== true">
                        <div class="label-create">
                            <span class="bg-white px-2">کد اعتبارسنجی</span>
                        </div>
                        <div class="my-input-box">
                            <input class="my-input-create" v-model="verify" placeholder="کد پیامک شده را وارد کنید"/>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <button class="btn-vrify" v-if="!success" v-on:click="loginverify">
                            دریافت کد فعال سازی
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn-vrify" v-if="success=== true" v-on:click="login">
                            ورود
                            <i class="fas fa-check"></i>
                        </button>
                    </div>

                    <div class="col-12 rtl">
                        <h6 class="text-center pt-4 cursor-d">عضو نیستی؟
                            <span class=" text-sormei cursor-p" v-on:click="goToReg">ثبت نام کن</span>
                        </h6>
                    </div>

                </div>
            </div>
        </div>

        <footerr></footerr>
    </div>
</template>
<script>
    import headerr from "./comp/header";
    import footerr from './comp/footer/index';
    import $ from "jquery";

    export default {
        components: {
            headerr,
            footerr
        },
        data() {
            return {
                loading: false,
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                has_error: false,
                error: "",
                errors: {},
                success: false,
                phone: "",
                verify: "",
                wrongNum: false,
                dosentExist: false,
                wrongCode: false,
                error_delay: false,
                ratelimit: false,
                success_send: false
            };
        },
        methods: {
            loginverify() {
                var app = this;

                if (/^(\+98|0)?9\d{9}$/.test(this.phone)) {
                    this.loading = true;
                    axios
                        .post("/api/auth/loginverify", {
                            phone: this.phone
                        })
                        .then(response => {
                            if (response.data.status === "failed. user doesnt in db") {
                                app.dosentExist = true;
                                this.loading = false;
                                setTimeout(function () {
                                    // console.log("#####");
                                    app.dosentExist = !app.dosentExist;
                                }, 5000);
                            } else {
                                this.success = true;
                                app.success_send = true;
                                this.loading = false;
                                setTimeout(function () {
                                    app.success_send = !app.success_send;
                                }, 5000);
                            }
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                } else {
                    this.wrongNum = true;
                    setTimeout(function () {
                        app.wrongNum = !app.wrongNum;
                    }, 5000);
                }
            },
            login() {
                var app = this;
                this.loading = true;
                let packet = {
                    otp: this.verify,
                    phone: this.phone
                }

                this.$store
                    .dispatch("AUTH_REQUEST_login", packet)
                    .then(() => {
                        this.loading = false;
                        this.$router.push("/");
                    })
                    .catch(err => {
                            console.log(err.message)
                            if (err.message === "Request failed with status code 429") {
                                app.ratelimit = true;
                                this.loading = false;
                                setTimeout(function () {
                                    app.ratelimit = !app.ratelimit;
                                }, 5000);
                            }
                            if (err.message === "Request failed with status code 401") {
                                app.error_delay = true;
                                this.loading = false;
                                setTimeout(function () {
                                    app.error_delay = !app.error_delay;
                                }, 5000);
                            }
                            if (err.message === "Request failed with status code 402") {
                                this.wrongCode = true;
                                this.loading = false;
                                setTimeout(function () {
                                    app.wrongCode = !app.wrongCode;
                                }, 5000);
                            }
                        }
                    );

            },
            goToReg: function () {
                this.$router.replace({name: 'registration'})
            }
        },
        created() {
            $("html,body").animate({scrollTop: 0}, 1000);
        }

    };
</script>

<style>



</style>
