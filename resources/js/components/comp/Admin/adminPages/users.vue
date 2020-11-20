<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>id</th>
                <th>phone</th>
                <th>role</th>
                <th>total score</th>
                <th>action</th>
            </tr>
            <tr v-for="userr in users">
                <td> {{ userr.id }}</td>
                <td> {{ userr.phone }}</td>
                <td> {{ userr.role }}</td>
                <td> {{userr.total_score }}</td>
                <td v-on:click="deleteRow(userr.id)">delete</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "users",
        data() {
            return {
                users: {}
            }
        },
        props: {},
        created() {
            axios.get('api/admin/users').then(res => {
                this.users = res.data.users
            }).catch(error => {
                console.log(error)
            })
        },
        methods: {
            deleteRow:function (id) {
                let obj = {id :id}
                alert("آیا مطمین هستین که این آگهی را پاک کنید")
                axios.post('api/admin/deleteUser',obj)
                    .then(res => {
                        window.location.reload();
                        this.$router.push('/admin/dashboord')
                    }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style>

</style>
