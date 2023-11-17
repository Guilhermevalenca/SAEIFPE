<template>
    <v-textarea label="Conteúdo" variant="outlined" placeholder="Escreva o conteúdo da postagem" v-model="textContent" :rules="rules.content" rows="8" no-resize>
        <template #append-inner>
            <div class="d-flex flex-column">
                <v-btn variant="flat" icon="mdi-file-image-plus" />
                <v-btn variant="flat" icon="mdi-link-box-outline" />
                <v-btn variant="flat" icon="mdi-plus"/>
            </div>
        </template>
    </v-textarea>
</template>

<script>
export default {
    name: "AddPostContent",
    data() {
        return {
            rules: {
                content: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário adicionar algum tipo de conteúdo'
                    }
                ],
            },
            textContent: null
        }
    },
    watch: {
        textContent: {
            handler($new) {
                this.$emit('form_content',$new);
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
