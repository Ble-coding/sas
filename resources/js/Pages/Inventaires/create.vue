<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faites l'inventaire
        </h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div>
        <div class="w-full">
                <button class="bg-blue-500 ml-2 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link href="/inventaires/liste">Voir la liste</inertia-link>
                </button>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                          <h1 class="font-bold text-blue-700 mb-4">Formulaire</h1>
                            <hr>

               <div class="mt-4">

                    <div class="mt-2 flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="dateinv">
                                Date
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dateinv" type="Date" v-model="form.dateinv">
                           <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.dateinv">
                                {{ $page.props.errors.dateinv }}
                           </div>
                         </div>
                        <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="nomcoord">
                               Nom complet coordinateur
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nomcoord" type="texte" placeholder="Nom et prénoms" v-model="form.nomcoord">
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.nomcoord">
                                {{ $page.props.errors.nomcoord }}
                            </div>
                        </div>
                          <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="nomusager">
                                Nom et prénoms usager
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nomusager" type="texte" placeholder="Nom et prénoms" v-model="form.nomusager">
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.nomusager">
                                {{ $page.props.errors.nomusager }}
                            </div>
                        </div>
                        <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="contactusager">
                                Contact usager
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactusager" type="texte" placeholder="Contact de l'usager" v-model="form.contactusager">
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.contactusager">
                                {{ $page.props.errors.contactusager }}
                            </div>
                        </div>

                          <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="panne">
                             Panne déclarée
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="panne" type="texte" placeholder="Panne déclarée" v-model="form.panne">
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.panne">
                                {{ $page.props.errors.panne }}
                            </div>
                        </div>

    <div class="w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="lieuenlev">
                                    Lieu d'enlèvement
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lieuenlev" placeholder="Lieu d'enlèvement" type="text" v-model="form.lieuenlev">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.lieuenlev">
                                    {{ $page.props.errors.lieuenlev}}
                                </div>
                        </div>
                        <div class="w-full mt-4 md:w-1/6 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="marque">
                                   Marque véhicule
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="marque" type="text" placeholder="Marque" v-model="form.marque">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.marque">
                                    {{ $page.props.errors.marque}}
                                </div>
                         </div>
                        <div class="w-full mt-4 md:w-1/6 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="genre">
                                    Type véhicule
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="genre" type="text" placeholder="Genre du véhicule" v-model="form.genre">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.genre">
                                    {{$page.props.errors.genre}}
                                </div>
                        </div>

                           <div class="w-full md:w-1/6 px-3 mt-4 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="immatricule">
                                    Immatriculation
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="immatricule" type="text" placeholder="Numéro" v-model="form.immatricule">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.immatricule">
                                    {{$page.props.errors.immatricule}}
                                </div>
                        </div>

                             <div class="w-full md:w-1/6 px-3 mt-4 mb-4 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="parc_id">
                                Choisir le parc
                            </label>
                            <select class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="parc_id" v-model="form.parc_id">
                                <option v-for="parc in parcs" v-bind:key="parc.id" v-bind:value="parc.id">
                                    {{ parc.libelle }}
                                </option>
                            </select>
                            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.parc_id">
                                    {{$page.props.errors.parc_id}}
                                </div>
                            <div class=" pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                        <div class="w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="prix">
                                 Montant total
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prix" type="text" placeholder="Montant à payer" v-model="form.prix">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.prix">
                                    {{ $page.props.errors.prix}}
                                </div>
                         </div>


<div class="w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="operation_id">
                           Opération
                                </label>
                                  <select class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="operation_id" v-model="form.operation_id">
                                    <option value="1">Mairie</option>
                                    <option value="2">District</option>
                                    <option value="3">Police</option>
                                    <option value="4">TSP</option>
                            </select>
                         <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.operation_id">
                                    {{$page.props.errors.operation_id}}
                                </div>
                            <div class=" pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                          </div>

<div class="hidden w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="status">
                           Statut
                                </label>
                                  <select class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="status" v-model="form.status">
                                    <option value="0">Non-soldé</option>
                                    <option value="1">Soldé</option>
                            </select>
                          </div>
             
                         <!--    <div class="mt-4">
                                <jet-label for="role_id" value="S'enregistrer comme:" />
                                <select v-model="form.role_id" name="role_id" class="block mt-1 w-full border-gray-300">
                                <option value="">Choisir...</option>
                                    <option value="1">Administrateur</option>
                                    <option value="2">Auteur</option>
                                    <option value="3">Checker</option>
                                </select>
                            </div>

<div class="w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="avance">
                                 Avance
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="avance" type="text" placeholder="Avance" v-model="form.avance">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.avance">
                                    {{ $page.props.errors.avance}}
                                </div>
                         </div> -->

                      <!-- <div class="hidden w-full md:w-1/6 mt-4 px-3 mb-4 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold tracking-wide font-bold mb-2" for="status">
                                 Status
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" type="text" placeholder="Status" v-model="form.status">
                                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.status">
                                    {{ $page.props.errors.status}}
                                </div>
                         </div> -->
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

  props: {
    parcs: {
      type: Array,
      required: true,
    },
  },
    data() {
        return {
            form: {
                nomcoord: null,
                nomusager: null,
                contactusager: null,
                 immatricule: null,
                dateinv: null,
                 lieuenlev: null,
                  marque: null,
                genre: null,
                 prix: null,
                   avance: null,
                  status: 0,
                //    statut_id: 0,
                   parc_id: null,
                   operation_id: null,
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/inventaires', this.form)
        },
    },
}
</script>

