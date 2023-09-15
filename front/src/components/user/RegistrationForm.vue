<template>
  <v-card>
    <v-card-title>Formulário de cadastro</v-card-title>
    <v-form>
      <v-card-text>
        <v-text-field prepend-inner-icon="mdi-account-outline" label="Nome" placeholder="Digite seu nome" required />
        <v-text-field prepend-inner-icon="mdi-email-outline" label="Email" placeholder="Digite seu email"  hint="exemplo@gmail.com" required />
        <v-text-field label="cpf" v-model="cpf" placeholder="Digite seu cpf" hint="000.000.000-00" required />
        <v-text-field label="Matricula" hint="Opcional" persistent-hint placeholder="digite o numero da matrícula" />
        <v-row>
          <v-col>
            <v-select prepend-inner-icon="mdi-gender-male-female-variant" v-model="genre.selected" :items="genre.options" />
          </v-col>
          <v-col v-if="genre.selected === 'Outro'">
            <v-text-field label="Gênero" placeholder="Digite seu gênero" v-model="genre.other" />
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="password" placeholder="Digite sua senha" v-model="password" prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.password ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.password ? 'text' : 'password'" @click:append-inner="showIcon.password = !showIcon.password" required/>
          </v-col>
          <v-col>
            <v-text-field label="Confirme" placeholder="Confirme sua senha" persistent-placeholder prepend-inner-icon="mdi-lock-outline" :append-inner-icon="showIcon.confirmPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.confirmPassword ? 'text' : 'password'" @click:append-inner="showIcon.confirmPassword = !showIcon.confirmPassword" required />
          </v-col>
        </v-row>
      </v-card-text>
    </v-form>
  </v-card>
</template>

<script>
export default {
  name: "RegistrationForm",
  data() {
    return {
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
        name: '',
        email: '',
        cpf: '',
        password: '',
        confirmPassword: ''
      }
    }
  }
}
</script>

<style scoped>

</style>
