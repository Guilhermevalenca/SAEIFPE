<template>
    <Head title="Postagens" />
    <Default>
        <v-container class="d-flex justify-center">
            <v-card class="w-75">
                <v-card-title class="d-flex justify-center ma-4">
                    <div>Postagens do IFPE Campus Igarassu</div>
                </v-card-title>

                <v-card-actions v-if="$page.props.auth.user && $page.props.auth.user.role === 'adm'" class="d-flex justify-end">
                    <Link :href="route('posts_create')" class="mr-4">
                        <v-btn color="secondary" variant="elevated">Criar nova postagem</v-btn>
                    </Link>
                </v-card-actions>

                <v-container class="d-flex justify-start">
                    <v-card class="w-50" variant="flat">
                        <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                    </v-card>
                </v-container>

                <v-card-text>
                    <v-expansion-panels variant="inset" multiple>
                        <RenderingPosts v-for="(post, index) in data.data" :key="index" :data="post" />
                    </v-expansion-panels>
                </v-card-text>

                <v-container class="d-flex justify-end">
                    <v-card class="w-50" variant="flat">
                        <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                    </v-card>
                </v-container>

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
        last_page: Number,
        current_page: Number
    },
    data() {
        return {
            page: {
                current: this.current_page,
                all: this.last_page
            }
        }
    },
    watch: {
        page: {
            handler($new) {
                window.location.href = route('home', {page: $new.current});
            },
            deep: true
        }
    },
    created() {
        // this.data = this.data.data;
        console.log(this.data);
        console.log(this.last_page);
        console.log(this.current_page);
    }
}
</script>

<style scoped>

</style>
