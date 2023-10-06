<template>
    <v-card :width="phoneDisplay ? '' : '900px'">
      <v-card-title  :class="['text-center', phoneDisplay ? '' : 'justify-md-center']">
        <h3>Bem-vindo a página de depoimentos</h3>
      </v-card-title>
      <v-card-text class="d-flex text-body-1">
        <div>
          Aqui você pode ver os depoimentos das pessoas que já estudaram no nosso campus ou deixar o seu próprio depoimento.
        </div>
      </v-card-text>
      <v-card-actions class="d-flex justify-center">
        <v-btn class="mb-6" color="secondary" variant="outlined" @click="$emit('closeAlert')">vamos lá!</v-btn>
      </v-card-actions>
    </v-card>
  </template>
  
  <script>
  export default {
    name: "DepositionsAlert",
    props: {
      phoneDisplay: Boolean
    }
  }
  </script>
  
  <style scoped>
  
  </style>