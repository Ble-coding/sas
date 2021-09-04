<template>
  <app-layout>
    <template #header> Listes des usagers ayant soldé </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div>
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
            href="/historiques/liste"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form>

        <div
          class="py-3"
          v-for="historiques in this.inventaireList.data"
          v-bind:key="historiques.id"
        >
          <div class="bg-green-700 rounded shadow p-4">
            <div
              class="text-sm text-white font-bold flex justify-between items-center"
            >
              Enregistré par {{ historiques.user.name }}
              <span class="text-sm text-black">
           <strong class="text-sm text-blue-500 mr-1">Usager:</strong>{{ historiques.nomusager}} - ({{ historiques.contactusager }}) - {{ historiques.marque  }}
            <!--   -->
              </span>
            </div>

            <div class="flex justify-between items-center">
              <div class="text-black text-xl">
                {{ historiques.immatricule }}
              </div>
            </div>
            <div class="flex items-center justify-between">
              <inertia-link
                :href="'inventaires/' +  historiques.id"
                class="bg-white text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-white"
                >👁️</inertia-link
              >
            <inertia-link v-if="$page.props.user.role_id == 1"
                :href="'inventaires/edit/' + historiques.id"
                class="bg-blue-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-blue-700"
                >🖊️</inertia-link
              > 
            </div>
          </div>
        </div>
        <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.inventaireList.links"
          v-bind:key="link.label"
        >
          <span v-bind:class="{ 'text-red-700': link.active }">
            {{ link.label }}
          </span>
        </inertia-link>
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

  props: ["historiques", 'monthname'],

  data() {
    return {
      inventaireList: this.historiques,
       term: "",
    };
  },
  methods: {
    search() {
    this.$inertia.get("/historiques/liste/" + this.term);
    },
  },


  mounted() {
    console.log(this.inventaireList);
  },
};
</script>
