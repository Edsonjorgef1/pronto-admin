import '@/assets/tailwind.css'
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'
import axios from 'axios'
import Notifications from '@kyvg/vue3-notification'
import {plugin as formkitPlugin, defaultConfig as formkitConfig} from '@formkit/vue'
import {createPinia} from 'pinia'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

const pages = import.meta.glob('./Pages/**/*.vue')

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const importPage = pages[`./Pages/${name}.vue`]

        if (!importPage) {
            throw new Error(`Unknown page ${name}. Is it located under Pages with a .vue extension?`)
        }

        return typeof importPage === 'function'
            ? importPage()
            : importPage
    },
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .use(formkitPlugin, formkitConfig({
                config: {
                    rootClasses(sectionKey, node) {
                        // this is an incomplete theme for demonstration purposes
                        const type = node.props.type
                        // create a classConfig object that contains either strings or functions
                        // that return strings. We'll loop over the output later to create our
                        // class objects of keys with boolean values.
                        const classConfig = {
                            outer: 'mb-5', // string values apply to everything
                            legend: 'block mb-1 font-bold',
                            label() { // functions that return strings allow you to diff on types
                                if (type === 'text') {
                                    return 'block mb-1 font-bold'
                                }
                                if (type === 'radio') {
                                    return 'text-sm text-gray-600 mt-0.5'
                                }
                            },
                            options() {
                                if (type === 'radio') {
                                    return 'flex flex-col flex-grow mt-2'
                                }
                            },
                            input() {
                                if (type === 'text') {
                                    return 'w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline'
                                }
                                if (type === 'radio') {
                                    return 'mr-2'
                                }
                            },
                            wrapper() {
                                if (type === 'radio') {
                                    return 'flex flex-row flex-grow'
                                }
                            },
                            help: 'text-xs text-gray-500'
                        }

                        // helper function to created class object from strings
                        const createClassObject = (classesArray) => {
                            const classList = {}
                            if (typeof classesArray !== 'string') {
                                return classList
                                classesArray.split(' ').forEach(className => {
                                    classList[className] = true
                                })
                                return classList
                            }
                        }

                        const target = classConfig[sectionKey]
                        // return a class objects from strings and return them for each
                        // section key defined by inputs in FormKit
                        if (typeof target === 'string') {
                            return createClassObject(target)
                        } else if (typeof target === 'function') {
                            return createClassObject(target())
                        }

                        return {} // if no matches return an empty object
                    }
                }
            }))
            .use(Notifications)
            .use(createPinia())
            .mixin({
                methods: {
                    route: window.route
                }
            })
            .mount(el)
    }
})

InertiaProgress.init({color: '#4B5563'})
