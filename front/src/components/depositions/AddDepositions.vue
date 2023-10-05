<template>
<section>
    <div>
        <v-form>
            <v-card>
                <v-textarea label="vish kk" placeholder="Digite aqui seu depoimento" variant="outlined"></v-textarea>
                <v-btn type="submit">postar</v-btn>
            </v-card>
            </v-form>
        <v-form>
            <v-card>
                <template v-slot:prepend>
                <v-avatar   
                color="black"
                image= "https://med.virginia.edu/diabetes-technology/wp-content/uploads/sites/265/2020/10/Blank-Avatar.png"
                >
            </v-avatar>
        </template>
        <v-row class="random">
            merda
        </v-row>
                <v-card-title>
                    vish kk
                </v-card-title>
                <v-card-text>
                    kkkkkkkkkkkkk
                </v-card-text>
            </v-card>
        </v-form>
    </div>
</section>
</template>

<script> 
import axios from 'axios'
import Swal from 'sweetalert2'

export default{
    name: 'AddDepositions',
    data(){
        return{

        }
    }
}
</script>

<style scoped>
.merda{
  display: flex;
  position: relative;
  top: -2em;
  right: -5em; 
}
</style>