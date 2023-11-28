<template>
    <v-container class="ma-0 pa-0">
        <v-card id="Add-card" class="d-flex flex-column justify-center ma-0 pa-10  h-auto rounded-xl" variant="flat" :style="'border: solid 1px #2E8429;'">
            <v-form @submit.prevent="submitDeposition()">
                <v-card-text class="d-flex pa-0 flex-column">
                    <v-textarea v-model="deposition.content" persistent-placeholder placeholder="Digite aqui seu depoimento" variant="outlined" auto-grow class="mb-0 rounded-xl"></v-textarea>
                    <img :src="imageUrl" v-if="imageUrl" alt="ovo"/>
                    <v-card-actions id="test" class="pa-0 justify-start">
                        <v-tooltip text="Adicionar imagem">
                            <template #activator="{ props }">
                                <v-file-input v-bind="props" v-model="deposition.picture" prepend-icon="mdi mdi-image-plus" accept="image/png, image/jpg, image/bmp"></v-file-input>
                            </template>
                        </v-tooltip>
                    </v-card-actions>
                </v-card-text>
                <v-card-actions class="d-flex justify-end ma-0 pa-0">
                    <v-tooltip text="Cancelar criação de depoimento">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" @click="$emit('cancelAction')" class='ma-2' color="quaternary" variant="flat">Cancelar</v-btn>
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Enviar depoimento">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" type="submit" class="ma-2 d-flex justify-end" color="tertiary" variant="flat">Enviar</v-btn>
                        </template>
                    </v-tooltip>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-container>

</template>
<script>

import {useForm} from "@inertiajs/vue3";

export default {
    name: "AddDeposition",
    data(){
        return{
            imageUrl: null,
            deposition:useForm({
                content:null,
                picture: null,
            })
        }
    },
    methods:{
        submitDeposition(){
            this.deposition.post(route("depoimentos_criar"),{
                onSuccess: () =>{
                    this.deposition.reset()
                    this.$emit('send')
                }
            });
        }
            },
    watch:{
        "deposition.picture":{
            handler($new){
                if($new){
                    this.imageUrl = URL.createObjectURL($new[0]);
                }
            },
            deep: true
        }
    }
}
</script>
<style lang="scss">
#test{
.v-input__control {
    height: 4em;
    display: none;
}
    .v-input{
        font-size: 1.6em;
        color: #2E8429;
    }
}
</style>
