<template>

    <div class="MyProfile">
        <div class="container rtl ">

            <form v-show="this.showForm1">
                <div class="row">
                    <div class="col-12 pt-3 " >
                        <div class="sub-title">
                            <span class="bg-body px-2">کد معرف</span>
                        </div>
                        <div class="text-title">
                            {{user.identify_id}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3 " >
                        <div class="sub-title">
                            <span class="bg-body px-2">نام</span>
                        </div>
                        <div class="text-title">
                            {{user.name}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2"> نام خانوادگی</span>
                        </div>
                        <div class="text-title">
                            {{user.lastname}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">شهر</span>
                        </div>
                        <div class="text-title">
                            {{user.city}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">دانشگاه</span>
                        </div>
                        <div class="text-title">
                            {{user.university}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">کارشناسی</span>
                        </div>
                        <div class="text-title">
                            {{user.karshenasi}}
                        </div>
                    </div>
                </div>
                <div class="row" v-show="user.arshad">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">کارشناسی ارشد</span>
                        </div>
                        <div class="text-title">
                            {{user.arshad}}
                        </div>
                    </div>
                </div>
                <div class="row" v-show="user.doctora">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">دکتری</span>
                        </div>
                        <div class="text-title">
                            {{user.doctora}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-3" >
                        <div class="sub-title">
                            <span class="bg-body px-2">توضیحات تکمیلی</span>
                        </div>
                        <div class="text-title">{{user.description}}</div>
                    </div>
                </div>
                <br>
            </form>

            <form class="" @submit.prevent="submit()" v-show="this.showForm2">
                <div class="row">
                    <div class="col-12 pt-3 " >
                        <div class="sub-title">
                            <span class="bg-body px-2">کد معرف</span>
                        </div>
                        <div class="text-title">
                            {{user.identify_id}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">نام</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="name" :class="styleName"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
<!--                    <div class="col-25">-->
<!--                        <label for="name">نام*</label>-->
<!--                    </div>-->
<!--                    <div class="col-75">-->
<!--                        <input :class="styleName" type="text" id="name" name="name" placeholder="صادق" v-model="name"-->
<!--                               :disabled="disable">-->
<!--                    </div>-->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">نام خانوادگی</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="lastName" :class="styleLastName"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">شهر</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="cityName" :class="styleCityName"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">دانشگاه</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="universityName" :class="styleUniName"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">کارشناسی</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="karshenasi" :class="styleKarshenasi"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                    <div class="col-1  col-sm-1">
                        <div class="input-group-append col-25">
                            <button class="btn btn-outline-secondary" type="button" @click="addingInputArshad"
                                    :disabled="disable">
                                اضافه
                            </button>
                        </div>
                    </div>

                </div>
                <div class="row" v-show="showInputArshad">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">کارشناسی ارشد</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="arshad" :class="styleKarshenasi"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                    <div class="col-1  col-sm-1">
                        <div class="input-group-append col-25">
                            <button class="btn btn-outline-secondary" type="button" @click="addingInputDoctora"
                                    :disabled="disable">اضافه
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row" v-show="showInputDoctori">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">دکتری</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="doctori" :class="styleKarshenasi"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <label class="radioLabel">خانوم</label>
                        <input type="radio" value="true" v-model="profileGender" :disabled="disable">
                    </div>
                    <div class="col-6 text-center">
                        <label class="radioLabel">آقا</label>
                        <input type="radio" value="false" v-model="profileGender" :disabled="disable">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="label-create">
                            <span class="bg-body px-2">توضیحات تکمیلی</span>
                        </div>
                        <div
                            class="my-input-box"
                        >
                            <input
                                v-model="profileDescription" :class="styleKarshenasi"
                                class="my-input-create"
                                :disabled="disable" />
                        </div>
                    </div>
                </div>
                <br>
                <p class="alert-danger text-center">{{feedback}}</p>
                <div class="row">
                    <input class="btn-lg form-control submit" type="submit" value="ثبت" :disabled="disable">
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    // import Index from "../lists/showlist";

    import $ from "jquery";

    export default {
        name: "MyProfile",

        data() {
            return {
                name: null,
                lastName: null,
                cityName: null,
                universityName: null,
                karshenasi: null,
                arshad: null,
                doctori: null,
                profileGender: null,
                profileDescription: null,
                showInputArshad: false,
                showInputDoctori: false,
                feedback: null,

                disable: false,
                showForm1: false,
                showForm2: true,

                styleName: null,
                styleLastName: null,
                styleCityName: null,
                styleUniName: null,
                styleKarshenasi: null,
                user:{
                    name:"",
                    city:"",
                    lastname:"",
                    university:"",
                    karshenasi:"",
                    arshad:"",
                    doctora:"",
                    description:"",
                    identify_id:""
                }

            }
        },
        mounted()
        {
            this.getuser()
            $("html,body").animate({scrollTop: 0}, 1000);

        },
        methods: {
            getuser(){

                axios.get('/api/auth/user').then(response => {
                    if (response.data.data.name) {
                            this.showForm1=true
                            this.showForm2=false
                        this.user=response.data.data
                    }else {
                        this.showForm2=true
                        this.showForm1=false
                        this.user=response.data.data
                    }
                }).catch(err => {
                    console.log(err.response)
                })
            },
            addingInputArshad() {
                this.showInputArshad = true;
            },
            addingInputDoctora() {
                this.showInputDoctori = true;
            },
            submit() {
                if (this.name === null || this.lastName === null || this.cityName === null
                    || this.universityName === null || this.karshenasi === null ||
                    this.profileGender === null) {
                    this.feedback = "جاهای خالی را پر کنید";
                    if (this.name === null) {
                        this.styleName = "border-danger rounded";
                    } else {
                        this.styleName = ""
                    }
                    if (this.lastName === null) {
                        this.styleLastName = "border-danger rounded";
                    } else {
                        this.styleLastName = ""
                    }
                    if (this.cityName === null) {
                        this.styleCityName = "border-danger rounded";
                    } else {
                        this.styleCityName = ""
                    }
                    if (this.universityName === null) {
                        this.styleUniName = "border-danger rounded";
                    } else {
                        this.styleUniName = ""
                    }
                    if (this.karshenasi === null) {
                        this.styleKarshenasi = "border-danger rounded";
                    } else {
                        this.styleKarshenasi = ""
                    }
                } else {
                    this.feedback = null;
                    let pGender = false;
                    if (this.profileGender === "true") {
                        pGender = 0;
                    } else {
                        pGender = 1;
                    }

                    axios.post('/api/SaveUserInfo', {
                        name: this.name,
                        lastname: this.lastName,
                        city: this.cityName,
                        university: this.universityName,
                        karshenasi: this.karshenasi,
                        arshad: this.arshad,
                        doctora: this.doctori,
                        description: this.profileDescription,
                        gender: pGender

                    }).then(response => {
                        this.getuser()
                        $("html,body").animate({scrollTop: 0}, 1000);

                    } ).catch(err => {
                        console.log(err.response)
                    })
                }
            }
        },
    }
</script>


<style scoped>
    .MyProfile {
        height: 1200px;
    }

    .radioLabel {
        float: none;
        text-align: center;
    }

    textarea {
        float: right;
        width: 100%;
    }

    /* Style inputs, select elements and textareas */
    input[type=text] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: vertical;
    }

    /* Style the label to display next to the inputs */
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        float: right;
        text-align: right;
    }

    /* Style the submit button */
    input[type=submit] {
        background-color: darkcyan;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    /* Style the container */
    .container {
        width: 50%;
        background-color: #F9F9F9;
        padding: 20px;
    }

    /* Floating column for labels: 25% width */
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    /* Floating column for inputs: 75% width */
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    .col-60 {
        float: left;
        width: 50%;
        margin-top: 6px;
    }

    /* Floating column for add icon:*/
    .addIcon {
        width: 100% !important;
        height: auto;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

</style>
