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

      <v-container>

        <v-row v-for="(option, index) in options" :key="index">

          <v-col cols="1">
            <v-checkbox disabled />
          </v-col>

          <v-col>
            <v-text-field v-model="option.text" placeholder="Escreva aqui..." />
          </v-col>

        </v-row>

      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "MultipleQuestionsForm",
  props: {
    getValues: Boolean
  },
  data() {
    return {
      options: [
        { text: '' }
      ],
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
  },
  watch: {
    getValues: {
      handler($new) {
        if($new) {
          this.$emit('send_data',this.options)
        }
      },
      deep: true
    }
  }
}
</script>

<style scoped>

</style>
