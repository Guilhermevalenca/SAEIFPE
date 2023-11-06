<template>
    <v-tooltip v-if="$page.props.auth.user !== null" text="Notificações">
        <template #activator="{ props }">

            <v-card v-bind="props" variant="text">

                <v-menu>
                    <template #activator="{ props }">

                        <v-btn v-bind="props" :icon="$page.props.auth.user.role ? 'mdi-bell' : 'mdi-bell-badge'" />

                    </template>

                    <v-card>

                        <v-list v-if="!$page.props.auth.user.role">

                            <v-list-item to="/">

                                <Link :href="route('finishRegistration_index')" as="button">
                                    Termine seu cadastro
                                </Link>

                            </v-list-item>

                        </v-list>

                    </v-card>

                </v-menu>

            </v-card>

        </template>
    </v-tooltip>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "Notification",
    components: {Link},
    props: {
        data: Object
    }
}
</script>

<style scoped>

</style>
