<template>
    <v-card>

        <v-card-title class="text-center">
            <div>{{ title }}</div>
        </v-card-title>

        <v-card-text>

            <div>{{ text }}</div>

        </v-card-text>

        <v-card-actions class="d-flex justify-center">
            <Link :href="route('forms_show_response', { id: form_id})">
                <v-btn color="secondary" variant="outlined">Ir para o formulário</v-btn>
            </Link>
        </v-card-actions>

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
    }
}
</script>

<style scoped>

</style>
