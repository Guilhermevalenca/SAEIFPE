<template>
  <v-card>

    <v-card-title class="text-center">
      <div>Construa seu formulário</div>
    </v-card-title>

    <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"> </v-spacer>

    <v-card-text class="w-75">

      <v-card v-for="(question, index) in questions" :key="index">
        <v-card-title>Escolha qual o tipo de pergunta</v-card-title>

        <v-card-text>

          <v-select v-model="typeQuestions[index]" :items="types" item-title="name" item-value="id" />

          <div v-if="typeQuestions[index]">

            <label>Pergunta:</label>
            <v-textarea v-model="questions[index].ask" rows="1" max-rows="7" auto-grow placeholder="Escreva a pergunta aqui" hint="Exemplo de titulo"/>

          </div>

          <div v-if="typeQuestions[index] === 'unique'">
            <UniqueQuestionsForm  />
          </div>

          <div v-if="typeQuestions[index] === 'multiple'">
            <MultipleQuestionsForm :getValues="getvalues" @send_data="(v) => {questions[index].responses = v;}" />
          </div>

        </v-card-text>

      </v-card>

      <v-card-actions class="d-flex justify-end">
        <v-btn :disabled="questions.length === 1" @click="removeQuestion()">
          <v-icon icon="mdi-minus" />
        </v-btn>
        <v-btn color="secondary" @click="addQuestion()">
          <v-icon icon="mdi-plus" />
        </v-btn>
      </v-card-actions>

    </v-card-text>
  </v-card>
</template>

<script>
import UniqueQuestionsForm from "@/components/forms/createQuestions/UniqueQuestionsForm.vue";
import MultipleQuestionsForm from "@/components/forms/createQuestions/MultipleQuestionsForm.vue";

export default {
  name: "formDefault",
  components: {MultipleQuestionsForm, UniqueQuestionsForm},
  data() {
    return {
      phoneDisplay: window.innerWidth <= 800,
      questions: [
        {
          ask: '',
          responses: []
        }
      ],
      typeQuestions: [],
      types: [
        {
          id: 'open-ended',
          name: 'Aberta'
        },
        {
          id: 'unique',
          name: 'Escolha única'
        },
        {
          id: 'multiple',
          name: 'Múltipla escolhas'
        }
      ],
      getvalues: false
    }
  },
  methods: {
    addQuestion() {
      const defaultObject = {
        ask: '',
        responses: []
      }
      this.questions.push(defaultObject);
    },
    removeQuestion() {
      this.questions.pop();
    }
  }
}

</script>

<style scoped>

</style>
