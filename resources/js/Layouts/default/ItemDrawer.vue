<template>
    <v-navigation-drawer color="secondary">
        <v-list>

            <Link :href="route('home')">
                <v-list-item to="/">
                    Inicio
                </v-list-item>
            </Link>

            <Link :href="route('home')">
                <v-list-item to="/">
                    Postagem do IFPE
                </v-list-item>
            </Link>

            <Link :href="route('depoimentos_mural')">
                <v-list-item to="/">
                    Depoimentos
                </v-list-item>
            </Link>

            <Link v-if="$page.props.auth.user !== null" :href="$page.props.auth.user.role === 'adm' ? route('forms_index') : route('forms_index_response')">
                <v-list-item to="/">
                    Formulários
                </v-list-item>
            </Link>

            <Link v-if="$page.props.auth.user !== null && $page.props.auth.user.role === 'adm'" :href="route('adm_index')">
                <v-list-item to="/">
                    adm
                </v-list-item>
            </Link>

            <Link :href="route('about')">
                <v-list-item to="/">
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
    components: {Link}
}
</script>


<style scoped>

</style>
