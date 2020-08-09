import VueRouter from 'vue-router';
import Home from './components/Home';
import Posts from './components/Post';
import Tasks from './components/Tasks';

export default new VueRouter({
    routes: [
        /*{
            path: '/tasks',
            component: Tasks,
            name: 'Tasks'
        },
        {
            path: '/posts',
            component: Posts,
            name: 'Posts'
        },
        {
            path: '/home',
            component: Home,
            name: 'Home'
        }*/
    ],
    mode: 'history'
})

