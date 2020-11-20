<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>advertise Counter</th>
                <th>user Counter</th>
            </tr>
            <tr>
                <td> {{ this.advertiseCounter }}</td>
                <td> {{ this.userCounter }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "home",
        data() {
            return {
                advertiseCounter: '',
                userCounter:''
            }
        },
        props: {},
        created() {
            axios.get('api/admin/advertiseCounter').then(res => {
                this.advertiseCounter = res.data
            }).catch(error => {
                console.log(error)
            })
            axios.get('api/admin/userCounter').then(res => {
                this.userCounter = res.data
            }).catch(error => {
                console.log(error)
            })
        },
        methods: {
        }
    }
</script>

<style>

</style>
