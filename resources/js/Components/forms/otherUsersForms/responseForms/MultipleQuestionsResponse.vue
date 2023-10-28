<template>
  <v-card>

    <v-card-text>

      <v-container>

        <v-checkbox v-for="(option, index) in options" :key="index" :label="option.descriptions" v-model="responses" :value="option.id" />

      </v-container>

    </v-card-text>

  </v-card>
</template>
<script>
export default {
  name: "MultipleQuestionsResponse",
  props: {
    options: Array,
  },
  data() {
    return {
      responses: []
    }
  },
  watch: {
    responses: {
      handler() {
        this.$emit('send_response', this.responses);
      },
      deep:true
    }
  }
}
</script>


<style scoped>

</style>
