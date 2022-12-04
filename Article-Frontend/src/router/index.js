//import vue router
import { createRouter, createWebHistory } from "vue-router";

//define a routes
const routes = [

  // Home
  {
    path: "/",
    name: "home.index",
    component: () => import("../views/home/index.vue"),
  },
  // Post
  {
    path: "/",
    name: "post.index",
    component: () => import("../views/post/index.vue"),
  },
  {
    path: "/detail/:id",
    name: "post.detail",
    component: () => import("../views/post/detail.vue"),
  },
  {
    path: "/create",
    name: "post.create",
    component: () => import("../views/post/create.vue"),
  },
  {
    path: "/edit/:id",
    name: "post.edit",
    component: () => import("../views/post/edit.vue"),
  },

  // Category
  {
    path: "/",
    name: "category.index",
    component: () => import("../views/category/index.vue"),
  },
  {
    path: "/",
    name: "category.create",
    component: () => import("../views/category/create.vue"),
  },
  {
    path: "/edit/:id",
    name: "category.edit",
    component: () => import("../views/category/edit.vue"),
  },
];

//create router
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
