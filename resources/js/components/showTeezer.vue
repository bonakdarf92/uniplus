<template>
    <div>
        <headers></headers>

        <div class="showTeezer-margin">

            <div class="col-12 pt-5 mb-showTeezer" v-show="showfurniture">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >
                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img :src="advertise.image1" v-show="advertise.image1!== null"/>

                                    <img :src="advertise.image2" v-show="advertise.image2!== null"/>
                                </carousel>
                            </div>
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>

                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  <div class="col-12 pt-3">
                                  <div class="sub-title">
                                      <span class="bg-body px-2">شناسه تلگرام</span>
                                  </div>
                                  <div class="text-title">
                                      <div >{{advertise.telegram}}</div>
                                  </div>
                              </div>-->
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;overflow: auto">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title ">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6 text-right pb-sm-3 f-12">وسایل خانه</div>

                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">وسایل خونه دانشجویی دارم</div>
                                                <div v-if="advertise.needtype === 0">وسایل خونه دانشجویی میخوام</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>

                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">نوع وسیله</span>
                                    </div>
                                    <div class="text-title">{{advertise.furniture_type}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">قیمت</span>
                                    </div>

                                    <div class="text-title">
                                        <div v-if="advertise.price">{{advertise.price}} تومان</div>
                                        <div v-if="!advertise.price">توافقی</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5 mb-showTeezer" v-show="showroomMate">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >
                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img :src="advertise.image1" v-show="advertise.image1!== null"/>

                                    <img :src="advertise.image2" v-show="advertise.image2!== null"/>
                                </carousel>
                            </div>

                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0" v-on:click="showphone">
                                            <div> شماره تماس: {{advertise.phone}}</div>

                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6 text-right pb-sm-3 f-12">هم خونه ای</div>
                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">هم خونه ای میخوام</div>
                                                <div v-if="advertise.needtype === 0">هم خونه ای میشم</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>

                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">جنسیت</span>
                                    </div>
                                    <div class="text-title">{{advertise.gender}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3" v-show="advertise.measure">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">متراژ</span>
                                    </div>
                                    <div class="text-title">{{advertise.measure}}</div>
                                </div>
                            </div>

                            <div class="col-12 pt-3" v-show="advertise.address">
                                <div class="sub-title">
                                    <span class="bg-body px-2">آدرس</span>
                                </div>
                                <div class="text-title">{{advertise.address}}</div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.real_count">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">تعداد نفرات فعلی</span>
                                    </div>
                                    <div class="text-title">{{advertise.real_count}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.need_count">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">تعداد نفرات مورد نیاز</span>
                                    </div>
                                    <div class="text-title">{{advertise.need_count}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.max_prepayment">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">مبلغ پیش</span>
                                    </div>
                                    <div class="text-title">{{advertise.max_prepayment}} تومان</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.room_count">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">تعداد خواب</span>
                                    </div>
                                    <div class="text-title">{{advertise.room_count}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.price">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">مبلغ اجاره ماهانه</span>
                                    </div>
                                    <div class="text-title">{{advertise.price}} تومان</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.daily_payment">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">مبلغ اجاره روزانه</span>
                                    </div>
                                    <div class="text-title">{{advertise.daily_payment}} تومان</div>
                                </div>
                            </div>

                            <div class="col-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                            <div class="col-12 pt-3 ">
                                <div class="sub-title">
                                    <span class="bg-body px-2"> اطلاعات مدرس</span>
                                </div>
                                <router-link v-bind:to="'/profile/'+this.advertise.user_id">
                                    <div     href="#" class="text-title text-left" style="direction: ltr !important;">
                                        {{
                                        "www.uniplus.app/#/profile/"+this.advertise.user_id
                                        }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5 mb-showTeezer" v-show="showtraining">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >
                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img :src="advertise.image1" v-show="advertise.image1!== null"/>

                                    <img :src="advertise.image2" v-show="advertise.image2!== null"/>
                                </carousel>
                            </div>

                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call ">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.needtype === 1">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک اطلاعات مدرس</span>
                                </div>
                                <router-link v-bind:to="'/profile/'+this.advertise.user_id">
                                    <div     href="#" class="text-title text-left" style="direction: ltr !important;">
                                        {{
                                        "www.uniplus.app/#/profile/"+this.advertise.user_id
                                        }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6 text-right pb-sm-3 f-12">تدریس</div>
                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">آموزش میدهم</div>
                                                <div v-if="advertise.needtype === 0">آموزش میخواهم</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>
                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">جنسیت</span>
                                    </div>
                                    <div class="text-title">{{advertise.gender}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">تدریس/دانشجو به صورت</span>
                                    </div>
                                    <div class="text-title">{{advertise.online_type}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">زمینه تدریس</span>
                                    </div>
                                    <div class="text-title">{{advertise.mager}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.website">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">لینک وب سایت</span>
                                    </div>
                                    <div class="text-title">{{advertise.website}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">قیمت</span>
                                    </div>
                                    <div class="text-title">
                                        <div v-if="advertise.price">{{advertise.price}} تومان</div>
                                        <div v-if="!advertise.price">توافقی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.needtype === 1">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک اطلاعات مدرس</span>
                                </div>
                                <router-link v-bind:to="'/profile/'+this.advertise.user_id">
                                    <div     href="#" class="text-title text-left" style="direction: ltr !important;">
                                        {{
                                        "www.uniplus.app/#/profile/"+this.advertise.user_id
                                        }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5 mb-showTeezer" v-show="showproject">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >
                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img :src="advertise.image1" v-show="advertise.image1!== null"/>

                                    <img :src="advertise.image2" v-show="advertise.image2!== null"/>
                                </carousel>
                            </div>

                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.needtype === 1">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک اطلاعات کاربر</span>
                                </div>
                                <router-link v-bind:to="'/profile/'+this.advertise.user_id">
                                    <div     href="#" class="text-title text-left" style="direction: ltr !important;">
                                        {{
                                        "www.uniplus.app/#/profile/"+this.advertise.user_id
                                        }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6 text-right pb-sm-3 f-12">پروژه و مقاله</div>
                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">پروژه یا مقاله دارم</div>
                                                <div v-if="advertise.needtype === 0">پروژه یا مقاله میخوام</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>

                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">رشته درسی</span>
                                </div>
                                <div class="text-title">{{advertise.mager}}</div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">قیمت</span>
                                    </div>
                                    <div class="text-title">
                                        <div v-if="advertise.price">{{advertise.price}} تومان</div>
                                        <div v-if="!advertise.price">توافقی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                            <div class="col-12 pt-3 " v-show="advertise.needtype === 1">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک اطلاعات کاربر</span>
                                </div>
                                <router-link v-bind:to="'/profile/'+this.advertise.user_id">
                                    <div     href="#" class="text-title text-left" style="direction: ltr !important;">
                                        {{
                                        "www.uniplus.app/#/profile/"+this.advertise.user_id
                                        }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5 mb-showTeezer" v-show="showbook">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >

                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img :src="advertise.image1" v-show="advertise.image1!== null"/>

                                    <img :src="advertise.image2" v-show="advertise.image2!== null"/>
                                </carousel>
                            </div>

                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6  text-right pb-sm-3 f-12">کتاب و جزوه</div>

                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">کتاب و جزوه دارم</div>
                                                <div v-if="advertise.needtype === 0">کتاب و جزوه میخوام</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>

                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.author ">
                                <div class="sub-title">
                                    <span class="bg-body px-2">نویسنده</span>
                                </div>
                                <div class="text-title">{{advertise.author}}</div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3"
                                     v-show="advertise.publisher">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">ناشر</span>
                                    </div>
                                    <div class="text-title">{{advertise.publisher}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">قیمت</span>
                                    </div>
                                    <div class="text-title">
                                        <div v-if="advertise.price">{{advertise.price}} تومان</div>
                                        <div v-if="!advertise.price">توافقی</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time!==''">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 py-5 mb-showTeezer" v-show="showoutfit">
                <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="col-12">
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 === null && advertise.image2 === null"
                                >
                                    <img
                                        src="../../../public/1.jpg"
                                        v-if="advertise.category_id === 1"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/2.jpg"
                                        v-if="advertise.category_id === 2"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/3.jpg"
                                        v-if="advertise.category_id === 3"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/4.jpg"
                                        v-if="advertise.category_id === 4"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/5.jpg"
                                        v-if="advertise.category_id === 5"
                                        style="width:100%"
                                    />
                                    <img
                                        src="../../../public/6.jpg"
                                        v-if="advertise.category_id === 6"
                                        style="width:100%"
                                    />
                                </carousel>
                                <carousel
                                    :loop="false"
                                    :items="1"
                                    :nav="false"
                                    v-show="advertise.image1 !==null || advertise.image2 !==null"
                                >
                                    <img
                                        :src="advertise.image1"
                                        style="height: 300px"
                                        v-show="advertise.image1 !== null"
                                    />

                                    <img :src="advertise.image2" style="height: 300px"
                                         v-show="advertise.image2 !== null"/>
                                </carousel>
                            </div>

                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3 fade-call" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="basicInfoBoxPad">
                                <div class="basicInfoBox">
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-8">
                                                <h4 class="teezer-title">{{advertise.title}}</h4>
                                            </div>
                                            <div class="col-4 like-box f-10">
                                                <div v-show="!likedTeezer">
                                                    می پسندم
                                                    <i class="far fa-heart pr-2 f-10" v-on:click="changeLike"></i>
                                                </div>
                                                <div v-show="likedTeezer">
                                                    پسندیدم
                                                    <i class="fas fa-heart text-dan pr-2 f-10"
                                                       v-on:click="changeLike"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row rtl">
                                            <div class="col-6  text-right pb-sm-3 f-12">همسفر</div>

                                            <div class="col-6 rtl text-right f-12">
                                                <div v-if="advertise.needtype === 1">هم مسیر میشم</div>
                                                <div v-if="advertise.needtype === 0">هم مسیر میخوام</div>
                                            </div>
                                            <div class="col-6 rtl text-right f-12">
                                                <i class="far fa-calendar-alt pl-2"></i>
                                                {{advertise.created_at}}
                                            </div>

                                            <div class="col-6 text-right f-12">
                                                <i class="far fa-eye pl-2"></i>
                                                {{advertise.counter}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">شهر</span>
                                    </div>
                                    <div class="text-title">{{advertise.city}}</div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">دانشگاه</span>
                                    </div>
                                    <div class="text-title">{{advertise.university}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.car_type">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">نوع ماشین</span>
                                    </div>
                                    <div class="text-title">{{advertise.car_type}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.car_brand">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">برند ماشین</span>
                                    </div>
                                    <div class="text-title">{{advertise.car_brand}}</div>
                                </div>
                            </div>
                            <div class="row pad-city-uni rtl">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">مقصد</span>
                                    </div>
                                    <div class="text-title">{{advertise.destination}}</div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                    <div class="sub-title">
                                        <span class="bg-body px-2">قیمت برای هر نفر</span>
                                    </div>
                                    <div class="text-title">
                                        <div v-if="advertise.price">{{advertise.price}} تومان</div>
                                        <div v-if="!advertise.price">توافقی</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.date_day">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تاریخ حرکت</span>
                                </div>
                                <div class="text-title">{{advertise.date_day}}</div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.date_hour">
                                <div class="sub-title">
                                    <span class="bg-body px-2">ساعت حرکت</span>
                                </div>
                                <div class="text-title font-iransansweb">{{advertise.date_hour}}</div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-show="advertise.number">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تعداد</span>
                                </div>
                                <div class="text-title">{{advertise.number}}</div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">جنسیت</span>
                                </div>
                                <div class="text-title">{{advertise.gender}}</div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3" v-if="advertise.description">
                                <div class="sub-title">
                                    <span class="bg-body px-2">توضیحات</span>
                                </div>
                                <div class="text-title">{{advertise.description}}</div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 show-call">
                        <div class="row">
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">اطلاعات تماس</span>
                                </div>
                                <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                                <div class="text-title">
                                    <div v-show="!showPhoneNumber" v-on:click="showphone">
                                        <small>برای نمایش اطلاعات تماس کلیک کنید</small>
                                    </div>
                                    <!--                                <div v-show="showPhoneNumber">{{advertise.phone}}</div>-->
                                    <div v-show="showPhoneNumber">
                                        <div v-if="advertise.connection === 0">
                                            <div> شماره تماس: {{advertise.phone}}</div>
                                            <div v-show="advertise.telegram"> شناسه تلگرام: {{advertise.telegram}}</div>

                                        </div>
                                        <div v-if="advertise.connection === 1"> شناسه تلگرام: {{advertise.telegram}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">لینک آگهی</span>
                                </div>
                                <div class="text-title text-left" style="direction: ltr !important;">
                                    {{
                                    "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                                    }}
                                    <button  class="btn btn-info text-white copy-btn ml-auto" v-clipboard="() => this.fake_link">
                                        کپی
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 pt-3" v-show="advertise.answer_time">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمان پاسخ گویی</span>
                                </div>
                                <div class="text-title">
                                    {{advertise.answer_time}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footerr></footerr>
    </div>


</template>

<script>

    import $ from "jquery";
    import headers from "./comp/header/index";
    import footerr from "./comp/footer/index";
    import carousel from "vue-owl-carousel";
    import axios from 'axios'
    import Clipboard from 'v-clipboard'

    Vue.use(Clipboard)

    export default {
        name: "show-teezer",
        components: {
            headers,
            footerr,
            carousel
        },
        data() {
            return {

                showPhoneNumber: false,
                reallikedTeezer: false,
                likedTeezer: false,
                showfurniture: false,
                showroomMate: false,
                showtraining: false,
                showproject: false,
                showbook: false,
                showoutfit: false,
                filename: "",
                file1: "",
                file2: "",
                image1: "",
                image2: "",
                pic1: "",
                advertise: {
                    id: "",
                    category_id: "",
                    needtype: "",
                    title: "",
                    price: "",
                    city: "",
                    description: "",
                    connection: "",
                    answer_time: "",
                    immidiatetype: "",
                    university: "",
                    message: '',
                    copiedText: '',
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
                    furniture_type: ""
                },
                outfit: {
                    start: "",
                    destination: "",
                    gender: "",
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
                    gender: "",
                    address: "",
                    max_prepayment: "",
                    room_count: "",
                    measure: "",
                    need_count: "",
                    real_count: "",
                    daily_payment: ""
                },
                training: {
                    gender: "",
                    mager: "",
                    online_type: "",
                    website: ""
                },
                fake_link: ""
            };
        },
        methods: {
            myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
    } ,
            copyTestingCode () {
                this.fake_link="www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                let testingCodeToCopy = document.querySelector('#testing-code')
                testingCodeToCopy.setAttribute('type', 'text')    // 不是 hidden 才能複製
                testingCodeToCopy.select()

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    alert('Testing code was copied ' + msg);
                } catch (err) {
                    alert('Oops, unable to copy');
                }

                /* unselect the range */
                testingCodeToCopy.setAttribute('type', 'hidden')
                window.getSelection().removeAllRanges()

        },
            goToCreate: function () {
                this.$router.replace({name: "home"});
            },

            showphone: function () {
                let id = {id: this.advertise.id};
                if (localStorage.getItem(this.advertise.id) === null) {
                    axios
                        .post("/api/increase", id)
                        .then(response => {
                            if (response.data == "user is login,counter increaced") {
                                localStorage.setItem(this.advertise.id, "increased counter");
                                this.showPhoneNumber = true;
                            } else {
                                alert("برای نمایش اطلاعات تماس لازم است عضو یونی پلاس شوید.")
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            },
            changeLike: function () {
                this.likedTeezer = !this.likedTeezer;
            }
        },
        mounted() {
            $("html,body").animate({scrollTop: 0}, 1000);
        },

        created() {
            if (this.$route.params.category_id == 1) {
                this.showbook = true;
            } else if (this.$route.params.category_id == 2) {
                this.showfurniture = true;
            } else if (this.$route.params.category_id == 3) {
                this.showoutfit = true;
            } else if (this.$route.params.category_id == 4) {
                this.showproject = true;
            } else if (this.$route.params.category_id == 5) {
                this.showroomMate = true;
            } else if (this.$route.params.category_id == 6) {
                this.showtraining = true;
            }
            if (this.$route.params.slug) {
                axios.post(
                    "/api/showTeezer/" +
                    this.$route.params.category_id +
                    "/" +
                    this.$route.params.slug
                )
                    .then(response => {
                        if (response.data.data.price !== null) {
                            const result = response.data.data.price
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            Vue.nextTick(() => (response.data.data.price = result));
                        }
                        if (response.data.data.max_prepayment !== null && response.data.data.max_prepayment) {
                            response.data.data.max_prepayment = response.data.data.max_prepayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                        if (response.data.data.daily_payment !== null && response.data.data.daily_payment) {
                            response.data.data.daily_payment = response.data.data.daily_payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                        this.advertise.id = response.data.data.id;
                        this.advertise = response.data.data;
                        this.likedTeezer = response.data.data.like;
                        this.reallikedTeezer = response.data.data.like;
                        if (localStorage.getItem(this.advertise.id) === null) {
                            this.showPhoneNumber = flase;
                        } else {
                            this.showPhoneNumber = true;
                        }
                            this.fake_link= "www.uniplus.app/#/product/"+this.advertise.category_id+"/"+this.advertise.fake_id
                            this.fake_link=this.fake_link.toString()

                    }
                    )
                    .catch(error => {
                    });
            } else if (this.$route.params.fake_id) {
                axios
                    .post(
                        "/api/product/" +
                        this.$route.params.category_id +
                        "/" +
                        this.$route.params.fake_id
                    )
                    .then(response => {
                        this.advertise = response.data.data;
                        this.likedTeezer = response.data.data.like;
                        this.reallikedTeezer = response.data.data.like;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },

        beforeDestroy() {
            if (this.likedTeezer === true && this.reallikedTeezer != this.likedTeezer) {
                let id = {id: this.advertise.id};
                axios
                    .post("/api/addtofavorite", id)
                    .then(response => {
                        // console.log(response)
                    })
                    .catch(error => {
                        // console.log(error)
                    });
            } else if (
                this.likedTeezer === false &&
                this.reallikedTeezer != this.likedTeezer
            ) {
                // console.log("cfgvhbjnmkl,;");
                let id = {id: this.advertise.id};
                axios
                    .delete("/api/deletefromfavorite/" + this.advertise.id)
                    .then(response => {
                        // console.log(response);
                    })
                    .catch(error => {
                        // console.log(error)
                    });
            }
        }
    };
</script>

<style scoped>
    .showTeezer-margin {
        margin: 5rem 0 4rem 0 !important;
    }

    .like-box {
    }

    .like-box i {
        font-size: 21px !important;
    }

    .like-box i:hover {
        cursor: pointer !important;
    }

    .basicInfoBoxPad {
        padding: 0 1rem;
    }

    .basicInfoBox {
        background-color: #ffffff;
        padding: 1rem 0 !important;
        border-radius: 6px;
    }

    @media (max-width: 768px) {
        .basicInfoBoxPad {
            margin-top: 1rem !important;
        }
    }

</style>

