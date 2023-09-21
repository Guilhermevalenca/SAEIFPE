<template>
  <v-card width="500px">
    <v-card-title>{{ title }}</v-card-title>
    <v-card-text>{{ text }}</v-card-text>
    <v-icon color="success" v-if="success" icon="mdi-check-circle" />
    <v-icon color="red" v-else icon="mdi-alert-circle-check-outline" />
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
