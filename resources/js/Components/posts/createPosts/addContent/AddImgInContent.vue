<template>
    <v-dialog v-model="openDialog">
        <v-container class="d-flex justify-center">

            <v-card class="w-75">

                <v-card-text>
                    <v-file-input accept="image/png, image/jpg, image/bmp" label="Imagem" v-model="fileContent" placeholder="clique para selecionar uma imagem" />
                    <div>Sua imagem será carregada aqui:</div>
                    <v-img :src="renderImg" />
                </v-card-text>

                <v-card-actions class="d-flex justify-end">
                    <v-tooltip text="A imagem selecionada não será adicionada">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" @click="$emit('close_select_img')">Cancelar</v-btn>
                        </template>
                    </v-tooltip>
                    <v-btn @click="$emit('new_img', fileContent)" color="tertiary" variant="flat">Adicionar imagem</v-btn>
                </v-card-actions>

            </v-card>

        </v-container>
    </v-dialog>
</template>

<script>
export default {
    name: "AddImgInContent",
    data() {
      return {
          fileContent: null,
      }
    },
    props: {
        show: Boolean
    },
    computed: {
        renderImg() {
            if(this.fileContent) {
                return URL.createObjectURL(this.fileContent[0]);
            }
            return null;
        },
        openDialog() {
            return this.show;
        }
    }
}
</script>

<style scoped>

</style>
