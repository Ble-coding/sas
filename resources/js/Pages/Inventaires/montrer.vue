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
             <div>{{ historique.id }}</div>
            </div>
            </div>

    <div class="flex justify-between items-center px-6 py-4">
      <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-black font-bold">{{ historique.parc.libelle }}</div>
      <div class="text-sm">{{ monthname }}</div>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
      <div class="border rounded-lg p-4 bg-gray-200">
      Coordinateur <strong class="text-black">{{ historique.nomcoord }}</strong>
      </div>
    </div>

    <div class="bg-gray-200 px-6 py-4">
      <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4">
       <div class="flex items-center justify-between">
              <div class="flex items-center pt-3">
        <div class="bg-blue-700 w-24 h-12 flex justify-center items-center rounded-full  uppercase font-bold text-white">{{ historique.marque }}</div>
        <div class="ml-4">
          <p class="font-bold">{{ historique.genre }}</p>
          <p class="text-sm text-gray-700 mt-1">{{ historique.immatricule }}</p>
                       <div class="uppercase text-xs text-gray-600 font-bold"><strong class="text-black mr-1">Lieu d'enlèvement :</strong>{{ historique.lieuenlev }} </div>
        </div>
      </div>
             <div>
             <div class="uppercase text-xs text-gray-600 font-bold mb-2"><strong class="text-black mr-1">Nom usager :</strong>{{ historique.nomusager }}</div>
              <div class="uppercase text-xs text-gray-600 font-bold mb-2"><strong class="text-black mr-1">Contact usager :</strong>{{ historique.contactusager }}</div>
               <div class="uppercase text-xs text-gray-600 font-bold"><strong class="text-black mr-1">Montant payé :</strong><strong class="text-green-800 text-xl font-bold">{{ historique.prix }} </strong> </div>
           </div>
            </div>
            </div>  
    </div>
    
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

    props: ['historique','monthname'],
//,'verouillage'

    data() {
        return {
            historiqueShow: this.historique,
            // historiqueData: this.historiques,
            // verouillageShow: this.verouillage
        }
    },



    mounted() {
        // console.log(this.approvisionnementList);
    }
}
</script>

