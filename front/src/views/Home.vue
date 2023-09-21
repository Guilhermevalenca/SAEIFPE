<template>
  <div v-if="!logged">
    <RegistrationForm />
  </div>
  <div v-else >
    <v-row>
      <v-col />
    </v-row>
    <v-row class="justify-center">
      <MessageDefault :title="messageDefault.title" :text="messageDefault.text" :success="messageDefault.success" />
    </v-row>
  </div>
</template>

<script>
import RegistrationForm from "@/components/user/RegistrationForm.vue";
import MessageDefault from "@/components/MessageDefault.vue";
import axios from "axios";

export default {
  components: {
    MessageDefault,
    RegistrationForm,
  },
  data() {
    return {
      logged: false,
      messageDefault: {
        title: 'Cadastro finalizado',
        text: 'Cadastro realizado com sucesso',
        success: true
      }
    }
  },
  methods: {
    isLoggedIn() {
      if(localStorage.getItem('token')) {
        axios.get('users/me')
          .then(response => {
            if(response.data.success) {
              window.dispatchEvent(new Event('logged'));
              this.isLoggedIn = true;
            } else {
              window.dispatchEvent(new Event('logouted'));
              this.isLoggedIn = false;
              console.log(response);
              localStorage.removeItem('token');
            }
          })
          .catch(error => {
            console.log(error);
            window.dispatchEvent(new Event('logouted'));
            localStorage.removeItem('token');
            this.isLoggedIn = false;
          })
      }
    }
  },
  created() {
    this.isLoggedIn();
    window.addEventListener('logged', () => {
      this.logged = true;
    })
    window.addEventListener('logouted',() => {
      this.logged = false;
    })
  }
}
</script>
