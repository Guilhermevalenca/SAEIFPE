<template>
  <Default>
    <v-card>

      <v-card-title class="d-flex justify-center">Formulários</v-card-title>
      <v-card-subtitle>Aqui estão alguns formulários que podem ser respondidos</v-card-subtitle>

      <v-card-text>
        <ShowFormsForUsers :data="data" />
      </v-card-text>

    </v-card>
  </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import ShowFormsForUsers from "@/Components/forms/otherUsersForms/ShowFormsForUsers.vue";

export default {
  name: "FormsForUsers",
  components: {Default, ShowFormsForUsers},
  props: {
    data: Object
  }
}
</script>

<style scoped>

</style>
