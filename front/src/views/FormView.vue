<template>
    <v-dialog persistent :width="phoneDisplay ? 'auto' : '900px'" v-model="messageAlert">
    <UserRegistrarionAlert :phoneDisplay = "phoneDisplay" @closeAlert = "messageAlert = false" />
    </v-dialog>
    <v-card>
        <v-card-title class="text-center">
            <div>Formulário de Acompanhamento</div>
        </v-card-title>
        <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"> </v-spacer>
        <v-card-text class="d-flex justify-center">
            <v-form @submit.prevent="registerRegistration()" :class="[phoneDisplay ? 'w-75' : 'w-50']">
                <v-row>
                    <v-col>
                        <v-card elevation ='4'>
                            <v-card-text>
                            <v-radio-group label="Que curso você está cursando no IFPE - Campus Igarassu?">
                                <v-radio label="PROEJA Almoxarife" value="almoxarife"></v-radio>
                                <v-radio label="PROEJA Operador de Computador" value="operador"></v-radio>
                                <v-radio label="Técnico em Informática para Internet" value="ipi"></v-radio>
                                <v-radio label="Técnico em Logística" value="logistica"></v-radio>
                                <v-radio label="Tecnologia em Gestão da Qualidade" value="tgq"></v-radio>
                                <v-radio label="Tecnologia em Sistemas para Internet" value="tsi"></v-radio>
                                <v-radio label="Bacharelado em Administração" value="bca"></v-radio>
                                <v-radio label="Outro:" value="other"></v-radio>
                            </v-radio-group>
                        </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation = "4">
                            <v-card-text>
                            <v-radio-group label="Em que semestre do curso no IFPE - Campus Igarassu você está atualmente?">
                                <v-radio label="1" value="1"></v-radio>
                                <v-radio label="2" value="2"></v-radio>
                                <v-radio label="3" value="3"></v-radio>
                                <v-radio label="4" value="4"></v-radio>
                                <v-radio label="5" value="5"></v-radio>
                                <v-radio label="6" value="6"></v-radio>
                                <v-radio label="7" value="7"></v-radio>
                                <v-radio label="8" value="8"></v-radio>
                                <v-radio label="9" value="9"></v-radio>
                                <v-radio label="10" value="10"></v-radio>
                                <v-radio label="Outro:" value="other"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Anteriormente realizou outro curso no IFPE além deste atual?">
                                <v-radio label="Sim" value="sim"></v-radio>
                                <v-radio label="Não" value="não"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                            <v-text-field label="Endereço" variant="outlined"></v-text-field>
                    </v-col>

                    <v-col>
                            <v-text-field label="Telefone" variant="outlined"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                            <v-text-field label="Redes sociais (Facebook, Instagram, Linkedin)" variant="outlined"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Você se considera:">
                                <v-radio label="Negro(a)" value="1"></v-radio>
                                <v-radio label="Pardo(a)" value="2"></v-radio>
                                <v-radio label="Indígena" value="3"></v-radio>
                                <v-radio label="Branco(a)" value="4"></v-radio>
                                <v-radio label="Outro:" value="5"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Estado Civil">
                                <v-radio label="Solteiro(a)" value="1"></v-radio>
                                <v-radio label="Casado(a)" value="2"></v-radio>
                                <v-radio label="Separado" value="3"></v-radio>
                                <v-radio label="Divorciado(a)" value="4"></v-radio>
                                <v-radio label="Viúvo(a)" value="5"></v-radio>
                                <v-radio label="Outro:" value="6"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Renda mensal individual">
                                <v-radio label="Menos de 1(um) salário mínimo" value="1"></v-radio>
                                <v-radio label="1(um) salário mínimo" value="2"></v-radio>
                                <v-radio label="De 1(um) até 3(três) salários mínimos" value="3"></v-radio>
                                <v-radio label="De 3(três) até 6(seis) salários mínimos" value="4"></v-radio>
                                <v-radio label="Mais de 6(seis)" value="5"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>

            </v-form> 
        </v-card-text>
    </v-card>
</template>
  
  <script>
  import axios from 'axios';
  import UserRegistrarionAlertVue from '@/components/user/alerts/UserRegistrarionAlert.vue';

  export default {
    name: "formDefault"
  }

  </script>
  
  <style scoped>
  
  </style>