<template>
    <Head title="Welcome" />

    <Default>
        <div class="min-h-screen d-flex justify-center items-center">

            <v-card :width="phoneDisplay ? '' : '900px'">
                <v-card-title  :class="['text-center', phoneDisplay ? '' : 'justify-md-center']">
                    <h3>Saudações, comunidade IFPE <span v-if="!phoneDisplay">Campus Igarassu</span></h3>
                    <span v-if="phoneDisplay"> Campus Igarassu</span>
                </v-card-title>
                <v-card-text class="d-flex text-body-1">
                    <div>
                        A CREE (Coordenação de Relações Empresariais, Estágios e Egressos) está realizando um levantamento de dados sobre discentes e egressos, com o objetivo de trazer uma plataforma para interagir com estes estudantes e fazer um acompanhamento de suas carreiras. Este é um cadastro inicial, apenas para atualizar informações de contato, portanto é imprescindível que as informações de contato como email e telefone estejam corretas.
                    </div>
                </v-card-text>
                <v-card-actions class="d-flex justify-center">
                    <v-btn class="mb-6" color="secondary" variant="outlined">vamos lá!</v-btn>
                </v-card-actions>
            </v-card>

        </div>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import {Head, Link} from '@inertiajs/vue3';

export default {
    name: 'Welcome',
    components: {Default, Head},
    props: {
        canLogin: {
            type: Boolean
        },
        canRegister: {
            type: Boolean,
        },
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            phoneDisplay: window.innerWidth <= 800
        }
    },
}
</script>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
