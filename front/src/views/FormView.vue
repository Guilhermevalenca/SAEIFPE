<template>
  <v-card>
    <v-card-title>Formulários</v-card-title>
    <v-card-actions class="d-flex justify-end">
      <v-btn color="secondary" variant="outlined" @click="isCreateForms = !isCreateForms">{{ isCreateForms ? 'Meus Formulários' : 'Criar formulário' }}</v-btn>
    </v-card-actions>
    <v-card-text>
      <div v-if="! isCreateForms">
        <MyFormsCreated />
      </div>
      <div v-else>
        <CreateForms />
      </div>
    </v-card-text>
  </v-card>
</template>

<script>
import CreateForms from "@/components/forms/CreateForms.vue";
import MyFormsCreated from "@/components/forms/MyFormsCreated.vue";
export default {
  components: {MyFormsCreated, CreateForms},
  data() {
    return {
      isCreateForms: false
    }
  }
}
</script>
