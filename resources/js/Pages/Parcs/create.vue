<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faites un enregistrement
        </h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div>
        <div class="w-full">
                <button class="bg-blue-500 ml-2 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link href="/parcs/liste">Voir la liste</inertia-link>
                </button>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                          <h1 class="font-bold text-blue-700 mb-4">Inventaire</h1>
                            <hr>

               <div class="mt-4">

                    <div class="mt-2 flex flex-wrap mx-3 mb-6">
                        <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="libelle">
                               Libelle du Parc
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="libelle" type="texte" placeholder="Libellé" v-model="form.libelle">
                           <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.libelle">
                                {{ $page.props.errors.libelle }}
                           </div>
                         </div>
                        <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="position">
                               Position
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="position" type="texte" placeholder="Position" v-model="form.position">
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.position">
                                {{ $page.props.errors.position }}
                            </div>
                        </div>
                    </div>
                </div>


                    <!--<button class="bg-green-500 hover:bg-green-700 rounded py-2 px-4 my-3 text-white font-bold" v-if="form.cartes.length < 5" @click.prevent="add">+</button>
                    <button class="bg-red-500 hover:bg-red-700 rounded rounded py-2 px-4 my-3 text-white font-bold" v-if="form.cartes.length > 1" @click.prevent="remove">🗑️</button> -->
                    <button class="block bg-blue-800 hover:bg-blue-600 text-white  py-2 px-3 mt-3 rounded" type="submit">
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
// import Welcome from '@/Jetstream/Welcome'

export default {
    components: {
        AppLayout,
        // Welcome,
    },

    data() {
        return {
            form: {
                libelle: null,
                position: null,
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/parcs', this.form)
        },
    },
}
</script>

