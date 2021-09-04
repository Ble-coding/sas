<template>
    <jet-authentication-card>
        <template #logo>
      <img  src="/satyoung/public/storage/SFA.png" alt="LOGO" />
        <!--   <img src="satyoung/public/storage/SFG.png" alt="produit" /> -->
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit" >
            <div>
                <jet-label for="name" value="Identité" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Mot de passe" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirmation Mot de passe" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

             <div class="mt-4">
                <jet-label for="role_id" value="S'enregistrer comme:" />
                 <select v-model="form.role_id" name="role_id" class="block mt-1 w-full border-gray-300">
                 <option value="">Choisir...</option>
                    <option value="1">Administrateur</option>
                    <option value="2">Auteur</option>
                    <option value="3">Checker</option>
                    <option value="4">Caissière</option>
                </select>
            </div>

            <!-- <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model="form.terms" />

                        <div class="ml-2">
                            J'accepte les <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Conditions d'utilisation</a> et la <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Politique de confidentialité</a>
                        </div>
                    </div>
                </jet-label>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Déjà enregistré?
                </inertia-link>

                <jet-button class="ml-4 text-sm bg-green-800 p-2 rounded text-white hover:bg-green-400" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    S'inscrire
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                     role_id: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
