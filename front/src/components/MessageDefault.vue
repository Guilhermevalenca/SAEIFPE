<template>
  <v-card>
    <v-card-title>{{ title }}</v-card-title>
    <v-card-text>{{ text }}</v-card-text>
    <v-icon v-if="success" icon="mdi-check-circle" />
    <v-icon v-else icon="mdi-alert-circle-check-outline" />
  </v-card>
</template>

<script>
export default {
  name: "MessageDefault",
  props: {
    title: String,
    text: String,
    success: Boolean
  }
}
</script>


<style scoped>

</style>
