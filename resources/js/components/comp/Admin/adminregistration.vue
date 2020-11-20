<template>

    <div class="margin-create">
        <headerr></headerr>

        <div class="col-12">

            <div class="col-lg-5 col-mg-8 col-sm-11 m-auto">
                <div class="col-12 pt-5">
                    <h4 class="text-center">لطفا شماره موبایل خود را وارد کنید</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-8 col-sm-11 m-auto">
                <div class="col-12">
                    <div class="label-create">
                        <span class="bg-body px-2">شماره موبایل</span>
                    </div>
                    <div class="my-input-box">
                        <input class="my-input-create" v-model="phone" placeholder="شماره موبایل خود را وارد کنید "/>
                    </div>
                </div>

                <div class="col-12" v-if="success=== true">
                    <div class="label-create">
                        <span class="bg-body px-2">کد اعتبارسنجی</span>
                    </div>
                    <div class="my-input-box">
                        <input class="my-input-create" v-model="verify" placeholder="کد پیامک شده را وارد کنید"/>
                    </div>
                </div>

                <div class="col-12 text-center pt-3">
                    <button class="btn-vrify" v-if="!success" v-on:click="register">
                        دریافت کد فعال سازی
                        <i class="fas fa-check"></i>
                    </button>
                    <button class="btn-vrify" v-if="success=== true" v-on:click="login">
                        فعال سازی
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import headerr from './adminheader'
    export default {
        components: {
            headerr
        },
        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                has_error: false,
                error: '',
                errors: {},
                success: false,
                phone: '',
                verify:'',
            }
        },
        methods: {
            register() {
                var app = this
                axios.post('/api/admin/register', {
                        phone: this.phone,
                    }
                ).then(response => {
                    app.success = true
                    // this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
                }).catch(error => {
                    console.log(error)
                    app.has_error = true
                })
            },
            login()
            {
                let otp = this.verify

                this.$store.dispatch('AUTH_REQUEST', {otp})
                    .then(() => {
                        this.$router.push('/admin/dashboord')
                    })
                    .catch(err => console.log(err))
            }

        }
    }
</script>

<style>
    .btn-vrify {
        direction: rtl;
        background-color: #faf3f3;
        color: #444444;
        padding: 0.7rem 1.2rem;
        border: 0.7px solid #f7dd43;
        transition: 0.4s background-color;
    }

    .btn-vrify:focus {
        outline: none;
    }

    .btn-vrify:hover {
        background-color: #f7dd43;
    }
</style>
