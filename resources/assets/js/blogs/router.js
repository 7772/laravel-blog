import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

/** Screens */
import HomeScreen from "./screens/HomeScreen";
import LoginScreen from "./screens/LoginScreen";
import RegisterPostScreen from "./screens/RegisterPostScreen";
import ShowPostScreen from "./screens/ShowPostScreen";

/** Components */
import PostList from "./components/PostList";

const routes = [
    {path: '/', component: HomeScreen},
    {path: '/login', component: LoginScreen},
    {path: '/posts/register', component: RegisterPostScreen, name: 'register-post'},
    {path: '/posts/:id', name: 'show-post', component: ShowPostScreen, props: true}
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router;