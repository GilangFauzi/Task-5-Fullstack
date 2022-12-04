<!-- <template> -->
  <!-- <img alt="Vue logo" src="./assets/logo.png" />
  <HelloWorld msg="Hello Vue 3.0 + Vite" /> -->
  <!-- <router-view></router-view> -->
<!-- </template> -->

<!-- <script> -->
<!-- // import HelloWorld from './components/HelloWorld.vue'

export default {
  // name: 'App',
  // components: {
  //   HelloWorld
  // }
} -->
<!-- </script> -->

//App.vue
<template>
  <div id="app">
    <Navbar />
    <div class="container pt-4">
      <router-view />
    </div>
  </div>
</template>
<script>
import Navbar from './components/Navbar.vue'

export default {
  components: {
    Navbar
  }
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

#app .navbar-nav a {
  color: #2c3e50;
  cursor: pointer;
}

#app .navbar-nav a.router-link-exact-active {
  color: #42b983;
  font-weight: bold;
}
</style>

