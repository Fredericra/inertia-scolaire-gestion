<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="col-span-1 mt-4 px-5">
                <div class="py-2 px-2 bg-gray-400 text-center">
                    <p class="font-bold text-white">Liste Page pour Cours</p>
                </div>
                <div class="px-4 py-4 space-y-4">
                    <div v-for="cours in cour" :key="cours.id" class="">
                        <div class="px-2 py-2 bg-gray-200">
                            <div class="flex justify-between items-center" >
                                <Link :href="route('mypage',cours.nom)" class="space-x-3 text-amber-400 font-bold hover:text-white">
                                    <span class="fas fa-flag"></span>
                                    <span class="">{{ cours.nom }} </span>
                                </Link>
                                <div>
                                    <span class="fas fa-bell space-x-4 text-slate-400"></span>
                                    <span class="">{{ cours.suivre.length }} </span>
                                </div>
                            </div>
                            <ul class="px-4 py-2">
                                <li class="space-x-4 font-bold text-gray-400">
                                    <span class="">CREATEUR</span>
                                    <span class="">{{ cours.admin.pseudo }} </span>
                                </li>
                                <li class="space-x-4 font-bold text-gray-400">
                                    <span class="">Slog</span>
                                    <span class="underline">{{ cours.slog }} </span>
                                </li>
                                <li class="space-x-4 font-bold text-gray-400">
                                    <span class="">Description</span>
                                    <span class="text-sm serif">{{ cours.description }} </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const page = usePage()
const cour = computed(()=>{
    const cours =  page.props.cours 
    const donne = [];
    const admins = page.props.admin
    cours.forEach(element => {
        admins.forEach(item => {
            if(element.admin_id===item.id)
            {
                element = {...element,item}
                donne.push(element)
            }
        });
    });
    console.log(donne)
    return donne;
}) 
</script>
<script>
import Page from "./Page.vue"
import Notif from './Notif.vue';
export default {
    component:{
        Notif,Page
    }
}
</script>