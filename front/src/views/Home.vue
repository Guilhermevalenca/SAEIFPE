<template>
  <div v-if="!logged">
    <RegistrationForm />
  </div>
  <div v-else >
    <v-row>
      <v-col />
    </v-row>
    <v-row class="d-flex justify-center">
      <UserIsLoggedSuccess />
    </v-row>
  </div>
</template>

<script>
import RegistrationForm from "@/components/user/RegistrationForm.vue";
import axios from "axios";
import UserIsLoggedSuccess from "@/components/user/UserIsLoggedSuccess.vue";

export default {
  components: {
    UserIsLoggedSuccess,
    RegistrationForm,
  },
  data() {
    return {
      logged: false,
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
