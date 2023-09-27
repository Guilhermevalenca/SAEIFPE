<template>
  <router-view />
</template>

<script>
import axios from "axios";

export default {
  methods: {
    isLoggedIn() {
      if(localStorage.getItem('token')) {
        axios.get('users/me')
          .then(response => {
            if(response.data.success) {
              this.$store.dispatch('changeLogged', 1);
            } else {
              localStorage.removeItem('token');
              this.$store.dispatch('changeLogged', 0);
            }
          })
          .catch(error => {
            console.log(error);
            localStorage.removeItem('token');
            this.$store.dispatch('changeLogged', 0);
          })
      }
    }
  },
  created() {
    this.isLoggedIn();
  }
}
</script>
