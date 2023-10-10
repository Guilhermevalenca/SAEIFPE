<template>
    <v-dialog persistent :width="phoneDisplay ? 'auto' : '900px'" v-model="messageAlert">
    <UserRegistrarionAlert :phoneDisplay = "phoneDisplay" @closeAlert = "messageAlert = false" />
    </v-dialog>
    <v-card>
        <v-card-title class="text-center">
            <div>Construa seu formulário</div>
        </v-card-title>
        <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"> </v-spacer>
        <v-card-text class="d-flex justify-center">
            <v-card v-for="(question, index) in questions" :key="index">
              <v-card-title>Escolha qual o tipo de pergunta</v-card-title>
              <v-select v-model="typeQuestions[index]" :items="['Texto', 'Múltipla escolhas', 'Escolha única']" />
              <v-card-text>
                <div v-if="typeQuestions[index]"></div>
                <div v-if="typeQuestions[index]"></div>
                <div v-if="typeQuestions[index]"></div>
              </v-card-text>
            </v-card>
        </v-card-text>
    </v-card>
</template>

  <script>
  export default {
    name: "formDefault",
    data() {
      return {
        questions: [],
        typeQuestions: [],
        types: [
          {
            id: 'text',
            name: 'Texto'
          },
          {
            id: ''
          }
        ]
      }
    }
  }

  </script>

  <style scoped>

  </style>
