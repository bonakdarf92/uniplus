
<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>city</th>
                <th>uni</th>
                <th>needtype</th>
                <th>category</th>
                <th>price</th>
                <th>action</th>
                <th>action2</th>
            </tr>
            <tr v-for="book in books">
                <td> {{ book.id }}</td>
                <td> {{ book.title }}</td>
                <td> {{ book.city }}</td>
                <td> {{ book.university }}</td>
                <td> {{ book.category_id }}</td>
                <td> {{book.needtype }}</td>
                <td> {{ book.price }}</td>
                <td v-on:click="deleteRow(book.id)">delete</td>
                <td v-on:click="view(book.category_id,book.slug)">
                    view
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "roommate",
        data() {
            return {
                books: {
                }
            }
        },
        props: {},
        created() {
            axios.get('api/product').then(res => {
                this.books = res.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        methods: {
            deleteRow:function (id) {
                let obj = {id :id}
                alert("آیا مطمین هستین که این آگهی را پاک کنید")
                axios.post('api/product',obj)
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
