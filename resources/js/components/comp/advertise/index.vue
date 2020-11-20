<template>
    <div id="teezer-adv" class="mb-3">
        <div class="searchBar">
            <search-box/>
        </div>
        <div class="col-12 m-auto p-0 box-content">
            <carousel
                :loop="true"
                :items="1"
                :nav="false"
                :autoplay="true"
                :autoplayTimeout="4000"
                :dots="false"
                :touchDrag="true"
            >
                <img src="../../../../../public/images/slider/11.jpg" class="w-100 imageSize"/>
                <img src="../../../../../public/images/slider/22.jpg" class="w-100 imageSize"/>
                <img src="../../../../../public/images/slider/33.jpg" class="w-100 imageSize"/>
                <img src="../../../../../public/images/slider/44.jpg" class="w-100 imageSize"/>
                <img src="../../../../../public/images/slider/55.jpg" class="w-100 imageSize"/>
                <img src="../../../../../public/images/slider/66.jpg" class="w-100 imageSize"/>

            </carousel>
        </div>
    </div>

</template>

<script>
    import carousel from "vue-owl-carousel";
    import searchBox from './../../comp/searchBox/index'

    export default {
        name: "index",

        components: {
            carousel,
            searchBox,
        },
    }
</script>

<style>

    #teezer-adv{

    }
    .searchBar{
        position: absolute;
        margin: 0 auto !important;
        width: 100%;
        z-index: 999;
    }
    @media (min-width: 576px) {
        .searchBar{
            margin-top: 23% !important;
        }
    }
    .box-content{
        position: relative;
        z-index: -1;
        /*filter: blur(2px);
        -webkit-filter: blur(2px);*/
    }
    @media (max-width: 576px) {
        .box-content {
            width: 100%;
            margin: 0 auto !important;
        }
    }

    .imageSize {
        height: auto !important;
    }

    @media (max-width: 767px) {
        .imageSize {
            height: 70vh !important;
        }
    }
</style>
