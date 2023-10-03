<template>
<section>
    <div>
        <form>
            <input type="text" placeholder="Escreva algo aqui"><br>
            <button type="submit"> Enviar </button>
        </form>
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

</style>