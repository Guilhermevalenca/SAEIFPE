<template>
  <v-card>
    <v-card-text>
      <v-radio-group>
        <v-radio v-for="(option, index) in options" :key="index" />
      </v-radio-group>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "UniqueQuestionsForm",
  data() {
    return {
      options: [null]
    }
  }
}
</script>

<style scoped>

</style>
