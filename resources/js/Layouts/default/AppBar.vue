<template>
    <v-app-bar color="secondary" variant="flat">
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
        <div v-else>
            <v-tooltip text="Opções do usuário">
                <template #activator="{ props }">
                    <v-card v-bind="props" variant="outlined" class="mr-2">
                        <!-- :variant="(theme.global.name == 'light') ? 'elevated' : 'outlined'" -->
                        <v-menu class="w-full">
                            <template #activator="{ props }">
                                <v-btn variant="tonal" v-bind="props">
                                    {{ $page.props.auth.user.name }}
<!--                                    <template #prepend>-->
<!--                                        <v-avatar>-->
<!--                                            <img src="@/assets/gato.jpg" alt="gato">-->
<!--                                        </v-avatar>-->
<!--                                    </template>-->
                                </v-btn>
                            </template>
                            <v-list>
                                <Link :href="route('profile.edit')" class="w-full" as="button">
                                    <v-list-item to="/">
                                        Perfil
                                    </v-list-item>
                                </Link>

                                <Link :href="route('logout')" class="w-full" method="post" as="button">
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
            localStorage.setItem('theme',this.theme.global.name);
        }
    },
    created() {
        // console.log(this.$page.props.auth.user);
    },
}
</script>
