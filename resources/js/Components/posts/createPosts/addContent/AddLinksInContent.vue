<template>
    <v-dialog v-model="openDialog" >
        <v-container class="d-flex justify-center">

            <v-card class="w-75">
                <v-card-title>Insirá seus links abaixo:</v-card-title>

                <v-card-actions class="d-flex justify-end">
                    <div>Adicionar novo link:</div>
                    <v-btn color="tertiary" variant="flat" icon="mdi-plus" @click="links.push('')" />
                </v-card-actions>

                <v-card-text>

                    <!-- gambiarra pra adicionr o scroll no dialog -->
                    <v-virtual-scroll :items="[null]" height="300">

                        <v-row>
                            <v-col cols="4" v-for="(link, index) in links" :key="index" >
                                <v-text-field v-model="links[index]" label="Link" placeholder="Escreva o link aqui" :rules="rules">
                                    <template #append-inner>
                                        <v-tooltip text="Apagar este link em especifico">
                                            <template #activator="{ props }">
                                                <v-btn variant="flat" v-bind="props" icon="mdi-delete" @click="links.splice(index, 1)" :disabled="links.length === 1" />
                                            </template>
                                        </v-tooltip>
                                    </template>
                                </v-text-field>
                            </v-col>
                        </v-row>

                    </v-virtual-scroll>


                </v-card-text>

                <v-card-actions class="d-flex justify-end">
                    <v-tooltip text="Ao cancelar você perderá os links adicionados">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" @click="$emit('close_add_links')">Cancelar</v-btn>
                        </template>
                    </v-tooltip>
                    <v-btn color="tertiary" variant="flat" @click="$emit('new_links', this.links)">Adicionar links</v-btn>
                </v-card-actions>

            </v-card>

        </v-container>
    </v-dialog>
</template>

<script>
export default {
    name: "AddLinksInContent",
    data() {
        return {
            links: [''],
            rules: [
                value => {
                    if (value.startsWith('http://') || value.startsWith('https://')) {
                        return true;
                    }
                    return 'Inseriu um link inválido';
                }
            ]
        }
    },
    props: {
        show: Boolean
    },
    computed: {
        openDialog() {
            return this.show;
        },
    },
}
</script>

<style scoped>

</style>
