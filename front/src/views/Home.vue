<template>
  <div v-if="!$store.state.logged">
    <RegistrationForm />
  </div>
  <div v-else >
    <v-row>
      <v-col />
    </v-row>
    <v-row class="d-flex justify-center">
      <UserIsLoggedSuccess />
    </v-row>
  </div>
</template>

<script>
import RegistrationForm from "@/components/user/RegistrationForm.vue";
import UserIsLoggedSuccess from "@/components/user/UserIsLoggedSuccess.vue";

export default {
  components: {
    UserIsLoggedSuccess,
    RegistrationForm,
  },
}
</script>
