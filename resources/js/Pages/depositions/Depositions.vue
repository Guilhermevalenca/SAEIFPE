<template>
<Default>
    <v-card-title class="d-flex align-center flex-row justify-center">
        Depoimentos
    </v-card-title>
    <v-main class="d-flex align-center flex-column justify-center pb-16">
        <v-container class="d-flex justify-center">
        <AddDeposition/>
        </v-container>
        <v-container class="d-flex align-center flex-column justify-center pt-16">
        <ViewDepositions :data="data"/>
        </v-container>
    </v-main>
</Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import AddDeposition from "@/Components/depositions/AddDeposition.vue";
import ViewDepositions from "@/Components/depositions/ViewDepositions.vue";

export default {
    props: {
        data: Object,
    },
    name: "Depositions",
    components: {ViewDepositions, AddDeposition, Default},
    created() {
        console.log(this.data);
    }
}
</script>


<style scoped>

</style>
