<template>
  <header>
    <h2 class="text-lg font-medium">Foto de perfil</h2>

    <p class="mt-1 text-sm">
      Atualize sua foto de perfil
    </p>
  </header>
  <v-form @submit.prevent="submit()" class="mt-6 space-y-6">
    <v-file-input accept="image/png, image/jpg, image/bmp" variant="outlined" label="Foto de perfil" v-model="form.profile_picture" :rules="rules" />
    <div>
      <p>{{ form.profile_picture ? 'Veja como vai ficar sua foto de perfil:' : 'Nenhuma foto selecionada' }}</p>
      <v-tooltip text="Clique para visualizar melhor a imagem">
        <template #activator="{ props }">
          <v-avatar @click="showImg = true" v-bind="props" size="200" v-if="form.profile_picture">
            <v-img :src="renderProfile" />
          </v-avatar>
        </template>
      </v-tooltip>
    </div>

    <v-btn color="tertiary" type="submit" class="mt-8">Salvar</v-btn>
  </v-form>

  <v-dialog class="w-50" v-model="showImg">
    <v-container class="d-flex justify-center">
      <v-img :src="renderProfile" />
    </v-container>
  </v-dialog>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
  name: "AddProfile",
  components: {},
  data() {
    return {
      rules: [
        () => {
          if(this.form.errors.profile_picture) {
            return this.form.errors.profile_picture;
          }
          return true;
        }
      ],
      form: useForm({
        profile_picture: null
      }),
      showImg: false
    }
  },
  computed: {
    renderProfile() {
      if(this.form.profile_picture) {
        return URL.createObjectURL(this.form.profile_picture[0]);
      }
      return null;
    }
  },
  methods: {
    submit() {
      this.form.post(route('profile_updateProfilePicture'));
    }
  },
  watch: {
    
  }
}
</script>

<style scoped>

</style>
