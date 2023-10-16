<template>
  <v-card>
    <v-card-title class="d-flex justify-center">
      <h2>Posts ifpe</h2>
    </v-card-title>
    <v-card-actions>
      <v-btn v-if="$store.state.logged" to="/posts/create" color="secondary">Criar publicação</v-btn>
    </v-card-actions>
    <v-card-text>
      <v-row class="d-flex justify-center" >
        <v-col v-for="(posts, index) in allPosts" :key="index">
          <v-card width="600px" height="140px" class="mb-5 border">
            <v-card-title>{{ posts.title }}</v-card-title>
            <v-card-subtitle>{{ posts.user.name }}</v-card-subtitle>
            <v-card-text>{{ posts.content }}</v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script>
import axios from "axios";

export default {
  name: "PostsView",
  data() {
    return {
      allPosts: []
    }
  },
  methods: {
    searchPosts() {
      axios.get('postsIfpe')
        .then(response => this.allPosts = response.data.data)
        .catch(error => console.log(error));
    }
  },
  created() {
    this.searchPosts();
  }
}
</script>

<style scoped>

</style>
