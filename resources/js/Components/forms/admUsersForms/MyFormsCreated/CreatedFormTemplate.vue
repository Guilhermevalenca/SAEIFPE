<template>
    <v-row>
        <v-col cols="4">
            <v-card-title>{{ form.title }}</v-card-title>
        </v-col>
        <v-col>
            <v-card-actions class="v-card__actions">
                <v-tooltip text="Enviar este formulário pelo email">
                    <template #activator="{ props }">
                        <Link v-bind="props" :href="route('forms_createSendEmail', { id: form.id })">
                            <v-btn icon="mdi-email-multiple-outline" />
                        </Link>
                    </template>
                </v-tooltip>

                <v-tooltip text="Gráficos das respostas">
                    <template #activator="{ props }">
                        <Link v-bind="props" :href="route('forms_showByFormId_responded', {id: form.id})">
                            <v-btn icon="mdi-chart-line" />
                        </Link>
                    </template>
                </v-tooltip>

                <v-tooltip text="Editar formulário">
                    <template #activator="{ props }">
                        <Link v-bind="props" :href="route('forms_edit', {id: form.id})">
                            <v-btn icon="mdi-pencil-outline" />
                        </Link>
                    </template>
                </v-tooltip>

                <v-tooltip text="Apagar formulário">
                    <template #activator="{ props }">
                        <Link v-bind="props" :href="route('forms_destroy', {id: form.id})" method="delete" as="button">
                            <v-btn icon="mdi-delete" />
                        </Link>
                    </template>
                </v-tooltip>

                <v-tooltip text="Visualizar formulário">
                    <template #activator="{ props }">
                        <Link v-bind="props" :href="route('forms_show', {id: form.id})">
                            <v-btn icon="mdi-text-search-variant" />
                        </Link>
                    </template>
                </v-tooltip>
            </v-card-actions>
        </v-col>
    </v-row>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "CreatedFormTemplate",
    components: {Link},
    props: {
        form: Object
    },
    created() {

    }
}
</script>

<style scoped>

</style>
