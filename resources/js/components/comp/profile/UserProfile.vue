
<template>
    <div>
        <headerr></headerr>
        <div  class="showTeezer-margin">

            <div class="container rtl ">
                <h4 class="text-center rtl">پروفایل کاربر </h4>
                <form >
                    <div class="row">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">نام</span>
                            </div>
                            <div class="text-title">
                                {{user.name}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2"> نام خانوادگی</span>
                            </div>
                            <div class="text-title">
                                {{user.lastname}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">شهر</span>
                            </div>
                            <div class="text-title">
                                {{user.city}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">دانشگاه</span>
                            </div>
                            <div class="text-title">
                                {{user.university}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">کارشناسی</span>
                            </div>
                            <div class="text-title">
                                {{user.karshenasi}}
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="user.arshad">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">کارشناسی ارشد</span>
                            </div>
                            <div class="text-title">
                                {{user.arshad}}
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="user.doctora">
                        <div class="col-6 pt-3 fade-call" >
                            <div class="sub-title">
                                <span class="bg-body px-2">دکتری</span>
                            </div>
                            <div class="text-title">
                                {{user.doctora}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-3" >
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات تکمیلی</span>
                            </div>
                            <div class="text-title">{{user.description}}</div>
                        </div>
                    </div>
                    <br>
                </form>
            </div>

        </div>
        <footerr></footerr>
    </div>
</template>

<script>

    import $ from "jquery";
    import axios from "axios";
    import footerr from "../../comp/footer/index"
    import headerr from "../../comp/header/index"
    import headers from "../header/index";
    import carousel from "vue-owl-carousel";

     export default {
        name: "MyProfile",
         components: {
             headerr,
             footerr,
         },

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
                    description:""
                }

            }
        },
        mounted()
        {
            $("html,body").animate({scrollTop: 0}, 1000);

        },
        created(){
            axios
                .post(
                    "/api/profile/" +
                    this.$route.params.user_id
                )
                .then(response => {
                    this.user = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        methods: {

        },
    }
</script>


<style scoped>
    .showTeezer-margin {
        margin: 5rem 0 4rem 0 !important;
    }
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
