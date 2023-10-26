<template>
    <Head title="Testing" />

    <AuthenticatedLayout>
        <v-card>
            <v-card-title>Ola amigos e amigas</v-card-title>
            <v-card-text>Vê que tabaca do karai</v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>

<script>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    name: "Testing",
    components: {AuthenticatedLayout, Head}
}
</script>

<style scoped>

</style>
