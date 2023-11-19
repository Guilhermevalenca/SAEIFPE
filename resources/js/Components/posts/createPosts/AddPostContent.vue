<template>
    <v-textarea label="Conteúdo" variant="outlined" placeholder="Escreva o conteúdo da postagem" v-model="textContent" :rules="rules.content" rows="8" no-resize>
        <template #append-inner>
            <div class="d-flex flex-column">
                <v-btn variant="flat" @click="show.file = true" icon="mdi-file-image-plus" />
                <v-btn variant="flat" @click="show.links = true" icon="mdi-link-box-outline" />
            </div>
        </template>

        <template #message="{ message }">
            <div>{{ message }}</div>
        </template>

        <template #details>

            <v-container class="d-flex justify-end">

                <div v-if="fileContent">
                    <div>Imagem selecionada:</div>
                    <v-img :src="renderImg" @click="show.viewFileSelected = true" />
                    <v-dialog v-model="show.viewFileSelected" class="w-50">
                        <v-container>
                            <v-img :src="renderImg" />
                        </v-container>
                    </v-dialog>
                </div>

            </v-container>

        </template>
    </v-textarea>
    <AddImgInContent :show="show.file" @close_select_img="show.file = false" @new_img="value => { fileContent = value; show.file = false}" />

    <AddLinksInContent :show="show.links" @close_add_links="show.links = false" @new_links="value => {this.links = value; show.links = false}" />
</template>

<script>
import AddImgInContent from "@/Components/posts/createPosts/addContent/AddImgInContent.vue";
import AddLinksInContent from "@/Components/posts/createPosts/addContent/AddLinksInContent.vue";

export default {
    name: "AddPostContent",
    components: {AddLinksInContent, AddImgInContent},
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
            textContent: null,
            fileContent: null,
            links: [],
            show: {
                file: false,
                links: false,
                file_message: true,
                viewFileSelected: false
            }
        }
    },
    emits: ['form_content', 'form_content_links', 'form_content_img'],
    watch: {
        textContent: {
            handler($new) {
                this.$emit('form_content',$new);
            },
            deep: true
        },
        links: {
            handler($new) {
                this.$emit('form_content_links', $new)
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
    }
}
</script>

<style>
.v-input__details {
    align-items: flex-start;
}
</style>
