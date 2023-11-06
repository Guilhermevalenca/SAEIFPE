<template>
  <Head title="Form" />
  <Default>

    <v-card>
      <v-card-title class="d-flex justify-center">{{ form.title }}</v-card-title>
      <v-spacer />
      <v-card-text>
        <v-card v-for="(question, index) in questions" :key="index">

          <v-card-text>
            <v-card variant="outlined">

              <v-card-title class="mb-2">{{ index + 1 }} - {{ question.ask }}</v-card-title>

              <div class="ma-2" v-if="question.type === 'open-ended'">
                <v-text-field disabled placeholder="Resposta..." />
              </div>
              <div class="ma-2" v-if="question.type === 'unique'">
                <UniqueQuestionsViewForm :options="question.options" />
              </div>
              <div class="ma-2" v-if="question.type === 'multiple'">
                <MultipleQuestionsViewForm :options="question.options" />
              </div>

            </v-card>
          </v-card-text>

        </v-card>
      </v-card-text>
    </v-card>

  </Default>
</template>

<script>
import UniqueQuestionsViewForm from '@/Components/forms/admUsersForms/SeeFormCreated/UniqueQuestionsViewForm.vue';
import MultipleQuestionsViewForm from "@/Components/forms/admUsersForms/SeeFormCreated/MultipleQuestionsViewForm.vue";
import Default from "@/Layouts/default/Default.vue";
import {Head} from "@inertiajs/vue3";

export default {
  name: "SeeFormCreated",
  components: {Head, Default, MultipleQuestionsViewForm, UniqueQuestionsViewForm},
  props: {
    data: Object
  },
  data() {
    return {
      form: this.data.form.data,
      questions: this.data.questions
    }
  },
  created() {
    console.log(this.data);
  }
}
</script>

<style scoped>

</style>
