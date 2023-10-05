<template>
    <v-dialog persistent :width="phoneDisplay ? 'auto' : '900px'" v-model="messageAlert">
    <DepositionsAlert :phoneDisplay="phoneDisplay" @closeAlert="messageAlert = false" />
  </v-dialog>
<section>
    <v-card>
        <v-form class="pa-2">
            <v-card-text class="d-flex justify-center flex-column">
                <v-textarea persistent-placeholder placeholder="Digite aqui seu depoimento" variant="outlined"></v-textarea>
                <div class="d-flex justify-end">
                    <v-btn type="submit">postar</v-btn>
                </div>
            </v-card-text>
        </v-form>
    </v-card>
</section>
</template>

<script> 
import axios from 'axios'
import Swal from 'sweetalert2'
import DepositionsAlert from '../user/alerts/DepositionsAlert.vue';

export default{
    name: 'AddDepositions',
    data() {
        return {
            components: { DepositionsAlert }, 
      messageAlert: true,
      phoneDisplay: window.innerWidth <= 800
        };
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