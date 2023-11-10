<template>
    <v-card>

        <v-card-text>

            <v-container>

                <v-row v-for="(option, index) in options" :key="index">

                    <v-col cols="1">
                        <v-checkbox disabled />
                    </v-col>

                    <v-col>
                        <v-text-field v-model="option.descriptions" placeholder="Escreva aqui..." />
                    </v-col>

                </v-row>

            </v-container>

        </v-card-text>

        <v-card-actions class="d-flex justify-end">
            <v-tooltip text="Remover ultima alternativa">
                <template #activator="{ props }">
                    <v-btn v-bind="props" variant="outlined" :disabled="options.length === 1" @click="removeOption()">
                        <v-icon icon="mdi-minus"/>
                        Remover a ultima opção
                    </v-btn>
                </template>
            </v-tooltip>
            <v-tooltip text="Adicionar uma nova alternativa">
                <template #activator="{ props }">
                    <v-btn v-bind="props" variant="elevated" color="primary" @click="addOption()">
                        <v-icon icon="mdi-plus"/>
                        Adicionar nova opção
                    </v-btn>
                </template>
            </v-tooltip>
        </v-card-actions>

    </v-card>
</template>

<script>
export default {
    name: "MultipleQuestionsEditForm",
    props: {
        options: Array
    },
    methods: {
        addOption() {
            let objeto = {
                descriptions: ''
            }
            this.options.push(objeto)
        },
        removeOption() {
            this.options.pop();
        }
    },
    watch: {
        options: {
            handler($new) {
                this.$emit('send_data',$new);
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
