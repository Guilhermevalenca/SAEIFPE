<template>
    <Head title="Testing" />

    <AuthenticatedLayout>
        <v-card>
            <v-card-title>Ola amigos e amigas</v-card-title>
            <v-card-text>
              <div>Vê que tabaca do karai</div>
            </v-card-text>
          <div>
            {{ data }}
          </div>
          <div>
            {{ user }}
          </div>
          <v-btn color="secondary" @click="test()">testando</v-btn>
        </v-card>
    </AuthenticatedLayout>
</template>

<script>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
  name: "Testing",
  components: {AuthenticatedLayout, Head},
  data() {
    return {
      form: useForm({
        test: 'deu certo',
        test2: 'deu mais certo ainda',
        test3: 'ta vendo que funciona, essa tabaca'
      })
    }
  },
  props: {
    data: Object,
    user: Object
  },
  methods: {
    test() {
      this.form.post(route('testing_create'));
    }
  }
}
</script>

<style scoped>

</style>
