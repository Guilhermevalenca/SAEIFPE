<template>
<v-card id="Add-card" class="d-flex flex-column justify-center pa-10 w-75 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
    <v-form @submit.prevent="submitDeposition()">
        <v-card-text class="d-flex pa-0 flex-column">
    <v-textarea v-model="deposition.content" persistent-placeholder placeholder="Digite aqui seu depoimento" variant="outlined" :style="'border:#2E8429;'" auto-grow class="mb-0 rounded-xl"></v-textarea>
            <v-container id="test" class="pa-0 justify-start">
                <v-file-input v-model="deposition.picture" prepend-icon="mdi mdi-camera"></v-file-input>
            </v-container>
        </v-card-text>
    <div class="d-flex justify-end ma-0">
        <v-btn type="submit" class="mb-6 d-flex justify-end" color="tertiary" variant="outlined">Enviar</v-btn>
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
            deposition:useForm({
                content:"",
                picture:"",
            })
        }
    },
    methods:{
        submitDeposition(){
            this.deposition.post(route("depoimentos_criar"));
            this.deposition.content= ""
            this.deposition.picture= ""
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
