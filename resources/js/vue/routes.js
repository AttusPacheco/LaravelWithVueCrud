export const routes = [
    {
        name: 'home',
        path: '/',
        apiPath: '/',
        component: (() => import('./pages/home.vue'))
    },
    {
        name: 'users',
        path: '/usuarios',
        redirect: "/usuarios/listagem",
        children: [
            {
                name: 'users.index',
                path: 'listagem',
                component: (() => import('./pages/users/index.vue'))
            },
            {
                name: 'users.create',
                path: 'criar',
                component: (() => import('./pages/users/create.vue'))
            },
            {
                name: 'users.edit',
                path: 'editar/:id',
                component: (() => import('./pages/users/edit.vue'))
            }
        ]
    }
]
