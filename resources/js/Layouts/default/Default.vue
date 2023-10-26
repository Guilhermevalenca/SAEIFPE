<template>
    <v-app>
        <ItemDrawer v-model="isDrawerOpen" />

        <DefaultAppBar @drawer="isDrawerOpen = !isDrawerOpen" />

        <v-main>
            <slot />
        </v-main>
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
    }
}
</script>

<style scoped>

</style>
