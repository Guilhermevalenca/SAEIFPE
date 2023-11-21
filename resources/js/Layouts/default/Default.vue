<template>
    <v-app>
        <header>
            <section>
                <DefaultAppBar @drawer="isDrawerOpen = !isDrawerOpen" />
            </section>
            <section>
                <slot name="header" />
            </section>
        </header>
        <v-main class="ma-5 person-main">
            <section>
                <ItemDrawer v-model="isDrawerOpen" />
            </section>
            <section>
                <slot />
            </section>
            <section>
                <!-- Pra caso necessite de uma segunda section para sua pagina -->
                <slot name="main-2" />
            </section>
        </v-main>
        <v-footer class="bg-transparent">
            <slot name="footer" />
        </v-footer>
    </v-app>
</template>

<script>
import DefaultAppBar from "@/Layouts/default/AppBar.vue";
import ItemDrawer from "@/Layouts/default/ItemDrawer.vue";
export default {
    name: "Default",
    components: {ItemDrawer, DefaultAppBar},
    data() {
        return {
            isDrawerOpen: false
        }
    },
    created() {

    }
}
</script>

<style lang="scss">
</style>
