<template>
    <v-card variant="outlined">
        <v-card-title class="d-flex justify-space-between">
            <div>{{ data.title }}</div>
            <div>{{ data.user }}</div>
        </v-card-title>
        <v-card-text>
            <v-container class="flex-wrap">
                {{ data.content }}
            </v-container>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    name: "RenderingPosts",
    props: {
        data: Object
    },
    created() {
        console.log(this.data);
    }
}
</script>

<style scoped>

</style>
