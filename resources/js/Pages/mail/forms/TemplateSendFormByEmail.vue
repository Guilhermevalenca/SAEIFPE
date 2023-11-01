<template>
  <v-card>

    <v-card-title>
      <div>{{ title }}</div>
    </v-card-title>

    <v-card-text>

      <div>{{ text }}</div>

    </v-card-text>

  </v-card>
</template>

<script>
export default {
  name: "TemplateSendFormByEmail",
  props: {
    title: String,
    text: String,
    form_id: Number
  }
}
</script>

<style scoped>

</style>
