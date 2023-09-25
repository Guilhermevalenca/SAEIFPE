<template>
  <v-card>
    <v-card-title  :class="['text-center', phoneDisplay ? 'ma-2' : 'ma-3', phoneDisplay ? '' : 'justify-md-center']">
      Saudações, comunidade IFPE Campus Igarassu
    </v-card-title>
    <v-card-text class="ma-3">
      <p>
        Somos do terceiro período do curso Técnico em Informática para Internet, e através da disciplina de projeto e prática II estamos envolvidos em um projeto institucional, junto com a CREE (Coordenação de Relações Empresariais, Estágios e Egressos).
      </p>
      <p>
        Nós e a instituição precisamos da ajuda de vocês para levantar dados sobre discentes e egressos, com o objetivo de trazer uma plataforma que una estes estudantes e possa fazer um acompanhamento de suas carreiras. Estamos aceitando todos(a) os(as) estudantes, mas se você está próximo da finalização do curso, sua adesão é imprescindível. Contamos com vocês!
      </p>
    </v-card-text>
    <v-card-actions class="d-flex justify-center">
      <v-btn class="mb-6" color="secondary" variant="outlined" @click="$emit('closeAlert')">vamos lá!</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "UserRegistrarionAlert",
  props: {
    phoneDisplay: Boolean
  }
}
</script>

<style scoped>

</style>
