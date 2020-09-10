import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Crud from '../pages/cruds/CrudHome.vue';
import Order from '../pages/orders/OrderHome.vue';
import Event from '../pages/events/EventHome.vue';

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
            component: Crud,
        },
        {
            path: '/orders',
            name: 'orderhome',
            component: Order,
        },
        {
            path: '/events',
            name: 'eventhome',
            component: Event,
        }
    ]
}
