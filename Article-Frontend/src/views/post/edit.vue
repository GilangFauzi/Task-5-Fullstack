<template>
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-8">

                <div class="card rounded shadow">
                    <div class="card-header">
                        Edit Data
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update()">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" v-model="post.title">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" v-model="post.content"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="text" class="form-control" id="image" v-model="post.image">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">User ID</label>
                                        <select class="form-select" aria-label="Default select example"
                                            v-model="post.user_id">
                                            <option selected>--Select User ID--</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Category ID</label>
                                        <select class="form-select" aria-label="Default select example"
                                            v-model="post.category_id">
                                            <option selected>--Select Category--</option>
                                            <option value="1">Web Developer</option>
                                            <option value="2">Programming</option>
                                            <option value="3">Software Engineer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-success">Submit</button>
                            <router-link :to="{ name: 'post.index' }" class="btn btn-outline-success float-end">Back to
                                Post
                            </router-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {
    setup() {

        let post = reactive({
            title: '',
            content: '',
            image: '',
            user_id: '',
            category_id: ''
        });
        const validation = ref([]);
        const router = useRouter();
        const route = useRoute();

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/post/${route.params.id}`)
                .then((result) => {
                    post.title = result.data.data.title
                    post.content = result.data.data.content
                    post.image = result.data.data.image
                    post.user_id = result.data.data.user_id
                    post.category_id = result.data.data.category_id
                }).catch((err) => {
                    console.log(err.response.data)
                });
        });

        function update() {

            axios.put(
                `http://127.0.0.1:8000/api/post/${route.params.id}`,
                post
            ).then(() => {

                router.push({
                    name: 'post.index'
                });

            }).catch((err) => {
                validation.value = err.response.data
            });
        }


        return {
            post,
            validation,
            router,
            update,
        }
    }
}
</script>