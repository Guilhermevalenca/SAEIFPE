<template>
    <v-card>
        <v-card-title>
            <div>Demonstração:</div>
        </v-card-title>
        <v-card-subtitle>
            <div>Apenas uma demonstração de como vai ficar o seu email</div>
        </v-card-subtitle>

        <v-card variant="outlined" class="ma-2">

            <div class="d-flex justify-center">
                <v-avatar size="80">
                    <v-img class="align-content-center" src="https://ingresso.ifpe.edu.br/static/img/ifpe-logo.svg" />
                </v-avatar>
            </div>

            <div class="d-flex justify-center ma-6">
                <v-card variant="outlined" class="w-75">

                    <v-card-title class="text-center">
                        <div>{{ title }}</div>
                    </v-card-title>

                    <v-card-text>

                        <div>{{ text }}</div>

                    </v-card-text>

                    <v-card-actions class="d-flex justify-center">
                        <v-tooltip text="Botão desativado. Apenas para exibição">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" color="secondary" variant="elevated">Ir para o formulário</v-btn>
                            </template>
                        </v-tooltip>
                    </v-card-actions>

                </v-card>
            </div>

        </v-card>
    </v-card>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "TemplateSendFormByEmail",
    components: {Link},
    props: {
        title: String,
        text: String,
        form_id: Number
    },
}
</script>

<style scoped>

</style>
