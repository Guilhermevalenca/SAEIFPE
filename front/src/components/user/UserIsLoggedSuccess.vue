<template>
  <v-card width="500px" :class="[phoneDisplay ? 'w-75' : '']">
    <v-card-title :class="['d-flex', phoneDisplay ? 'justify-space-between' : '']">
      <div>
        Cadastro realizado com sucesso
      </div>
      <v-icon color="success" icon="mdi-check-circle" />
    </v-card-title>
    <v-card-subtitle>
      <div>
        Obrigado por participar!
      </div>
    </v-card-subtitle>
    <v-card-text class="d-flex text-body-1">
      <div>
        Muito obrigado por aderirem, pessoal! Em breve traremos novidades e funcionalidades para a aplicação. Esperaremos vocês nessas fases de testes para termos uma aplicação limpa e com boa usabilidade.
      </div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "UserIsLoggedSuccess",
  data() {
    return {
      phoneDisplay: window.innerWidth <= 800
    }
  }
}
</script>

<style scoped>

</style>
