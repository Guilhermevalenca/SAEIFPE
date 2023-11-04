<template>
<v-card class="d-flex flex-column justify-center pa-10 w-75 h-auto">
    <v-form>
        <v-card-text class="d-flex pa-0 flex-column">
    <v-textarea persistent-placeholder placeholder="Digite aqui seu depoimento" variant="solo-filled" auto-grow class="mb-0"></v-textarea>
            <div class="bosta">
            <v-file-input>
                <v-icon icon="mdi mdi-camera"
                ></v-icon>
 1           </v-file-input>
            </div>
        </v-card-text>
    <div class="d-flex justify-end ma-0">
        <v-btn class="mb-6 d-flex justify-end" color="secondary" variant="outlined" type="submit">Enviar</v-btn>
    </div>
    </v-form>
</v-card>
</template>
<script>
export default {
    name: "AddDeposition"
}
</script>

<style scoped>
.bosta{
    width: 0.8em;
    height: 1em;
}
</style>
