<template>
<Default>
    <v-card-title class="d-flex align-center flex-row justify-center">
        Depoimentos
    </v-card-title>
    <v-main class="d-flex align-center flex-column justify-center pa-2">
        <v-container class="d-flex justify-center">
        <AddDeposition/>
        </v-container>
        <v-container class="d-flex justify-center">
        <ViewDepositions/>
        </v-container>
    </v-main>
</Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import AddDeposition from "@/Components/depositions/AddDeposition.vue";
import ViewDepositions from "@/Components/depositions/ViewDepositions.vue";

export default {
    name: "Depositions",
    components: {ViewDepositions, AddDeposition, Default}
}
</script>


<style scoped>

</style>
