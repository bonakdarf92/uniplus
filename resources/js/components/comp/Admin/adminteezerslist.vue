<template>
    <div>
        <headers @showComponent="changeView($event)"></headers>
        <div class="admin-box-view">

            <div v-if="showComponent === 'users'">
                <users/>
            </div>
            <div v-if="showComponent === 'home'">
                <home/>
            </div>
            <div v-if="showComponent === 'notconfirmed'">
              <notConfirmed/>
            </div>
            <div v-if="showComponent === 'advertise'">
                <advertise/>
            </div>
            <div v-if="showComponent === 'book'">
                <book/>
            </div>
            <div v-if="showComponent === 'furniture'">
                <furniture/>
            </div>
            <div v-if="showComponent === 'roommate'">
                <roommate/>
            </div>
            <div v-if="showComponent === 'project'">
                <project/>
            </div>
            <div v-if="showComponent === 'outfit'">
               <outfit/>
            </div>
            <div v-if="showComponent === 'training'">
                <training/>
            </div>
            <div v-if="showComponent === 'contactus'">
                <contactus/>
            </div>


        </div>

    </div>
</template>

<script>

    import $ from 'jquery'
    import headers from './adminHeader/adminheader'
    import Users from "./adminPages/users";
    import Advertise from "./adminPages/advertise";
    import Book from "./adminPages/book";
    import Furniture from "./adminPages/furniture";
    import notConfirmed from "./adminPages/notConfirmed";
    import Home from "./adminPages/home";
    import Roommate from "./adminPages/roommate";
    import Project from "./adminPages/project";
    import Outfit from "./adminPages/outfit";
    import Training from "./adminPages/training";
    import contactus from "./adminPages/contactus";

    export default {
        name: "adminteezerlist",
        components: {
            Furniture,
            Book,
            Advertise,
            Users,
            headers,
            notConfirmed,
            Home,
            Training,
            Outfit,
            Project,
            Roommate,
            contactus

        },
        data() {
            return {
                showComponent: 'home'
            }
        },
        methods: {
            changeView: function (view) {
                this.showComponent = view
            }
        }
    }
</script>

<style >

    .admin-box-view{
        width: 100%;
        padding-right: 263px;
    }

    @media (max-width: 1200px) {
        .admin-box-view{
            width: 100%;
            padding-right: 0;
            padding-top: 70px;
        }
    }

    .active-tag {
        border-radius: 5px;
        background-color: #E76F51 !important;
        color: white !important;
    }

    @media (max-width: 576px) {
        .box-content {
            width: 95.8%;
            margin: 0 auto !important;
        }
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: right;
        border-bottom: 1px solid #ddd;
    }

</style>
