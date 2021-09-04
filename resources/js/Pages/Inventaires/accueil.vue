<template>
  <app-layout>
    <template #header> Statistiques </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/5">
             <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
               <div class="flex flex-col">
                <div class="text-xs uppercase font-light text-gray-500">
                   Véhicules
                </div>
                <div  class="text-xl font-bold">
<inertia-link href="/inventaires/cars" class="ml-4 text-sm text-gray-700 underline">
               {{homes}}
                </inertia-link>
                </div>
                </div>
🚗
                  </div>
                </div>
               </div>
              <div class="w-full lg:w-1/5">
               <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                 <div class="flex flex-row items-center justify-between"><div class="flex flex-col">
                  <div class="text-xs uppercase font-light text-gray-500">
                    Usagers
                  </div>
                 <div class="text-xl font-bold">
         <inertia-link href="/inventaires/identites" class="ml-4 text-sm text-gray-700 underline">
             {{inventaires}}
             </inertia-link>
                </div>
                </div>
                👤
                </div>
                </div>
                </div>
                <div class="w-full lg:w-1/5">
                 <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                  <div class="flex flex-row items-center justify-between">
                   <div class="flex flex-col">
                <div class="text-xs uppercase font-light text-gray-500">
              Utilisateurs
                </div>
                 <div class="text-xl font-bold">
                <inertia-link href="/inventaires/users" class="ml-4 text-sm text-gray-700 underline">
            {{users}}
             </inertia-link>
                   </div>
                   </div>
                 👥
                 </div>
                 </div>
                 </div>

                      <div class="w-full lg:w-1/5">
                 <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-gray-500">Non soldé</div><div class="text-xl font-bold"> 
 {{nonsoldes}}</div></div>
              👛</div></div></div>
              
                 <div class="w-full lg:w-1/5">
                 <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-gray-500">Caisse</div><div class="text-xl font-bold"> 
 {{caisses}}</div></div>
              💳</div></div></div>
              
             
              
              
              </div>


      </div>
    </section>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["homes",'inventaires', 'users','caisses', 'nonsoldes'],

//   data() {
//     return {
//       proprietaireList: this.proprietaires,
//        term: "",
//     };
//   },
//   methods: {
//     search() {
//     this.$inertia.get("/tracks/liste/" + this.term);
//     },
//   },


//   mounted() {
//     console.log(this.proprietaireList);
//   },
};
</script>
