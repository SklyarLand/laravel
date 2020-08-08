import VueRouter from 'vue-router';
import Home from './components/Home';

export default new VueRouter({
    routes: [
        {
            path: '/home',
            component: Home,
            name: 'Home'
        }
        /*{
            path: '/home/posts',
            component: Posts,
            name: 'Home/Posts'
        }*/
    ],
    mode: 'history'
})

