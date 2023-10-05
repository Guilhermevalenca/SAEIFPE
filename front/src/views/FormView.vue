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
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Qual é a sua atual situação?">
                                <v-radio label="Apenas trabalhando" value="1"></v-radio>
                                <v-radio label="Apenas estudando" value="2"></v-radio>
                                <v-radio label="Trabalhando e estudando" value="3"></v-radio>
                                <v-radio label="Outro" value="4"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation = "4">
                            <v-card-text>
                            <v-radio-group label="Qual é a sua atual situação no mercado de trabalho?">
                                <v-radio label="Estagiário(a)" value="1"></v-radio>
                                <v-radio label="Empreendedor(a)" value="2"></v-radio>
                                <v-radio label="Autônomo(a) ou prestador(a) de serviços" value="3"></v-radio>
                                <v-radio label="Empregado(a), com carteira assinada" value="4"></v-radio>
                                <v-radio label="Empregado(a), sem carteira assinada" value="5"></v-radio>
                                <v-radio label="Servidor(a) público(a) concursado(a)" value="6"></v-radio>
                                <v-radio label="Contrato temporário em instituição pública" value="7"></v-radio>
                                <v-radio label="Contrato temporário em empresa privada" value="8"></v-radio>
                                <v-radio label="Desempregado (responda as próximas questões se baseando no seu emprego mais recente)" value="9"></v-radio>
                                <v-radio label="Outro:" value="10"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Durante o seu curso você estagia ou já estagiou?">
                                <v-radio label="Sim" value="1"></v-radio>
                                <v-radio label="Não" value="2"></v-radio>
                                <v-radio label="Não se aplica" value="3"></v-radio>
                                <v-radio label="Outro" value="4"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                        <v-card-title style="font-size: 16px;">
                            Caso você realize ou tenha realizado estágio durante seu curso no IFPE, em que empresa(s) você estagiou?
                        </v-card-title>
                        <v-text-field label="Sua resposta" variant="outlined"></v-text-field>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Caso você esteja trabalhando, a sua atividade profissional está na área do seu curso?">
                                <v-radio label="Sim" value="1"></v-radio>
                                <v-radio label="Não" value="2"></v-radio>
                                <v-radio label="Não se aplica" value="3"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                            <v-radio-group label="Você têm dificuldades para conciliar o seu curso com a sua atividade profissional?">
                                <v-radio label="Sim" value="1"></v-radio>
                                <v-radio label="Não" value="2"></v-radio>
                                <v-radio label="Não se aplica" value="3"></v-radio>
                            </v-radio-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-card elevation="4">
                            <v-card-text>
                                Escolha suas opções
                            <v-checkbox-group >
                                <v-checkbox label="Falta de experiência profissional" value="1"></v-checkbox>
                                <v-checkbox label="Falta de conhecimento teórico" value="2"></v-checkbox>
                                <v-checkbox label="Falta de conhecimento de outros idiomas" value="3"></v-checkbox>
                                <v-checkbox label="Sim" value="4"></v-checkbox>
                            </v-checkbox-group>
                            </v-card-text>
                    </v-card>
                    </v-col>
                </v-row>
                <v-card-actions class="d-flex justify-end">
          <v-btn class="mb-7" :loading="loading" :disabled="!formInvalid" type="submit" :color="!formInvalid ? '' : 'secondary'" variant="elevated">Registrar</v-btn>
        </v-card-actions>
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