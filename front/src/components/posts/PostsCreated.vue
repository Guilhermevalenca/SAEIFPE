<template>
  <v-card>
    <v-card-title>
      <div>Criando postagem</div>
    </v-card-title>
    <v-card-text class="d-flex justify-center">
      <v-form class="w-50">
        <legend>Dados da publicação</legend>
        <div>
          <v-text-field label="Titulo" placeholder="Digite o titulo da publicação" />
          <v-textarea rows="13" label="Descrição" />
        </div>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "PostsCreated"
}
</script>

<style scoped>

</style>
