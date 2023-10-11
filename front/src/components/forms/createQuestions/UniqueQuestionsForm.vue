<template>
  <v-card variant="outlined">
    <v-card-text>

      <v-card-actions class="d-flex justify-end">
        <v-btn :disabled="options.length === 1" @click="removeOption()">
          <v-icon icon="mdi-minus"/>
        </v-btn>
        <v-btn color="secondary" @click="addOption()">
          <v-icon icon="mdi-plus"/>
        </v-btn>
      </v-card-actions>

      <v-radio-group>

        <v-row class="d-flex" v-for="(option, index) in options" :key="index">

          <v-col cols="1" ms="1">
            <v-radio disabled />
          </v-col>

          <v-col>
            <v-text-field v-model="option.text" placeholder="Escreva aqui..."/>
          </v-col>

        </v-row>

      </v-radio-group>

    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "UniqueQuestionsForm",
  data() {
    return {
      options: [
        { text: '' }
      ]
    }
  },
  methods: {
    addOption() {
      let objeto = {
        text: ''
      }
      this.options.push(objeto)
    },
    removeOption() {
      this.options.pop();
    }
  }
}
</script>

<style scoped>

</style>
