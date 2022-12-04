<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <div class="card shadow">
                        <div class="card-header">
                            Detail Post
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ post.title }}
                            </h5>
                            <h6 class=" d-inline card-subtitle mb-2 text-muted">By {{ post.user }} </h6>
                            <h6 class=" d-inline card-subtitle mb-2 text-muted"> || Category: {{ post.name }}</h6>
                            <hr>
                            <p class="card-text">{{ post.content }}</p>
                            <hr>
                            <p class="card-text">Image : {{ post.image }}</p>
                            <hr>
                            <!-- <p class="card-text"> User ID : {{ post.user_id }}</p> -->
                            <!-- <p class="card-text"> User ID : {{ post.user }}</p> -->
                            <!-- <p class="card-text">Category ID :{{ post.category_id }}</p> -->
                            <!-- <p class="card-text">Category : {{ post.name }}</p> -->

                            <router-link :to="{ name: 'post.index' }" class="btn btn-success rounded mb-3">Back to Post
                            </router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>




<script>
import { reactive, onMounted } from 'vue'
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
        const router = useRouter();
        const route = useRoute();

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/post/${route.params.id}`)
                .then((result) => {
                    post.title = result.data.data.title
                    post.content = result.data.data.content
                    post.image = result.data.data.image
                    // post.user_id = result.data.data.user_id
                    // post.category_id = result.data.data.category_id
                    post.user = result.data.data.user.name
                    post.name = result.data.data.categories.name
                }).catch((err) => {
                    console.log(err.response.data)
                });
        });


        return {
            post,
            router,
        }
    }
}
</script>