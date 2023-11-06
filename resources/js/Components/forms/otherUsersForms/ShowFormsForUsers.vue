<template>
    <v-card class="ma-2" variant="outlined" width="900px" v-for="(form, index) in forms" :key="index" :color="form.responded ? 'secondary' : ''">
        <v-row>
            <v-col cols="8">
                <v-card-title>
                    <div>{{ form.title }}</div>
                </v-card-title>
            </v-col>
            <v-col>
                <v-card-actions class="d-flex justify-end">
                    <v-tooltip text="Responder formulário">
                        <template #activator="{ props }">
                          <Link v-bind="props" v-show="!form.responded" :href="route('forms_show_response', {id: form.id})">
                            <v-btn icon="mdi-text-box" />
                          </Link>
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Você já respondeu esse formulário">
                        <template #activator="{ props }">
                            <v-icon v-show="form.responded" v-bind="props" icon="mdi-text-box" />
                        </template>
                    </v-tooltip>
                </v-card-actions>
            </v-col>
        </v-row>
    </v-card>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "ShowFormsForUsers",
    components: {Link},
    props: {
        data: Object
    },
    data() {
        return {
            forms: this.data.forms.data,
            allPages: this.data.allPages
        }
    },
    methods: {

    },
    created() {

    },
    watch: {
        data: {
            handler($new) {
                this.forms = $new.forms.data;
                this.allPages = $new.allPages;
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
