<template>
    <div>

        <!-- Header -->
        <header class="header">
            <div class="header_content d-flex flex-row align-items-center justify-content-start rtl">

                <!-- Hamburger -->
                <div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>

                <!-- Navigation -->
                <nav class="header_nav">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                        <li v-on:click="showList('home')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'home' }">
                            <a>داشبورد<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('advertise')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'advertise' }">
                            <a>آگهی های تایید شده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('notconfirmed')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'notconfirmed' }">
                            <a>آگهی های تایید نشده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('users')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'users' }">
                            <a>کاربران<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('book')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'book' }">
                            <a>کتاب و جزوه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('furniture')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'furniture' }">
                            <a>وسایل خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('roommate')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'roommate' }">
                            <a>هم خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('project')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'project' }">
                            <a>پروژه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('outfit')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'outfit' }">
                            <a>هم سفر<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('training')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'training' }">
                            <a>تدریس<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li v-on:click="showList('contactus')"
                            :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'contactus' }">
                            <a>ارتباط با ما<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>

                <!-- Header Extra -->
                <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">

                </div>

            </div>
        </header>

        <!-- Menu -->
        <div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>

            <div class="menu_nav">
                <ul class="menu_mm">
                    <li v-on:click="showList('home')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'home' }">
                        <a>داشبورد<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('advertise')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'advertise' }">
                        <a>آگهی های تایید شده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('notconfirmed')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'notconfirmed' }">
                        <a>آگهی های تایید نشده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('users')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'users' }">
                        <a>کاربران<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('book')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'book' }">
                        <a>کتاب و جزوه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('furniture')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'furniture' }">
                        <a>وسایل خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('roommate')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'roommate' }">
                        <a>هم خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('project')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'project' }">
                        <a>پروژه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('outfit')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'outfit' }">
                        <a>هم سفر<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('training')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'training' }">
                        <a>تدریس<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('contactus')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'contactus' }">
                        <a>ارتباط با ما<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Navigation -->
            <nav class="sidebar_nav">
                <ul class="rtl">
                    <li v-on:click="showList('home')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'home' }">
                        <a>داشبورد<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('advertise')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'advertise' }">
                        <a>آگهی های تایید شده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('notconfirmed')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'notconfirmed' }">
                        <a>آگهی های تایید نشده<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('users')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'users' }">
                        <a>کاربران<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('book')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'book' }">
                        <a>کتاب و جزوه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('furniture')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'furniture' }">
                        <a>وسایل خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('roommate')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'roommate' }">
                        <a>هم خونه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('project')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'project' }">
                        <a>پروژه<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('outfit')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'outfit' }">
                        <a>هم سفر<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('training')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'training' }">
                        <a>تدریس<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                    <li v-on:click="showList('contactus')"
                        :class="{ 'sidebar_nav_ul_li_active' : this.activeList == 'contactus' }">
                        <a>ارتباط با ما<i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</template>

<script>

    import $ from 'jquery'
    import bjs from 'bootstrap/dist/js/bootstrap.min'
    import custome from './custom'

    import './main.css'
    import './bootstrap-rtl.css'
    import './responsive.css'

    export default {
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isAuthenticated
            }
        },
        name: "index",
        data() {
            return {
                activeList: 'home'
            }
        },
        methods: {
            showList: function (str) {
                this.$store.state.adminHeader = str
                this.activeList = str
                this.$emit('showComponent', str)
            },

        },
        created() {

        }
    }
</script>

<style scoped>

    .sidebar {
        position: fixed;
        top: 0;
        right: 0;
        width: 263px;
        height: 100vh;
        background: #1a1a1a;
        z-index: 100;
    }

    .info {
        width: 100%;
    }

    .info_content {
        padding-right: 41px;
        padding-top: 23px;
    }

    .menu_top {
        width: 100%;
    }

    .info_languages {
        cursor: pointer;
        padding-bottom: 5px;
        padding-left: 20px;
    }

    /*.info_languages::after {
        display: block;
        position: absolute;
        top: calc(50% - 1px);
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
        width: 2px;
        height: 10px;
        background: #FFFFFF;
        content: '';
    }*/

    .language_flag {
        display: inline-block;
        width: 20px;
        height: 12px;
        margin-left: 6px;
        vertical-align: center;
    }

    .language_flag img {
        max-width: 100%;
    }

    .dropdown_text {
        display: inline-block;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #FFFFFF;
        text-transform: uppercase;
        line-height: 0.75;
        vertical-align: center;
        margin-left: 15px;
        -webkit-transform: translateY(1px);
        -moz-transform: translateY(1px);
        -ms-transform: translateY(1px);
        -o-transform: translateY(1px);
        transform: translateY(1px);
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .has_children {
        z-index: 1;
    }

    .has_children:hover > .dropdown_text,
    .has_children ul .dropdown_text:hover {
        color: #bbe432;
    }

    .dropdown_arrow {
        display: inline-block;
        vertical-align: center;
    }

    .dropdown_arrow i {
        font-size: 12px;
        color: #FFFFFF;
    }

    .has_children ul {
        position: absolute;
        top: 100%;
        left: 0;
        visibility: hidden;
        opacity: 0;
        padding-top: 10px;
        padding-bottom: 15px;
        padding-left: 15px;
        padding-right: 15px;
        background: #1a1a1a;
        -webkit-transform: translateY(15px);
        -moz-transform: translateY(15px);
        -ms-transform: translateY(15px);
        -o-transform: translateY(15px);
        transform: translateY(15px);
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .has_children:hover ul {
        visibility: visible;
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        -ms-transform: translateY(0px);
        -o-transform: translateY(0px);
        transform: translateY(0px);
    }

    .has_children:hover i {
        color: #bbe432;
    }

    .has_children ul li:not(:last-child) {
        margin-bottom: 8px;
    }

    .has_children ul li a {
        display: block;
    }

    .has_children ul li a .dropdown_text {
        margin-left: 0;
    }

    .info_currencies {
        margin-right: 28px;
        padding-bottom: 5px;
        cursor: pointer;
    }

    .sidebar_logo {
        padding-right: 25px;
        padding-left: 26px;
        margin-top: 64px;
    }

    .sidebar_logo a {
        display: block;
    }

    .sidebar_logo a > div {
        border: solid 2px #bbe432;
        padding-top: 13px;
        padding-bottom: 13px;
        text-align: center;
        font-size: 48px;
        font-weight: 700;
        line-height: 0.75;
        color: #bbe432;
    }

    .sidebar_logo a > div span {
        text-transform: uppercase;
        color: #FFFFFF;
    }

    /* Navigation */
    .sidebar_nav {
        margin-top: 30px;
    }

    .sidebar_nav ul {
        width: 100%;
        display: inline-block;
    }

    .sidebar_nav ul li {
        padding: 15px 0;
        transition: all 0.3s ease-in-out;
    }

    .sidebar_nav ul li a {
        font-family: 'IRANSansWeb(FaNum)';
        font-size: 19px;
        padding-right: 20px !important;
        color: #FFFFFF;
        /*-webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;*/
    }

    .sidebar_nav ul li a i {
        margin-right: 10px;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .sidebar_nav ul li a:hover {
        color: #bbe432;
        cursor: pointer;
        text-decoration: none;
    }

    .sidebar_nav_ul_li_active {
        background-color: #0c8590 !important;
    }

    .sidebar_nav_ul_li_active a {
        color: #bbe432 !important;
    }

    .sidebar_nav ul li:hover {
        background-color: #0b7c87;
    }

    .sidebar_nav ul li:hover a {
        color: #bbe432;
    }

    .sidebar_nav ul li:hover a i {
        color: #bbe432;
        -webkit-transform: translateX(-10px);
        -moz-transform: translateX(-10px);
        -ms-transform: translateX(-10px);
        -o-transform: translateX(-10px);
        transform: translateX(-10px);
    }

    /*Search*/
    .search {
        width: 100%;
        height: 45px;
        background: transparent;
        padding-right: 45px;
        padding-left: 43px;
        margin-top: 58px;
    }

    .search_form {
        display: block;
        position: relative;
    }

    .search_input {
        text-align: right !important;
        width: 100%;
        height: 45px;
        background: transparent;
        border: none;
        outline: none;
        border-bottom: solid 1px #cacaca;
        color: #FFFFFF;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .search_input:focus,
    .search_input:hover {
        border-bottom: solid 1px #bbe432;
    }

    .search_button {
        position: absolute;
        top: 0;
        left: 0;
        width: 26px;
        height: 45px;
        background: transparent;
        border: none;
        outline: none;
        color: #FFFFFF;
        cursor: pointer;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .search_button:hover {
        color: #bbe432;
    }

    .search_button:active {
        border: none;
        outline: none;
    }

    .search_input::-webkit-input-placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        font-style: italic;
        color: #7f7d7d !important;
    }

    .search_input:-moz-placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        font-style: italic;
        color: #7f7d7d !important;
    }

    .search_input::-moz-placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        font-style: italic;
        color: #7f7d7d !important;
    }

    .search_input:-ms-input-placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        font-style: italic;
        color: #7f7d7d !important;
    }

    .search_input::placeholder {
        font-family: 'Poppins', sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        font-style: italic;
        color: #7f7d7d !important;
    }

    /* Cart */
    .cart {
        padding-right: 45px;
        padding-left: 43px;
        margin-top: 78px;
    }

    .cart_icon {
        width: 26px;
        height: 32px;
    }

    .cart_icon a {
        display: block;
        position: relative;
    }

    .cart_icon a img {
        max-width: 100%;
    }

    .cart_num {
        position: absolute;
        top: 17px;
        right: -11px;
        width: 23px;
        height: 23px;
        border-radius: 50%;
        background: #bbe432;
        text-align: center;
        line-height: 23px;
        font-size: 12px;
        font-weight: 600;
        color: #FFFFFF;
    }

    .cart_text {
        font-size: 14px;
        font-weight: 700;
        color: #FFFFFF;
        text-transform: uppercase;
        margin-right: 24px;
    }

    .cart_price {
        font-size: 14px;
        font-weight: 400;
        color: #FFFFFF;
        margin-right: 21px;
    }

    /*********************************
    4. Header
    *********************************/

    .header {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        width: 100vw;
        height: 70px;
        background: #1a1a1a;
        z-index: 100;
    }

    .header_content {
        width: 100%;
        height: 100%;
    }

    /* Logo */
    .header_logo {
        margin-right: 50px;
    }

    .header_logo a {
        display: block;
    }

    .header_logo a > div {
        border: solid 2px #bbe432;
        padding-top: 13px;
        padding-bottom: 13px;
        text-align: center;
        font-size: 18px;
        font-weight: 700;
        line-height: 0.75;
        color: #bbe432;
        padding-right: 14px;
        padding-left: 16px;
    }

    .header_logo a > div span {
        text-transform: uppercase;
        color: #FFFFFF;
    }

    /* Navigation */
    .header_nav {
        margin-right: 55px;
        direction: rtl !important;
        -webkit-transform: translateY(2px);
        -moz-transform: translateY(2px);
        -ms-transform: translateY(2px);
        -o-transform: translateY(2px);
        transform: translateY(2px);
    }

    .header_nav ul li:not(:last-child) {
        margin-left: 25px;
    }

    .header_nav ul li a {
        font-size: 14px;
        text-align: right !important;
        font-weight: 600;
        color: #FFFFFF;
        text-transform: uppercase;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .header_nav ul li a:hover {
        color: #bbe432;
    }

    .header_extra {
        -webkit-transform: translateY(4px);
        -moz-transform: translateY(4px);
        -ms-transform: translateY(4px);
        -o-transform: translateY(4px);
        transform: translateY(4px);
    }

    /* Cart */
    .header .cart {
        margin-left: 60px;
        margin-right: 40px;
        margin-top: -7px;
        padding-right: 5px;
        padding-left: 5px;
    }

    /* Hamburger */
    .hamburger {
        display: none;
        margin-right: 25px;
        cursor: pointer;
        -webkit-transform: translateY(3px);
        -moz-transform: translateY(3px);
        -ms-transform: translateY(3px);
        -o-transform: translateY(3px);
        transform: translateY(3px);
    }

    .hamburger i {
        font-size: 20px;
        color: #FFFFFF;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .hamburger:hover i {
        color: #bbe432;
    }

    /*********************************
    5. Menu
    *********************************/

    .menu {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100vh;
        background: #1a1a1a;
        z-index: 101;
        padding-left: 90px;
        padding-top: 87px;
        padding-right: 20px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }

    .menu.active {
        right: 0;
    }

    .menu_close_container {
        position: absolute;
        top: 30px;
        left: 60px;
        width: 18px;
        height: 18px;
        transform-origin: center center;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        cursor: pointer;
    }

    .menu_close {
        width: 100%;
        height: 100%;
        transform-style: preserve-3D;
    }

    .menu_close div {
        width: 100%;
        height: 2px;
        background: #FFFFFF;
        top: 8px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .menu_close div:last-of-type {
        -webkit-transform: rotate(-90deg) translateX(2px);
        -moz-transform: rotate(-90deg) translateX(2px);
        -ms-transform: rotate(-90deg) translateX(2px);
        -o-transform: rotate(-90deg) translateX(2px);
        transform: rotate(-90deg) translateX(2px);
        transform-origin: center;
    }

    .menu_close:hover div {
        background: #bbe432;
    }

    .menu .logo {
        margin-bottom: 60px;
    }

    .menu_nav {
        text-align: right !important;
        direction: rtl !important;
        width: 100% !important;
    }

    .menu_nav ul li:not(last-child) {
        margin-bottom: 4px;
    }

    .menu_nav ul li a {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        text-transform: uppercase;
        color: #FFFFFF;
        font-weight: 600;
        letter-spacing: 0.05em;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .menu_nav ul li a:hover {
        color: #bbe432;
    }

    .menu_search {
        width: 100%;
        margin-top: 30px;
        margin-bottom: 67px;
        display: inline-block;
        -webkit-transform: translateY(2px);
        -moz-transform: translateY(2px);
        -ms-transform: translateY(2px);
        -o-transform: translateY(2px);
        transform: translateY(2px);
    }

    .menu .header_search_form {
        width: 100%;
    }

    .search form {
        position: relative;
    }

    .menu .search_input {
        width: 100%;
        background: transparent;
        height: 42px;
        border: none;
        outline: none;
        padding-right: 20px;
        border-bottom: solid 2px #d9d9d9;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .menu .search_input::-webkit-input-placeholder {
        font-size: 12px !important;
        font-style: italic;
        font-weight: 400 !important;
        color: #FFFFFF !important;
    }

    .menu .search_input:-moz-placeholder {
        font-size: 12px !important;
        font-style: italic;
        font-weight: 400 !important;
        color: #FFFFFF !important;
    }

    .menu .search_input::-moz-placeholder {
        font-size: 12px !important;
        font-style: italic;
        font-weight: 400 !important;
        color: #FFFFFF !important;
    }

    .menu .search_input:-ms-input-placeholder {
        font-size: 12px !important;
        font-style: italic;
        font-weight: 400 !important;
        color: #FFFFFF !important;
    }

    .menu .search_input::placeholder {
        font-size: 12px !important;
        font-style: italic;
        font-weight: 400 !important;
        color: #FFFFFF !important;
    }

    .menu .search_input:focus,
    .menu .search_input:hover {
        border-bottom: solid 2px #bbe432;
    }

    .header_search_button {
        position: absolute;
        top: 0;
        left: 0;
        width: 40px;
        height: 100%;
        border: none;
        outline: none;
        cursor: pointer;
        background: transparent;
    }

    .header_search_button:focus {
        outline: none;
    }

    .header_search_button i {
        font-size: 16px;
        color: #d9d9d9;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .header_search_button:hover i {
        color: #bbe432;
    }

    .menu_extra {
        position: absolute;
        right: 50px;
        bottom: 30px;
    }

    .menu_social {
        font-size: 12px;
    }

    .menu_social {
        margin-left: -6px;
        margin-top: 5px;
    }

    .menu_social ul {
        display: inline-block;
    }

    .menu_social ul li {
        display: inline-block;
    }

    .menu_social ul li a i {
        font-size: 14px;
        color: rgba(255, 255, 255, 1);
        padding: 6px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .menu_social ul li a i:hover {
        color: #bbe432;
    }

</style>

