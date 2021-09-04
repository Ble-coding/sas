<template>
  <app-layout>
    <template #header> Listes des parcs </template>
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
            href="/parcs/liste"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form>

        <div
          class="py-3"
          v-for="parcs in this.parcList.data"
          v-bind:key="parcs.id"
        >
          <div class="bg-white rounded shadow p-4">
            <div
              class="text-sm text-black-500 font-bold flex justify-between items-center"
            >
              Enregistré par {{ parcs.user.name }}
              <span class="text-sm text-green-500">
               {{ parcs.position }}
              </span>
            </div>

            <div class="flex justify-between items-center">
              <div class="text-blue-500 text-xl">
                {{ parcs.libelle}}
              </div>
            </div>
            <div class="flex items-center justify-between">
              <!--<inertia-link
                :href="'parcs/' +  parcs.id"
                class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
                >👁️</inertia-link
              > -->
              <inertia-link v-if="$page.props.user.role_id == 1 || $page.props.user.role_id == 3"
                :href="'parcs/edit/' + parcs.id"
                class="bg-blue-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-blue-700"
                >🖊️</inertia-link
              >
            </div>
          </div>
        </div>
        <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.parcList.links"
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

  props: ["parcs", 'monthname'],

  data() {
    return {
      parcList: this.parcs,
       term: "",
    };
  },
  methods: {
    search() {
    this.$inertia.get("/parcs/liste/" + this.term);
    },
  },


  mounted() {
    console.log(this.parcList);
  },
};
</script>
