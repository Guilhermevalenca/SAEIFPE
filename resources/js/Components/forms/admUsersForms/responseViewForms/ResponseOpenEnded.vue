<template>
  <v-card variant="elevated">

    <v-card-actions>
      <v-btn @click="dialogIsOpen = true" variant="outlined" color="secondary">Visualizar respostas</v-btn>
    </v-card-actions>

  </v-card>
  <v-dialog v-model="dialogIsOpen" class="w-75">

    <v-card>

      <v-card-text>

        <v-row v-for="(question, index) in questions" :key="index">
          <v-col>
            <v-card variant="outlined">

              <v-card-title>
                <div>{{ index }}) R->  </div>
              </v-card-title>

              <v-card-text>
                <div>{{ question.response.open_ended }}</div>
              </v-card-text>

            </v-card>
          </v-col>
        </v-row>

      </v-card-text>

      <v-card-actions class="d-flex justify-end">
        <v-btn @click="dialogIsOpen = false" color="secondary">Fechar</v-btn>
      </v-card-actions>

    </v-card>

  </v-dialog>
</template>

<script>
export default {
  name: "ResponseOpenEnded",
  props: {
    questions: Object
  },
  data() {
    return {
      dialogIsOpen: false
    }
  },
}
</script>

<style scoped>

</style>
