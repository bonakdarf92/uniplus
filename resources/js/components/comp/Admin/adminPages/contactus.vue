<template>
    <div class="col-12">
        <table class="rtl mt-5 pt-5">
            <tr>
                <th>description</th>
                <th>name</th>
                <th>email</th>
                <th>created_at</th>
                <th>action2</th>
            </tr>
            <tr v-for="fur in contactuses">
                <td> {{ fur.description }}</td>
                <td> {{ fur.name }}</td>
                <td> {{ fur.email }}</td>
                <td> {{fur.created_at }}</td>
<!--                <td v-on:click="view(fur.category_id,fur.slug)">-->
<!--                    view-->
<!--                </td>-->
            </tr>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "contactus",
        data() {
            return {
                contactuses: {}
            }
        },
        props: {},
        created() {
            axios.get('api/admin/contactus').then(res => {
                this.contactuses = res.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
