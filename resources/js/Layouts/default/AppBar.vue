<template>
  <v-app-bar color="secondary" variant="flat">
    <v-app-bar-nav-icon @click="$emit('drawer')" />

    <v-app-bar-title>
      <!--            <v-avatar>-->
      <!--                <v-img src="https://ingresso.ifpe.edu.br/static/img/ifpe-logo.svg" cover />-->
      <!--            </v-avatar>-->
      <v-avatar>
        <img ref="ola" src="../../assets/ifpe_logo_white.svg" >
      </v-avatar>
      IFPE Campus Igarassu
    </v-app-bar-title>

    <Notification />

    <v-tooltip text="Clique para alterar o tema da pagina">
      <template #activator="{ props }">
        <v-btn v-bind="props" @click="alterTheme()">
          <v-icon icon="mdi-theme-light-dark" />
        </v-btn>
      </template>
    </v-tooltip>

    <div v-if="$page.props.auth.user === null">
      <Link :href="route('login')">
        <v-btn>login</v-btn>
      </link>
      <Link :href="route('register')">
        <v-btn>registrar</v-btn>
      </Link>
    </div>
    <div v-else>
      <v-tooltip text="Opções do usuário">
        <template #activator="{ props }">
          <v-card v-bind="props" variant="elevated" class="mr-2">

            <v-menu class="w-full">
              <template #activator="{ props }">
                <v-btn v-bind="props">
                  {{ $page.props.auth.user.name }}
                  <!--                                    <v-avatar>-->
                  <!--                                        <v-img src="https://thumbs.dreamstime.com/z/s%C3%ADmbolo-de-perfil-masculino-inteligente-retrato-estilo-desenho-animado-m%C3%ADnimo-166146967.jpg" />-->
                  <!--                                    </v-avatar>-->
                </v-btn>
              </template>
              <v-list>
                <Link :href="route('profile.edit')">
                  <v-list-item to="/">
                    Perfil
                  </v-list-item>
                </Link>

                <Link :href="route('logout')" method="post" as="button">
                  <v-list-item to="/">
                    Deslogar
                  </v-list-item>
                </Link>
              </v-list>
            </v-menu>

          </v-card>
        </template>
      </v-tooltip>
    </div>
  </v-app-bar>
</template>

<script>
import { useTheme } from 'vuetify';
import { Link } from '@inertiajs/vue3';
import Notification from "@/Layouts/default/Notification.vue";

export default {
  components: {Notification, Link },
  data() {
    return {
      theme: useTheme(),
      login: false,
    }
  },
  methods: {
    alterTheme() {
      this.theme.global.name = this.theme.global.current.dark ? 'light' : 'dark';
    }
  },
  created() {

  },
}
</script>
