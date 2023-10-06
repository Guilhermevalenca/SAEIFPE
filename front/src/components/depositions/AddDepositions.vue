<template>
        <v-form class="pa-10">
            <v-card-text class="d-flex justify-center flex-column">
                <v-textarea persistent-placeholder placeholder="Digite aqui seu depoimento" variant="outlined"></v-textarea>
                <div class="d-flex justify-end">
                    <v-btn type="submit">postar</v-btn>
                </div>
            </v-card-text>
        </v-form>
</template>

<script>

export default{
    name: 'AddDepositions',
    data() {
        return {
        }
    },
}
</script>

<style scoped>
.merda{
  display: flex;
  position: relative;
  top: -2em;
  right: -5em;
}
</style>
