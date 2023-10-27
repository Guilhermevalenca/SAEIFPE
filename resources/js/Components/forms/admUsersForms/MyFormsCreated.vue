<template>
    <v-tooltip text="Atualizar lista formulários">
        <template #activator="{ props }">
            <v-btn class="mb-5" variant="outlined" v-bind="props" icon="mdi-reload" />
        </template>
    </v-tooltip>

    <v-card class="mb-10" v-show="noForms">
        <v-card-title>Nenhum formulário encontrado!!!</v-card-title>
        <v-card-text>Pelo visto você ainda não criou nenhum formulário. para criar seu primeiro formulário, clique no botão na parte superior direita "CRIAR FORMULÁRIO"</v-card-text>
    </v-card>

    <v-card width="900px" v-for="(form, index) in forms" :key="index">
        <v-row>
            <v-col cols="8">
                <v-card-title>{{ form.title }}</v-card-title>
            </v-col>
            <v-col>
                <v-card-actions class="v-card__actions">
                    <v-tooltip text="Gráficos das respostas">
                        <template #activator="{ props }">
                            <v-btn :to="{name: 'responseViewForm', params: { id: form.id }}" v-bind="props" icon="mdi-chart-line" />
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Editar formulário">
                        <template #activator="{ props }">
                            <v-btn :to="{name: 'editForm', params: {id: form.id}}" v-bind="props" icon="mdi-pencil-outline" />
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Apagar formulário">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" icon="mdi-delete" />
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Visualizar formulário">
                        <template #activator="{ props }">
                            <v-btn :to="{name: 'seeForm', params: { id: form.id }}" v-bind="props" icon="mdi-text-search-variant" />
                        </template>
                    </v-tooltip>
                </v-card-actions>
            </v-col>
        </v-row>
    </v-card>
</template>

<script>

export default {
    name: "MyFormsCreated",
    props: {
        data: Object
    },
    data() {
        return {
            forms: this.data.forms.data,
            allPages: this.data.allPages,
            noForms: false,
        }
    },
    methods: {

    },
    created() {

    }
}
</script>


<style scoped>

</style>
