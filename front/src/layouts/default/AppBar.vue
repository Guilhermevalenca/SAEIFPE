<template>
  <v-app-bar flat>
    <v-app-bar-nav-icon @click="$emit('drawer')" />
    <v-app-bar-title>
      <v-avatar>
        <v-img src="https://ingresso.ifpe.edu.br/static/img/ifpe-logo.svg" cover />
      </v-avatar>
      IFPE Campus Igarassu
    </v-app-bar-title>
    <v-tooltip text="Clique para alterar o tema da pagina">
      <template #activator="{ props }">
        <v-btn v-bind="props" @click="alterTheme()">
          <v-icon icon="mdi-theme-light-dark" />
        </v-btn>
      </template>
    </v-tooltip>
  </v-app-bar>
</template>

<script>
import { useTheme } from 'vuetify';

export default {
  data() {
    return {
      theme: useTheme(),
    }
  },
  methods: {
    alterTheme() {
      this.theme.global.name = this.theme.global.current.dark ? 'light' : 'dark';
    }
  }
}
</script>
