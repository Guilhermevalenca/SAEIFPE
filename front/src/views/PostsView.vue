<template>
  <v-card>
    <v-card-actions class="d-flex justify-end">
      <v-btn to="posts/create" color="secondary">Criar publicação</v-btn>
    </v-card-actions>
    <v-card-title>
      <div>Posts ifpe</div>
    </v-card-title>
    <v-card-text>
      <v-table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>desgraça</th>
          </tr>
        </thead>
      </v-table>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "PostsView"
}
</script>

<style scoped>

</style>
