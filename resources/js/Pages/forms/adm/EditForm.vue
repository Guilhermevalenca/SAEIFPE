<template>
  <Head title="Editando formulário" />
  <Default class="d-flex justify-center">
    <v-card-title class="text-center mt-4">
      <div>Formulário</div>
    </v-card-title>

    <v-main class="pb-16 ma-0 pa-0">
      <v-container :class="[$phoneDisplay ? 'w-100' : $screenMediumDisplay ? 'w-75' : 'w-50']">

        <v-card variant="flat" color="transparent">
          <v-card-actions class="d-flex justify-end pt-8 pb-12">
            <Link :href="route('forms_index')">
              <v-btn color="secondary" variant="flat">Meus formulários</v-btn>
            </Link>
          </v-card-actions>

          <v-form @submit.prevent="submit()">

            <v-card class="pa-6 rounded-xl" :style="'border: 1px solid #2E8429;'">

              <v-card-title class="text-center">
                Edite seu formulário
              </v-card-title>

              <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"></v-spacer>

                <v-text-field label="Nome" v-model="form.title" />

                <v-card v-for="(question, index) in form.questions">

                  <v-card-text>

                    <v-card variant="outlined">

                      <div class="ma-2">

                        <v-card-title class="ma-2">
                          <div>Pergunta {{ index + 1 }}</div>
                        </v-card-title>

                        <v-card-text>

                          <v-select placeholder="Escolha qual o tipo de pergunta..." :items="typeQuestions" item-title="name" item-value="id" v-model="question.type" />

                          <v-textarea v-model="question.ask" rows="1" max-rows="10" auto-grow persistent-placeholder placeholder="Escreva a pergunta aqui" hint="Exemplo de titulo" />

                        </v-card-text>

                      </div>

                      <v-card-text class="ma-2">

                        <div v-if="question.type === 'unique'">
                          <UniqueQuestionsEditForm :options="question.options" @send_data="(value) => question.options = value" />
                        </div>
                        <div v-if="question.type === 'multiple'">
                          <MultipleQuestionsEditForm :options="question.options" @send_data="(value) => question.options = value" />
                        </div>

                      </v-card-text>

                    </v-card>

                  </v-card-text>

                </v-card>

                <v-card-actions class="d-flex justify-end">
                  <v-tooltip text="Remover ultima questão">
                    <template #activator="{ props}">
                      <v-btn v-bind="props" variant="outlined" :disabled="form.questions.length === 1" @click="removeQuestion()">
                        <v-icon icon="mdi-minus" />
                        Remover a ultima questão
                      </v-btn>
                    </template>
                  </v-tooltip>
                  <v-tooltip text="Adicionar nova questão">
                    <template #activator="{ props }">
                      <v-btn v-bind="props" variant="elevated" color="secondary" @click="addQuestion()">
                        <v-icon icon="mdi-plus" />
                        Adicionar questão
                      </v-btn>
                    </template>
                  </v-tooltip>
                </v-card-actions>

                <v-card-actions class="d-flex justify-end mt-12">
                  <v-btn color="error" variant="tonal" @click="cancelEditForm = true">
                    cancelar
                  </v-btn>
                  <v-btn type="submit" variant="elevated" color="secondary">Salvar alterações</v-btn>
                </v-card-actions>

            </v-card>
          </v-form>
          <v-dialog width="600px" v-model="cancelEditForm">
            <v-card>
              <v-card-title>Desejar cancelar?</v-card-title>
              <v-card-text>
                <div>Ao cancelar você perderá qualquer edição que tenha sido realizada</div>
              </v-card-text>
              <v-card-actions>
                <v-btn @click="cancelEditForm = false">Fechar</v-btn>
                <v-btn color="error" variant="tonal" @click="myFormsCreated()">OK!!!</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-card>

      </v-container>
    </v-main>
  </Default>
  <v-dialog v-model="showEditWarning" persistent>
    <v-container class="d-flex justify-center">

      <v-card>
        <v-card-title class="text-center">Cuidado!</v-card-title>
        <v-card-text>
          <div>Este formulário já foi respondido.</div>
          <div>Ao edita-lo você perderá essas respostas!</div>
        </v-card-text>
        <v-card-actions class="d-flex justify-end">
          <v-btn variant="tonal" @click="myFormsCreated()">Cancelar</v-btn>
          <v-btn color="secondary" variant="flat" @click="showCopyForm = true">Criar uma copia deste formulário</v-btn>
          <v-btn color="quaternary" variant="flat" @click="showEditWarning = false">Edita-lo assim mesmo</v-btn>
        </v-card-actions>
      </v-card>

    </v-container>
  </v-dialog>
  <v-dialog v-model="showCopyForm">
    <v-container class="d-flex justify-center">
      <v-card>

        <v-card-title class="text-center">Escolha um nome para está copia</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="copyFormSubmit()">
            <v-text-field label="Nome da copia" placeholder="Digite..." v-model="copyForm.title" />
            <v-card-actions class="d-flex justify-end">
              <v-btn @click="showCopyForm = false">Cancelar</v-btn>
              <v-btn color="secondary" variant="flat" type="submit" :disabled="copyForm.title === null || copyForm.title === '' || copyForm.title === ' '">Criar copia</v-btn>
            </v-card-actions>
          </v-form>
        </v-card-text>

      </v-card>
    </v-container>
  </v-dialog>
  <v-dialog v-model="startingCopyForm" persistent>
    <v-container class="d-flex justify-center">
      <v-card>
        <v-card-text>
          Espere por favor, estamos copiando seu formulário!
          <v-progress-linear indeterminate />
        </v-card-text>
      </v-card>
    </v-container>
  </v-dialog>
  <v-dialog v-model="copyFormSuccess" persistent>
    <v-container class="d-flex justify-center">
      <v-card>

        <v-card-title>Pronto!</v-card-title>
        <v-card-text>
          Seu formulário foi copiado com sucesso!
        </v-card-text>
        <v-card-actions class="d-flex justify-end">
          <v-btn color="secondary" variant="flat" @click="clearDialogs()">OK</v-btn>
        </v-card-actions>

      </v-card>
    </v-container>
  </v-dialog>
</template>

<script>
import Default from '@/Layouts/default/Default.vue';
import {Head, useForm, Link} from "@inertiajs/vue3";
import UniqueQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/UniqueQuestionsEditForm.vue";
import MultipleQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/MultipleQuestionsEditForm.vue";
export default {
  name: "EditForm",
  computed: {},
  components: {Head, Link, MultipleQuestionsEditForm, UniqueQuestionsEditForm, Default},
  props: {
    data: Object
  },
  data() {
    return {
      form: useForm({
        forms_id: this.data.form.data.id,
        title: this.data.form.data.title,
        questions: this.data.questions.data
      }),
      typeQuestions: [
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
      cancelEditForm: false,
      showEditWarning: false,
      showCopyForm: false,
      copyForm: useForm({
        title: null,
        questions: this.data.questions.data,
        forms_id: this.data.form.data.id
      }),
      startingCopyForm: false,
      copyFormSuccess: false
    }
  },
  created() {

  },
  watch: {

  },
  methods: {
    submit() {
      this.form.put(route('forms_update'));
    },
    addQuestion() {
      const defaultObject = {
        ask: '',
        options: [
          {
            descriptions: ''
          }
        ],
        type: null
      }
      this.form.questions.push(defaultObject);
    },
    removeQuestion() {
      this.form.questions.pop();
    },
    myFormsCreated() {
      window.history.back();
    },
    copyFormSubmit() {
      this.copyForm.post(route('form_copyForm'), {
        onSuccess: () => {
          this.copyFormSuccess = true;
          this.startingCopyForm = false;
        },
        onStart: () => {
          this.startingCopyForm = true
        }
      });
    },
    clearDialogs() {
      this.copyFormSuccess = false;
      this.startingCopyForm = false;
      this.showEditWarning = false;
      this.showCopyForm = false;
    }
  },
  mounted() {
    console.log(this.data);
    this.showEditWarning = this.data.answered;
  }
}
</script>

<style scoped>

</style>
