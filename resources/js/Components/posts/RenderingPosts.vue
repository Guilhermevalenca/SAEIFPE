<template>
  <v-container class="d-flex flex-column justify-center pa-0 h-auto rounded-xl">
    <v-card class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
      <v-card-title class="d-flex justify-space-between">
        <div class="text-wrap">
          {{ data.user }} - {{ data.title }}
        </div>
        <div v-if="$page.props.auth.user && $page.props.auth.user.role === 'adm'">
          <v-tooltip text="Editar postagem">
            <template #activator="{ props }">
              <Link v-bind="props" :href="route('posts_edit', {id: data.id})">
                <v-btn icon="mdi-pencil-outline" color="secondary" variant="flat" />
              </Link>
            </template>
          </v-tooltip>
          <v-tooltip text="Deletar postagem">
            <template #activator="{ props }">
              <Link v-bind="props" :href="route('posts_delete', {id: data.id})" method="DELETE" as="button">
                <v-btn icon="mdi-delete" color="quaternary" variant="flat" />
              </Link>
            </template>
          </v-tooltip>
        </div>
      </v-card-title>
      <v-card-subtitle>
        <div>criado há: {{ calculatingTime(data.time) }}</div>
        <div>{{ data.time_edit ? 'Editado há: ' + calculatingTime(data.time_edit) : '' }}</div>
      </v-card-subtitle>
      <v-row no-gutters>
        <v-card-text>
          <div v-html="data.content" class="highlight-links"></div>
        </v-card-text>
      </v-row>
      <v-row>
        <v-container v-if="data.form_id" class="d-flex justify-start default-card-border">
          <v-card-title>Responder formulário:</v-card-title>
          <v-tooltip text="Clique para ir até o formulário respectivo">
            <template #activator="{ props }">
              <v-btn v-bind="props" variant="flat" color="tertiary">
                <template #prepend>
                  <v-icon icon="mdi-text-search-variant" />
                </template>
                <Link :href="route('forms_show_response', {id: data.form_id})">
                  {{ data.form.title }}
                </Link>
              </v-btn>
            </template>
          </v-tooltip>
        </v-container>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import linkifyHtml from 'linkify-html';
import { Link } from '@inertiajs/vue3';
export default {
  name: "RenderingPosts",
  components: {Link},
  props: {
    data: Object
  },
  computed: {
    identifyingLinks() {
      const textHtml = linkifyHtml(this.data.content);
      return textHtml.replace(/\n/g, "<br>");
    },
  },
  data() {
    return {

    }
  },
  created() {
    console.table({
      time_edit: this.data.time_edit,
      time: this.data.time
    });
  },
  methods: {
    calculatingTime(time) {
      if(time < 60) {
        return time + ' Minutos.';
      }else if(time < 1440) {
        const timeInHours = Math.floor(time / 60);
        const timeRemainingInMinutes = time % 60;
        return `${timeInHours} hora${timeInHours > 1 ? 's' : ''} e ${timeRemainingInMinutes} minuto${timeRemainingInMinutes > 1 ? 's' : ''}`;
      } else {
        const timeInDays = Math.floor(time / 1440);
        const timeRemainingInHours = Math.floor( (time % 1440) / 60);
        const timeRemainingInMinutes = time % 60;
        let result = `${timeInDays} dia${timeInDays !== 1 ? 's' : ''}`;

        if (timeRemainingInHours > 0) {
          result += ` e ${timeRemainingInHours} hora${timeRemainingInHours !== 1 ? 's' : ''}`;
        }
        if (timeRemainingInMinutes > 0) {
          result += ` e ${timeRemainingInMinutes} minuto${timeRemainingInMinutes !== 1 ? 's' : ''}`;
        }
        return result;
      }
    }
  }
}
</script>

<style scoped>
div {
  padding: 5px;
}
</style>
<style>
.highlight-links a{
  color:#0d47a1;
}
</style>
