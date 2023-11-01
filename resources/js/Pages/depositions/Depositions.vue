<template>
<Default>
    <v-card-title class="d-flex align-center flex-row justify-center">
        Depoimentos
    </v-card-title>
    <v-main class="d-flex align-center flex-row justify-center">
        <AddDeposition/>
        <ViewDepositions/>
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
