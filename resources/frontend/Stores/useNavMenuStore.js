import {defineStore, acceptHMRUpdate} from 'pinia'

export const useNavMenuStore = defineStore({
    id: 'navMenu',

    state: () => ({
        items: [
            { text: 'Dashboard', routeName: 'dashboard'},
            { text: 'Databases', routeName: 'admin.databases'},
        ],
    }),

    getters: {
        navItems() {
            return this.items.map(item => ({
                text: item.text,
                href: item.routeName,
                isActive: item.routeName,
            }))
        }
    },

})

if (import.meta.hot) {
    import.meta.hot.accept(acceptHMRUpdate(useNavMenuStore, import.meta.hot))
}
