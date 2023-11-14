<template>
    <v-container>

      <v-card class="mb-10" v-show="noForms">
        <v-card-title>Nenhum formulário encontrado!!!</v-card-title>
        <v-card-text>Pelo visto você ainda não criou nenhum formulário. para criar seu primeiro formulário, clique no botão na parte superior direita "CRIAR FORMULÁRIO"</v-card-text>
      </v-card>

      <v-card class="ma-2" variant="outlined" :width="$phoneDisplay ? '' : '900px'" v-for="(form, index) in forms" :key="index">
        <v-row>
          <v-col cols="8">
            <v-card-title>{{ form.title }}</v-card-title>
          </v-col>
          <v-col>
            <v-card-actions class="v-card__actions">
              <v-tooltip text="Enviar este formulário pelo email">
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
                  <Link v-bind="props" :href="route('forms_destroy', {id: form.id})" method="delete" as="button">
                    <v-btn icon="mdi-delete" />
                  </Link>
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
      </v-card>

    </v-container>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "MyFormsCreated",
    components: {Link},
    props: {
        data: Object
    },
    data() {
        return {
            forms: this.data.forms.data,
            noForms: false,
        }
    },
    methods: {

    },
    created() {

    },
    watch: {
        data: {
            handler($new) {
                this.forms = $new.forms.data;
            },
            deep: true
        },
    }
}
</script>


<style scoped>

</style>
