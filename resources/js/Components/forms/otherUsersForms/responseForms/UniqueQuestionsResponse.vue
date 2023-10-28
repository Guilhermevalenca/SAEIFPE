<template>
  <v-card>
    <v-radio-group v-model="response">
      <v-radio v-for="(option, index) in options" :key="index" :label="option.descriptions" :value="option.id" />
    </v-radio-group>
  </v-card>
</template>

<script>
export default {
  name: "UniqueQuestionsResponse",
  props: {
    options: Array,
  },
  data() {
    return {
      response: ''
    }
  },
  watch: {
    response: {
      handler() {
        this.$emit('send_response', this.response);
      },
      deep:true
    }
  }
}
</script>

<style scoped>

</style>
