<template>
<Default>
    <AddDeposition/>
    <ViewDepositions/>
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
