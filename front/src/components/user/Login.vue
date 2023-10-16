<template>
  <v-dialog width="600px">
    <v-card>
      <v-card-title>Login</v-card-title>
      <v-card-text>
        <v-form @submit.prevent="login()">
          <input type="hidden" v-maska data-maska="###.###.###-##" v-model="cpf">
          <v-text-field v-model="cpf" :rules="rules.cpf" required label="cpf" placeholder="Digite aqui seu cpf" />
          <v-text-field v-model="password" :rules="rules.password" required label="password" placeholder="Digite aqui sua senha" prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIconPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showIconPassword ? 'text' : 'password'" @click:append-inner="showIconPassword = !showIconPassword"/>
          <v-card-actions>
            <v-btn :loading="loading" color="secondary" type="submit">Acessar</v-btn>
            <v-btn @click="$emit('cancel')">cancelar</v-btn>
          </v-card-actions>
        </v-form>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import axios from "axios";
import { vMaska} from "maska";

export default {
  name: "LoginUser",
  directives: {maska: vMaska},
  data() {
    return {
      cpf: '',
      password: '',
      showIconPassword: false,
      loading: false,
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
      this.loading = true;
      const modifyCPF = (value) => {
        if(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value)) {
          return value.replace(/[^0-9]/g, "");
        }
        return value;
      }
      axios.post('users/login',{
        cpf: modifyCPF(this.cpf),
        password: this.password
      })
        .then(response => {
          console.log(response);
          if(response.data.success) {
            localStorage.setItem('token',response.data.token);
            console.log(response.data.abilities);
            this.$store.dispatch('changeLogged', 1);
          }
        })
        .catch(error => console.log(error))
        .finally(() => this.loading = false);
    }
  }
}
</script>


<style scoped>

</style>
