<template>
    <div>
       <div class="grid sm:grid-cols-1 md:grid-cols-2 py-4 px-12">
            <div class="px-2 py-2">
                <div class="bg-gray-400 rounded-b-2xl py-2 px-2 text-white text-center">
                    <p class="comic font-bold">Inscrire</p>
                </div>
                <div class="border-gray-400 border-l-2 border-b-2 rounded-bl-2xl translate-x-6 py-4 px-8">
                    <p class="text-sm text-gray-400 font-bold">Veuillez verifier votre email pour acceder aux membre de site web it
                        <span class="fas fa-check-circle text-sky-400"></span>
                    </p>
                    <form @submit.prevent="inscrire">
                    <div class="relative mt-4 px-4">
                        <input type="text"
                        v-model="form.pseudo"
                        placeholder="entre votre pseudo..."
                         class="input">
                        <i class="fas fa-user-circle absolute left-8 top-3 text-gray-400"></i>
                        <div v-if="errors.pseudo">
                            <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.pseudo }} </p>
                        </div>
                    </div>   
                    <div class="relative mt-4 px-4">
                        <input type="text"
                        v-model="form.email"
                        placeholder="entre votre email..."
                         class="input">
                        <i class="fas fa-envelope absolute left-8 top-3 text-gray-400"></i>
                        <div v-if="errors.email">
                            <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.email }} </p>
                        </div>
                    </div>
                    <div class="relative mt-4 px-4">
                        <input :type="eye?'text':'password'"
                        v-model="form.password"
                        placeholder="mots de pass..."
                         class="input">
                        <i class="fas fa-lock absolute left-8 top-3 text-gray-400"></i>
                        <i
                        @click.prevent="show"
                        :class="eye?'fa-eye':'fa-eye-slash'" 
                        class="far fa-eye-slash absolute right-8 top-3 text-gray-400 cursor-pointer"></i>
                        <div v-if="errors.password">
                            <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.password.replace("password","mots de pass") }} </p>
                        </div>
                    </div>
                    <div class="relative mt-4 px-4">
                        <input :type="eye1?'text':'password'"
                        v-model="form.confirm"
                        placeholder="entre votre email..."
                         class="input">
                        <i class="fas fa-envelope absolute left-8 top-3 text-gray-400"></i>
                        <i
                        @click.prevent="show1"
                        :class="eye1?'fa-eye':'fa-eye-slash'"
                        class="far absolute right-8 top-3 text-gray-400 cursor-pointer"></i>
                        <div v-if="errors.confirm">
                            <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.confirm.replace("confirm","confirmation") }} </p>
                        </div>
                    </div>
                    <div class="mt-4 px-5">
                        <label for="">
                            <input
                            v-model="form.check" 
                            type="checkbox" name="" id=""> accepter <Link class="text-gray-400 hover:text-amber-300">terme et condition</Link>
                        </label>
                    </div>
                    <div class="mt-4 flex space-x-6">
                        <div>
                            <button class="bg-gray-400 font-bold hover:bg-gray-200 text-gray-600 hover:text-gray-400 rounded-xl px-2 py-1">Inscrire</button>
                        </div>
                        <div>
                            <Link class="text-sm font-bold text-gray-400 hover:text-amber-400">mots de pass oublier</Link>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div></div>
       </div>
    </div>
</template>
<script setup>
import { router } from '@inertiajs/vue3';
import { reactive } from "vue"
defineProps({errors:Object})
const form = reactive({
    pseudo:"",
    email:"",
    password:"",
    confirm:"",
    check:null
})
function inscrire()
{
    router.post(route('store.inscrire'),form)
}
</script>
<script>
export default {
    data() {
        return {
            eye:false,
            eye1:false,
        }
    },
    methods: {
        show()
        {
            this.eye=!this.eye
        },
        show1()
        {
            this.eye1=!this.eye1
        }
    },
}
</script>