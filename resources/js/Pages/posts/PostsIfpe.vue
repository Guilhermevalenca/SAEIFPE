<template>
    <Head title="Postagens" />
    <Default>
        <v-card-title class="d-flex justify-center">
            Postagens do IFPE Campus Igarassu
        </v-card-title>
            <v-container :class="[$phoneDisplay ? 'w-100' : $screenMediumDisplay ? 'w-75' : 'w-50']">
                <v-card variant="flat" color="transparent">

                    <v-card-actions v-if="$page.props.auth.user && $page.props.auth.user.role === 'adm'" class="d-flex justify-end">
                        <Link :href="route('posts_create')" class="mr-4">
                            <v-btn color="secondary" variant="flat">Criar nova postagem</v-btn>
                        </Link>
                    </v-card-actions>

                    <div>
                      <div v-show="page.all <= 8">
                        <v-container class="d-flex justify-start" v-if="data.data.length !== 0">
                          <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                        </v-container>
                      </div>
                      <div v-show=" !(page.all <= 8)">
                        <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                      </div>
                    </div>

                    <v-container>
                        <RenderingPosts v-for="(post, index) in data.data" :key="index" :data="post"/>
                    </v-container>

                  <div>
                    <div v-show="page.all <= 8">
                      <v-container class="d-flex justify-start" v-if="data.data.length !== 0">
                        <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                      </v-container>
                    </div>
                    <div v-show=" !(page.all <= 8)">
                      <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                    </div>
                  </div>

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
            },
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

    },
}
</script>

<style scoped>

</style>
