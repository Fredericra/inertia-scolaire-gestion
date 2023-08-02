<template>
    <div class="relative">
        <div class="px-4 py-1 media grad shadow-sm hover:shadow-lg rounded-b-lg sticky top-0 z-20 about">
            <div class="col-span-2">
                <h3 class="reg font-bold text-white">
                    <span class="text-blue-400 comic bg-white rounded-tr-2xl px-2 py-1 rounded-bl-2xl">
                        <span>I</span>
                        <span>t</span>
                    </span>
                    <span class="text-lg text-gray-400 font-bold serif underline">connect</span>
                </h3>
            </div>
            <div class="col-span-8 grid sm:grid-cols-1 md:grid-cols-12">
               
                <div class="col-span-7 flex justify-between items-center px-4 menu1">
                    <Link
                    :href="route('home')" 
                    class="text-gray-600 hover:text-amber-400 font-bold comic a">Acceuil</Link>
                    <Link
                    :href="route('etude')"
                     class="text-gray-600 hover:text-amber-400 font-bold comic b">Etudiant</Link>
                    <Link class="text-gray-600 hover:text-amber-400 font-bold comic">Notification</Link>
                    <Link
                    :href="route('about')"
                     class="text-gray-600 hover:text-amber-400 font-bold comic c">About</Link>
                </div>
                <div class="col-span-5 flex sm:justify-center md:justify-end search">
                    <form @submit.prevent="mitady" class="relative" :class="route().current('persone')?'hidden':''">
                        <input type="text"
                        @input="searching"
                        v-model="search"
                        placeholder="searching.."
                        class="bg-gray-200 rounded-full indent-8 h-8 text-gray-400 font-bold"
                        >
                        <i class="fas fa-search top-2 left-2 absolute text-gray-300 font-bold"></i>
                        <div class="w-[320px] px-2 py-2 absolute top-12 grad rounded" v-if="resultat.length>0">
                            <div class="flex justify-end px-2">
                                <i
                                @click.prevent="ferme" 
                                class="fas fa-window-close text-gray-400 cursor-pointer"></i>
                            </div>
                            <div class="px-2 h-[420px] overflow-hidden overflow-y-auto y" >
                                <p class="py-2 text-blue-400 font-bold space-x-2" v-for="resultats in resultat" :key="resultats.id">
                                    <Link
                                    @click.prevent="link"
                                     :href="route('persone',resultats.email)" class="space-x-4">
                                        <span class="fas fa-user"></span>
                                    <span class="underline">{{ resultats.nom }} </span>
                                    <span class="">{{ resultats.prenom }} </span>
                                    </Link>
                                    

                                </p>
                            </div>
                        </div>
                        <div :class="menus?'':'hidden'" class="w-[220px] px-2 py-2 absolute top-12 grad rounded " v-else>
                            <div class="flex justify-end px-2">
                                <i
                                @click.prevent="ferme" 
                                class="fas fa-window-close text-gray-400 cursor-pointer"></i>
                            </div>
                            <div class="h-4 flex justify-center items-center">
                                <p class="text-gray-400 font-bold">Aucun trouvée</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-span-2 user">
                <div class="flex justify-end items-center px-4">
                    <div class="relative">
                        <i
                        @click.prevent="presque" 
                        class="fas fa-user-circle fa-2x cursor-pointer text-gray-600 hover:text-amber-400"></i>
                        <div
                        :class="bien?'':'hidden'"
                         class="w-[150px] absolute top-10 -right-2 grad rounded-sm shadow-md hover:shadow-lg">
                            <ul class="space-y-3 px-4 py-1">
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('inscrire')">Inscrire</Link>
                                </li>
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('connexion')">Connexion</Link>
                                </li>
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('admin')">Admin</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="media">
        <div class="col-span-4 ">
            <div class="px-20 py-4">
                <div class="grad rounded px-2 py-2">
                    <div class="flex justify-between px-2 text-white">
                        <div>
                            <p class=" font-bold">Notification It</p>
                        </div>
                        <div>
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                    <div class="px-8 py-1">
                        <hr>
                    </div>
                    <div class="py-2 px-4 comic">
                        <div class="py-2 flex justify-center">
                            <p class="font-bold text-gray-400">2023 - 2024 </p>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Examen pour semestre</Link>
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Filiere pour nouveaux</Link>
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Demande stage</Link>
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Nouvelle sur nous</Link>
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Notre oportunite</Link>
                            <i class="fas fa-award"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-8" :class="menus?'hidden':''">
            
            <slot></slot>
        </div>
       </div>
    </div>
</template>
<script setup>
</script>
<script>
import { usePage } from "@inertiajs/vue3"
export default {
    data() {
        return {
            bien:false,
            search:"",
            menus:false,
            resultat:[]
        }
    },
    props:{
        etude:{
            type:Object,
            require:true
        }
    },
    methods: {
        presque()
        {
            this.bien=!this.bien
            if(this.bien) this.menus=false

        },
        ferme()
        {
            this.resultat=[]
            this.search=""
            this.menus=false
        },
        link()
        {
            this.resultat=[]
            this.search="   "
            this.menus=false
        },
        searching()
        {
            const page = usePage()
            const regex =RegExp(this.search.toLowerCase())
            if(this.search.length>0)
            {
                this.resultat = page.props.etude.filter(item=>regex.test(item.nom.toLowerCase()))
                this.menus = true
                this.bien=false
            }
            else{
                this.menus=false
            return this.resultat=[]
        }
        }
    },
}
</script>