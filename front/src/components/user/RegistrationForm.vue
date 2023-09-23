<template>
  <v-card >
    <v-card-title class="text-center">Formulário de cadastro</v-card-title>
    <v-spacer class="pa-6" />
    <v-card-text class="d-flex justify-center">
      <v-form @submit.prevent="registerRegistration()" :class="[phoneDisplayForForms]">
        <v-row>
          <v-col>
            <v-text-field v-model="name" prepend-inner-icon="mdi-account-outline" label="Nome completo" placeholder="Digite seu nome completo" :rules="rules.name" required />
          </v-col>
        </v-row>

        <v-row>
          <v-col>
            <v-text-field v-model="email" prepend-inner-icon="mdi-email-outline" label="Email pessoal" placeholder="Digite seu email"  hint="exemplo@gmail.com" persistent-hint :rules="rules.email" required />
          </v-col>
        </v-row>

        <v-row>
          <v-col>
            <v-text-field v-model="cpf" persistent-hint label="CPF" placeholder="Digite seu cpf" hint="000.000.000-00"   :rules.="rules.cpf" required />
          </v-col>
        </v-row>

        <v-row>
          <v-col :cols="phoneDisplayForCols" md="7">
            <v-text-field prepend-inner-icon="mdi-phone-outline" persistent-hint v-model.number="phone.number" label="Telefone(Opcional)" hint="(00) 00000-0000" placeholder="digite o numero do telefone" :counter="11" />
          </v-col>
          <v-col md="4">
            <v-checkbox v-model="phone.wpp" label="Este número é whatsapp" />
          </v-col>
        </v-row>

        <v-row>
          <v-col :cols="genre.selected === 'Outro' ? phoneDisplayForCols : ''">
            <v-select label="Gênero" v-model="genre.selected" prepend-inner-icon="mdi-gender-male-female-variant" :items="genre.options" :rules="rules.genre.selected" required />
          </v-col>

          <v-col v-if="genre.selected === 'Outro'">
            <v-text-field label="Gênero" placeholder="Digite seu gênero" v-model="genre.other" :rules="rules.genre.other" required />
          </v-col>
        </v-row>

        <v-row>
          <v-col :cols="phoneDisplayForCols">
            <v-text-field label="password" placeholder="Digite sua senha" v-model="password" prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.password ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.password ? 'text' : 'password'" @click:append-inner="showIcon.password = !showIcon.password" :rules="rules.password" required />
          </v-col>

          <v-col>
            <v-text-field v-model="confirmPassword" label="Confirme senha" placeholder="Confirme sua senha" persistent-placeholder prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.confirmPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.confirmPassword ? 'text' : 'password'" @click:append-inner="showIcon.confirmPassword = !showIcon.confirmPassword" :rules="rules.confirmPassword" required />
          </v-col>
        </v-row>
        <v-card-actions>
          <v-btn :loading="loading" :disabled="!formInvalid" type="submit" :color="!formInvalid ? '' : 'secondary'" variant="elevated">Registrar</v-btn>
        </v-card-actions>
      </v-form>
    </v-card-text>
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
      phone: {
        number: '',
        wpp: false
      },
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
      confirmPassword: '',
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
            if(/.+@.+\..+/.test(value)) {
              return true
            }
            return 'Email inválido';
          },
          value => {
            if(value) {
              if(!value.endsWith('@discente.ifpe.edu.br')) {
                return true;
              }
              return 'Email não pode ser o email institucional';
            }
            return 'O email é obrigatório';
          }
        ],
        cpf: [
          value => {
            if(value) {
              const caseOne = value.length === 11 && /^\d+$/.test(value);
              const caseTwo = value.length === 14 && ( /^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value) );
              if(caseOne || caseTwo) {
                return true;
              }
              return 'cpf inválido';
            }
            return 'cpf obrigatório'
          }
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
              if(/\d/.test(value) && /[a-zA-Z]/.test(value)) {
                return true;
              }
              return 'Senha precisa ter caracteres alfanuméricos (letras e números)';
            }
            return 'Senha obrigatório';
          },
          value => {
            if(value) {
              if(value.length >= 6) {
                return true;
              }
              return 'Senha precisa ter no mínimo 6 caracteres';
            }
            return 'Senha obrigatório';
          }
        ],
        confirmPassword: [
          value => {
            if(value) {
              if(value === this.password) {
                return true;
              }
              return 'Senhas diferentes';
            }
            return 'É necessário confirmar sua senha';
          }
        ]
      },
      phoneDisplayForCols: window.innerWidth <= 800 ? '12' : '6',
      phoneDisplayForForms: window.innerWidth <= 800 ? 'w-75' : 'w-50'
    }
  },
  methods: {
    registerRegistration() {
      this.loading = true;
      const modifyCPF = (value) => {
        if(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value)) {
          return value.replace(/[^0-9]/g, "");
        }
        return value;
      }
      const data = {
        name: this.name,
        cpf: modifyCPF(this.cpf),
        email: this.email,
        phone: this.phone.number,
        phoneIsWhatsApp: this.phone.wpp,
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
    },
  },
  computed: {
    formInvalid() {
      const rulesName = this.rules.name.some(rule => rule(this.name) === true);
      const rulesEmail = this.rules.email.some(rule => rule(this.email) === true);
      const rulesCPF = this.rules.cpf.some(rule => rule(this.cpf) === true);
      const rulesPassword = this.rules.password.some(rule => rule(this.password) === true);
      const rulesConfirm = this.rules.confirmPassword.some(rule => rule(this.confirmPassword) ===true);
      const rulesGenreSelected = this.rules.genre.selected.some(rule => {
        if(this.genre.selected !== 'Outro') {
          return rule(this.genre.selected) === true;
        }
        return false;
      });
      const rulesGenreOther = this.genre.other !== '' ? this.rules.genre.other.some(rule => rule(this.genre.other) === true) : false;
      return rulesName && rulesEmail && rulesCPF && (rulesPassword && rulesConfirm) && (rulesGenreSelected || rulesGenreOther);
    }
  }
}
</script>

<style scoped>

</style>
