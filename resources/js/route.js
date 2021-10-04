export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('./components/Home')
        }
    ]
}
