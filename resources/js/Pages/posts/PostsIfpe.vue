<template>
    <Head title="Postagens" />
    <Default>
        <v-container>
            <v-card>
                <v-card-title class="d-flex justify-center">
                    <div>Postagens do IFPE Campus Igarassu</div>
                </v-card-title>
                <v-card-actions class="d-flex justify-end">
                    <Link :href="route('posts_create')">
                        <v-btn color="secondary" variant="elevated">Criar nova postagem</v-btn>
                    </Link>
                </v-card-actions>
                <v-card-text>

                </v-card-text>
            </v-card>
        </v-container>
    </Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import { Head, Link } from '@inertiajs/vue3';
export default {
    name: "PostsIfpe",
    components: {Default, Head, Link},
    props: {
        data: Object,
        last_page: Number
    },
    created() {
        // this.data = this.data.data;
        console.log(this.data);
        console.log(this.last_page);
    }
}
</script>

<style scoped>

</style>
