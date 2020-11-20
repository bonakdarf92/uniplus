<template>
    <div class="home">
        <headers></headers>
        <category/>
        <advertise></advertise>
        <content-page></content-page>
        <footerr></footerr>

        <back-to-top bottom="50px" right="50px" visibleoffset="70">
            <button type="button" class="btn btn-warning btn-to-top"><i class="fa fa-chevron-up"></i></button>
        </back-to-top>

    </div>

</template>

<script>
    import headers from './comp/header/index'
    import advertise from './comp/advertise/index'
    import searchBox from './comp/searchBox/index'
    import contentPage from './comp/contentPage/index'
    import footerr from './comp/footer/index'
    import category from './comp/Category/index'
    import $ from "jquery";

    import BackToTop from 'vue-backtotop'

    export default {
        name: 'home',
        components: {
            headers,
            advertise,
            category,
            searchBox,
            contentPage,
            footerr,
            BackToTop
        },
        created() {
            $("html,body").animate({scrollTop: 0}, 1000);
        }
    }
</script>
