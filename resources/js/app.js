import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faHeart, faStar, faComment, faArrowRight, faTrash, faFilePen, faMagnifyingGlass, faUser, faLock, faCrown, faLaptop, faCircleExclamation, faXmark, faUserGroup, faFileLines, faCalendar, faEye } from '@fortawesome/free-solid-svg-icons';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

library.add(faHeart, faStar, faComment, faArrowRight, faTrash, faFilePen, faUser, faLock, faCrown, faLaptop, faMagnifyingGlass, faCircleExclamation, faXmark, faUserGroup, faFileLines, faCalendar, faEye);


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) }).component('font-awesome-icon', FontAwesomeIcon)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
