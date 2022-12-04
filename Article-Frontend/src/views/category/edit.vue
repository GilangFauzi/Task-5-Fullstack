<template>
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-8">

                <div class="card rounded shadow">
                    <div class="card-header">
                        Edit Data Category
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update()">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" v-model="categories.name">
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <select class="form-select" aria-label="Default select example" id="user_id" v-model="categories.user_id">
                                    <option selected>--Select User ID--</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <button class="btn btn-outline-success">Submit</button>
                            <router-link :to="{ name: 'category.index' }" class="btn btn-outline-success float-end">Back to
                                Category
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

        let categories = reactive({
            name: '',
            user_id: ''
        });
        const validation = ref([]);
        const router = useRouter();
        const route = useRoute();

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/categories/${route.params.id}`)
                .then((result) => {
                    categories.name = result.data.data.name
                    categories.user_id = result.data.data.user_id
                }).catch((err) => {
                    console.log(err.response.data)
                });
        });

        function update() {

            axios.put(
                `http://127.0.0.1:8000/api/categories/${route.params.id}`,
                categories
            ).then(() => {

                router.push({
                    name: 'category.index'
                });

            }).catch((err) => {
                validation.value = err.response.data
            });
        }


        return {
            categories,
            validation,
            router,
            update,
        }
    }
}
</script>