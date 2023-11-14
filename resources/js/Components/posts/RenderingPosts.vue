<template>
    <v-expansion-panel>
        <template #title>
            <div>{{ data.user }} - {{ data.title }}</div>
        </template>
        <template #text>
            <v-row no-gutters>
                <v-col>
                    <v-card-text>
                        {{ partialContent }}
                    </v-card-text>
                </v-col>
                <v-divider :vertical="true" color="secondary" class="mx-4 border-opacity-100"></v-divider>
                <v-col>
                    <v-btn variant="outlined" color="primary" @click="showAllPost = true">Deseja visualizar toda a postagem?</v-btn>

                    <v-divider color="secondary" class="mx-4 border-opacity-100"></v-divider>

                    <div>Formulário anexado:</div>
                    <Link :href="route('forms_show_response', {id: data.form_id})">
                        <v-btn variant="elevated" color="primary">Ir para o formulário</v-btn>
                    </Link>
                </v-col>
            </v-row>
        </template>
    </v-expansion-panel>
    <v-dialog v-model="showAllPost" class="w-75 d-flex justify-center">
        <v-card>
            <div>
                <strong>{{ data.user }}</strong> - <strong>{{ data.title }}</strong>
            </div>
            <v-card-text>
                {{ data.content }}
            </v-card-text>
            <v-card-actions class="d-flex justify-end">
                <v-btn @click="showAllPost = false" variant="outlined" class="mr-1">Fechar!</v-btn>
                <Link :href="route('forms_show_response', {id: data.form_id})">
                    <v-btn variant="elevated" color="primary">Ir para o formulário</v-btn>
                </Link>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "RenderingPosts",
    components: {Link},
    props: {
        data: Object
    },
    created() {
        console.log(this.data);
    },
    computed: {
        partialContent() {
            return this.data.content
                .split('')
                .slice(0, 200)
                .join('') + '...';
        },
    },
    data() {
        return {
            showAllPost: false
        }
    }
}
</script>

<style scoped>
div {
    padding: 5px;
}
</style>
