<template>
<v-card class="d-flex flex-column justify-center pa-10 w-50 h-auto">
    <v-form>
    <v-textarea persistent-placeholder placeholder="Digite aqui seu depoimento" variant="solo" class="ma-0 pa-0"></v-textarea>
    <v-file-input class="ma-0 pa-0"
        :rules="rules"
        accept="image/png, image/jpeg, image/bmp"
        prepend-icon="mdi-camera"
        variant="plain"
    ></v-file-input>
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

</style>
