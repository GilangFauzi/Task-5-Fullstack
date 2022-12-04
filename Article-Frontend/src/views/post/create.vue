<template>
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Article</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <router-link :to="{ name: 'home.index' }" class="nav-link">Home</router-link>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link active" href="#">Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Category</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> -->

                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="card shadow mb-5">
                            <div class="card-header">
                                Create Post
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="store()">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" v-model="posts.title" ref="title">
                                        <div v-if="validation.title" class="text-danger">
                                            {{ validation.title[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea type="text" class="form-control" id="content"
                                            v-model="posts.content"></textarea>
                                        <div v-if="validation.content" class="text-danger">
                                            {{ validation.content[0] }}
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="text" class="form-control" id="image" v-model="posts.image">

                                        <div v-if="validation.image" class="text-danger">
                                            {{ validation.image[0] }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">User ID</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    v-model="posts.user_id">
                                                    <option selected>--Select User ID--</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <div v-if="validation.user_id" class="text-danger">
                                                    {{ validation.user_id[0] }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Category ID</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    v-model="posts.category_id">
                                                    <option selected>--Select Category--</option>
                                                    <option value="1">Web Developer</option>
                                                    <option value="2">Programming</option>
                                                    <option value="3">Software Engineer</option>
                                                </select>
                                                <div v-if="validation.category_id" class="text-danger">
                                                    {{ validation.category_id[0] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">Submit</button>
                                    <router-link :to="{ name: 'post.index' }"
                                        class="btn btn-outline-success float-end">Back to Post
                                    </router-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'

export default {

    setup() {

        const posts = reactive({
            title: '',
            content: '',
            image: '',
            user_id: '',
            category_id: ''
        });

        const validation = ref([]);
        const router = useRouter();

        function store() {
            axios.post(
                'http://127.0.0.1:8000/api/post',posts
            ).then(() => {
                router.push({
                    name: 'post.index'
                })

            }).catch((err) => {
                validation = err.response.data
            })
        }

        return {
            posts,
            validation,
            router,
            store,
        }
    }

}
</script>