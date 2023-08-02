<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="px-8 py-8">
                <h3 class="text-gray-400 font-bold">Bienveue a vous <Link class="text-blue-600 underline text-sm"> {{ users.pseudo }} </Link></h3>
                <div class="text-left px-4 border-l-2 border-b-2 border-gray-400 rotate-[6deg] py-4 rounded-bl-2xl mt-10">
                    <ul class="space-y-3 px-10">
                        <li class="space-x-4">
                            <span class="fas fa-check-circle text-green-400"></span>
                            <span class="font-bold text-gray-400">Securisée</span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-check-circle text-green-400"></span>
                            <span class="font-bold text-gray-400">Commication</span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-check-circle text-green-400"></span>
                            <span class="font-bold text-gray-400">Publication </span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-window-close text-gray-400"></span>
                            <span class="font-bold text-gray-400">Autorisation pour dans site</span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-window-close text-slate-400"></span>
                            <span class="font-bold text-gray-400">compte associé</span>
                        </li>
                    </ul>
                </div>
                <div class="text-left px-4 border-r-2 border-t-2 border-gray-400 rotate-[6deg] py-4 rounded-tr-2xl -translate-y-[1px]">
                    <ul class="space-y-3 px-10">
                        <li class="text-center">
                            <p class="comic text-sm text-gray-400 font-bold">Veuillez verifier votre donne</p>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-envelope text-blue-400"></span>
                            <span class="font-bold text-gray-400">{{ users.email }} </span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-user text-green-400"></span>
                            <span class="font-bold text-gray-400">{{ users.pseudo }}</span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-window-close text-green-400"></span>
                            <span class="font-bold text-gray-400">Compte non authorise </span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-window-close text-gray-400"></span>
                            <span class="font-bold text-gray-400">Merci de votre verification </span>
                        </li>
                        <li class="space-x-4">
                            <span class="fas fa-window-close text-slate-400"></span>
                            <span class="font-bold text-gray-400">compte associé</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="py-4 px-4">
                    <p class="text-gray-400 font-bold">Si vous avez-liez compte dans votre carte etudiant recherche ici votre carte </p>
                    <div class="py-4">
                        <form @submit.prevent="okay">
                        <input
                        placeholder="recherche ici votre liaison...." 
                        type="text" @input.prevent="verify" v-model="mitady" class="input">
                    </form>
                    </div>
                    <div class="h-[320px] y overflow-hidden overflow-y-auto">
                        <div class="space-y-4" v-for="resultats in resultat" :key="resultats.id">
                            <div class="py-2 px-4">
                                <div class="flex justify-between px-2">
                                    <div class="space-x-4 text-gray-400 font-bold">
                                        <span class="fas fa-user"></span>
                                        <span class="">{{ resultats.nom }} <span>{{ resultats.prenom }}</span> </span>
                                    </div>
                                    <div class=" text-sm underline">
                                    </div>
                                    <div class="space-x-2">
                                        <Link class="text-gray-400 font-bold hover:text-blue-400">Moi</Link>
                                        <span class="border-l-4 rounded-br-2xl"></span> 
                                        <Link class="text-blue-600 hover:text-gray-400 font-bold">Verify</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end px-4 py-2">
                        <p class="text-gray-400 font-bold">resultat {{ resultat.length }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3';
const page =usePage()
const users = page.props.user

</script>
<script>
import { usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            mitady:"",
            resultat:[]
        }
    },
    methods: {
       
        verify()
        {
            const page = usePage()
            const regex = RegExp(this.mitady.toLowerCase())
            if(this.mitady.length>0)
            {
            this.resultat = page.props.etude.filter(item=>regex.test(item.nom.toLowerCase()))
            }
            else{
                this.resultat=[]
            }
        }
    },
    mounted() {
       
    },
}
</script>