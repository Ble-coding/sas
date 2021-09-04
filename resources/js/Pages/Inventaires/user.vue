<template>
  <app-layout>
    <template #header> Listes des utilisateurs </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            href="/inventaires/users"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form>

        <div
          class="py-3"
        >
          <div class="bg-white rounded shadow">
   <div class="flex flex-col h-screen">
    <div class="flex-grow overflow-auto">
      <table class="relative w-full border">
        <thead>
          <tr>
          <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Identifiant</th>
          <!--<th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Image</th> -->
            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Identité</th>
            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Email</th>
            <!-- <th class="sticky top-0 px-6 py-3 text-blue-900 bg-white-300">Role</th>  -->  
          </tr>
        </thead>
        <tbody class="divide-y">
          <tr v-for="users in this.userList.data"
          v-bind:key="users.id">
          <td class="px-6 py-4 font-bold  text-center"> {{ users.id}}</td>
     <!--  <td class="px-6 py-4 font-bold  text-center">
      <img class="h-5 w-full object-cover md:w-5" :src="$page.props.user.profile_photo_url" alt="users" /> 
       </td>-->
            <td class="px-6 py-4 font-bold text-center"> {{ users.name }}</td>
      <td class="px-6 py-4 font-bold text-center">{{ users.email }}</td>
      <!--<td class="px-6 py-4 font-bold text-center">{{ users.role_id }}</td>-->
          </tr>
        </tbody>
      </table>
      <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.userList.links"
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

  props: ["users"],

  data() {
    return {
      userList: this.users,
       term: "",
    };
  },
  methods: {
    search() {
    this.$inertia.get("/inventaires/users/" + this.term);
    },
  },


  mounted() {
    console.log(this.userList);
  },
};
</script>
