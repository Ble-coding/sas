<template>
  <app-layout>
    <template #header> Listes des voitures </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <!--  <div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div>-->
              <form>
                                    <input
            id="search"
            type="text"
            placeholder="Rechercher"
            v-model="term"
            @keyup="search"
            class="ml-2 px-2 py-1 text-sm rounded border"
          />
           <inertia-link
            href="/inventaires/cars"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form>

        <div
          class="py-1"
        >
          <div class="bg-white rounded shadow">
   <div class="flex flex-col h-screen">
    <div class="flex-grow overflow-auto">
      <table class="relative w-full border">
        <thead>
          <tr>
           <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">N°</th>
            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Numéro immatriculation</th>
            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Marque</th>
             <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Genre</th>
             <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Parcs</th>
          </tr>
        </thead>
        <tbody class="divide-y">
          <tr  v-for="cars in this.carList.data"
          v-bind:key="cars.id">
             <td class="px-6 py-4 font-bold  text-center"> {{ cars.id }}</td>
      <td class="px-6 py-4 font-bold  text-center"> {{ cars.immatricule }}</td>
            <td class="px-6 py-4 font-bold text-center"> {{ cars.marque }}</td>
      <td class="px-6 py-4 font-bold text-center">{{ cars.genre }}</td>
            <td class="px-6 py-4 font-bold text-center">{{ cars.parc.libelle }}</td>
          </tr>
        </tbody>
      </table>
      <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.carList.links"
          v-bind:key="link.label"
        >
          <span v-bind:class="{ 'text-red-700': link.active }">
            {{ link.label }}
          </span>
        </inertia-link>
    </div>
  </div>
          </div>
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

  props: ["cars"],

  data() {
    return {
      carList: this.cars,
       term: "",
    };
  },
  methods: {
    search() {
    this.$inertia.get("/inventaires/cars/" + this.term);
    },
  },


  mounted() {
    console.log(this.carList);
  },
};
</script>
