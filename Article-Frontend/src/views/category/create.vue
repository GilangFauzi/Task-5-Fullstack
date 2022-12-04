<template>
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="card shadow mb-5">
                            <div class="card-header">
                                Create Category
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="store()">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" v-model="category.name">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">User ID</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    v-model="category.user_id">
                                                    <option selected>--Select User ID--</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">Submit</button>
                                    <router-link :to="{ name: 'category.index' }"
                                        class="btn btn-outline-success float-end">Back to Category
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

        const category = reactive({
            name: '',
            user_id: ''
        });

        const validation = ref([]);
        const router = useRouter();

        function store() {
            axios.post(
                'http://127.0.0.1:8000/api/categories',
                category
            ).then(() => {
                router.push({
                    name: 'category.index'
                })

            }).catch((err) => {
                validation.value = err.response.data
            })
        }

        return {
            category,
            validation,
            router,
            store,
        }
    }

}
</script>