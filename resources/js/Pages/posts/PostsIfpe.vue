<template>
    <Head title="Postagens" />
    <Default>
        <v-container>
            <v-card>
                <v-card-title class="d-flex justify-center">
                    <div>Postagens do IFPE Campus Igarassu</div>
                </v-card-title>
                <v-card-actions v-if="$page.props.auth.user && $page.props.auth.user.role === 'adm'" class="d-flex justify-end">
                    <Link :href="route('posts_create')">
                        <v-btn color="secondary" variant="elevated">Criar nova postagem</v-btn>
                    </Link>
                </v-card-actions>
                <v-card-text>
                    <v-expansion-panels class="w-75" variant="inset" multiple>
                        <RenderingPosts v-for="(post, index) in data.data" :key="index" :data="post" />
                    </v-expansion-panels>

                </v-card-text>
            </v-card>
        </v-container>
    </Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import { Head, Link } from '@inertiajs/vue3';
import RenderingPosts from "@/Components/posts/RenderingPosts.vue";
export default {
    name: "PostsIfpe",
    components: {RenderingPosts, Default, Head, Link},
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
