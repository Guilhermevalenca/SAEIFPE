<template>
  <v-card>
    <v-card-title>
      <div>Criando postagem</div>
    </v-card-title>
    <v-card-text class="d-flex justify-center">
      <v-form @submit.prevent="createPost()" class="w-50">
        <legend>Dados da publicação</legend>

        <div class="ma-4">
          <v-text-field v-model="title" label="Titulo" placeholder="Digite o titulo da publicação" />
          <v-textarea v-model="description" rows="13" label="Descrição" />
        </div>

        <legend>Utilitários</legend>

        <div class="ma-4 d-flex">
          <v-autocomplete :disabled="isAllCourses" v-model="courseSelected" :items="courses" item-value="name" item-title="title" multiple chips closable-chips label="Selecione...">
            <template v-slot:chip="{props, item}">
              <v-chip v-bind="props" :text="item.title" />
            </template>
            <template v-slot:item="{props, item}">
              <v-list-item v-bind="props" :title="item.title" :subtitle="item.name" />
            </template>
          </v-autocomplete>
          <v-checkbox v-model="isAllCourses" label="Enviar para todos os cursos ?"/>
        </div>
        <v-card-actions>
          <v-btn type="submit">Criar postagem</v-btn>
        </v-card-actions>
      </v-form>
    </v-card-text>
  </v-card>
  <div>
    <v-dialog persistent v-model="showMessage.success">
      <v-card>
        <v-card-title>Publicação criada com sucesso</v-card-title>
        <v-card-actions class="d-flex justify-end">
          <v-btn :loading="loading.messageSuccess" @click="async () => { loading.messageSuccess = true; await reset(); showMessage.success = false; loading.messageSuccess = false }">criar nova postagem</v-btn>
          <v-btn to="/posts" color="secondary">OK</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "PostsCreated",
  data() {
    return {
      courses: [],
      courseSelected: [],
      isAllCourses: false,
      title: '',
      description: '',
      showMessage: {
        success: false,
        failed: false
      },
      loading: {
        messageSuccess: false
      }
    }
  },
  methods: {
    allCourses() {
      //axios
      this.courses = [
        {
          id: 1,
          name: 'informatica para internet - IPI',
          title: 'IPI'
        },
        {
          id: 2,
          name: 'logistica',
          title: 'logistica'
        },
        {
          id: 3,
          name: 'tecnologia de sistema da informação - TSI',
          title: 'TSI'
        }
      ]
    },
    createPost() {
      const data = {
        title: this.title,
        content: this.description,
        send_to: this.isAllCourses ? this.courses : this.courseSelected
      }
      axios.post('postsIfpe',data)
        .then(response => {
          if(response.data.success) {
            this.showMessage.success = true;
          }else {
            this.showMessage.failed = true;
          }
        })
        .catch(error => {
          console.log(error);
          this.showMessage.failed = true;
        });
    },
    async reset() {
      this.courseSelected = [];
      this.isAllCourses = false;
      this.title = '';
      this.description = '';
    }
  },
  beforeCreate() {
    if(! this.$store.state.logged) {
      this.$router.push('/posts');
    }
  },
  created() {
    this.allCourses();
  },
  watch: {
    courseSelected: {
      handler($new) {
        console.log($new)
      },
      deep: true
    }
  }
}
</script>

<style scoped>

</style>
