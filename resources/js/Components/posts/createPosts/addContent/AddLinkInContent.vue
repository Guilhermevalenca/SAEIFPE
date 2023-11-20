<template>
    <v-dialog v-model="openDialog">
        <v-container>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <v-text-field label="link" placeholder="Adicione o link aqui" />
                        </v-col>
                        <v-col>
                            <v-text-field label="Nome" placeholder="Dê um nome para o link" hint="Caso não escolha um nome, o link irá aparecer por completo no conteúdo da postagem">
                                <template #details>
                                    <div>Aviso: Para links muitos grandes, recomendamos adicionar um nome!</div>
                                </template>
                            </v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="d-flex justify-end">
                    <v-btn @click="$emit('close_dialog_link')">Fechar</v-btn>
                    <v-btn>Adicionar link</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </v-dialog>
</template>


<script>
export default {
    name: "AddLinkInContent",
    props: {
        addLink: Boolean
    },
    computed: {
        openDialog() {
            return this.addLink;
        }
    }
}
</script>

<style scoped>

</style>
