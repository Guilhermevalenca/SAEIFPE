<template>
  <v-card>
    <v-card-title class="d-flex justify-center">
      <h2>Posts ifpe</h2>
    </v-card-title>
    <v-card-actions>
      <v-btn v-if="$store.state.logged" to="/posts/create" color="secondary">Criar publicação</v-btn>
    </v-card-actions>
    <v-row class="w-50">
      <v-card-text class="d-flex justify-center">
        <v-table>
          <thead>
          <tr>
            <th>Nome</th>
            <th>desgraça</th>
          </tr>
          </thead>
        </v-table>
      </v-card-text>
    </v-row>
  </v-card>
</template>

<script>
export default {
  name: "PostsView"
}
</script>

<style scoped>

</style>
