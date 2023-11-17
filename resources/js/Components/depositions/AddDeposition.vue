<template>
<v-card id="Add-card" class="d-flex flex-column justify-center pa-10 w-75 h-auto rounded-xl" variant="flat" :style="'border: solid 1px #2E8429;'">
    <v-form @submit.prevent="submitDeposition()">
        <v-card-text class="d-flex pa-0 flex-column">
    <v-textarea v-model="deposition.content" persistent-placeholder placeholder="Digite aqui seu depoimento" variant="outlined" auto-grow class="mb-0 rounded-xl"></v-textarea>
            <img :src="imageUrl" v-if="imageUrl" alt="ovo"/>
            <v-container id="test" class="pa-0 justify-start">
                <v-file-input v-model="deposition.picture" prepend-icon="mdi mdi-image-plus" accept="image/png, image/jpg, image/bmp"></v-file-input>
            </v-container>
        </v-card-text>
    <div class="d-flex justify-end ma-0 pa-2">
        <v-btn @click="$emit('cancelAction')" color="tertiary" variant="outlined">Cancelar</v-btn>
        <v-btn type="submit" class="mb-6 d-flex justify-end" color="tertiary" variant="flat">Enviar</v-btn>
    </div>
    </v-form>
</v-card>
</template>
<script>

import {useForm} from "@inertiajs/vue3";

export default {
    name: "AddDeposition",
    data(){
        return{
            imageUrl: null,
            deposition:useForm({
                content:"",
                picture: null,
            })
        }
    },
    methods:{
        submitDeposition(){
            this.deposition.post(route("depoimentos_criar"));
            this.deposition.content= ""
            this.deposition.picture= ""
            this.$emit('send')
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
