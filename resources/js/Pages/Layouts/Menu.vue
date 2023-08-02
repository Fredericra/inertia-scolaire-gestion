<template>
    <div class="relative">
        <div class="px-4 py-1 media bg-gradient-to-r to-gray-400 from-amber-200 shadow-sm hover:shadow-lg rounded-b-lg sticky top-0 z-20 about">
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
               
                <div class="col-span-5 flex justify-between items-center px-4 menu">
                    <Link :href="route('compte')"
                        class="text-gray-600 hover:text-amber-400 font-bold comic">
                        <i class="fas fa-house-user fa-lg"></i>
                    </Link>
                    <Link
                        class="text-gray-600 hover:text-amber-400 font-bold comic">
                        <i class="fab fa-facebook-messenger fa-lg"></i>
                    </Link>
                    <Link
                    :href="route('tous')"
                        class="text-gray-600 hover:text-amber-400 font-bold comic">
                        <i class="fas fa-laptop-code fa-lg"></i>
                        <i class="fas space-x-2">{{ pages.length }} </i>
                    </Link>
                    <Link
                        :href="route('notif')"
                        class="text-gray-600 hover:text-amber-400 font-bold comic">
                        <i class="fas fa-calendar-plus fa-lg"></i>
                        <i class="fas">{{ notes.length }} </i>
                    </Link>
                    <Link
                        class="text-gray-600 hover:text-amber-400 font-bold comic">
                        <i class="fas fa-bell fa-lg"></i>
                    </Link>
                </div>
                <div class="col-span-7 flex sm:justify-center md:justify-end search">
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
                        <div :class="menus?'':'hidden'" class="w-[220px] px-2 py-2 absolute top-12 grad rounded" v-else>
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
                    <Link class="underline text-gray-800 hover:text-sky-800 px-2 font-bold">#{{ user.pseudo }} </Link>
                    <div class="relative">
                        <i
                        @click.prevent="presque" 
                        class="fas fa-user-circle fa-2x cursor-pointer text-gray-600 hover:text-amber-400"></i>
                        <span class="h-4 w-4 rounded-full bg-green-400 absolute left-5 -top-1"></span>
                        <div
                        :class="bien?'':'hidden'"
                         class="w-[150px] absolute top-10 -right-2 grad rounded-sm shadow-md hover:shadow-lg">
                            <ul class="space-y-3 px-4 py-1">
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('inscrire')" class="flex justify-between items-center">
                                        <span>{{ user.email }} </span>
                                        <span class="fas fa-envelope"></span>
                                    </Link>
                                </li>
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('connexion')" class="flex justify-between items-center">
                                        <span>Parametre</span>
                                        <span class="fas fa-cog"></span>
                                    </Link>
                                </li>
                                <li class="text-gray-600 hover:text-amber-400 font-bold comic">
                                    <Link :href="route('sortie',user.id)" class="flex justify-between items-center">
                                        <span>Sortie</span>
                                        <span class="fas fa-signs-post"></span>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="media">
        <div class="col-span-4 py-4">
            <div class="px-20 tache">
                <div class="grad rounded px-2 py-2">
                    <div class="flex justify-between px-2 text-white">
                        <div>
                            <p class=" font-bold"> tache <Link class="text-blue-400 underline text-sm px-4"> {{ user.pseudo }}</Link> </p>
                        </div>
                        <div>
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                    <div class="px-8 py-1">
                        <hr>
                    </div>
                    <div class="flex justify-center items-center h-[120px] relative">
                        <div class="text-center">
                            <i class="fas fa-user-circle fa-4x text-white"></i>
                           <p class="text-gray-400 font-bold hover:text-sky-400"><Link>#{{ user.pseudo }}</Link></p>
                            <form class="absolute top-14 left-36">
                                <input type="file" name="file" id="file" class="hidden">
                                <label for="file">
                                    <i class="fas fa-edit fa-lg text-gray-400 cursor-pointer"></i>
                                </label>
                            </form>
                        </div>
                        
                    </div>
                    <div class="flex justify-end px-2 items-center py-2">
                        <button
                        @click.prevent="modul" 
                        class="text-gray-600 font-bold comic items-center"><span v-if="modal">ferme</span> <span v-else>plus</span> <i  :class="modal?'fas fa-angle-up':'fas fa-angle-down'"></i></button>
                    </div>
                    <div class="py-2 px-4 comic" v-if="modal">
                        <div class="py-2 flex justify-center i">
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link
                            :href="route('post')"
                             class="font-bold ">Creer nouveaux post</Link>
                            <i class="fas fa-blog relative">
                            </i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Membre</Link>
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Annonce</Link>
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link
                            :href="route('page')"
                             class="font-bold ">Page</Link>
                            <i class="fas fa-flag"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Groupe</Link>
                            <i class="fas fa-user-group"></i>
                        </div>
                        <div class="flex justify-between text-gray-600 hover:text-amber-400 items-center py-2">
                            <Link class="font-bold ">Mes donne</Link>
                            <i class="fas fa-user-lock"></i>
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
import { usePage } from "@inertiajs/vue3"
const page = usePage()
const user = page.props.user;
const notes = page.props.note
const pages = page.props.paging
</script>
<script>
import { usePage } from "@inertiajs/vue3"
export default {
    data() {
        return {
            bien:false,
            search:"",
            menus:false,
            resultat:[],
            modal:false
        }
    },
    props:{
        etude:{
            type:Object,
            require:true
        },
    },
    methods: {
        modul(){
            this.modal=!this.modal
        },
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
