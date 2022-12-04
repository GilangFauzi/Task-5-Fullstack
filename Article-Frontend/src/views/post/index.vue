<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <router-link :to="{ name: 'post.create' }" class="btn btn-success rounded mb-3">Add
                        New Post <i class="fa-solid fa-file-circle-plus"></i>
                    </router-link>

                    <table class="table table-striped rounded table-hover shadow">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <!-- <th scope="col">Content</th> -->
                                <!-- <th scope="col">Image</th> -->
                                <!-- <th scope="col">User ID</th> -->
                                <th scope="col">Category</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts.data" :key="index">
                                <td>{{ post.title }}</td>
                                <!-- <td width="450px">{{ post.content }}</td>
                            <td>{{ post.image }}</td>
                            <td>{{ post.user_id }}</td> -->
                                <td>{{ post.categories.name }}</td>
                                <td> {{ moment(post.created_at).format("ddd-DD-MM-YYYY") }}</td>
                                <td> {{ moment(post.created_at).format("ddd-DD-MM-YYYY") }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger"
                                        @click.prevent="destroy(post.id, index)">
                                        Delete
                                    </button>
                                    <router-link :to="{ name: 'post.edit', params: { id: post.id } }"
                                        class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </router-link>
                                    <router-link :to="{ name: 'post.detail', params: { id: post.id } }"
                                        class="btn btn-sm btn-outline-info">
                                        Detail
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
        let posts = ref([]);

        onMounted(() => {
            axios.get('http://127.0.0.1:8000/api/post')

                .then((result) => {
                    posts.value = result.data
                }).catch(() => {
                    console.log(err.response)
                });

        });

        function destroy(id, index) {
            axios.delete(
                `http://127.0.0.1:8000/api/post/${id}`
            ).then(() => {
                posts.value.data.splice(index, 1)
            }).catch((err) => {
                console.log(err.response.data)
            });
        }

        // const formattedDate = moment(posts.created_at).format('YYYYMMDD')

        return {
            posts,
            moment: moment,
            // post: {},
            destroy
        }
    }

}
</script>