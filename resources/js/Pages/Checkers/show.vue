<template>
<app-layout>
    <!--<template #header>
        Informations sur l'inventaire n°{{ inventaire.id }}
    </template>-->
    <div class="flex justify-center items-center h-screen">
  <div class="w-2/3 flex flex-col bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4">
       <div class="flex items-center justify-between">
             <img src="/satyoung/public/storage/SFA.png" alt="logo" />
             <div>{{ inventaire.id }}</div>
            </div>
            </div>

    <div class="flex justify-between items-center px-6 py-4">
      <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-black font-bold">{{ inventaire.parc.libelle }}</div>
      <div class="text-sm">{{ monthname }}</div>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
      <div class="border rounded-lg p-4 bg-gray-200">
      Coordinateur <strong class="text-black">{{ inventaire.nomcoord }}</strong>
      </div>
    </div>

    <div class="bg-gray-200 px-6 py-4">
      <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4">
       <div class="flex items-center justify-between">
              <div class="flex items-center pt-3">
        <div class="bg-blue-700 w-24 h-12 flex justify-center items-center rounded-full  uppercase font-bold text-white">{{ inventaire.marque }}</div>
        <div class="ml-4">
          <p class="font-bold">{{ inventaire.genre }}</p>
          <p class="text-sm text-gray-700 mt-1">{{ inventaire.immatricule }}</p>
                       <div class="uppercase text-xs text-gray-600 font-bold"><strong class="text-black mr-1">Lieu d'enlèvement :</strong>{{ inventaire.lieuenlev }} </div>
        </div>
      </div>
             <div>
             <div class="uppercase text-xs text-gray-600 font-bold mb-2"><strong class="text-black mr-1">Nom usager :</strong>{{ inventaire.nomusager }}</div>
              <div class="uppercase text-xs text-gray-600 font-bold mb-2"><strong class="text-black mr-1">Contact usager :</strong>{{ inventaire.contactusager }}</div>
               <div class="uppercase text-xs text-gray-600 font-bold"><strong class="text-black mr-1">Montant à payer :</strong>{{ inventaire.prix }} </div>
           </div>
            </div>
            </div>

                <div class="flex justify-between items-center px-6 py-4">
       <button v-if="$page.props.user.role_id == 1 || $page.props.user.role_id == 3" id="hidden" onclick="window.print()"
              class="block bg-blue-800 hover:bg-blue-600 text-white py-2 px-3 mt-3 rounded"
              type="submit"
            >
              Imprimer
            </button>
      <div class="text-sm">A compté du {{ monthname }}, passé 3 jours le client subira une pénalité de <strong>3000F</strong> en cas de non paiement</div>
    </div>


           
             
    </div>
    <form @submit.prevent="submit">
<button id="hidden" v-if="$page.props.user.role_id == 1 || $page.props.user.role_id == 4" class="m-3 block bg-indigo-800 hover:bg-indigo-600 text-white py-2 px-3 mt-3 rounded"
              type="submit">Terminer</button>
</form>
  </div>
  </div>
</app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';

export default {
    components: {
        AppLayout
    },

    props: ['inventaire','monthname'],
//,'verouillage'

    data() {
        return {
            inventaireShow: this.inventaire,
            // inventaireData: this.inventaires,
            // verouillageShow: this.verouillage
        }
    },

 methods: {
    submit: function () {
     this.$inertia.patch('/checkers/terminer/' + this.inventaireShow.id, this.inventaireShow,  this.inventaireShow.status=1)
    }
  },
    mounted() {
        // console.log(this.approvisionnementList);
    }
}
</script>

<style>
   @media print{
                #hidden{
                    display : none;
                }
            }
</style>
