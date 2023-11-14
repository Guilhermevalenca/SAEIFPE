<template>
    <Head title="Formulário" />
    <Default>
        <v-container class="d-flex justify-center">

            <v-card :width="$phoneDisplay ? '' : '900px'">

                <v-card-title class="d-flex justify-center">Formulários</v-card-title>
                <v-card-subtitle>Aqui estão alguns formulários que podem ser respondidos</v-card-subtitle>

                <v-card-text>
                    <ShowFormsForUsers :data="data" />
                </v-card-text>

            </v-card>

        </v-container>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import ShowFormsForUsers from "@/Components/forms/otherUsersForms/ShowFormsForUsers.vue";
import { Head } from '@inertiajs/vue3';

export default {
    name: "FormsForUsers",
    components: {Default, ShowFormsForUsers, Head},
    props: {
        data: Object
    }
}
</script>

<style scoped>

</style>
