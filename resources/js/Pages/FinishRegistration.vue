<template>
    <Head title="Finalizando cadastro" />
    <Default>
        <v-container class="w-75 mt-12 pt-12">

          <v-card>
            <v-card-title>
              <div>Finalizando cadastro</div>
            </v-card-title>
            <v-card-text>

              <v-select :items="typeUser" v-model="type" label="Selecione..." item-title="text" item-value="id" />

              <div v-if="type === 'graduate'">
                <UserGraduateRegistration />
              </div>
              <div v-if="type === 'student'">
                <UserStudentRegistration />
              </div>

            </v-card-text>
          </v-card>

        </v-container>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import UserGraduateRegistration from "@/Components/finishRegistration/UserGraduateRegistration.vue";
import UserStudentRegistration from "@/Components/finishRegistration/UserStudentRegistration.vue";
import { Head } from '@inertiajs/vue3';

export default {
    name: "FinishRegistration",
    components: {UserStudentRegistration, UserGraduateRegistration, Default, Head},
    data() {
        return {
            typeUser: [
                {
                    id: 'graduate',
                    text: 'Sou egresso'
                },
                {
                    id: 'student',
                    text: 'Sou estudante'
                }
            ],
            type: null
        }
    }
}
</script>

<style scoped>

</style>
