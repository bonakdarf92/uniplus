<template>
    <div class="margin-create">

        <headers></headers>

        <div class="col-12 pt-5" v-show="showfurniture">
            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                            <div class="text-title" >
                                <!--  <div v-show="!showPhoneNumber" v-on:click="showphone">
                                      <small >برای نمایش شماره کلیک کنید</small>
                                  </div>-->
                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    وسایل خانه
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
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
                                    <span class="bg-body px-2">نوع وسیله</span>
                                </div>
                                <div class="text-title">{{advertise.furniture_type}}</div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                        </div>

                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 pt-5" v-show="showroomMate">

            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                            <div class="text-title" >
                                <!-- <div v-show="!showPhoneNumber" v-on:click="showphone">
                                     <small >برای نمایش شماره کلیک کنید</small>
                                 </div>-->
                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    هم خونه ای
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
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
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">متراژ</span>
                                </div>
                                <div class="text-title">{{advertise.measure}}</div>
                            </div>
                        </div>

                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">آدرس</span>
                            </div>
                            <div class="text-title">{{advertise.address}}</div>
                        </div>

                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تعداد نفرات فعلی</span>
                                </div>
                                <div class="text-title">{{advertise.real_count}}</div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تعداد نفرات مورد نیاز</span>
                                </div>
                                <div class="text-title">{{advertise.need_count}}</div>
                            </div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">مبلغ پیش</span>
                                </div>
                                <div class="text-title">{{advertise.max_prepayment}}</div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تعداد خواب</span>
                                </div>
                                <div class="text-title">{{advertise.room_count}}</div>
                            </div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">مبلغ اجاره ماهانه</span>
                                </div>
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">مبلغ اجاره روزانه</span>
                                </div>
                                <div class="text-title">{{advertise.daily_payment}}</div>
                            </div>
                        </div>

                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 pt-5" v-show="showtraining">

            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                            <div class="text-title" >
                                <!--     <div v-show="!showPhoneNumber" v-on:click="showphone">
                                         <small >برای نمایش شماره کلیک کنید</small>
                                     </div>-->
                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    تدریس
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
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
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تدریس/دانشجو به صورت</span>
                                </div>
                                <div class="text-title">{{advertise.online_type}}</div>
                            </div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">زمینه تدریس</span>
                                </div>
                                <div class="text-title">{{advertise.mager}}</div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 pt-5" v-show="showproject">

            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <div class="text-title" >

                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    پروژه و مقاله
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
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
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 pt-5" v-show="showbook">

            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :loop="true" :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <!--                            <div class="text-title" >{{advertise.phone}}</div>-->
                            <div class="text-title" >
                                <!-- <div v-show="!showPhoneNumber" v-on:click="showphone">
                                     <small >برای نمایش شماره کلیک کنید</small>
                                 </div>-->
                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    کتاب و جزوه
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
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
                                <span class="bg-body px-2">نویسنده</span>
                            </div>
                            <div class="text-title">{{advertise.author}}</div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">ناشر</span>
                                </div>
                                <div class="text-title">{{advertise.publisher}}</div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">قیمت</span>
                                </div>
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 py-5" v-show="showoutfit">

            <div class="col-sm-12 col-md-10 col-lg-8 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <carousel :nav="false" v-show="advertise.image1 === null && advertise.image2 === null">
                                <img src="../../../../../public/1.jpg" v-if="advertise.category_id === 1" style="width:100%">
                                <img src="../../../../../public/2.jpg" v-if="advertise.category_id === 2" style="width:100%">
                                <img src="../../../../../public/3.jpg" v-if="advertise.category_id === 3" style="width:100%">
                                <img src="../../../../../public/4.jpg" v-if="advertise.category_id === 4" style="width:100%">
                                <img src="../../../../../public/5.jpg" v-if="advertise.category_id === 5" style="width:100%">
                                <img src="../../../../../public/6.jpg" v-if="advertise.category_id === 6" style="width:100%">
                            </carousel>
                            <carousel :items="1" :nav="false" v-show="advertise.image1 !==null || advertise.image2 !==null">

                                <img :src="advertise.image1" style="height: 300px" v-show="advertise.image1!== null">

                                <img :src="advertise.image2" v-show="advertise.image2!== null" >

                            </carousel>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">شماره تماس</span>
                            </div>
                            <div class="text-title" >
                                <div v-show="showPhoneNumber">
                                    {{advertise.phone}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 fade-call">
                            <div class="sub-title">
                                <span class="bg-body px-2">لینک آگهی</span>
                            </div>
                            <div class="text-title text-left" style="direction: ltr !important;"> {{
                                "www.iteezer.ir/product/"+this.advertise.category_id+"/"+this.advertise.fake_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-9">
                                    <h4 class="teezer-title">{{advertise.title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rtl">
                                <div class="col-lg-4 col-sm-12 text-right">
                                    همسفر
                                </div>
                                <div class="col-lg-4 col-6 rtl text-right">
                                    <i class="far fa-calendar-alt pl-2"></i>
                                    {{advertise.created_at}}
                                </div>
                                <div class="col-lg-4 col-6 text-right">
                                    <i class="far fa-eye pl-2"></i>
                                    {{advertise.counter}}
                                </div>
                            </div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">شهر مبدا</span>
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
                                    <span class="bg-body px-2">نوع ماشین</span>
                                </div>
                                <div class="text-title">{{advertise.car_type}}</div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">برند ماشین</span>
                                </div>
                                <div class="text-title">{{advertise.car_brand}}</div>
                            </div>
                        </div>
                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">مقصد</span>
                                </div>
                                <div class="text-title">{{advertise.destination}}</div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">قیمت برای هر نفر</span>
                                </div>
                                <div class="text-title">{{advertise.price}}</div>
                            </div>
                        </div>

                        <div class="row pad-city-uni rtl">
                            <div class="col-lg-4 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تاریخ حرکت</span>
                                </div>
                                <div class="text-title">{{advertise.date_day}}</div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">ساعت حرکت</span>
                                </div>
                                <div class="text-title font-iransansweb">{{advertise.date_hour}}</div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 pt-3">
                                <div class="sub-title">
                                    <span class="bg-body px-2">تعداد</span>
                                </div>
                                <div class="text-title">{{advertise.number}}</div>
                            </div>
                        </div>

                        <div class="col-12 pt-3">
                            <div class="sub-title">
                                <span class="bg-body px-2">توضیحات</span>
                            </div>
                            <div class="text-title">{{advertise.description}}</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import $ from 'jquery'
    import headers from './adminHeader/adminheader'
    import footerr from '../footer/index'
    import carousel from 'vue-owl-carousel'

    export default {
        name: "AdminShowTeezer",
        components: {
            headers,
            footerr,
            carousel
        },
        data() {
            return {
                showPhoneNumber: true,
                reallikedTeezer: false,
                likedTeezer: false,
                showfurniture: false,
                showroomMate: false,
                showtraining: false,
                showproject: false,
                showbook: false,
                showoutfit: false,
                filename: '',
                file1: '',
                file2: '',
                image1: '',
                image2: '',
                pic1: '',
                advertise: {
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
                    university: ''
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
                outfit: {
                    start: '',
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
                        mager: '',
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
        methods: {
            goToCreate: function () {
                this.$router.replace({name: 'home'})
            },
        },
        mounted() {
            $('html,body').animate({scrollTop: 0}, 1000);
        },
        created() {
            if (this.$route.params.category_id == 1) {
                this.showbook = true
            } else if (this.$route.params.category_id == 2) {
                this.showfurniture = true
            } else if (this.$route.params.category_id == 3) {
                this.showoutfit = true
            } else if (this.$route.params.category_id == 4) {
                this.showproject = true
            } else if (this.$route.params.category_id == 5) {
                this.showroomMate = true
            } else if (this.$route.params.category_id == 6) {
                this.showtraining = true
            }
            axios.post('/api/showTeezer/' + this.$route.params.category_id + '/' + this.$route.params.slug).then(response => {
                this.advertise.id= response.data.data.id;
                this.advertise = response.data.data

            }).catch(error => {
                // console.log(error)
            })
        },
        beforeDestroy() {

        }
    }
</script>

<style scoped>

    .like-box {

    }

    .like-box i {
        font-size: 21px !important;
    }

    .like-box i:hover {
        cursor: pointer !important;
    }

</style>

