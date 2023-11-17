<template>
    <Head title="About" />
    <Default >
        <v-container>
            <v-card class="bi">
                <v-card-text>
                    <div class="odio"> SAEIFPE é uma aplicação em desenvolvimento pelos alunos do IFPE Campus-Igarassu na matéria de Projeto e Prática. Seu principal objetivo é manter o contato com seus alunos egressos por meio de um ambiente interativo onde todos os concluintes poderão trocar experiências, receber novidades sobre cursos e empregos enviados pelo próprio instituto e entre outras coisas que estão em processo de criação. O instituto Federal deseja continuar mantendo a comunicação com seus estudantes para que a parceria entre aluno e instuição possa ser prolongada e ambos se ajudem, egressos que estão no mercado de trabalho podem contribuir com sua experiência para com os recem formandos, enquanto o instituto poderá fazer um acompanhamento de carreira. Estamos aceitando todos(a) os(as) estudantes, mas se você está próximo da finalização do curso, sua adesão é imprescindível.</div>
                </v-card-text>
            </v-card>
            <div :class="[$phoneDisplay ? '' : 'd-flex justify-center']">
                <v-list :width="$phoneDisplay ? '': '200'" class="perfil ma-5">
                    <v-list-item @click="showDescription('Alice Manguinho')" class="d-flex justify-center">
                        <v-avatar size="120">
                            <img src="@/assets/alice.jpg"/>
                        </v-avatar>
                    </v-list-item>
                    <v-list-item>

                        <v-list-item-title class="si text-center">Alice Manguinho</v-list-item-title>
                        <div>
                            <p>{{ description }}</p>
                        </div>
                    </v-list-item>
                </v-list>

                <v-list :width="$phoneDisplay ? '' : '200'" class="perfil ma-5">
                    <v-list-item @click="showDescription('Anderson Emanoel')" class="d-flex justify-center">
                        <v-avatar size="120">
                            <img src="@/assets/son.jpg"/>
                        </v-avatar>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title class="si text-center">Anderson Emanoel</v-list-item-title>
                        <div>
                            <p>{{ description }}</p>
                        </div>
                    </v-list-item>
                </v-list>

                <v-list :width="$phoneDisplay ? '' : '200'" class="perfil ma-5">
                    <v-list-item @click="showDescription('Claudiane Rodrigues')" class="d-flex justify-center">
                        <v-avatar size="120">
                            <img src="@/assets/clau.jpg"/>
                        </v-avatar>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title class="si text-center">Claudiane Rodrigues</v-list-item-title>
                        <div>
                            <p>{{ description }}</p>
                        </div>
                    </v-list-item>
                </v-list>

                <v-list :width="$phoneDisplay ? '' : '200'" class="perfil ma-5">
                    <v-list-item @click="showDescription('Emmily Kathylen')" class="d-flex justify-center">
                        <v-avatar size="120">
                            <img src="@/assets/emmi.jpg"/>
                        </v-avatar>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title class="si text-center">Emmily Kathylen</v-list-item-title>
                        <div>
                            <p>{{ description }}</p>
                        </div>
                    </v-list-item>
                </v-list>

                <v-list :width="$phoneDisplay ? '' : '200'" class="perfil ma-5">
                    <v-list-item @click="showDescription('Guilherme Valença')" class="d-flex justify-center">
                        <v-avatar size="120" >
                            <img src="@/assets/gui.jpg"/>
                        </v-avatar>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title class="si text-center">Guilherme Valença</v-list-item-title>
                        <div>
                            <p>{{ description }}</p>
                        </div>
                    </v-list-item>
                </v-list>
            </div>
        </v-container>
        <v-dialog v-model="mostrarMensagem">
            <v-container class="d-flex justify-center">
                <v-card class="descricao text-center" :width="$phoneDisplay ? '' : '400px'">

                    <div class="ma-5">

                        <v-card-title>Desenvolvedor(a)</v-card-title>
                        <v-card-text>
                            <div v-for="(message, index) in exibirMensagem" :key="index">
                                {{ message }}
                            </div>
                        </v-card-text>

                        <a :href="links" target="_blank">Github</a>

                        <v-card-actions class="d-flex justify-center">
                            <v-btn class="botao" color="newColorGreen" variant="outlined" @click="mostrarMensagem = false">Ok!</v-btn>
                        </v-card-actions>

                    </div>

                </v-card>
            </v-container>
        </v-dialog>
    </Default>


</template>

<script>
import Default from "@/Layouts/default/Default.vue"
import { Head } from '@inertiajs/vue3';
export default {
    components:{Default, Head},
    data() {
        return {
            descriptions: {
                'Alice Manguinho': [
                    'IFPE-Campus Igarassu', 'Curso : Informática para Internet','Igarassu-PE', 'alicemanguinhosm@gmail.com'
                ],
                'Anderson Emanoel': [
                    'IFPE-Campus', 'Curso : Informática para Internet','Itapissuma-PE', 'emanoelanderson16@gmail.com'
                ],
                'Claudiane Rodrigues': [
                    'IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'claudianerodrigues365@gmail.com'
                ],
                'Emmily Kathylen':[
                    'IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'emmilysouzakathylen@gmail.com'
                ],
                'Guilherme Valença': [
                    'IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'guilherm3vrp@gmail.com'
                ],
            },
            description: '',
            mostrarMensagem: false,
            exibirMensagem: '',
            links: {
                'Alice Manguinho': 'https://github.com/AliceManguinho',
                'Anderson Emanoel': 'https://github.com/Anderson-446',
                'Claudiane Rodrigues': 'https://github.com/RodriguesClaudiane',
                'Emmily Kathylen': 'https://github.com/EmmilyKathylen',
                'Guilherme Valença': 'https://github.com/Guilhermevalenca'
            }
        }
    },
    methods: {
        showDescription(name) {
            if (this.descriptions[name]) {
                this.mostrarMensagem = true;
                this.exibirMensagem = this.descriptions[name];
                this.links = this.links[name];
            } else {
                window.alert('Descrição não encontrada.');
            }
        },
    }
}
</script>

<style>
.cabecalho{
    text-align: center;
    margin: 25px;
    font-size: larger;
}

.odio{
    padding: 55px;
    margin: auto;
    text-align: justify;
    line-height: 1.5;
    font-size: 17.1px;
}
.perfil{
    border-radius: 10px;
}
.descricao{
    border-radius: 100px;
}
.botao{
    width: 10px;
    color: rgba(53, 151, 47, 1);
}
.description {
    white-space: pre-line;
}

.bi{
    text-align: center;
    max-width: 100%;
    width: 700px;
    font-size: medium;
    margin: auto;
    padding: 16px;
}

.v-list-item {
  cursor: pointer; /* Adicione um indicador de cursor para itens clicáveis */
}

@media only screen and (max-width: 600px) {
  .bi {
    font-size: small; /* Ajuste o tamanho da fonte para tamanhos menores de tela, se necessário */
  }
}


</style>



