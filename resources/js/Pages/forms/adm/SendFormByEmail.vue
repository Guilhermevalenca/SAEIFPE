<template>
    <Head title="Enviar email" />
    <Default>
      <v-card>
        <v-card-title class="text-center">
          <div>Monte seu email</div>
        </v-card-title>
        <v-form class="d-flex justify-center ma-10">

          <v-card variant="outlined" width="900px">

            <v-card-actions class="d-flex justify-end">
              <v-tooltip text="Visualize como está ficando seu email">
                <template #activator="{ props }">
                  <v-btn v-bind="props" icon="mdi-clipboard-text-search-outline" />
                </template>
              </v-tooltip>
            </v-card-actions>

            <v-card-text>

              <v-text-field label="Titulo" placeholder="Escreva o titulo do email" />
              <v-textarea label="Escreva o conteúdo do email" rows="6" max-rows="30" />

            </v-card-text>

            <v-card-actions class="d-flex justify-end">
              <v-btn color="secondary" variant="outlined">Enviar email</v-btn>
            </v-card-actions>

          </v-card>

        </v-form>
      </v-card>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import {Head} from "@inertiajs/vue3";

export default {
  name: "sendFormByEmail",
  components: {Head, Default}
}
</script>

<style scoped>

</style>
