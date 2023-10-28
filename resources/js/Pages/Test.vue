<template>
    <Default>

        <div class="d-flex justify-center">

            <v-card variant="tonal">

                <v-card-title>Qualquer besteira</v-card-title>
                <v-card-text>Qualquer coisa ta servindo para esse cara aqui</v-card-text>

                <v-card-actions class="d-flex justify-center">
                    <Link :href="route('test_create')">
                        <v-btn color="secondary">criar</v-btn>
                    </Link>
                </v-card-actions>

            </v-card>

            <v-card v-if="data && id">

                <v-card-title>Informações do usuário</v-card-title>
                <v-card-text>

                    <div>
                        <ul>
                            <td>

                                <strong>Nome: </strong>
                                <span>{{ data.name }}</span>

                            </td>
                        </ul>
                        <ul>
                            <td>

                                <strong>Sobrenome: </strong>
                                <span>{{ data.surname }}</span>

                            </td>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            {{ id }}
                        </ul>
                    </div>

                </v-card-text>

            </v-card>

        </div>

    </Default>
</template>

<script>
import Default from '@/Layouts/default/Default.vue';
import { Link } from '@inertiajs/vue3';
export default {
    name: "Test",
    components: {Default, Link},
    props: {
        data: Object,
        id: Object
    }
}
</script>

<style scoped>

</style>
