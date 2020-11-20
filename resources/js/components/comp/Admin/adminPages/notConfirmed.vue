<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>cat ID</th>
                <th>title</th>
                <th>needtype</th>
                <th>price</th>
                <th>city</th>
                <th>university</th>
                <th>status</th>
                <th>action</th>
            </tr>
            <tr v-for="add in adds.data">
                <td> {{ add.category_id }}</td>
                <td> {{ add.title }}</td>
                <td> {{ add.needtype }}</td>
                <td> {{ add.price }}</td>
                <td> {{ add.city }}</td>
                <td> {{ add.university }}</td>
                <td> {{ add.status }}</td>
                <td v-on:click="view(add.category_id,add.slug)">
                   view
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "notConfirmed",
        data() {
            return {
                adds: {}
            }
        },
        props: {},
        created() {
            axios.get('api/admin/notverifiedlist').then(res => {
                this.adds = res.data
            }).catch(error => {
                console.log(error)
            })
        },
        methods: {
            deleteRow:function (id) {
                let obj = {id :id}
                alert("آیا مطمین هستین که این آگهی را پاک کنید")
                axios.post('api/admin/deleteteezer',obj)
                    .then(res => {
                        this.$router.push('/admin/dashboord')
                    }).catch(error => {
                    console.log(error)
                })
            },
            view: function (category_id,slug) {
                this.$router.push('/confirmteezer/'+category_id+'/'+slug)
            },
        }
    }
</script>

<style>

</style>
