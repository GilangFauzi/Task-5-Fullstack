//Navbar.vue
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color :#42b983">Article</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to="{ name: 'home.index' }" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'post.index' }" class="nav-link">Post</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'category.index' }" class="nav-link">Category</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
