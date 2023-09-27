<template>
  <v-app>
    <ItemDrawer v-model="isDrawerOpen" />

    <default-bar @drawer="isDrawerOpen = !isDrawerOpen" />

    <default-view />
  </v-app>
</template>

<script>
  import DefaultBar from './AppBar.vue'
  import DefaultView from './View.vue'
  import ItemDrawer from "@/layouts/default/ItemDrawer.vue";
  export default {
    components: {
      ItemDrawer,
      DefaultBar,
      DefaultView
    },
    data() {
      return {
        isDrawerOpen: false
      }
    }
  }
</script>
