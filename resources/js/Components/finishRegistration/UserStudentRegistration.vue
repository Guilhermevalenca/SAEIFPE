<template>
    <v-form>

    </v-form>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "UserStudentRegistration",
    data() {
        return {
            form: useForm({
                email: '',
                course: ''
            })
        }
    }
}
</script>

<style scoped>

</style>
