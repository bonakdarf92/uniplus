<template>
    <div>
        <headers></headers>
        <div class="margin-create">

            <div class="" v-show="showBook">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی کتاب و جزوه</h4>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input class="my-input-create" v-model="advertise.title"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">کتاب و جزوه دارم</option>
                                                <option value="0">کتاب و جزوه میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>

                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-show=" advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-if="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <input class="my-input-create" placeholder="مثال : احمد احمدی"
                                           v-model="advertise.author"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">ناشر</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال : نشر پویا"
                                           v-model="advertise.publisher"/>
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
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone2"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone2"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_book">
                               ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>


            </div>

            <div class="" v-show="showFurniture">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی وسایل خونه</h4>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input v-model="advertise.title" class="my-input-create"
                                            />
                                            <small class="alert-small"
                                                   v-show="advertise.title.length > 30">بیشتر از 25 حرف وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">وسایل خونه دارم</option>
                                                <option value="0">وسایل خونه میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-if="advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-if="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <select class="my-input-create" v-model="advertise.furniture_type">
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
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone9"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone9"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 pt-4 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_furniture">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="" v-show="showOutfit">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی هم مسیر</h4>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input v-model="advertise.title" class="my-input-create"
                                            />
                                            <small class="alert-small"
                                                   v-show="advertise.title.length > 30">بیشتر از 25 حرف وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">هم مسیر میشم</option>
                                                <option value="0">هم مسیر میخوام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-if="advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-if="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <select class="my-input-create" v-model="advertise.car_type">
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
                                    <input class="my-input-create" placeholder="مثال : پژو 206"
                                           v-model="advertise.car_brand"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">مقصد</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeDestination"
                                     v-bind:class="{'border-danger' : this.errDestination }">
                                    <input class="my-input-create" placeholder="مثال : تهران"
                                           v-model="advertise.destination"/>
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
                                    <select class="my-input-create" v-model="advertise.number">
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
                                    <date-picker format="jYYYY/jMM/jDD" v-model="advertise.date_day"></date-picker>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeGender"
                                     v-bind:class="{'border-danger' : this.errGender }">
                                    <select class="my-input-create" v-model="advertise.gender">
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
                                    <date-picker v-model="advertise.date_hour" type="time"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone11"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone11"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_outfit">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="" v-show="showProject">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی پروژه</h4>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input v-model="advertise.title" class="my-input-create"
                                            />
                                            <small class="alert-small"
                                                   v-show="advertise.title.length > 30">بیشتر از 25 حرف وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box"
                                             v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">پروژه یا مقاله دارم</option>
                                                <option value="0">پروژه یا مقاله میخوام</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-if="advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-if="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <input class="my-input-create" placeholder="مثال : مهندسی کامپیوتر"
                                           v-model="advertise.mager"/>
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
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone21"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone21"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_project">
                               ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="" v-show="showRoomMate">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی هم خونه ای</h4>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input v-model="advertise.title" class="my-input-create"
                                            />
                                            <small class="alert-small"
                                                   v-show="advertise.title.length > 30">بیشتر از 25 حرف وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">هم خونه ای میخوام</option>
                                                <option value="0">هم خونه ای میشم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-if="advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-show="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-show="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <select class="my-input-create" v-model="advertise.gender">
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
                                    <input class="my-input-create" placeholder="مثال : تهران، مرزداران"
                                           v-model="advertise.address"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">متراژ</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال : 70 متر"
                                           v-model="advertise.measure"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد نفرات فعلی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال :  2 نفر"
                                           v-model="advertise.real_count"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد نفرات مورد نیاز</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال : 2 نفر"
                                           v-model="advertise.need_count"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">تعداد خواب</span>
                                </div>
                                <div class="my-input-box">
                                    <select class="my-input-create" v-model="advertise.room_count">
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
                                    <input class="my-input-create" placeholder="مثال : 2,000,000 تومان"
                                           v-model="prePay"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">اجاره ماهیانه</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال : 2,000,000 تومان "
                                           v-model="price"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">اجاره روزانه</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder=" مثال : 100,000 تومان"
                                           v-model="dailyPay"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone22"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone22"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_roomMate">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="" v-show="showTraining">

                <!-- Image & basic info -->
                <div class="col-12 p-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <h4 class="create-subject-title">ویرایش آگهی تدریس</h4>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto p-0">
                        <div class="row rtl">
                            <div class="col-lg-12 col-md-12 col-sm-11 m-auto">
                                <div class="row rtl">
                                    <div class="col-12">
                                        <h5 class="divide-title pb-2">اطلاعات آگهی</h5>
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
                                        <div class="my-input-box"
                                             v-on:click="changeTitle"
                                             v-bind:class="[{'border-danger , pb-4' : this.advertise.title.length > 25 },{'border-danger' : this.errTitle }]">
                                            <input v-model="advertise.title" class="my-input-create"
                                            />
                                            <small class="alert-small"
                                                   v-show="advertise.title.length > 30">بیشتر از 25 حرف وارد
                                                نکنید
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="label-create">
                                            <span class="bg-body px-2">نوع آگهی</span>
                                        </div>
                                        <div class="my-input-box" v-on:click="changeNeed"
                                             v-bind:class="{'border-danger' : this.errNeed }">
                                            <select class="my-select-create" v-model="advertise.needtype">
                                                <option value="1">آموزش میدهم</option>
                                                <option value="0">آموزش میخواهم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
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
                                                    <div class="file-upload col-12" v-if="advertise.image1 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload11" class="file-upload__label m-auto">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add1" id="upload11"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image1">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg1(advertise.id)"
                                                         v-if="advertise.image1 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="upload-image-box">
                                                    <div class="file-upload col-12" v-if="advertise.image2 === ''">
                                                        <div class="col-12 m-auto text-center pt-2">
                                                            <label for="upload2" class="file-upload__label">
                                                                <i class="far fa-image fa-5x"></i>
                                                            </label>
                                                            <input v-on:change="add2" id="upload2"
                                                                   class="file-upload__input" type="file"
                                                                   name="file-upload">
                                                        </div>
                                                    </div>
                                                    <img class="w-100" :src="advertise.image2">
                                                    <!--  -->
                                                    <div class="delete-img" v-on:click="deleteimg2(advertise.id)"
                                                         v-if="advertise.image2 !== ''">
                                                        پاک کردن<i class="fas fa-trash bg-danger text-white pr-2"></i>
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
                                    <span class="bg-body px-2">لینک وب سایت</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال : www.uniplus.app"
                                           v-model="advertise.website"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeTrainingGender"
                                     v-bind:class="{'border-danger' : this.errTrainingGender }">
                                    <select class="my-input-create" v-model="advertise.gender">
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
                                    <select class="my-input-create" v-model="advertise.online_type">
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
                                    <input class="my-input-create" placeholder="قیمت را به تومان وارد کنید"
                                           v-model="price"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمینه تدریس/یادگیری</span>
                                </div>
                                <div class="my-input-box" v-on:click="changeTrainingMager"
                                     v-bind:class="{'border-danger' : this.errTrainingMager }">
                                    <input class="my-input-create" placeholder="مثال : مهندسی کامپیوتر"
                                           v-model="advertise.mager"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rtl">
                            <div class="col-lg-6">
                                <div class="label-create">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="my-input-box">
                                    <textarea class="create-desc"
                                              placeholder="توضیحات آگهی خود را وارد کنید ..."
                                              v-model="advertise.description"></textarea>
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
                                <h5 class="divide-title mt-5 pb-2">اطلاعات تماس</h5>
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
                                <div class="my-number-box">
                                    {{advertise.phone}}
                                </div>
                                <div class="form-group form-check pb-0 float-right mt-2">
                                    <input type="checkbox" class="form-check-input" id="phone7"
                                           v-model="advertise.connection"
                                           v-on:change="changeConnection(advertise.connection)"/>
                                    <label
                                        class="form-check-label pr-3"
                                        for="phone7"
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
                                        v-model="advertise.telegram"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="label-create">
                                    <span class="bg-body px-2">زمان پاسخگویی</span>
                                </div>
                                <div class="my-input-box">
                                    <input class="my-input-create" placeholder="مثال: از 1 صبح تا 8 شب"
                                           v-model="advertise.answer_time"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4 p-0">
                        <div class="row rtl">

                        </div>
                    </div>
                </div>

                <!-- Button & policy -->
                <div class="col-12 p-0 pb-5 mt-4">
                    <div class="col-lg-8 col-md-12 col-sm-12 m-auto mt-4">
                        <div class="text-right">
                            <div class="form-group form-check pb-0 mb-3 pt-5 rtl">
                                <input type="checkbox" class="form-check-input" v-model="policy"/>
                                <label
                                    class="form-check-label pr-3"

                                >قوانین سایت را خوانده و پذیرفته ام.</label>
                            </div>
                            <button class="send-teezer" :disabled="!policy" v-on:click="edit_training">
                                ثبت آگهی
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <footerr></footerr>

    </div>
</template>

<script>

    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'

    import headers from './comp/header/index'
    import footerr from './comp/footer/index'


    export default {
        name: "editTeezer",
        components: {
            headers,
            footerr,
            datePicker: VuePersianDatetimePicker
        },
        data() {

            return {
                cities:{
                    city:'',
                },
                unis:{
                    university:'',
                },
                deleteimage1:false,
                deleteimage2:false,
                connection: false,
                dateee: '',
                showTelegram: 'show',
                policy: false,
                showBook: false,
                showFurniture: false,
                showOutfit: false,
                showProject: false,
                showRoomMate: false,
                showTraining: false,
                filename: '',
                file1: '',
                file2: '',
                pic1: '',
                price: '',
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


                advertise:
                    {
                        id: '',
                        category_id: '',
                        needtype: '',
                        title: '',
                        price: '',
                        city: '',
                        description: '',
                        connection: '',
                        answer_time: '',
                        immidiatetype: '',
                        university: '',
                        telegram:''
                    },
                user: {
                    phone: '',
                    telegram: ''
                },
                book: {
                    author: '',
                    publisher: ''
                },
                furniture: {
                    furniture_type: ''
                },
                outfit:
                    {
                        destination: '',
                        gender: '',
                        car_type: '',
                        car_brand: '',
                        number: '',
                        date_hour: '',
                        date_day: ''
                    },
                project:
                    {
                        mager: ''
                    },
                roomMate:
                    {
                        gender: '',
                        address: '',
                        max_prepayment: '',
                        room_count: '',
                        measure: '',
                        need_count: '',
                        real_count: '',
                        daily_payment: '',
                    },
                training:
                    {
                        gender: '',
                        mager: '',
                        online_type: '',
                        website: ''
                    }
            }
        },
        mounted() {
            this.getcites()
            this.getunis()

            if (this.$route.params.category_id == 1) {
                this.showBook = true
            } else if (this.$route.params.category_id == 2) {
                this.showFurniture = true
            } else if (this.$route.params.category_id == 3) {
                this.showOutfit = true
            } else if (this.$route.params.category_id == 4) {
                this.showProject = true
            } else if (this.$route.params.category_id == 5) {
                this.showRoomMate = true
            } else if (this.$route.params.category_id == 6) {
                this.showTraining = true
            }
            axios.post('/api/showTeezer/' + this.$route.params.category_id + '/' + this.$route.params.slug).then(response => {
                this.advertise = response.data.data
                if (this.advertise.image1 === null) {
                    this.advertise.image1 = ''
                }
                if (this.advertise.image2 === null) {
                    this.advertise.image2 = ''
                }
                this.price = this.advertise.price

                if (this.advertise.max_prepayment){
                    this.prePay = this.advertise.max_prepayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                if (this.advertise.max_prepayment){
                    this.dailyPay = this.advertise.daily_payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }).catch(error => {

            })

        },
        methods: {
            getuni(){

                axios.post("/api/unis",
                    {
                        city: this.advertise.city
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
            changeTelegram: function () {
  /*              if (this.advertise.telegram === '' && (this.advertise.connection === 1 || this.advertise.connection)) {
                    this.errtelegram = true;


                } else {
                    this.errtelegram = false;


                }*/
                if (this.advertise.telegram === '') {
                    this.errtelegram = true;
                } else {
                    this.errtelegram = false;
                }
            },
            changeConnection: function (con) {
                if (con && this.advertise.telegram === '') {
                    this.errtelegram = true;
                } else {
                    this.errtelegram = false;
                }
            },

            edit_book() {

                this.errPhoto = false
                this.errTitle = false;
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errtelegram = false

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
                if (this.advertise.connection) {
                    this.advertise.connection = "1"

                } else {
                    this.advertise.connection = "0"
                }

                if (this.connection === true && this.advertise.telegram === '') {
                    this.errtelegram = true;
                }
                if (
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

                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errtelegram &&
                    !this.errPhoto

                ) {
                    this.advertise.price = this.price;
                    const fd1 = new FormData();
                    if (this.file1 !== '') {
                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {
                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 1)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)


                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }
                    fd1.append('university', this.advertise.university)

                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    if (this.advertise.author == 'null' || !this.advertise.author) {
                        this.advertise.author = ''
                        fd1.append('author', this.advertise.author)
                    } else {
                        fd1.append('author', this.advertise.author)
                    }

                    if (this.advertise.publisher == 'null' || !this.advertise.publisher) {
                        this.advertise.publisher = ''
                        fd1.append('publisher', this.advertise.publisher)
                    } else {
                        fd1.append('publisher', this.advertise.publisher)
                    }
                    fd1.append('connection', this.advertise.connection)
                    fd1.append('id', this.advertise.id)

                    axios.post('/api/editbook', fd1
                    ).then(response => {

                        this.$router.push('/myteezer')
                    }).catch(error => {

                    })
                }
            },
            edit_furniture() {
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false
                this.errFurniture = false

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
                if (this.advertise.furniture_type === "none") {
                    this.errFurniture = true;
                }

                if (this.advertise.connection) {
                    this.advertise.connection = "1"

                } else {
                    this.advertise.connection = "0"

                }

                if (
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
                    !this.errNeed &&
                    !this.errFurniture &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.advertise.price = this.price;

                    const fd1 = new FormData();

                    if (this.file1 !== '') {

                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {
                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 2)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)
                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }

                    fd1.append('university', this.advertise.university)
                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    fd1.append('furniture_type', this.advertise.furniture_type)
                    fd1.append('connection', this.advertise.connection)
                    fd1.append('id', this.advertise.id)
                    // console.log("this is furnitre:")
                    // console.log(fd1)

                    axios.post('/api/editfurniture', fd1
                    ).then(response => {
                        // console.log(response)
                        this.$router.push('/myteezer')
                    }).catch(error => {
                        // console.log(error)
                    })
                }
            },
            edit_outfit() {
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false

                this.errDestination = false
                this.errGender = false


                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    // console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    // console.log("Photo2 error")
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

                if (this.advertise.connection === "2") {
                    this.errConnection = true;
                }
                if (this.advertise.destination === "") {
                    this.errDestination = true;
                }
                if (this.advertise.gender === "none") {
                    this.errGender = true;
                }
                if (this.advertise.connection) {
                    this.advertise.connection = "1"
                    // console.log("bnm,")
                } else {
                    this.advertise.connection = "0"
                    // console.log("bnm,2")
                }

                if (
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
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errDestination &&
                    !this.errGender &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.advertise.price = this.price;
                    const fd1 = new FormData();
                    if (this.file1 !== '') {
                        // console.log("File11111111")
                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {
                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 3)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)
                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }

                    fd1.append('university', this.advertise.university)
                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    // fd1.append('start',this.advertise.city)
                    fd1.append('destination', this.advertise.destination)
                    fd1.append('gender', this.advertise.gender)
                    if (this.advertise.car_type == 'null' || !this.advertise.car_type) {
                        this.advertise.car_type = ''
                        fd1.append('car_type', this.advertise.car_type)
                    } else {
                        fd1.append('car_type', this.advertise.car_type)
                    }
                    if (this.advertise.car_brand == 'null' || !this.advertise.car_brand) {
                        this.advertise.car_brand = ''
                        fd1.append('car_brand', this.advertise.car_brand)
                    } else {
                        fd1.append('car_brand', this.advertise.car_brand)
                    }
                    if (this.advertise.number == 'null' || !this.advertise.number) {
                        this.advertise.number = ''
                        fd1.append('number', this.advertise.number)
                    } else {
                        fd1.append('number', this.advertise.number)
                    }
                    if (this.advertise.date_day == 'null' || !this.advertise.date_day) {
                        this.advertise.date_day = ''
                        fd1.append('date_day', this.advertise.date_day)
                    } else {
                        fd1.append('date_day', this.advertise.date_day)
                    }
                    if (this.advertise.date_hour == 'null' || !this.advertise.date_hour) {
                        this.advertise.date_hour = ''
                        fd1.append('date_hour', this.advertise.date_hour)
                    } else {
                        fd1.append('date_hour', this.advertise.date_hour)
                    }
                    fd1.append('connection', this.advertise.connection)
                    // fd1.append('date_day',"2019-08-20 13:26:16")
                    fd1.append('id', this.advertise.id)

                    axios.post('/api/editoutfit', fd1
                    ).then(response => {
                        // console.log(response)
                        this.$router.push('/myteezer')
                    }).catch(error => {
                        // console.log(error)
                    })
                }
            },
            edit_roomMate() {
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false

                this.errRommateGender = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    // console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    // console.log("Photo2 error")
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
                if (this.advertise.gender === "none") {
                    this.errRommateGender = true;
                }
                if (this.advertise.connection === "2") {
                    this.errConnection = true;
                }
                if (this.advertise.connection) {
                    this.advertise.connection = "1"
                    // console.log("bnm,")
                } else {
                    this.advertise.connection = "0"
                    // console.log("bnm,2")
                }

                if (
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
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errRommateGender &&
                    !this.errtelegram &&
                    !this.errPhoto
                ) {
                    this.advertise.price = this.price;
                    this.advertise.max_prepayment = this.max_prepayment;

                    this.prePay = this.prePay.replace(/,/g, "");
                    this.advertise.max_prepayment = this.prePay;

                    this.dailyPay = this.dailyPay.replace(/,/g, "");
                    this.advertise.daily_payment = this.dailyPay;

                    const fd1 = new FormData();
                    if (this.file1 !== '') {
                        // console.log("File11111111")
                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {
                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 5)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)
                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }

                    fd1.append('university', this.advertise.university)
                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    fd1.append('gender', this.advertise.gender)
                    if (this.advertise.address == 'null' || !this.advertise.address) {
                        this.advertise.address = ''
                        fd1.append('address', this.advertise.address)
                    } else {
                        fd1.append('address', this.advertise.address)
                    }
                    if (this.advertise.real_count !== null) {
                        fd1.append('real_count', this.advertise.real_count)
                    }

                    if (this.advertise.max_prepayment !== null) {
                        fd1.append('max_prepayment', this.advertise.max_prepayment)
                    }
                    if (this.advertise.room_count !== null) {
                        fd1.append('room_count', this.advertise.room_count)
                    }
                    if (this.advertise.measure !== null) {
                        fd1.append('measure', this.advertise.measure)
                    }
                    if (this.advertise.need_count !== null) {
                        fd1.append('need_count', this.advertise.need_count)
                    }
                    if (this.advertise.need_count !== null) {
                        fd1.append('need_count', this.advertise.need_count)
                    }
                    if (this.advertise.daily_payment !== null) {
                        fd1.append('daily_payment', this.advertise.daily_payment)
                    }

                    fd1.append('connection', this.advertise.connection)
                    fd1.append('id', this.advertise.id)
                    // console.log(fd1)

                    axios.post('/api/editroomMate', fd1
                    ).then(response => {
                        // console.log(response)
                        this.$router.push('/myteezer')
                    }).catch(error => {
                        // console.log(error)
                    })
                }
            },
            edit_project() {
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false

                this.errProjectMager = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    // console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    // console.log("Photo2 error")
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
                if (this.advertise.mager === "") {
                    this.errProjectMager = true;
                }
                if (this.advertise.connection === "2") {
                    this.errConnection = true;
                }
                if (this.advertise.connection) {
                    this.advertise.connection = "1"

                } else {
                    this.advertise.connection = "0"
                }

                if (
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
                    !this.errNeed &&
                    !this.errUni &&
                    !this.errCity &&
                    !this.errTitle &&
                    !this.errProjectMager &&
                    !this.errtelegram &&
                    !this.errPhoto

                ) {
                    this.advertise.price = this.price;
                    const fd1 = new FormData();
                    if (this.file1 !== '') {

                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {
                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 4)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)
                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }

                    fd1.append('university', this.advertise.university)
                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    // fd1.append('expire',this.project.expire)
                    fd1.append('mager', this.advertise.mager)
                    fd1.append('connection', this.advertise.connection)
                    fd1.append('id', this.advertise.id)

                    axios.post('/api/editproject', fd1
                    ).then(response => {

                        this.$router.push('/myteezer')
                    }).catch(error => {

                    })
                }
            },
            edit_training() {
                this.errPhoto = false
                this.errTitle = false
                this.errCity = false
                this.errUni = false
                this.errNeed = false

                this.errOnlineType = false
                this.errTrainingMager = false
                this.errTrainingGender = false

                if ( (parseInt(this.file1.size, 10) / 1048576) > 1.024){
                    // console.log("Photo error")
                    this.errPhoto = true
                }
                if ( (parseInt(this.file2.size, 10) / 1048576) > 1.024){
                    // console.log("Photo2 error")
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
                if (this.advertise.online_type === "none") {
                    this.errOnlineType = true;
                }
                if (this.advertise.mager === "") {
                    this.errTrainingMager = true;
                }
                if (this.advertise.gender === "none") {
                    this.errTrainingGender = true;
                }
                if (
                    this.user.phone === "" ||
                    !/^(\+98|0)?9\d{9}$/.test(this.user.phone)
                ) {
                    this.errPhone = true;
                }
                if (this.advertise.connection) {
                    this.advertise.connection = "1"

                } else {
                    this.advertise.connection = "0"
                }

                if (
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
                    this.advertise.price = this.price;

                    const fd1 = new FormData();
                    if (this.file1 !== '') {

                        fd1.append('image1', this.file1, this.file1.name)
                    }
                    if (this.file2 !== '') {

                        fd1.append('image2', this.file2, this.file2.name)
                    }
                    fd1.append('deleteimage1',this.deleteimage1)
                    fd1.append('deleteimage2',this.deleteimage2)
                    this.deleteimage2=false
                    this.deleteimage1=false

                    fd1.append('title', this.advertise.title)
                    fd1.append('category_id', 6)
                    if (this.advertise.price !== null) {
                        fd1.append('price', this.advertise.price)
                    }
                    fd1.append('city', this.advertise.city)
                    if (this.advertise.description == 'null' || !this.advertise.description) {
                        this.advertise.description = ''
                        fd1.append('description', this.advertise.description)
                    } else {
                        fd1.append('description', this.advertise.description)
                    }

                    fd1.append('university', this.advertise.university)
                    if (this.advertise.answer_time == 'null' || !this.advertise.answer_time) {
                        this.advertise.answer_time = ''
                        fd1.append('answer_time', this.advertise.answer_time)
                    } else {
                        fd1.append('answer_time', this.advertise.answer_time)
                    }
                    fd1.append('needtype', this.advertise.needtype)
                    fd1.append('immidiatetype', 0)
                    fd1.append('phone', this.advertise.phone)
                    if (this.advertise.telegram == 'null' || !this.advertise.telegram) {
                        this.advertise.telegram = ''
                        fd1.append('telegram', this.advertise.telegram)
                    } else {
                        fd1.append('telegram', this.advertise.telegram)
                    }
                    fd1.append('gender', this.advertise.gender)
                    fd1.append('mager', this.advertise.mager)
                    fd1.append('online_type', this.advertise.online_type)
                    if (this.advertise.website == 'null' || !this.advertise.website) {
                        this.advertise.website = ''
                        fd1.append('website', this.advertise.website)
                    } else {
                        fd1.append('website', this.advertise.website)
                    }

                    fd1.append('connection', this.advertise.connection)
                    fd1.append('id', this.advertise.id)


                    axios.post('/api/edittraining', fd1
                    ).then(response => {

                        this.$router.push('/myteezer')
                    }).catch(error => {

                    })
                }
            },

            add1: function (x) {
                this.deleteimage1="inserted"
                // console.log("add 1"+this.deleteimage1)
                this.filename = x.target.files[0].name;
                this.file1 = x.target.files[0]
                var reader = new FileReader();
                var vm = this;
                reader.onload = function () {
                    var dataURL = reader.result;
                    vm.advertise.image1 = dataURL;
                };
                reader.readAsDataURL(x.target.files[0]);
            },
            deleteimg1: function (id) {

                this.advertise.image1 = '';
                this.file1 = '';
                this.deleteimage1="deleted"
                // console.log("delete 1"+this.deleteimage1)

            },
            add2: function (x) {
                this.deleteimage2="inserted"
                // console.log("add 2"+this.deleteimage2)
                this.filename = x.target.files[0].name;
                this.file2 = x.target.files[0]

                var reader = new FileReader();
                var vm = this;
                reader.onload = function () {
                    var dataURL = reader.result;
                    vm.advertise.image2 = dataURL;
                };
                reader.readAsDataURL(x.target.files[0]);
            },
            deleteimg2: function (id) {
                this.advertise.image2 = '';
                this.file2= '';
                // console.log("add 2"+this.deleteimage2)
                this.deleteimage2="deleted"
                let obj = {id: id}
              /*  axios.post('/api/deleteimagebook2', obj).then(response => {

                    // window.location.reload();
                }).catch(error => {
                    console.log(error)
                })*/

            },


        },
        watch: {
            price: function (newValue) {
                if(this.price) {
                    const result = newValue
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    Vue.nextTick(() => (this.price = result));
                }
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
    }

</script>

<style scoped>

    .vpd-input-group > input {
        background-color: #faf3f3 !important;
    }
</style>
