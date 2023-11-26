<template>

    <v-container>
        <v-form ref="form" @submit.prevent="createForm()">
            <v-card class="pa-6 rounded-xl" :style="'border: 1px solid #2E8429;'">
                <v-card-title class="text-center">
                    Construa seu formulário
                </v-card-title>

                <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"></v-spacer>

                <v-card  variant="flat"  class="pa-4 rounded-xl">

                    <v-text-field label="Nome" persistent-placeholder placeholder="Dê um nome para o formulário" v-model="form.title" :rules="rules.title" />

                    <v-card variant="text" class="mb-10" v-for="(question, index) in form.questions" :key="index">

                            <v-card variant="outlined" class="pa-4">
                                    <div class="mb-2 mt-2">

                                        <v-card-title class="mb-2">Pergunta {{ index + 1 }}: </v-card-title>

                                        <v-select placeholder="Escolha qual o tipo de pergunta..." v-model="typeQuestions[index]" :items="types" item-title="name" item-value="id" :rules="rules.type(index)" />

                                        <v-textarea v-model="form.questions[index].ask" rows="1" max-rows="10" auto-grow persistent-placeholder placeholder="Escreva a pergunta aqui" hint="Exemplo de titulo" :rules="rules.ask(index)" />

                                    </div>

                                    <div class="mb-2 mt-2" v-if="typeQuestions[index] === 'unique'">
                                        <UniqueQuestionsForm @send_data="(v) => {form.questions[index].responses = v; form.questions[index].type = typeQuestions[index]}" :errors="form.errors[`questions.${index}.responses`]" />
                                    </div>

                                    <div class="mb-2 mt-2" v-if="typeQuestions[index] === 'multiple'">
                                        <MultipleQuestionsForm @send_data="(v) => {form.questions[index].responses = v; form.questions[index].type = typeQuestions[index]}" :errors="form.errors[`questions.${index}.responses`]" />
                                    </div>
                            </v-card>

                    </v-card>

                    <v-card-actions class="d-flex justify-end">
                        <v-tooltip text="Remover ultima questão">
                            <template #activator="{ props}">
                                <v-btn v-bind="props" variant="outlined" :disabled="form.questions.length === 1" @click="removeQuestion()">
                                    <v-icon icon="mdi-minus" size="20" />
                                    Remover a ultima questão
                                </v-btn>
                            </template>
                        </v-tooltip>
                        <v-tooltip text="Adicionar nova questão">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" variant="flat" color="tertiary" @click="addQuestion()">
                                    <v-icon icon="mdi-plus" size="20" />
                                    Adicionar questão
                                </v-btn>
                            </template>
                        </v-tooltip>
                    </v-card-actions>

                </v-card>

                <v-card-actions class="d-flex justify-end w-100 h-100 ma-4">
                    <div> <!-- props da div: -->
                        <!-- class="v-layout-item text-end pointer-events-none" style="bottom: 0px; z-index: 1004; transform: translateY(0%); position: fixed; height: 88px; left: 0px; width: calc((100% - 0px) - 0px);" -->
                        <!-- precisando de solução para quando a div tiver sobreposta aos botões da pagina, não afeta-los! -->
                        <v-btn variant="flat" @click="showCancelForm = true" color="quaternary">Cancelar</v-btn>
                        <v-btn type="submit" :loading="creatingForm" color="tertiary" variant="flat" class="mr-4">Salvar formulário</v-btn>
                    </div>
                    <v-dialog v-model="showCancelForm">
                        <v-container class="d-flex justify-center">

                            <v-card>

                                <v-card-title>Deseja cancelar?</v-card-title>
                                <v-card-text>
                                    <div>Você perderá tudo o que foi preenchido!</div>
                                </v-card-text>

                                <v-card-actions class="d-flex justify-end">
                                    <v-btn variant="outlined" @click="showCancelForm = false">Fechar</v-btn>
                                    <v-btn variant="flat" @click="cancelCreateForm()" color="error">OK</v-btn>
                                </v-card-actions>

                            </v-card>

                        </v-container>
                    </v-dialog>
                </v-card-actions>

            </v-card>
        </v-form>
    </v-container>

</template>

<script>
import UniqueQuestionsForm from "./createForms/UniqueQuestionsForm.vue";
import MultipleQuestionsForm from "./createForms/MultipleQuestionsForm.vue";
import {useForm} from "@inertiajs/vue3";

export default {
  name: "formDefault",
  components: {MultipleQuestionsForm, UniqueQuestionsForm},
  data() {
    return {
      phoneDisplay: window.innerWidth <= 800,
      showCancelForm: false,
      form: useForm({
        title: null,
        questions: [
          {
            ask: null,
            responses: [],
            type: null
          }
        ],
      }),
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
      creatingForm: false,
      rules: {
        ask: (index) => [
          value => {
            if(value) {
              return true;
            }
            return 'Você precisa adicionar uma pergunta para a questão'
          },
          () => {
            if(this.form.errors[`questions.${index}.ask`]) {
              return this.form.errors[`questions.${index}.ask`];
            }
            return true;
          }
        ],
        type: (index) => [
          value => {
            if(value) {
              return true;
            }
            return 'Você precisa escolher um tipo para questão'
          },
          () => {
            if(this.form.errors[`questions.${index}.type`]) {
              return this.form.errors[`questions.${index}.type`];
            }
            return true;
          }
        ],
        title: [
          value => {
            if(value) {
              return true;
            }
            return 'É necessário da um nome aos seus formulários'
          },
          () => {
            if(this.form.errors.title) {
              return this.form.errors.title;
            }
            return true;
          }
        ]
      }
    }
  },
  methods: {
    addQuestion() {
      const defaultObject = {
        ask: null,
        responses: [],
        type: null
      }
      this.form.questions.push(defaultObject);
    },
    removeQuestion() {
      this.form.questions.pop();
    },
    createForm() {
      this.form.questions.map(question => {
        if(question.type === '' || question.type === null) {
          question.type = 'open-ended';
        }
        return question;
      });
      this.$refs.form.validate()
          .then(response => {
            if(response.valid) {
              this.creatingForm = true;
              this.form.post(route('forms_store'));
              this.clearComponent();
            }
          })
    },
    clearComponent() {
      this.form.title = null;
      this.form.questions = [
        {
          ask: null,
          responses: [],
          type: null
        }
      ];
      this.typeQuestions = [];
      this.creatingForm = false;
    },
    cancelCreateForm() {
      this.$emit('cancelCreateForm');
      this.clearComponent();
    }
  },
  watch: {
    'form.errors': {
      handler() {
        this.$refs.form.validate()
            .then(response => {
              if(! response.valid) {
                this.creatingForm = false;
              }
            })
      },
      deep: true
    }
  },
  mounted() {

  }
}

</script>

<style scoped>

</style>
