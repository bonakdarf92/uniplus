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

        <div class="notif" v-show="has_error">
            <div class="alert alert-danger text-right" role="alert">شماره موبایل قبلا ثبت نام کرده است</div>
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

        <div class="notif" v-show="success_send">
            <div class="alert alert-success text-right" role="alert">پیامک با موفقیت ارسال شد</div>
        </div>

        <div class="notif" v-show="wrongCode">
            <div class="alert alert-danger text-right" role="alert">کد وارد شده درست نمی باشد</div>
        </div>

        <div class="col-12"
             :class="[(wrongNum || has_error || success_send || wrongCode || ratelimit || error_delay) ? 'pt5-sm' : 'pt5']">
            <div class="login-box">
                <div class="col-12 m-auto title-box p-0">
                    <div class="col-12 pt-3 pb-2">
                        <h3 class="text-center">ثبت نام در یونی پلاس</h3>
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
                                    <i class="fas fa-check float-left pt-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" v-if="success === true">
                        <div class="label-create">
                            <span class="bg-white px-2">کد اعتبارسنجی</span>
                        </div>
                        <div class="my-input-box">
                            <input class="my-input-create" v-model="verify" placeholder="کد پیامک شده را وارد کنید"/>
                        </div>
                    </div>
                    <div class="col-12" v-if="success === false">

                        <div class="label-create">
                            <span class="bg-white px-2">کد معرف (اختیاری)</span>
                        </div>
                        <div class="my-input-box">
                            <input class="my-input-create" v-model="identify" placeholder="کد معرف را وارد کنید"/>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-5">
                        <button class="btn-vrify " v-if="!success" v-on:click="register">
                            دریافت کد فعال سازی
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn-vrify" v-if="success=== true" v-on:click="login">
                            فعال سازی
                            <i class="fas fa-check"></i>
                        </button>
                    </div>

                    <div class="col-12 rtl">
                        <h6 class="text-center pt-4 cursor-d">اگه ثبت نام کردی،
                            <span class=" text-sormei cursor-p" v-on:click="goToLogin">وارد شو !</span>
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
    import footerr from './comp/footer/index'

    export default {
        components: {
            headerr,
            footerr,
        },
        data() {
            return {
                loading: false,
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                has_error: false,
                ratelimit: false,
                error_delay: false,
                error: "",
                errors: {},
                success: false,
                phone: "",
                verify: "",
                identify:"",

                wrongNum: false,
                wrongCode: false,
                success_send: false
            };
        },
        methods: {
            register() {
                var app = this;

                if (/^(\+98|0)?9\d{9}$/.test(this.phone)) {
                    this.loading = true;
                    axios
                        .post("/api/auth/register", {
                            phone: this.phone,
                            identify: this.identify
                        })
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                } else {
                    // console.log("phone uncorrect");
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
                    .dispatch("AUTH_REQUEST", packet)
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

            goToLogin: function () {
                this.$router.replace({name: 'login'})
            }
        }
    };
</script>

<style>
    .btn-vrify {
        direction: rtl;
        background-color: #7FD8D5;
        color: #ffffff;
        border-radius: 6px;
        padding: 0.7rem 1.2rem;
        border: 0.7px solid #ffffff;
        transition: 0.4s background-color;
    }

    .btn-vrify:focus {
        outline: none;
    }

    .btn-vrify:hover {
        color: white !important;
        background-color: #7FD8D5;
    }
</style>

