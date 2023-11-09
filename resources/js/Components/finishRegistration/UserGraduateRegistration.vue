<template>
    <v-card class="d-flex justify-center">
        <v-form class="w-50 ma-5" @submit.prevent="submit()">

            <v-autocomplete label="Que curso concluiu no campus?" :items="courses" item-title="name" item-value="id" v-model="form.course" />

            <v-card class="mb-5">
                <v-card-text style="font-size: 18px;">Gênero:</v-card-text>
                    <v-card-text>
                        <v-radio-group v-model="selectedGender"> 
                            <v-row>
                                <v-cols cols="4">
                                    <v-radio 
                                        label="Masculino"
                                        value="masculino"
                                        ></v-radio>
                                </v-cols>
                                <v-cols cols="4">
                                    <v-radio
                                        label="Feminino"
                                        value="feminino"
                                        ></v-radio>
                                </v-cols>
                                <v-cols cols="4">
                                    <v-radio
                                    label="Outro"
                                    value="outro"
                                    ></v-radio>
                                </v-cols>    
                                    
                            </v-row>
                        </v-radio-group>
                    </v-card-text>
            </v-card>
            
            <v-row>
                <v-col>
            <v-text-field prepend-inner-icon="mdi-phone-outline" persistent-hint label="Número do Telefone:" hint="(00) 00000-0000" placeholder="Digite o número do telefone" />
                </v-col>
            </v-row>
  
            <v-btn type="submit">Cadastrar novos dados</v-btn>

        </v-form>
    </v-card>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "UserGraduateRegistration",
    data() {
        return {
            form:useForm({
                email_institution: '',
                course: '',
                enrollment: ''
            }),
            courses: [
                {
                    id: 'ADM',
                    name: 'ADM - Bacharelado em Administração'
                },
                {
                    id: 'IPI',
                    name: 'IPI - Técnico em Informatica para Internet'
                },
                {
                    id: 'LOG',
                    name: 'LOG - Técnico em Logística'
                },
                {
                    id: 'TGQ',
                    name: 'TGQ - Tecnologia em Gestão de Qualidade'
                },
                {
                    id: 'TSI',
                    name: 'TSI - Tecnologia de Sistema para Internet'
                },
            ],
            genre: {
                selected:null,
                options: [
                    'Masculino',
                    'Feminino',
                    'Outro',
                    'Prefiro não dizer'
                ],
            },
            selectedGender: '' //Armazena o gênero selecionado
        }
    },
    methods: {
        submit() {
            this.form.post(route('finishRegistration_storeGraduate'));
        }
    }
    
}
</script>


<style scoped>

</style>
