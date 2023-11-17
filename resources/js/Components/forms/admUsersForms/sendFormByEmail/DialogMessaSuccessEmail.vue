<template>
    <v-dialog v-model="dialog" persistent>
        <v-container class="d-flex justify-center">
            <v-card :width="$phoneDisplay ? '' : '600px'">
                <v-card-title>Email enviado</v-card-title>
                <v-card-subtitle>Email enviado com sucesso, para todos os destinatarios</v-card-subtitle>
                <v-card-actions class="d-flex justify-space-between ma-2">
                    <v-btn variant="outlined" @click="$emit('sendOtherEmail')">Enviar novo email</v-btn>
                    <v-btn variant="elevated" color="secondary" @click="historyBack()">OK</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </v-dialog>
</template>

<script>
export default {
    name: "DialogMessaSuccessEmail",
    props: {
        sendEmailSuccess: Boolean
    },
    computed: {
        dialog() {
            return this.sendEmailSuccess;
        }
    },
    methods: {
        historyBack() {
            window.history.back();
        },
    },
}
</script>

<style scoped>

</style>
