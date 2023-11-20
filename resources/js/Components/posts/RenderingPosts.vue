<template>
    <v-container class="d-flex flex-column justify-center pa-0 w-75 h-auto rounded-xl">
        <v-card class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
            <v-card-title>
                    {{ data.user }} - {{ data.title }}
            </v-card-title>
            <v-row no-gutters>
                <v-col cols="12">
                    <v-card-text>
                        <div v-html="identifyingLinks" class="highlight-links"></div>
                        <v-img v-if="data.img" :src="data.img" />
                    </v-card-text>
                </v-col>
                <v-col>
                    <v-container v-if="data.form_id" class="d-flex justify-end">
                        <v-card-title>Formulário anexado:</v-card-title>
                        <v-tooltip text="Clique para ir até o formulário respectivo">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" variant="flat" color="tertiary">
                                    <Link :href="route('forms_show_response', {id: data.form_id})">
                                        Ir para o formulário
                                    </Link>
                                </v-btn>
                            </template>
                        </v-tooltip>
                    </v-container>
                </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>

<!--
<v-expansion-panel>
    <template #title>
        <v-container>
            <v-card-title>
                <div>
                    {{ data.user }} - {{ data.title }}
                </div>
            </v-card-title>
            <v-card-text>
                {{ partialContent }}
            </v-card-text>
        </v-container>
    </template>
    <template #text>
        <v-row no-gutters>
            <v-col cols="12">
                <v-card-text>
                    {{ data.content }}
                </v-card-text>
            </v-col>
            <v-divider color="secondary" class="mx-4 border-opacity-100"></v-divider>
            <v-col>
                <div v-if="data.form_id" class="d-flex justify-end">
                    <v-card-title>Formulário anexado:</v-card-title>
                        <v-tooltip text="Clique para ir até o formulário respectivo">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" variant="elevated" color="primary">
                                    <Link :href="route('forms_show_response', {id: data.form_id})">
                                        Ir para o formulário
                                    </Link>
                                </v-btn>
                            </template>
                        </v-tooltip>
                </div>
            </v-col>
        </v-row>
    </template>
</v-expansion-panel>
-->

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
      /*  partialContent() {
            return this.data.content
                .split('')
                .slice(0, 255)
                .join('') + '...';
        },*/
        identifyingLinks() {
            return linkifyHtml(this.data.content);
        }
    },
    data() {
        return {

        }
    },
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
