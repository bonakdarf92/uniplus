<template>
    <div>
        <headers></headers>
        <div class="margin-create">
            <div class="col-sm-12 col-md-10 col-lg-8 m-auto p-0">
                <div class="col-12 p-0">
                    <h2 class="create-subject-title" style="font-size:38px !important">قوانین یونی پلاس</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 rtl text-right mt-5">
                        <h4 style="line-height: 2.2rem;">
                            سامانه یونی پلاس صرفاً محلی برای درج آگهی‏ ها است و هیچ گونه کنترلی روی واقعیت یا صحت مضامین آگهی‏ های کاربران نداشته و مسئولیت بررسی و تحقیق راجع به آن‏ها با خود کاربران است. در یونی پلاس فرآیند خرید و فروش بدین صورت است که کاربران مستقیماً با هم تماس می‌گیرند و هیچ واسطه‌ای در این میان وجود ندارد. پس دقت فرمایید که کاربر باید جنبه‌های مختلف امنیتی را در نظر بگیرد.
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 rtl text-right mt-5">
                        <h4 style="line-height: 2.2rem;">
                            آگهی‌دهندگان با ثبت آگهی خود در آگهی تأیید می‌کنند که مسئولیت حقوقی کامل مضمون آن و بررسی صحت و مطابقت آن با قوانین و یا اخلاق حسنه و عرف اسلامی به عهده خودشان خواهد بود، و در ضمن، پیشاپیش اعلام می کنند که آگهی ایشان شامل موارد زیر نخواهد بود:
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12 rtl mt-5 mb-5">
                        <ul class="rtl text-right">
                            <li class="mt-3">
                                <h4>مغایرت با قوانین جاری جمهوری اسلامی ایران و عرف جامعه</h4>
                            </li>
                            <li class="mt-3">
                                <h4>هرگونه محتوای مندرج در فهرست مصادیق محتوای مجرمانه</h4>
                            </li>
                            <li class="mt-3">
                                <h4>ناقض حریم شخصی افراد</h4>
                            </li>
                            <li class="mt-3">
                                <h4>هر گونه توهین به ادیان رسمی کشور، آداب، رسوم، قومیت‌ها، لهجه‌ها و گویش‌های مختلف</h4>
                            </li>
                            <li class="mt-3">
                                <h4>ابزار یا آموزش‌های نفوذ، خرابکاری، شکستن قفل، هک و کرک</h4>
                            </li>
                            <li class="mt-3">
                                <h4>فروش برنامه‌های نرم‌افزاری یا کتاب‌های فاقد مجوز قانونی برای انتشار و سایر موارد ناقض «قانون حمایت حقوق مؤلفان و مصنفان و هنرمندان»</h4>
                            </li>
                            <li class="mt-3">
                                <h4>درج قیمت در عنوان آگهی</h4>
                            </li>
                            <li class="mt-3">
                                <h4>درج شماره حساب در متن آگهی</h4>
                            </li>
                            <li class="mt-3">
                                <h4>درج مکرر آگهی‌‌های یکسان حتی با عناوین متفاوت در یک روز</h4>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 rtl text-right mt-5">
                                <h4 style="line-height: 2.2rem;">
                                    هرگونه سوءاستفاده از شماره تلفن همراه دیگران پیگرد قانونی دارد و آگهی دهنده مسئول آن تلقی شده و آگهی در این مورد هیچ گونه مسئولیتی ندارد.
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12 col-md-6 col-sm-12"></div> -->
                </div>
            </div>
        </div>
        <footerr></footerr>
    </div>
</template>
<script>
    import headers from "./comp/header/index";
    import footerr from "./comp/footer/index";
    import $ from "jquery";
    export default {
        name: "roles",
        components: {
            headers,
            footerr
        },
        data() {
            return {
                contact: {
                    name: "",
                    email: "",
                    description: ""
                }
            };
        },
        created() {
            $("html,body").animate({scrollTop: 0}, 1000);
        }
    };
</script>

<style>
</style>


