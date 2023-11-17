<template>
<!--  <v-text-field label="Pesquisar formulário" placeholder="Digite o nome do formulário" >-->
<!--    <template #append>-->
<!--      <v-btn icon="mdi-text-search" />-->
<!--    </template>-->
<!--  </v-text-field>-->
  <v-autocomplete :items="items" auto-select-first item-props menu-icon="" placeholder="Digite o nome do formulário" append-inner-icon="mdi-magnify" rounded variant="outlined"
  >
    <template #item="{ item }">
      <div v-if="item">{{ item.title }}</div>
    </template>
    <template #no-data>
      <v-container>
        <div v-show="items.length === 0">Você deve pesquisar pelo formulário para visualiza-los!</div>
        <div v-show="items.length !== 0">Nenhum dado encontrado</div>
      </v-container>
    </template>
  </v-autocomplete>
</template>

<script>
export default {
  name: "SearchForms",
  data() {
    return {
      items: [],

    }
  },
  watch: {

  }
}
</script>

<style scoped>

</style>
