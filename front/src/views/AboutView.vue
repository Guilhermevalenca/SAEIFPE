<template>
  <v-card>
    <v-card-title>
      <div class="cabecalho">Sobre</div>
    </v-card-title>
    <v-card-text>
      <About></About>
    </v-card-text> 
  </v-card>
</template>

<script>
import About from '@/components/About.vue';

export default {
  name: "AboutView",
  components: {
    About,
  },
};
</script>

<style scoped>

</style>
