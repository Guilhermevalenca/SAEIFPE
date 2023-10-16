<template>
  <v-card :width="phoneDisplay ? '' : '900px'">
    <v-card-title  :class="['text-center', phoneDisplay ? '' : 'justify-md-center']">
      <h3>Saudações, comunidade IFPE <span v-if="!phoneDisplay">Campus Igarassu</span></h3>
      <span v-if="phoneDisplay"> Campus Igarassu</span>
    </v-card-title>
    <v-card-text class="d-flex text-body-1">
      <div>
        A CREE (Coordenação de Relações Empresariais, Estágios e Egressos) está realizando um levantamento de dados sobre discentes e egressos, com o objetivo de trazer uma plataforma para interagir com estes estudantes e fazer um acompanhamento de suas carreiras. Este é um cadastro inicial, apenas para atualizar informações de contato, portanto é imprescindível que as informações de contato como email e telefone estejam corretas.
      </div>
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
<!--
<div>
        Somos do terceiro período do curso Técnico em Informática para Internet, e através da disciplina de projeto e prática II estamos envolvidos em um projeto institucional, junto com a CREE (Coordenação de Relações Empresariais, Estágios e Egressos). Nós e a instituição precisamos da ajuda de vocês para levantar dados sobre discentes e egressos, com o objetivo de trazer uma plataforma que una estes estudantes e possa fazer um acompanhamento de suas carreiras. Estamos aceitando todos(a) os(as) estudantes, mas se você está próximo da finalização do curso, sua adesão é imprescindível. Contamos com vocês!
      </div>
-->
