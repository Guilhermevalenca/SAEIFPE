<template>
    <v-navigation-drawer color="secondary" permanent expand-on-hover :rail="fullNavigation" width="full"> <!-- temporary -->
        <v-list>
            <Link :href="route('home')">
                <v-list-item to="/" prepend-icon="mdi-home">
                    Pagina inicial
                </v-list-item>
            </Link>

            <Link :href="route('depoimentos_mural')">
                <v-list-item to="/" prepend-icon="mdi-comment-quote">
                    Depoimentos
                </v-list-item>
            </Link>

            <Link v-if="$page.props.auth.user !== null" :href="$page.props.auth.user.role === 'adm' ? route('forms_index') : route('forms_index_response')">
                <v-list-item to="/" prepend-icon="mdi-form-select">
                    Formulários
                </v-list-item>
            </Link>

            <v-list-group v-if="$page.props.auth.user !== null && $page.props.auth.user.role === 'adm'">
                <template #activator="{ props }">
                  <v-list-item to="/" v-bind="props" prepend-icon="mdi-briefcase-account-outline">
                    Administrativo
                  </v-list-item>
                </template>

                <Link :href="route('adm_index')">
                    <v-list-item to="/" prepend-icon="mdi-account-plus">
                        Adicionar usuário administrador
                    </v-list-item>
                </Link>

            </v-list-group>

            <Link :href="route('about')">
                <v-list-item to="/" prepend-icon="mdi-information-outline">
                    Sobre
                </v-list-item>
            </Link>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "ItemDrawer",
    components: {Link},
    props: {
        isFullNavigation: Boolean
    },
    data() {
      return {
        nav: true
      }
    },
    computed: {
        fullNavigation() {
          return this.isFullNavigation;
        }
    }
}
</script>


<style scoped>

</style>
