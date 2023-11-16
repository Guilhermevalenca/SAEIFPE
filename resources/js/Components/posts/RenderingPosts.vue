<template>
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
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "RenderingPosts",
    components: {Link},
    props: {
        data: Object
    },
    computed: {
        partialContent() {
            return this.data.content
                .split('')
                .slice(0, 255)
                .join('') + '...';
        },
    },
    data() {
        return {

        }
    }
}
</script>

<style scoped>
div {
    padding: 5px;
}
</style>
