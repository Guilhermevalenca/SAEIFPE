<template>
  <v-card>
    <v-card-text>

      <v-radio-group>

        <v-row class="d-flex" v-for="(option, index) in options" :key="index">

          <v-col cols="1" ms="1">
            <v-radio disabled />
          </v-col>

          <v-col>
            <v-textarea rows="1" max-rows="10" auto-grow v-model="option.descriptions" :rules="rules" placeholder="Escreva aqui..."/>
          </v-col>

        </v-row>

      </v-radio-group>

    </v-card-text>

    <v-card-actions :class="$phoneDisplay ? '' : 'd-flex justify-end'">
      <v-tooltip text="Remover ultima alternativa">
        <template #activator="{ props }">
          <v-btn v-bind="props" variant="outlined" :disabled="options.length === 1" @click="removeOption()">
            <v-icon icon="mdi-minus" size="20"/>
            Remover a ultima opção
          </v-btn>
        </template>
      </v-tooltip>
      <v-tooltip text="Adicionar uma nova alternativa">
        <template #activator="{ props }">
          <v-btn v-bind="props" variant="elevated" color="primary" @click="addOption()">
            <v-icon icon="mdi-plus" size="20"/>
            Adicionar nova opção
          </v-btn>
        </template>
      </v-tooltip>
    </v-card-actions>

  </v-card>
</template>

<script>
export default {
  name: "UniqueQuestionsForm",
  props: {
    errors: Object
  },
  data() {
    return {
      options: [
        { descriptions: null }
      ],
      rules: [
          value => {
            if(value) {
              return true
            }
            return 'É necessário preencher este campo'
          }
      ]
    }
  },
  methods: {
    addOption() {
      let objeto = {
        descriptions: null
      }
      this.options.push(objeto)
    },
    removeOption() {
      this.options.pop();
    }
  },
  watch: {
    options: {
      handler($new) {
        this.$emit('send_data',$new);
      },
      deep: true
    }
  }
}
</script>

<style scoped>

</style>
