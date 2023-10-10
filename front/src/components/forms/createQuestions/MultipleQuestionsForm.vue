<template>
  <v-card>
    <v-card-text>
      <v-container>
        <v-checkbox v-for="(option, index) in options" :key="index" />
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "MultipleQuestionsForm",
  data() {
    return {
      options: [null]
    }
  }
}
</script>

<style scoped>

</style>
