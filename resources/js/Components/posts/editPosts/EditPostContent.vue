<template>
    <v-textarea label="Conteúdo" variant="outlined" placeholder="Escreva o conteúdo da postagem" :rules="rules.content" v-model="textContent" rows="8" no-resize hint="Para adicionar links, apenas digite a url" persistent-hint>
        <template #append-inner>
            <div class="d-flex flex-column">
                <v-btn variant="flat" @click="show.file = true" icon="mdi-file-image-plus" />
            </div>
        </template>

        <template #message="{ message }">
            <div>{{ message }}</div>
        </template>

        <template #details>

            <v-container class="d-flex justify-end">

                <div>
                    <div>Imagem selecionada:</div>
                    <v-img :src="renderImg ? renderImg : currentImg" @click="show.viewFileSelected = true" />
                    <v-dialog v-model="show.viewFileSelected" class="w-50">
                        <v-container>
                            <v-img :src="renderImg ? renderImg : currentImg" />
                        </v-container>
                    </v-dialog>
                </div>

            </v-container>

        </template>
    </v-textarea>

    <EditImgInContent :show="show.file" @close_select_img="show.file = false" @new_img="value => { fileContent = value; show.file = false}" />
</template>


<script>
import EditImgInContent from "@/Components/posts/editPosts/editContent/EditImgInContent.vue";
import AddImgInContent from "@/Components/posts/createPosts/addContent/AddImgInContent.vue";

export default {
    name: "EditPostContent",
    components: {AddImgInContent, EditImgInContent},
    props: {
        content: String,
        currentImg: String
    },
    data() {
        return {
            rules: {
                content: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário adicionar algum conteúdo na sua postagem'
                    }
                ],
            },
            textContent: this.content,
            fileContent: null,
            show: {
                file: false,
                file_message: true,
                viewFileSelected: false
            },
        }
    },
    emits: ['form_content', 'form_content_img'],
    watch: {
        textContent: {
            handler($new) {
                console.log($new);
                this.$emit('form_content',$new);
            },
            deep: true
        },
        fileContent: {
            handler($new) {
                this.$emit('form_content_img', $new);
            },
            deep: true
        }
    },
    computed: {
        renderImg() {
            if(this.fileContent) {
                return URL.createObjectURL(this.fileContent[0]);
            }
            return null;
        },
    },
    methods: {
        adicionarQuebraDeLinha() {
            // Adicione uma quebra de linha ao atingir o comprimento máximo desejado
            const comprimentoMaximo = 20; // Ajuste conforme necessário
            if (this.textContent.length % comprimentoMaximo === 0) {
                this.textContent += '<br>';
            }
        },
    }
}
</script>

<style scoped>

</style>
