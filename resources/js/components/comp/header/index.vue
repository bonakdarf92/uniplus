<template>
    <div id="myHead">
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple rtl fixed-top">
            <div class="row col-lg-10 col-md-12 m-auto p-0 pad-header">
                <img src="../../../../../public/logo2.png" class="tezeer-logo"/>
                <button class="nav-toggler" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item" v-on:click="goToMyTeezer">
                            <h6 class="header-btn text-right" href="#" v-if="isLoggedIn"  >یونی پلاس من</h6>
                        </li>
                        <li class="nav-item" v-on:click="goToHome">
                            <h6 class="header-btn text-right"  href="#">تمام آگهی ها</h6>
                        </li>
                        <li class="nav-item" v-if="!isLoggedIn">
                            <h6 class="header-btn text-right"  v-if="!isLoggedIn" v-on:click="loginbtn" href="#">ورود</h6>
                        </li>
                        <li class="nav-item" v-if="!isLoggedIn">
                            <h6 class="header-btn text-right"  v-if="!isLoggedIn" v-on:click="registerbtn" href="#">ثبت نام</h6>
                        </li>
                        <li class="nav-item">
                            <h6 class="header-btn text-right" v-if="isLoggedIn" v-on:click="logoutbtn">خروج</h6>
                        </li>
                        <li class="nav-item">
                            <h6 class="header-btn text-right pl-0" v-if="isLoggedIn">{{this.phone}}</h6>
                        </li>
                        <!--<li class="nav-item mt-1 mb-2">
                            <h6 class="add-tezeer text-right f-r-a-t" v-on:click="goToCreate" href="#">تیزر بزن +</h6>
                        </li>-->
                    </ul>
                </div>
                <img src="../../../../../public/logo2.png" class="tezeer-logo-small-device"/>
            </div>
        </nav>

    </div>
</template>

<script>
    // import Vue from 'vue'
    export default {
        computed : {
            isLoggedIn : function(){
                return this.$store.getters.isAuthenticated
            }
        },
        name: "index",
        data(){
            return{
                phone:'',
                isLogin:''
            }
        },
        methods: {
            goToCreate: function () {
                // console.log("create")
                this.$router.replace({name: 'create',})
            },
            goToHome: function () {
                this.$router.replace({name: 'home',})
            },
            goToMyTeezer: function () {
                this.$router.replace({name: 'myteezer',})
            },
            loginbtn: function () {
                this.$router.replace({name: 'login'})
            },
            registerbtn: function () {
                this.$router.replace({name: 'registration'})
            },
            logoutbtn: function () {
                this.$store.dispatch('AUTH_LOGOUT')
                    .then(() => {
                        window.location.assign('/')
                    })
            },
            user: function () {
                axios.get('/api/auth/user').then(response => {

                }).catch(error => {
                    console.log(error)

                    app.has_error = true
                })
            },
            contactus: function () {
                this.$router.replace({name: 'contactus'})
            },
        },
        created: function () {
            axios.interceptors.response.use(undefined, function (err) {
                return new Promise(function (resolve, reject) {
                    if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
                        // if you ever get an unauthorized, logout the user
                        this.$store.dispatch(AUTH_LOGOUT)
                        // you can also redirect to /login if needed !
                    }
                    throw err;
                });
            });
            if(this.isLoggedIn){
                axios.get('/api/auth/user'
                ).then(response => {

                    this.phone=response.data.data.phone

                }).catch(error => {
                    console.log(error)
                })
            }

        }

    }
</script>

<style>

    .tezeer-logo{
        display: block !important;
    }

    .tezeer-logo-small-device{
        display: none !important;
    }

    @media (max-width: 992px) {
        .tezeer-logo{
            display: none !important;
        }

        .tezeer-logo-small-device{
            display: block !important;
            width: 40px;
            height: 40px;
            position: absolute;
            top: 5px;
            left: 5px;
        }
    }

    /* .tezeer-logo {
         width: 60px;
         height: 63px;
     }

     @media (max-width: 992px) {
         .tezeer-logo {
             width: 75px;
             height: 70px;
         }
     }*/
</style>

