<template>
  <v-card>
    <v-card-title>Formulário de cadastro</v-card-title>
    <v-form @submit.prevent="registerRegistration()">
      <v-card-text>
        <v-text-field v-model="name" prepend-inner-icon="mdi-account-outline" label="Nome" placeholder="Digite seu nome" :rules="rules.name" required />

        <v-text-field v-model="email" prepend-inner-icon="mdi-email-outline" label="Email" placeholder="Digite seu email"  hint="exemplo@gmail.com" :rules="rules.email" required />

        <v-text-field v-model="cpf" label="cpf" placeholder="Digite seu cpf" hint="000.000.000-00"   :rules="rules.cpf" required />

        <v-text-field v-model="registration" label="Matricula" hint="Opcional" persistent-hint placeholder="digite o numero da matrícula" />

        <v-row>
          <v-col>
            <v-select v-model="genre.selected" prepend-inner-icon="mdi-gender-male-female-variant" :items="genre.options" :rules="rules.genre.selected" required />
          </v-col>

          <v-col v-if="genre.selected === 'Outro'">
            <v-text-field label="Gênero" placeholder="Digite seu gênero" v-model="genre.other" :rules="rules.genre.other" required />
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="password" placeholder="Digite sua senha" v-model="password" prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.password ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.password ? 'text' : 'password'" @click:append-inner="showIcon.password = !showIcon.password" :rules="rules.password" required />
          </v-col>

          <v-col>
            <v-text-field label="Confirme" placeholder="Confirme sua senha" persistent-placeholder prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.confirmPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.confirmPassword ? 'text' : 'password'" @click:append-inner="showIcon.confirmPassword = !showIcon.confirmPassword" :rules="rules.genre.confirmPassword" required />
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-actions>
        <v-btn :loading="loading" type="submit" color="success">Registrar</v-btn>
      </v-card-actions>
    </v-form>
  </v-card>
</template>

<script>
import axios from "axios";

export default {
  name: "RegistrationForm",
  data() {
    return {
      loading: false,
      name: '',
      email: '',
      cpf: '',
      registration: '',
      genre: {
        selected: '',
        options: [
          'Masculino',
          'Feminino',
          'Outro',
          'Prefiro não dizer'
        ],
        other: ''
      },
      password: '',
      showIcon: {
        password: false,
        confirmPassword: false
      },
      rules: {
        name: [
          value => {
            if(value) {
              return true
            }
            return 'Nome obrigatório'
          }
        ],
        email: [
          value => {
            if(value) {
              return true
            }
            return 'O email é obrigatório';
          },
          value => {
            if(/.+@.+\..+/.test(value)) {
              return true
            }
            return 'Email inválido';
          }
        ],
        cpf: [
          value => {
            if(value) {
              return true
            }
            return 'cpf obrigatório'
          },
          value => {
            const caseOne = value.length === 11 && /^\d+$/.test(value);
            const caseTwo = value.length === 14 && ( /^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value) );
            if(caseOne || caseTwo) {
              return true;
            }
            return 'cpf inválido';
          },
        ],
        genre: {
          selected: [
            value => {
              if(value) {
                return true
              }
              return 'Gênero obrigatório'
            }
          ],
          other: [
            value => {
              if(value) {
                return true;
              }
              return 'É preciso informa seu Gênero'
            }
          ]
        },
        password: [
          value => {
            if(value) {
              return true;
            }
            return 'Senha obrigatória';
          },
          value => {
            if(/\d/.test(value) && /[a-zA-Z]/.test(value)) {
              return true;
            }
            return 'Senha precisa ter caracteres alfanuméricos (letras e números)';
          },
          value => {
            if(value.length >= 6) {
              return true;
            }
            return 'Senha precisa ter no mínimo 6 caracteres';
          }
        ],
        confirmPassword: [
          value => {
            if(value) {
              return true;
            }
            return 'É necessário confirmar sua senha';
          },
          value => {
            if(value === this.password) {
              return true;
            }
            return 'Senhas diferentes';
          },
        ]
      }
    }
  },
  methods: {
    registerRegistration() {
      this.loading = true;
      const verifyCPF = (value) => {
        if(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value)) {
          return value.replace(/[^0-9]/g, "");
        }
        return value;
      }
      const data = {
        name: this.name,
        cpf: verifyCPF(this.cpf),
        email: this.email,
        registration: this.registration,
        genre: this.genre.selected === 'Outro' ? this.genre.other : this.genre.selected,
        password: this.password
      }
      axios.post('users/create',data)
        .then(response => {
          if(response.data.success) {
            localStorage.setItem('token',response.data.token);
            window.dispatchEvent(new Event('logged')); //evento é escutado no created no AppBar, caminhos do arquivo: src/layouts/default/AppBar.vue
          }
        })
        .catch(error => console.log(error))
        .finally(() => this.loading = false);
    }
  },
}
</script>

<style scoped>

</style>
