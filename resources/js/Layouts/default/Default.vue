<template>
    <v-app>
        <header>
            <DefaultAppBar @drawer="isDrawerOpen = !isDrawerOpen" />
        </header>
        <v-main class="ma-5">
            <section>
                <ItemDrawer v-model="isDrawerOpen" />
            </section>
            <section>
                <slot />
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

<style scoped>

</style>
