<template>
    <v-container class="d-flex flex-column justify-center pa-0 h-auto rounded-xl">
        <v-card class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
            <v-card-title class="d-flex justify-space-between">
                <div>
                    {{ data.user }} - {{ data.title }}
                </div>
                <div v-if="$page.props.auth.user && $page.props.auth.user.role === 'adm'">
                    <Link :href="route('posts_edit', {id: data.id})">
                        <v-btn icon="mdi-pencil-outline" color="secondary" variant="flat" />
                    </Link>
                </div>
            </v-card-title>
            <v-row no-gutters>
                <v-card-text>
                    <div v-html="identifyingLinks" class="highlight-links"></div>
                    <v-img v-if="data.img" :src="data.img" max-height="300px" />
                </v-card-text>
            </v-row>
            <v-row>
                <v-container v-if="data.form_id" class="d-flex justify-start default-card-border">
                    <v-card-title>Responder formulário:</v-card-title>
                    <v-tooltip text="Clique para ir até o formulário respectivo">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" variant="flat" color="tertiary">
                                <template #prepend>
                                    <v-icon icon="mdi-text-search-variant" />
                                </template>
                                <Link :href="route('forms_show_response', {id: data.form_id})">
                                    {{ data.title }}
                                </Link>
                            </v-btn>
                        </template>
                    </v-tooltip>
                </v-container>
            </v-row>
        </v-card>
    </v-container>
</template>

<script>
import linkifyHtml from 'linkify-html';
import { Link } from '@inertiajs/vue3';
export default {
    name: "RenderingPosts",
    components: {Link},
    props: {
        data: Object
    },
    computed: {
        identifyingLinks() {
            const textHtml = linkifyHtml(this.data.content);
            return textHtml.replace(/\n/g, "<br>");
        }
    },
    data() {
        return {

        }
    },
    created() {

    }
}
</script>

<style scoped>
div {
    padding: 5px;
}
</style>
<style>
.highlight-links a{
    color:#0d47a1;
}
</style>
