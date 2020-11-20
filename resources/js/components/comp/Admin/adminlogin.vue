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
                    <button class="btn-vrify" v-if="!success" v-on:click="loginverify">
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
    import headerr from '../header/index'

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
            loginverify() {
                // console.log(phone)
                axios.post('/api/auth/loginverify', {
                        phone: this.phone,
                    }
                ).then(response => {
                    this.success = true
                }).catch(error => {
                    console.log(error)

                })
            },
            login()
            {
                let packet = {
                    otp: this.verify,
                    phone: this.phone
                }

                // console.log(otp)
                this.$store.dispatch('AUTH_REQUEST_login', packet)
                    .then(() => {
                        // console.log("yessssss registration")
                        // console.log(otp)
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
<!--
<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Erreur, impossible de se connecter avec ces identifiants.</p>
                </div>
                <div>
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" id="phone" class="form-control" placeholder="phone" v-model="phone" required>
                    </div>
                    <button type="submit" class="btn btn-default" v-on:click="loginverify()">Connexion</button>
                </div>
                <div v-if="success=== true">
                    <label for="verify">verify</label>
                    <input type="text" id="verify" class="form-control"
                           v-model="verify">
                    <button type="submit" class="btn btn-default" v-on:click="login">verify and login</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                phone:'',
                // email: null,
                // password: null,
                has_error: false,
                success: false,
                verify:''
            }
        },
        mounted() {
            //
        },
        methods: {
            loginverify() {
                // console.log(phone)
                axios.post('/api/auth/loginverify', {
                        phone: this.phone,
                    }
                ).then(response => {
                    console.log(response)
                    console.log("yessssss")
                    this.success = true
                }).catch(error => {
                    console.log(error)
                    console.log(error.response.data.errors)
                })
            },
            login()
            {
                let otp = this.verify
                console.log(otp)
                this.$store.dispatch('AUTH_REQUEST_login', {otp})
                    .then(() => {
                        console.log("yessssss registration")
                        console.log(otp)
                        this.$router.push('/')})
                    .catch(err => console.log(err))
                // axios.post('/api/auth/login', {
                //         otp: this.verify,
                //     }
                // ).then(response => {
                //     console.log(response)
                //     console.log("yessssss")
                // }).catch(error => {
                //     console.log(error)
                //     console.log(error.response.data.errors)
                //     app.has_error = true
                // })
            }
        }
    }
</script>-->
