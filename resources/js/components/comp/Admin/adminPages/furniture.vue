<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>title</th>
                <th>city</th>
                <th>uni</th>
                <th>needtype</th>
                <th>price</th>
                <th>action</th>
                <th>action2</th>
            </tr>
            <tr v-for="fur in furnitures">
                <td> {{ fur.title }}</td>
                <td> {{ fur.city }}</td>
                <td> {{ fur.university }}</td>
                <td> {{fur.needtype }}</td>
                <td> {{ fur.price }}</td>
                <td v-on:click="deleteRow(fur.id)">delete</td>
                <td v-on:click="view(fur.category_id,fur.slug)">
                    view
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "furniture",
        data() {
            return {
                furnitures: {}
            }
        },
        props: {},
        created() {
            axios.get('api/admin/furnitures').then(res => {
                this.furnitures = res.data.data
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
                        window.location.reload();
                        this.$router.push('/admin/dashboord')
                    }).catch(error => {
                    console.log(error)
                })
            },
            view: function (category_id,slug) {
                this.$router.push('/showTeezer/'+category_id+'/'+slug)
            },
        }
    }
</script>

<style scoped>

</style>
