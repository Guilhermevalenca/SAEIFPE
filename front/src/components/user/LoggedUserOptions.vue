<template>
  <v-tooltip text="Opções da conta">
    <template #activator="{props}">
      <v-card v-bind="props">
        <v-menu>
          <template #activator="{props}">
            <v-avatar v-bind="props">
              <v-icon icon="mdi-account-outline" />
            </v-avatar>
          </template>
          <v-card>
            <v-list density="compact">
              <v-list-item>
                <v-list-item-title>
                  <v-btn prepend-icon="mdi-account-outline">Meu perfil</v-btn>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-title>
                  <v-btn prepend-icon="mdi-logout" @click="logout()">Sair da conta</v-btn>
                </v-list-item-title>
              </v-list-item>
            </v-list>
          </v-card>
        </v-menu>
      </v-card>
    </template>
  </v-tooltip>
</template>

<script>
import axios from "axios";

export default {
  name: "LoggedUserOptions",
  data() {
    return {

    }
  },
  methods: {
    logout() {
      axios.post('users/logout')
        .then(response => {
          if(response.data.success) {
            localStorage.removeItem('token');
            this.$store.dispatch('changeLogged', 0);
          } else {
            console.log(response);
          }
        })
        .catch(error => console.log(error))
    }
  },
  created() {
    axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
  }
}
</script>


<style scoped>

</style>
