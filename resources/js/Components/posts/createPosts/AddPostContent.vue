<template>
    <v-container>
        <froala ref="edit" id="edit" :tag="'textarea'" :config="config" v-model:value="textContent"></froala>
    </v-container>
</template>

<script>
import { useTheme } from 'vuetify';
export default {
    name: "AddPostContent",
    components: {},
    data() {
        return {
            textContent: '',
            config: {
                events: {
                    initialized: function () {
                        // console.log('initialized');
                    }
                },
                language: 'pt_br',
                theme: useTheme().global.name._value === 'dark' ? 'dark' : 'gray',
            },
        }
    },
    emits: ['form_content'],
    watch: {
        textContent: {
            handler($new) {
                this.$emit('form_content',$new);
            },
            deep: true
        },
    },
    computed: {

    },
    methods: {

    },
    created() {

    },
    mounted() {

    }
}
</script>

<style>

</style>
