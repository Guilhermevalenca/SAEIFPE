<template>
    <v-card class="d-flex justify-center">
        <v-form class="w-50 ma-5" @submit.prevent="submit()">

            <v-autocomplete label="Que curso concluiu no campus?" :items="courses" item-title="name" item-value="id" v-model="form.course" />

            <v-card class="mb-5">
                <v-card-text style="font-size: 18px;">Gênero:</v-card-text>
                    <v-card-text>
                        <v-radio-group v-model="form.genre"> 
                            <v-row>
                                <v-col cols="4">
                                    <v-radio 
                                        label="Masculino"
                                        value="Masculino"
                                        ></v-radio>
                                </v-col>
                                <v-col cols="4">
                                    <v-radio
                                        label="Feminino"
                                        value="Feminino"
                                        ></v-radio>
                                </v-col>
                                <v-col cols="4">
                                    <v-radio
                                    label="Outro"
                                    value="Outro"
                                    ></v-radio>
                                </v-col>    
                                    
                            </v-row>
                        </v-radio-group>
                    </v-card-text>
            </v-card>
            
            <v-row>
                <v-col>
                    <input type="hidden" v-maska data-maska="(##) #####-####" v-model="form.phone">
            <v-text-field v-model="form.phone" prepend-inner-icon="mdi-phone-outline" persistent-hint label="Número do Telefone:" hint="(00) 00000-0000" placeholder="Digite o número do telefone" />
                </v-col>
            </v-row>
  
            <v-btn type="submit">Cadastrar novos dados</v-btn>

        </v-form>
    </v-card>
</template>

<script>
import {useForm} from "@inertiajs/vue3";
import { vMaska } from 'maska';

export default {
    name: "UserGraduateRegistration",
    directives: { maska: vMaska },
    data() {
        return {
            form:useForm({
                course: '',
                genre:'',
                phone: ''
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
        }
    },
    methods: {
        submit() {
            this.form.post(route('finishRegistration_storeGraduate'));
           // console.log(this.form.course,this.form.selectedGender,this.form.phone)
        }
    }
    
}
</script>


<style scoped>

</style>
