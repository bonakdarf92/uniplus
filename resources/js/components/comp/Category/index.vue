<template>
    <div class="col-sm-12 col-md-10 col-lg-10 m-auto p-0">

        <div id="category" class="col-12 p-2">
            <div class="row">
                <div class="col-3 add-free-sm">
                    <button type="button" class="add-free rtl" v-on:click="goToCreate">ثبت رایگان آگهی +</button>
                </div>
                <div class="col-9 categoies">
                    <div class="row rtl">
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="5" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="5"><img id="5" class="cat-image"
                                                                src="../../../../../public/images/icons/adv_home_hood.png"
                                                                align="middle">هم خونه ای</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="2" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="2"><img id="2" class="cat-image"
                                                                src="../../../../../public/images/icons/adv_tools.png"
                                                                align="middle">وسایل خونه</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="3" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="3"><img id="3" class="cat-image"
                                                                src="../../../../../public/images/icons/hammasir.png"
                                                                align="middle">هم سفر</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="4" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="4"><img id="4" class="cat-image"
                                                                src="../../../../../public/images/icons/adv_project.png"
                                                                align="middle">پروژه و مقاله</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="1" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="1"><img id="1" class="cat-image"
                                                                src="../../../../../public/images/icons/adv_book.png"
                                                                align="middle">کتاب و جزوه</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 px-2" id="6" v-on:click="changeFilter">
                            <div class="m-auto cat-card text-center cursor-p">
                                <p class="cat-item" id="6"><img id="6" class="cat-image"
                                                                src="../../../../../public/images/icons/adv_teach.png"
                                                                align="middle">تدریس</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "index",
        methods: {
            changeFilter: function (x) {
                this.$router.replace({name: 'showlist', params: {category_id: x.target.id}})
            },
            goToCreate: function () {
                this.$router.replace({name: 'create'})
            }
        }
    }
</script>

<style scoped>

    .add-free {
        font-size: 16px;
        direction: rtl;
        background-color: #7FD8D5 !important;
        color: #ffffff !important;
        padding: 14.75px 27px;
        font-weight: 700;
        border-radius: 3px;
        border: 0 !important;
        cursor: default !important;
    }

    .add-free:hover {
        cursor: pointer !important;
    }

    .add-free:focus {
        outline: none;
    }


    #category {
        margin-top: 5rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 991px) {
        #category {
            margin-bottom: 0.5rem;
        }
    }

    .cat-item {
        direction: rtl;
        font-size: 13px;
    }

    .cat-image {
        width: 30px !important;
        height: auto;
        padding-left: 7px;
    }

    .cat-card {
        background: #fff;
        border-radius: .3125rem;
        box-shadow: 0 1px 6px 0 rgba(0, 0, 0, .1);
        padding: 0.9rem 0 0.02rem 0;
        text-align: center;
    }

    @media (max-width: 991px) {
        .cat-card {
            margin-bottom: 0.7rem !important;
        }
    }

    @media (max-width: 991px) {
        .add-free-sm {
            min-width: 100% !important;
            text-align: center !important;
            margin-bottom: 1rem !important;
        }

        .add-free-sm .add-free {
            font-size: 14px;
            padding: 12px 24px;
        }

        .categoies {
            min-width: 100% !important;
            padding: 0 27px !important;
        }
    }


</style>
