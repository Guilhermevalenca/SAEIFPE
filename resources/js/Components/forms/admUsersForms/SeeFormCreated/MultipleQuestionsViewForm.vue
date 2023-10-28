<template>
  <v-card v-for="(option, index) in options" :key="index">
    <v-checkbox disabled :label="option.descriptions"/>
  </v-card>
</template>


<script>
export default {
  name: "MultipleQuestionsViewForm",
  props: {
    options: Array
  }
}
</script>

<style scoped>

</style>
