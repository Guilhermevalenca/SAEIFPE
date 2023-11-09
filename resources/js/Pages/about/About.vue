<template>
  <Default >
    <p class="odio"> SAEIFPE é uma aplicação em desenvolvimento pelos alunos do IFPE Campus-Igarassu na matéria de Projeto e Prática. Seu principal objetivo é manter o contato com seus alunos egressos por meio de um ambiente interativo onde todos os concluintes poderão trocar experiências, receber novidades sobre cursos e empregos enviados pelo próprio instituto e entre outras coisas que estão em processo de criação. O instituto Federal deseja continuar mantendo a comunicação com seus estudantes para que a parceria entre aluno e instuição possa ser prolongada e ambos se ajudem, egressos que estão no mercado de trabalho podem contribuir com sua experiência para com os recem formandos, enquanto o instituto poderá fazer um acompanhamento de carreira. Estamos aceitando todos(a) os(as) estudantes, mas se você está próximo da finalização do curso, sua adesão é imprescindível.</p>

    <div class="d-flex justify-space-between">
      <v-list class="perfil">
        <v-list-item @click="showDescription('Alice Manguinho')">
          <v-list-item-avatar>
            <v-avatar size="120">
              <v-img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/A_Girl-JapaneseSubCluture-square.jpg"/>
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Alice Manguinho</v-list-item-title>
            <div>
              <p>{{ description }}</p>
            </div>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="perfil">
        <v-list-item @click="showDescription('Anderson Emanoel')">
          <v-list-item-avatar>
            <v-avatar size="120">
              <v-img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/A_Girl-JapaneseSubCluture-square.jpg"/>
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Anderson Emanoel</v-list-item-title>
            <div>
              <p>{{ description }}</p>
            </div>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="perfil">
        <v-list-item @click="showDescription('Claudiane Rodrigues')">
          <v-list-item-avatar>
            <v-avatar size="120">
              <v-img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/A_Girl-JapaneseSubCluture-square.jpg"/>
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Claudiane Rodrigues</v-list-item-title>
            <div>
              <p>{{ description }}</p>
            </div>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="perfil">
        <v-list-item @click="showDescription('Emmily Kathylen')">
          <v-list-item-avatar>
            <v-avatar size="120">
              <v-img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/A_Girl-JapaneseSubCluture-square.jpg"/>
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Emmily Kathylen</v-list-item-title>
            <div>
              <p>{{ description }}</p>
            </div>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list class="perfil">
        <v-list-item @click="showDescription('Guilherme Valença')">
          <v-list-item-avatar>
            <v-avatar size="120" >
              <v-img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/A_Girl-JapaneseSubCluture-square.jpg"/>
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Guilherme Valença</v-list-item-title>
            <div>
              <p>{{ description }}</p>
            </div>

          </v-list-item-content>
        </v-list-item>
      </v-list>
    </div>
    <v-dialog v-model="mostrarMensagem">
      <v-card class="descricao">
        <v-card-title>Desenvolvedor(a)</v-card-title>
        <v-card-text>
          <div v-for="(message, index) in exibirMensagem" :key="index">
            {{ message }}
          </div>
        </v-card-text>
        <a :href="links">Github</a>
        <v-card-actions class="d-flex justify-center">

          <v-btn class="botao" color="newColorGreen" variant="outlined" @click="mostrarMensagem = false">Ok!</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </Default>


</template>

<script>
import Default from "@/Layouts/default/Default.vue"
export default {
  components:{Default},
  data() {
    return {
      descriptions: {
        'Alice Manguinho': ['IFPE-Campus Igarassu', 'Curso : Informática para Internet','Igarassu-PE', 'alicemanguinhosm@gmail.com'],
        'Anderson Emanoel': ['IFPE-Campus', 'Curso : Informática para Internet','Itapissuma-PE', 'emanoelanderson16@gmail.com'],
        'Claudiane Rodrigues': ['IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'claudianerodrigues365@gmail.com'],
        'Emmily Kathylen':['IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'emmilysouzakathylen@gmail.com'],
        'Guilherme Valença': ['IFPE-Campus', 'Curso : Informática para Internet','Igarassu-PE', 'guilherm3vrp@gmail.com'],

      },
      description: '',
      mostrarMensagem: false,
      exibirMensagem: '',
      links: {
        'Alice Manguinho': 'https://github.com/AliceManguinho',
        'Anderson Emanoel': 'https://github.com/Anderson-446',
        'Claudiane Rodrigues': 'https://github.com/RodriguesClaudiane',
        'Emmily Kathylen': 'https://github.com/EmmilyKathylen',
        'Guilherme Valença': 'https://github.com/Guilhermevalenca'
      }
    }
  },
  methods: {
    showDescription(name) {
      if (this.descriptions[name]) {
        this.mostrarMensagem = true;
        this.exibirMensagem = this.descriptions[name];
        this.links = this.links[name];
      } else {
        window.alert('Descrição não encontrada.');
      }
    },
  }
}
</script>

<style>
.cabecalho{
  text-align: center;
  margin: 25px;
  font-size: larger;
}

.odio{
  border-style: solid;
  border-radius: 25px;
  width: 500px;
  font-size: large;
  padding: 50px;
  margin: 0 auto;
  text-align: justify;
  border-color: #35972F;

}
@media screen and (max-width: 600px) {
  .odio {
    width: 90%;
    font-size: medium;
    padding: 20px;

  }
}

.perfil{
  max-width: 200px;
  margin: 50px 10px;
}

.descricao{
  border-radius: 100px;
  text-align: center;
}

.botao{
  width: 10px;
  color: rgba(53, 151, 47, 1);
}

.description {
  white-space: pre-line;
}

</style>



