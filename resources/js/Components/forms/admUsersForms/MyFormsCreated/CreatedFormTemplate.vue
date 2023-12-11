<template>
  <v-row>
    <v-col>
      <v-card-title>{{ form.title }}</v-card-title>
    </v-col>
    <v-col>
      <v-card-actions class="d-flex justify-end">

        <v-tooltip text="Copiar formulário">
          <template #activator="{ props }">
            <Link v-bind="props" :href="route('form_copyFormById', { id: form.id })">
              <v-btn icon="mdi-content-copy" />
            </Link>
          </template>
        </v-tooltip>

        <v-tooltip text="Enviar este formulário por email">
          <template #activator="{ props }">
            <Link v-bind="props" :href="route('forms_createSendEmail', { id: form.id })">
              <v-btn icon="mdi-email-multiple-outline" />
            </Link>
          </template>
        </v-tooltip>

        <v-tooltip text="Gráficos das respostas">
          <template #activator="{ props }">
            <Link v-bind="props" :href="route('forms_showByFormId_responded', {id: form.id})">
              <v-btn icon="mdi-chart-line" />
            </Link>
          </template>
        </v-tooltip>

        <v-tooltip text="Editar formulário">
          <template #activator="{ props }">
            <Link v-bind="props" :href="route('forms_edit', {id: form.id})">
              <v-btn icon="mdi-pencil-outline" />
            </Link>
          </template>
        </v-tooltip>

        <v-tooltip text="Apagar formulário">
          <template #activator="{ props }">
            <v-btn color="quaternary" v-bind="props" @click="deleteForm = true" icon="mdi-delete" />
          </template>
        </v-tooltip>

        <v-tooltip text="Visualizar formulário">
          <template #activator="{ props }">
            <Link v-bind="props" :href="route('forms_show', {id: form.id})">
              <v-btn icon="mdi-text-search-variant" />
            </Link>
          </template>
        </v-tooltip>
      </v-card-actions>
    </v-col>
  </v-row>
  <v-dialog v-model="deleteForm">
    <v-container class="d-flex justify-center">
      <v-card>

        <v-card-title>Deseja apagar este formulário?</v-card-title>
        <v-card-text>Caso este formulário esteja vinculado a alguma postagem, a postagem também será apagada</v-card-text>
        <v-card-actions class="d-flex justify-end">
          <v-btn @click="deleteForm = false">cancelar</v-btn>

          <v-tooltip text="Essa ação, pode levar alguns minutos, mas você não precisa esperar por isso!">
            <template #activator="{ props }">
              <Link v-bind="props" :href="route('forms_destroy', {id: form.id})" method="delete" as="button">
                <v-btn variant="flat" color="quaternary" @click="deleteForm = false">OK</v-btn>
              </Link>
            </template>
          </v-tooltip>

        </v-card-actions>
      </v-card>
    </v-container>
  </v-dialog>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
  name: "CreatedFormTemplate",
  components: {Link},
  props: {
    form: Object
  },
  data() {
    return {
      deleteForm: false
    }
  },
  created() {

  }
}
</script>

<style scoped>

</style>
