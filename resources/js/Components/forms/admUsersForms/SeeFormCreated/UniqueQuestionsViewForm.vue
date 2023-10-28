<template>
  <v-card v-for="(option, index) in options" :key="index">
    <v-radio disabled :label="option.descriptions"/>
  </v-card>
</template>


<script>
export default {
  name: "UniqueQuestionsViewForm",
  props: {
    options: Array
  }
}
</script>

<style scoped>

</style>
