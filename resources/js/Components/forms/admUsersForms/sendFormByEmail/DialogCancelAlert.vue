<template>
    <v-dialog v-model="dialog" :width="$phoneDisplay ? '' : '600px'">
        <v-container>
            <v-card>
                <v-card-title>Deseja cancelar:</v-card-title>
                <v-card-text>
                    <div>Ao cancelar você perderá o que foi preenchido</div>
                </v-card-text>
                <v-card-actions class="ma-2">
                    <v-btn @click="$emit('closeShowCancel')">Fechar</v-btn>
                    <v-btn color="error" variant="elevated" @click="historyBack()">OK</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </v-dialog>
</template>

<script>
export default {
    name: "DialogCancelAlert",
    props: {
        showCancel: Boolean
    },
    computed: {
        dialog() {
            return this.showCancel;
        }
    },
    methods: {
        historyBack() {
            window.history.back();
        },
    }
}
</script>

<style scoped>

</style>
