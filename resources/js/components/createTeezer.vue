<template>
    <div>
        <headers></headers>


        <div class="create-margin">
            <div
                class="col-sm-12 col-md-8 col-lg-6 m-auto pb-5"
                v-show="showBook & showFurniture & showOutfit & showProject & showRoomMate & showTraining"
            >
                <div class="col-12 m-auto">
                    <h1 class="create-title">دسته بندی خود را انتخاب کنید</h1>
                </div>
                <div class="row rtl ">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToRoomMate">
                            <!--<img
                                src="../../../public/roommate-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">هم خونه ای</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/adv_home_hood.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToFurniture">
                            <!--<img
                                src="../../../public/furniture-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">وسایل خونه</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/adv_tools.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToOutfit">
                            <!--<img
                                src="../../../public/outfit-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">هم مسیر</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/hammasir.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToProject">
                            <!--<img
                                src="../../../public/project-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">پروژه</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/adv_project.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToBook">
                            <!--<img
                                src="../../../public/book-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">کتاب و جزوه</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/adv_book.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mt-3 col-12 category-box" v-on:click="goToTraining">
                            <!--<img
                                src="../../../public/training-01.jpg"
                                style="width: 100% !important; background: no-repeat !important;"
                            />-->
                            <div class="row m-auto cat-card text-center cursor-p">
                                <div class="col-6">
                                    <h2 class="category-title">تدریس</h2>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="../../../public/images/icons/adv_teach.png" class="category-image">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class v-show="!showBook">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی کتاب و جزوه</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-1">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                class="my-input-create"
                                                placeholder="مثال: فروش کتاب"
                                                v-model="advertise.title"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">کتاب و جزوه دارم</option>
                                                <option value="0">کتاب و جزوه میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">شهر</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2" v-on:change="getuni()" v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="book1" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="book1"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="book2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="book2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">نویسنده</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : علی شهروز"
                                        v-model="book.author"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">ناشر</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : انتشارات علم و فرهنگ"
                                        v-model="book.publisher"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="قیمت را به تومان وارد کنید"
                                           v-model="price"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phoneee"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phoneee"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_book()">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class v-show="!showFurniture">
                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی وسایل خونه دانشجویی</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                v-model="advertise.title"
                                                class="my-input-create"
                                                placeholder="فروش لوازم خانه دانشجویی"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">وسایل خونه دانشجویی دارم</option>
                                                <option value="0">وسایل خونه دانشجویی میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">شهر</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2" v-on:change="getuni()" v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="fur1" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="fur1"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="fur2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="fur2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">نوع وسیله</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeFurniture"
                                     v-bind:class="{'border-danger' : this.errFurniture }">
                                    <select class="my-input-create" v-model="furniture.furniture_type">
                                        <option value="تزئینات خانه">تزئینات خانه</option>
                                        <option value="وسایل آشپزخانه">وسایل آشپزخانه</option>
                                        <option value="وسایل اتاق خواب">وسایل اتاق خواب</option>
                                        <option value="وسایل حال و پذیرایی">وسایل حال و پذیرایی</option>
                                        <option value="ابزار یراق">ابزار یراق</option>
                                        <option value="سایر وسایل خونه دانشجویی">سایر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="قیمت را به تومان وارد کنید"
                                           v-model="price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phoneeee"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phoneeee"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_furniture">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class v-show="!showOutfit">
                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی هم مسیر</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                v-model="advertise.title"
                                                class="my-input-create"
                                                placeholder="مثال: هم مسیر"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">هم مسیر میشم</option>
                                                <option value="0">هم مسیر میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">مبدأ</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2" v-on:change="getuni()" v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="out1" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="out1"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="out2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="out2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">نوع ماشین</span>
                                </div>
                                <div class="my-input-box">
                                    <select class="my-input-create" v-model="outfit.car_type">
                                        <option value="سواری">سواری</option>
                                        <option value="اتوبوس">اتوبوس</option>
                                        <option value="مینی بوس">مینی بوس</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">مدل ماشین</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : پژو 206"
                                        v-model="outfit.car_brand"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">مقصد</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeDestination"
                                     v-bind:class="{'border-danger' : this.errDestination }">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : تهران"
                                        v-model="outfit.destination"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="قیمت را به تومان وارد کنید"
                                           v-model="price"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد</span>
                                </div>
                                <div class="my-input-box">
                                    <select class="my-input-create" v-model="outfit.number">
                                        <option value="یک نفر">یک نفر</option>
                                        <option value="دو نفر">دو نفر</option>
                                        <option value="سه نفر">سه نفر</option>
                                        <option value="از سه نفر بیشتر">از سه نفر بیشتر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تاریخ حرکت</span>
                                </div>
                                <div class="my-date-box">
                                    <date-picker format="jYYYY/jMM/jDD" v-model="outfit.date_day"></date-picker>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeGender"
                                     v-bind:class="{'border-danger' : this.errGender }">
                                    <select class="my-input-create" v-model="outfit.gender">
                                        <option value="آقا">آقا</option>
                                        <option value="خانم">خانم</option>
                                        <option value="فرقی ندارد">فرقی ندارد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">ساعت حرکت</span>
                                </div>
                                <div class="my-date-box">
                                    <date-picker v-model="outfit.date_hour" type="time"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone1e"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone1e"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_outfit">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class v-show="!showProject">
                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی پروژه</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                v-model="advertise.title"
                                                class="my-input-create"
                                                placeholder="مثال: فروش پروژه مطلب"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">پروژه یا مقاله دارم</option>
                                                <option value="0">پروژه یا مقاله میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">شهر</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2" v-on:change="getuni()" v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="project1" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="project1"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="project2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="project2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمینه تحقیقاتی</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeProjectMager"
                                     v-bind:class="{'border-danger' : this.errProjectMager }">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : مهندسی کامپیوتر"
                                        v-model="project.mager"
                                    />
                                </div>
                            </div>
                            <!--      <div class="col-lg-3">
                                              <div class="label-create">
                                                  <span class="bg-body px-2">مهلت انجام</span>
                                              </div>
                                              <div class="my-input-box">
                                                  <input class="my-input-create" placeholder="مثال : سیدحسین میرحسینی" v-model="project.expire"/>
                                              </div>
              </div>-->
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="قیمت را به تومان وارد کنید"
                                           v-model="price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phonee2"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phonee2"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_project">
                               ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class v-show="!showRoomMate">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی هم خونه ای</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                v-model="advertise.title"
                                                class="my-input-create"
                                                placeholder="هم خونه ای"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">هم خونه ای میخوام</option>
                                                <option value="0">هم خونه ای میشم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">شهر</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2" v-on:change="getuni()" v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="file-room" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="file-room"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="room2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="room2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeRommateGender"
                                     v-bind:class="{'border-danger' : this.errRommateGender }">
                                    <select class="my-input-create" v-model="roomMate.gender">
                                        <option value="آقا">آقا</option>
                                        <option value="خانم">خانم</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آدرس</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : تهران، مرزداران"
                                        v-model="roomMate.address"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">متراژ</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : 70 متر"
                                        v-model="roomMate.measure"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد نفرات فعلی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : 2 نفر"
                                        v-model="roomMate.real_count"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد نفرات مورد نیاز</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : 2 نفر"
                                        v-model="roomMate.need_count"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد خواب</span>
                                </div>
                                <div class="my-input-box">
                                    <select class="my-input-create" v-model="roomMate.room_count">
                                        <option value="بدون اتاق خواب">بدون اتاق خواب</option>
                                        <option value="یک اتاق خواب">یک اتاق خواب</option>
                                        <option value="دو عدد اتاق خواب">دو عدد اتاق خواب</option>
                                        <option value="سه اتاق خواب">سه اتاق خواب</option>
                                        <option value="بیشتر از سه اتاق خواب">بیشتر از سه اتاق خواب</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">پیش پرداخت</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : 2,000,000 تومان "
                                        v-model="prePay"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">اجاره ماهیانه</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder=" مثال : 100,000 تومان"
                                        v-model="price"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">اجاره روزانه</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال : 25,000"
                                        v-model="dailyPay"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phonee3"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phonee3"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy" id="exampleCheck1"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_roomMate">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class v-show="!showTraining">
                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ثبت آگهی تدریس</h4>
                    </div>

                    <!-- Teezer information-->
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-6">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
                                    </div>
                                    <div class="col-6">
                                        <button class="back-btn" v-on:click="goToCreate">
                                            برگشت
                                            <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl px-3">
                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="row rtl">
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">عنوان آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeTitle"
                                            v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]"
                                        >
                                            <input
                                                v-model="advertise.title"
                                                class="my-input-create"
                                                placeholder="تدریس ریاضی مهندسی"
                                            />
                                            <small class="alert-small" v-show="advertise.title.length > 25">
                                                بیشتر از 25 کاراکتر وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeNeed"
                                            v-bind:class="{'border-danger' : this.errNeed }"
                                        >
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="none">...</option>
                                                <option value="1">آموزش میدهم</option>
                                                <option value="0">آموزش میخواهم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">شهر</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeCity"
                                            v-bind:class="{'border-danger' : this.errCity }"
                                        >
                                            <select name="city" id="city2" class="my-select dynamic"  data-dependent="university2" v-on:change="getuni()" v-model="advertise.city">
                                                <option value="همه شهرها">همه شهر ها</option>
                                                <option v-for="(city_list,index) in cities"  :key="index" :value="city_list.city" >{{city_list.city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">دانشگاه</span>
                                        </div>
                                        <div
                                            class="my-input-box"
                                            v-on:click="changeUni"
                                            v-bind:class="{'border-danger' : this.errUni }"
                                        >
                                            <select name="uni2" id="uni2" class="my-select "  data-dependent="university2"  v-model="advertise.university">
                                                <option value="همه دانشگاه ها">همه دانشگاه ها</option>
                                                <option v-for="(uni_list,index) in unis"  :key="index" :value="uni_list.university" >{{uni_list.university}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-11 w-90 m-aa">
                                <div class="label-create">
                                    <span class="bg-body px-2">عکس آگهی</span>
                                </div>
                                <div class="my-input-box"
                                     v-on:click="changePhoto"
                                     v-bind:class="{'border-danger , pb-4' : this.errPhoto}"
                                >
                                    <div class="col-12 upload-images-box p-0">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="train1" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="train1"
                                                                v-on:change="add1"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image1"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1"
                                                         v-if="image1.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12"
                                                v-show="image1.length > 0 || image2.length > 0"
                                            >
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="train2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input
                                                                id="train2"
                                                                v-on:change="add2"
                                                                class="file-upload__input"
                                                                type="file"
                                                                name="file-upload"
                                                            />
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="image2"/>
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2"
                                                         v-if="image2.length > 0">
                                                        پاک کردن
                                                        <i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="alert-small" v-show="errPhoto">
                                        حجم عکس یک بیشتر از 1 مگابایت می باشد
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- options -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">لینک وب سایت</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="www.uniplus.app"
                                        v-model="training.website"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeTrainingGender"
                                     v-bind:class="{'border-danger' : this.errTrainingGender }">
                                    <select class="my-input-create" v-model="training.gender">
                                        <option value="none">...</option>
                                        <option value="آقا">آقا</option>
                                        <option value="خانم">خانم</option>
                                        <option value="فرقی ندارد">فرقی ندارد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تدریس/دانشجو به صورت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeOnlineType"
                                     v-bind:class="{'border-danger' : this.errOnlineType }">
                                    <select class="my-input-create" v-model="training.online_type">
                                        <option value="none">...</option>
                                        <option value="حضوری">حضوری</option>
                                        <option value="آنلاین">آنلاین</option>
                                        <option value="فرقی ندارد">فرقی ندارد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" v-model="price" placeholder="قیمت را به تومان وارد کنید">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمینه تدریس/یادگیری</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeTrainingMager"
                                     v-bind:class="{'border-danger' : this.errTrainingMager }">
                                    <input
                                        class="my-input-create"
                                        placeholder="مهندسی کامپیوتر"
                                        v-model="training.mager"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                            <div class="label-create">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="my-input-box">
                  <textarea
                      class="create-desc"
                      placeholder="توضیحات آگهی خود را وارد کنید ..."
                      v-model="advertise.description"
                  ></textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- call information -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto p-0">
                                <h4 class="divide-title mt-5 pb-2">اطلاعات تماس</h4>
                            </div>
                        </div>
                    </div>

                    <!-- border dash-->
                    <div class="col-12 p-0 br-create-title"></div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="row rtl">
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">شماره تماس</span>
                                </div>
                                <div
                                    class="my-number-box"
                                    v-on:click="changePhone"
                                    v-bind:class="{'border-danger' : this.errPhone }"
                                >
                                    {{user.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phonee"
                                           v-model="connection"
                                           v-on:change="changeConnection(connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phonee"
                                    >شماره تماس نشان نده</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">آیدی تلگرام</span>
                                </div>
                                <div
                                    class="my-input-box"
                                    v-on:change="changeTelegram"
                                    v-bind:class="{'border-danger' : this.errtelegram }"
                                >
                                    <input
                                        class="my-input-create"
                                        style="direction: ltr !important;"
                                        placeholder="@uniplus"
                                        v-model="user.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input
                                        class="my-input-create"
                                        placeholder="مثال: از 1 صبح تا 8 عصر "
                                        v-model="advertise.answer_time"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl"></div>
                    </div>
                </div>
                <div class="loading" v-show="loading">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="create_training">
                                ارسال آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footerr></footerr>

        <back-to-top bottom="50px" right="50px" visibleoffset="70">
            <button type="button" class="btn btn-warning btn-to-top"><i class="fa fa-chevron-up"></i></button>
        </back-to-top>

    </div>
</template>

<script>
    import VuePersianDatetimePicker from "vue-persian-datetime-picker";
    import $ from 'jquery'

    import headers from "./comp/header/index";
    import footerr from "./comp/footer/index";

    import BackToTop from 'vue-backtotop'

    export default {
        name: "createTeezer",
        components: {
            headers,
            footerr,
            BackToTop,
            datePicker: VuePersianDatetimePicker
        },
        data() {
            return {
                loading: false,
                success_send: false,
                success: false,
                has_error: false,
                cities:{
                    city:'',
                },
                unis:{
                    university:'',
                },
                dateee: "",
                connection: false,
                showTelegram: "show",
                policy: false,
                showBook: true,
                showFurniture: true,
                showOutfit: true,
                showProject: true,
                showRoomMate: true,
                showTraining: true,
                filename: "",
                file1: "",
                file2: "",
                image1: "",
                image2: "",
                pic1: "",
                price: "",
                dailyPay: "",
                prePay: "",

                errTitle: false,
                errCity: false,
                errUni: false,
                errNeed: false,
                errPhone: false,
                errtelegram: false,
                errFurniture: false,
                errDestination: false,
                errGender: false,
                errTrainingGender: false,
                errOnlineType: false,
                errTrainingMager: false,
                errRommateGender: false,
                errProjectMager: false,
                errConnection: false,
                errPhoto: false,


                advertise: {
                    category_id: "",
                    needtype: "none",
                    title: "",
                    price: "",
                    city: "none",
                    description: "",
                    connection: "",
                    answer_time: "",
                    immidiatetype: "",
                    university: "none"
                },
                user: {
                    phone: "",
                    telegram: ""
                },
                book: {
                    author: "",
                    publisher: ""
                },
                furniture: {
                    furniture_type: "none"
                },
                outfit: {
                    destination: "",
                    gender: "none",
                    car_type: "",
                    car_brand: "",
                    number: "",
                    date_hour: "",
                    date_day: ""
                },
                project: {
                    mager: ""
                },
                roomMate: {
                    gender: "none",
                    address: "",
                    max_prepayment: "",
                    room_count: "",
                    measure: "",
                    need_count: "",
                    real_count: "",
                    daily_payment: ""
                },
                training: {
                    gender: "none",
                    mager: "",
                    online_type: "none",
                    website: ""
                }

            };
        },
        mounted()
        {
            this.getcites()
            this.getunis()
        },
        watch: {
            price: function (newValue) {
                const result = newValue
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                Vue.nextTick(() => (this.price = result));
            },

            prePay: function (newValue) {
                const result = newValue
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                Vue.nextTick(() => (this.prePay = result));
            },

            dailyPay: function (newValue) {
                const result = newValue
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                Vue.nextTick(() => (this.dailyPay = result));
            }
        },
        methods: {
            getuni(){
                axios.post("/api/unis",
                    {
                        city:this.advertise.city
                    }
                )
                    .then(response => {
                        this.unis=response.data

                    })
                    .catch(error => {
                    });

            },
            getunis(){
                axios.get('/api/allunis').then(response => {
                    this.unis=response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            getcites() {
                axios.get('/api/cities').then(response => {
                    this.cities=response.data

                }).catch(error => {
                    console.log(error)
                })
            },
            changeTitle: function () {
                this.errTitle = false;
            },
            changeCity: function () {
                this.errCity = false;
            },
            changeUni: function () {
                this.errUni = false;
            },
            changeNeed: function () {
                this.errNeed = false;
            },
            changePhone: function () {
                this.errPhone = false;
            },
            changePhoto: function () {
                this.errPhoto = false;
            },
            changeTelegram: function () {
                if (this.user.telegram === '') {
                    this.errtelegram = true;
                } else {
                    this.errtelegram = false;
                }
            },
            changeConnection: function (con) {
                if (con && this.user.telegram === '') {
                    this.errtelegram = true;
                } else {
                    this.errtelegram = false;
                }
            },
            changeFurniture: function () {
                this.errFurniture = false;
            },
            changeDestination: function () {
                this.errDestination = false;
            },
            changeGender: function () {
                this.errGender = false;
            },
            changeTrainingGender: function () {
                this.errTrainingGender = false;
            },
            changeOnlineType: function () {
                this.errOnlineType = false;
            },
            changeTrainingMager: function () {
                this.errTrainingMager = false;
            },
            changeRommateGender: function () {
                this.errRommateGender = false;
            },
            changeProjectMager: function () {
                this.errProjectMager = false;
            },

            goToCreate: function () {
                this.price = "";
                this.showBook = true;
                this.showFurniture = true;
                this.showOutfit = true;
                this.showProject = true;
                this.showRoomMate = true;
                this.showTraining = true;

                this.advertise.title = "";
                this.advertise.needtype = "none";
                this.advertise.city = "none";
                this.advertise.university = "none";
                this.advertise.price = "";
                this.connection = false;
                this.advertise.answer_time = "";
                this.advertise.description = "";

                this.user.telegram = "";

                this.book.author = "";
                this.book.publisher = "";

                this.furniture.furniture_type = "none";

                this.outfit.gender = "none";
                this.outfit.car_type = "";
                this.outfit.car_brand = "";
                this.outfit.number = "";
                this.outfit.date_hour = "";
                this.outfit.date_day = "";
                this.outfit.destination = "";

                this.project.mager = "";

                this.roomMate.gender = "none";
                this.roomMate.address = "";
                this.roomMate.max_prepayment = "";
                this.roomMate.room_count = "";
                this.roomMate.measure = "";
                this.roomMate.real_count = "";
                this.roomMate.daily_payment = "";

                this.training.gender = "none";
                this.training.mager = "";
                this.training.online_type = "none";
                this.training.website = "";
            },
            goToBook: function () {
                this.showBook = !this.showBook;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },
            goToFurniture: function () {
                this.showFurniture = !this.showFurniture;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeFurniture();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },
            goToOutfit: function () {
                this.showOutfit = !this.showOutfit;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeDestination();
                this.changeGender();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },
            goToProject: function () {
                this.showProject = !this.showProject;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeProjectMager();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },
            goToRoomMate: function () {
                this.showRoomMate = !this.showRoomMate;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeRommateGender();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },
            goToTraining: function () {
                this.showTraining = !this.showTraining;
                this.changePhone();
                this.changeNeed();
                this.changeUni();
                this.changeCity();
                this.changeTitle();
                this.changeTrainingGender();
                this.changeTrainingMager();
                this.changeOnlineType();
                this.changeConnection();
                $("html,body").animate({scrollTop: 0}, 500);
            },

            add1: function (x) {
                this.filename = x.target.files[0].name;
                this.file1 = x.target.files[0];
                var reader = new FileReader();
                var vm = this;
                reader.onload = function () {
                    var dataURL = reader.result;
                    vm.image1 = dataURL;
                };
                reader.readAsDataURL(x.target.files[0]);
            },
            deleteimg1: function () {
                this.image1 = "";
                this.file1 = "";
                // console.log("ghj")
            },
            add2: function (x) {
                this.filename = x.target.files[0].name;
                this.file2 = x.target.files[0];
                var reader = new FileReader();
                var vm = this;
                reader.onload = function () {
                    var dataURL = reader.result;
                    vm.image2 = dataURL;
                };
                reader.readAsDataURL(x.target.files[0]);
            },
            deleteimg2: function () {
                this.image2 = "";
                this.file2 = "";
            },

            create_book() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){

                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){

                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;
                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 1);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    fd1.append("author", this.book.author);
                    fd1.append("publisher", this.book.publisher);
                    fd1.append("connection", this.advertise.connection);

                    axios
                        .post("/api/book", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            },
            create_furniture() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                this.errFurniture = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){

                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    console.log("Photo2 error")
                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (this.furniture.furniture_type === "none") {
                    this.errFurniture = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errFurniture ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errFurniture &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;
                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        // console.log("File11111111");
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        // console.log("File222222222");
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 2);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    fd1.append("furniture_type", this.furniture.furniture_type);
                    fd1.append("connection", this.advertise.connection);
                    // console.log(fd1);
                    axios
                        .post("/api/furniture", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            },
            create_outfit() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                this.errDestination = false
                this.errGender = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    console.log("Photo2 error")
                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (this.outfit.destination === "") {
                    this.errDestination = true;
                }
                if (this.outfit.gender === "none") {
                    this.errGender = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errDestination ||
                    this.errGender ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errDestination &&
                    !this.errGender &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;

                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 3);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    // fd1.append('start',this.advertise.city)
                    fd1.append("destination", this.outfit.destination);
                    fd1.append("gender", this.outfit.gender);
                    fd1.append("car_type", this.outfit.car_type);
                    fd1.append("car_brand", this.outfit.car_brand);
                    fd1.append("number", this.outfit.number);
                    fd1.append("date_hour", this.outfit.date_hour);
                    // fd1.append('date_hour',"2019-08-20 13:26:16")
                    fd1.append("date_day", this.outfit.date_day);
                    fd1.append("connection", this.advertise.connection);
                    // fd1.append('date_day',"2019-08-20 13:26:16")
                    // console.log(this.outfit.date_day);
                    axios
                        .post("/api/outfit", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            },
            create_roomMate() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                this.errRommateGender = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    console.log("Photo2 error")
                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (this.roomMate.gender === "none") {
                    this.errRommateGender = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errRommateGender ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errRommateGender &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;

                    this.prePay = this.prePay.replace(/,/g, "");
                    this.roomMate.max_prepayment = this.prePay;

                    this.dailyPay = this.dailyPay.replace(/,/g, "");
                    this.roomMate.daily_payment = this.dailyPay;


                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        // console.log("File11111111");
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        // console.log("File222222222");
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 5);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    fd1.append("gender", this.roomMate.gender);
                    fd1.append("address", this.roomMate.address);
                    fd1.append("max_prepayment", this.roomMate.max_prepayment);
                    fd1.append("room_count", this.roomMate.room_count);
                    fd1.append("measure", this.roomMate.measure);
                    fd1.append("need_count", this.roomMate.need_count);
                    fd1.append("real_count", this.roomMate.real_count);
                    fd1.append("daily_payment", this.roomMate.daily_payment);
                    fd1.append("connection", this.advertise.connection);
                    // console.log(fd1);
                    axios
                        .post("/api/roomMate", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            },
            create_project() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                this.errProjectMager = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    console.log("Photo2 error")
                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (this.project.mager === "") {
                    this.errProjectMager = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errProjectMager ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errProjectMager &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;

                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        // console.log("File11111111");
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        // console.log("File222222222");
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 4);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    // fd1.append('expire',this.project.expire)
                    fd1.append("mager", this.project.mager);
                    fd1.append("connection", this.advertise.connection);
                    // console.log(fd1);
                    axios
                        .post("/api/project", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            },
            create_training() {
                var app = this;
                this.loading = true;
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false
                this.errPhone = false

                this.errOnlineType = false
                this.errTrainingMager = false
                this.errTrainingGender = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    console.log("Photo2 error")
                    this.errPhoto = true
                }
                if (this.advertise.title === "") {
                    this.errTitle = true;
                }
                if (this.advertise.city === "none") {
                    this.errCity = true;
                }
                if (this.advertise.university === "none") {
                    this.errUni = true;
                }
                if (this.advertise.needtype === "none") {
                    this.errNeed = true;
                }
                if (this.training.online_type === "none") {
                    this.errOnlineType = true;
                }
                if (this.training.mager === "") {
                    this.errTrainingMager = true;
                }
                if (this.training.gender === "none") {
                    this.errTrainingGender = true;
                }
                if (this.connection === true && this.user.telegram === '') {
                    this.errtelegram = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }

                if (
                    this.errPhone ||
                    this.errNeed ||
                    this.errUni ||
                    this.errCity ||
                    this.errTitle ||
                    this.errTrainingMager ||
                    this.errTrainingGender ||
                    this.errOnlineType ||
                    this.errtelegram ||
                    this.errPhoto
                ){
                    $("html,body").animate({scrollTop: 0}, 1000);
                }

                if (
                    !this.errPhone &&
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errTrainingMager &&
                    !this.errTrainingGender &&
                    !this.errOnlineType &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.price = this.price.replace(/,/g, "");
                    this.advertise.price = this.price;

                    if (this.connection) {
                        this.advertise.connection = "1"
                    } else {
                        this.advertise.connection = "0"
                    }

                    const fd1 = new FormData();
                    if (this.file1 !== "") {
                        // console.log("File11111111");
                        fd1.append("image1", this.file1, this.file1.name);
                    }
                    if (this.file2 !== "") {
                        // console.log("File222222222");
                        fd1.append("image2", this.file2, this.file2.name);
                    }
                    fd1.append("title", this.advertise.title);
                    fd1.append("category_id", 6);
                    fd1.append("price", this.advertise.price);
                    fd1.append("city", this.advertise.city);
                    fd1.append("description", this.advertise.description);
                    fd1.append("university", this.advertise.university);
                    fd1.append("answer_time", this.advertise.answer_time);
                    fd1.append("needtype", this.advertise.needtype);
                    fd1.append("immidiatetype", 0);
                    fd1.append("phone", this.user.phone);
                    fd1.append("telegram", this.user.telegram);
                    fd1.append("gender", this.training.gender);
                    fd1.append("mager", this.training.mager);
                    // fd1.append('expire',this.training.expire)
                    fd1.append("online_type", this.training.online_type);
                    fd1.append("website", this.training.website);
                    fd1.append("connection", this.advertise.connection);
                    // console.log(fd1);
                    axios
                        .post("/api/training", fd1)
                        .then(response => {
                            app.success = true;
                            app.success_send = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.success_send = !app.success_send;
                            }, 5000);
                            this.$router.push("/myteezer");
                        })
                        .catch(error => {
                            app.has_error = true;
                            this.loading = false;
                            setTimeout(function () {
                                app.has_error = !app.has_error;
                            }, 5000);
                        });
                }
            }
        },
        created() {
            axios
                .get("/api/auth/user")
                .then(response => {
                    // console.log(response)
                    this.user.phone = response.data.data.phone;
                    // console.log("fghjk" + this.user.phone);
                })
                .catch(error => {
                    // console.log(error);
                });

            $("html,body").animate({scrollTop: 0}, 1000);
        }
    };
</script>

<style scoped>
    .vpd-input-group > input {
        background-color: #faf3f3 !important;
    }

    .create-margin{
        margin: 6rem 0 11rem 0;
    }
    .category-box{
        background-color: #ffffff !important;
        border-radius: .3125rem;
        box-shadow: 0 1px 6px 0 rgba(0, 0, 0, .1);
        padding: 20px 0 20px 0;
        /*height: 160px !important;*/
    }
    .category-title{
        font-size: 20px;
        text-align: center;
    }

    .category-image{
        width: 50%;
        height: 100%;
    }
</style>


