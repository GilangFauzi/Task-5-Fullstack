<template>
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="container">
                    <router-link :to="{ name: 'category.create' }" class="btn btn-success rounded mb-3">Add
                        New Category  <i class="fa-solid fa-file-circle-plus"></i>
                    </router-link>

                    <table class="table table-striped rounded table-hover shadow">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(categories, index) in category.data" :key="index">
                                <td>{{ categories.name }}</td>
                                <td>{{ categories.user.name }}</td>
                                <td> {{ moment(categories.created_at).format("ddd-DD-MM-YYYY") }}</td>
                                <td> {{ moment(categories.updated_at).format("ddd-DD-MM-YYYY") }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger"
                                        @click.prevent="destroy(categories.id, index)">
                                        Delete
                                    </button>
                                    <router-link :to="{ name: 'category.edit', params: { id: categories.id } }"
                                        class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'
import moment from 'moment';

export default {

    setup() {
        // ref buat nampung data
        let category = ref([]);

        onMounted(() => {
            axios.get('http://127.0.0.1:8000/api/categories')

                .then((result) => {
                    category.value = result.data
                }).catch(() => {
                    console.log(err.response)
                });

        });

        function destroy(id, index) {
            axios.delete(
                `http://127.0.0.1:8000/api/categories/${id}`
            ).then(() => {
                category.value.data.splice(index, 1)
            }).catch((err) => {
                console.log(err.response.data)
            });
        }
        return {
            category,
            moment: moment,
            destroy
        }
    }

}
</script>