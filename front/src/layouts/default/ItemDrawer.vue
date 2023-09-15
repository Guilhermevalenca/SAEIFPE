<template>
  <v-navigation-drawer>
    <v-list>
      <v-list-item-title>Menu</v-list-item-title>
      <v-list-group>
        <template #activator="{props}">
          <v-list-item v-bind="props">
            opções
          </v-list-item>
        </template>
        <v-list-item>opção 1</v-list-item>
        <v-list-item>opção 2</v-list-item>
        <v-list-item>opção 3</v-list-item>
      </v-list-group>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  name: "ItemDrawer"
}
</script>


<style scoped>

</style>
