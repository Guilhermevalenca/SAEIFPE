<template>
    <v-checkbox v-model="wantNewEmails" label="Adicionar novos emails" class="mt-8" />
    <v-container v-show="wantNewEmails">
        <v-row v-for="(email, index) in newEmails" :key="index">
            <v-col>
                <v-text-field :rules="rules" label="Email" v-model="newEmails[index]" placeholder="Adicione emails externos ao sistema" />
            </v-col>
            <v-col class="d-flex">
                <v-btn icon="mdi-minus" @click="newEmails.splice(index, 1)" :disabled="newEmails.length === 1" />
                <v-btn icon="mdi-plus" color="primary" variant="flat" @click="newEmails.push(null)" />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: "AddNewsEmails",
    data() {
        return {
            wantNewEmails: null,
            newEmails: [null],
            rules: [
                value => {
                    if(value) {
                        return true;
                    }
                    return 'É necessário preencher este campo'
                },
                value => {
                    if(/.+@.+\..+/.test(value)) {
                        return true
                    }
                    return 'Email inválido';
                }
            ]
        }
    },
    watch: {
        wantNewEmails: {
            handler($new) {
                this.$emit('want_new_emails', $new);
                if($new) {
                    this.$emit('new_emails',this.newEmails);
                }
            },
            deep: true
        },
        newEmails: {
            handler($new) {
                if(this.wantNewEmails) {
                    this.$emit('new_emails',$new);
                }
            },
            deep: true
        }
    },
    emits: ['want_new_emails', 'new_emails']
}
</script>

<style scoped>

</style>
