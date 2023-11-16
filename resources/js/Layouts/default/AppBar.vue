<template>
    <v-app-bar color="secondary">
        <v-app-bar-nav-icon @click="$emit('drawer')" />

        <v-app-bar-title>
            <Link :href="route('home')">
                <!--            <v-avatar>-->
                <!--                <v-img src="https://ingresso.ifpe.edu.br/static/img/ifpe-logo.svg" cover />-->
                <!--            </v-avatar>-->
                <v-avatar>
                    <img ref="ola" src="../../assets/ifpe_logo_white.svg" >
                </v-avatar>
                IFPE Campus Igarassu
            </Link>
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
        <div v-else class="d-flex">
            <v-container class="mr-2">
                <!-- :variant="(theme.global.name == 'light') ? 'elevated' : 'outlined'" -->
                <v-menu :close-on-content-click="false">
                    <template #activator="{ props: menu }">
                        <v-tooltip text="Opções do usuário">
                            <template #activator="{ props: tooltip }">
                                <v-btn variant="tonal" v-bind="menu">
                                    <div v-bind="tooltip">
                                        {{ $page.props.auth.user.name }}
                                    </div>
                                  <template #prepend>
                                    <v-avatar>
                                      <v-img :src="$page.props.auth.user.profile_picture" />
                                    </v-avatar>
                                  </template>
                                </v-btn>
                            </template>
                        </v-tooltip>
                    </template>
                    <v-list>
                        <Link :href="route('profile.edit')">
                            <v-list-item to="/">
                                Editar perfil
                            </v-list-item>
                        </Link>
                        <Link :href="route('logout')" class="w-full" method="post" as="button">
                            <v-list-item class="text-start" to="/">
                                Deslogar
                            </v-list-item>
                        </Link>
                    </v-list>
                </v-menu>
            </v-container>
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
            localStorage.setItem('theme',this.theme.global.name);
        }
    },
    created() {
        // console.log(this.$page.props.auth);
    },
}
</script>

<script setup>
</script>
