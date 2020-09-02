import Home from '../views/Home.vue';
import About from '../views/About.vue';
import CrudHome from '../views/cruds/CrudHome.vue';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/cruds',
            name: 'crudhome',
            component: CrudHome,
        }
    ]
}
