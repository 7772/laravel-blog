import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

/** Screens */
import HomeScreen from "./screens/HomeScreen";
import LoginScreen from "./screens/LoginScreen";

/** Components */
import PostList from "./components/PostList";

const routes = [
    {path: '/', component: HomeScreen},
    {path: '/login', component: LoginScreen},
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router;