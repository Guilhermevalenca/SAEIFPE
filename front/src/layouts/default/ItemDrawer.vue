<template>
  <v-navigation-drawer>
    <v-list>
      <v-list-item to="/">
        Inicio
      </v-list-item>

      <v-list-item to="/posts">
        Postagem do IFPE
      </v-list-item>

      <v-list-item to="/depositions">
        Depoimentos
      </v-list-item>

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
    <v-list>
      <v-list-item to="form">
        Formulários
      </v-list-item>
    </v-list>
    <v-list>
      <v-list-item to="/about">
        Sobre
      </v-list-item>
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
