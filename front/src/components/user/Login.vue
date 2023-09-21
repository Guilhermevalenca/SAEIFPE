<template>
  <v-dialog width="600px">
    <v-card>
      <v-card-title>Login</v-card-title>
      <v-card-text>
        <v-form @submit.prevent="login()">
          <v-text-field v-model="cpf" :rules="rules.cpf" required label="cpf" placeholder="Digite aqui seu cpf" />
          <v-text-field v-model="password" :rules="rules.password" required label="password" placeholder="Digite aqui sua senha"/>
          <v-card-actions>
            <v-btn color="success" type="submit">Acessar</v-btn>
            <v-btn @click="$emit('cancel')">cancelar</v-btn>
          </v-card-actions>
        </v-form>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import axios from "axios";

export default {
  name: "LoginUser",
  data() {
    return {
      cpf: '',
      password: '',
      rules: {
        cpf: [
          value => {
            if(value) {
              return true
            }
            return 'É necessário preencher esse campo';
          }
        ],
        password: [
          value => {
            if(value) {
              return true
            }
            return 'É necessário preencher esse campo';
          }
        ]
      }
    }
  },
  methods: {
    login() {
      axios.post('users/login',{
        cpf: this.cpf,
        password: this.password
      })
        .then(response => {
          if(response.data.success) {
            localStorage.setItem('token',response.data.token);
            window.dispatchEvent(new Event('logged')); //evento é escutado no created no AppBar, caminhos do arquivo: src/layouts/default/AppBar.vue
          }
        })
        .catch(error => console.log(error));
    }
  }
}
</script>


<style scoped>

</style>
