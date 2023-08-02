<template>
    <div>
        <div class="media py-4 px-8">
            <div class="col-span-7 px-4">
                <div class="">
                    <div class="bg-gray-400 rounded-b-2xl py-2 px-4">
                        <div class="flex justify-between items-center space-x-4 text-white font-bold comic">
                            <div class="space-x-4">
                            <i class="fas fa-user-graduate"></i>
                            <span class="">{{ etudiant.nom }} </span>
                            <span class="">{{ etudiant.prenom }} </span>
                            </div>
                            <div style="font-size: 12px;">
                            <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                            <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                            <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="border-l-2 border-b-2 py-4 rounded-bl-2xl   border-gray-400 -translate-y-0 translate-x-5">
                        <div class="h-[125px] flex justify-center items-center">
                            <div class="text-center">
                                <i class="fa fa-user-circle fa-4x text-gray-700"></i>
                                <p class="text-blue-400 underline cursor-pointer">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                    {{ etudiant.email }} </p>
                            </div>
                        </div>
                        <div class="py-2 px-4 persone">
                            <ul class="space-y-3">
                                <li class="text-gray-400 font-bold">
                                    <span>╚╦╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩╩</span>
                                    <span></span>
                                </li>
                                <li class="text-gray-400 font-bold space-x-6 comic">
                                    <span class="">Niveaux :</span>
                                    <span class="" v-if="etudiant.niveau===0">
                                        L1 en
                                        <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                                        <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                                        <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                                    </span>
                                    <span class="" v-if="etudiant.niveau===1">
                                        L2 en
                                        <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                                        <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                                        <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                                    </span>
                                    <span class="" v-if="etudiant.niveau===2">
                                        L3 en
                                        <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                                        <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                                        <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                                    </span>
                                    <span class="" v-if="etudiant.niveau===3">
                                        M1 en
                                        <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                                        <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                                        <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                                    </span>
                                    <span class="" v-if="etudiant.niveau===4">
                                        M2 en
                                        <span class="text-blue-400 underline" v-if="etudiant.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></span>
                                        <span class="text-yellow-400 underline" v-else-if="etudiant.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></span>
                                        <span class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></span>
                                    </span>
                                    
                                </li>
                                <li class="text-gray-400 font-bold comic">
                                    <span class="">Matricule :</span>
                                    <span class="">{{ etudiant.matricule }} </span>
                                </li>
                                <li class="text-center text-gray-400 underline font-bold">
                                    Description de <span class="underline cursor-pointer text-blue-400">{{ etudiant.prenom}}</span>
                                </li>
                                <li class="indent-15">
                                    <span class="fas fa-note-sticky px-2"></span><span class="text-gray-600 font-bold">{{ etudiant.description }}</span>

                                </li>
                                {{ value }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5"></div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3"
const page = usePage()
const etudiant = page.props.persone
</script>
<script>
export default {
    data() {
        return {
        
        }
    },
    methods: {
        value:{
            
        }
    },
}
</script>