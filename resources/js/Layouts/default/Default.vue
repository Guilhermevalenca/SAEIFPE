<template>
    <v-app>
        <ItemDrawer v-model="isDrawerOpen" />

        <DefaultAppBar @drawer="isDrawerOpen = !isDrawerOpen" />

        <v-main class="ma-5">
            <slot />
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
