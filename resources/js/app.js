import './bootstrap'
import { Ziggy } from './ziggy'
import { ZiggyVue } from 'ziggy'
import { createApp, h } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from "vue"
import { createInertiaApp } from '@inertiajs/vue3'
import { Link } from "@inertiajs/vue3"
import AOS from "aos"
import Layout from "./Pages/MainLayout.vue"
createInertiaApp({  
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
   let page =  pages[`./Pages/${name}.vue`].default
   page.layout= Layout
   return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(AOS.init())
      .use(Ziggy,ZiggyVue)
      .mixin({methods:{route}})
      .component("Link",Link)
      .component("Layout",Layout)
      .mount(el)
  },

 
})