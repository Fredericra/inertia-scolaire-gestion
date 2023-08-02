<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from "vue"
const page =usePage()
const admin =page.props.user
const notifs =computed(()=>{
    const ad = page.props.user
    const menu = []
    const user =   page.props.notif.length>0?page.props.notif:[];
    user.forEach(element => {
        element.favoris.forEach(fav=>{
            if(element.id===fav.notif_id && fav.suivre===1)
            {
                element = {...element,bell:true,nombre:element.favoris.filter(item=>item.notif_id===element.id && item.suivre===1).length}
            }
            else  {
                element = {...element,bell:false}
            }
        });
        const reg = []
        element = { ...element,reg}
        for (let plus = 0; plus < element.description.length; plus++) {
            
           setInterval(()=>{
                reg.push(element.description[plus]);
            },1000,true)
            
           
        }
        console.log(menu)
        return menu.push(element);
   });

  return menu.length>0?menu:[];
   
   
})

</script>
<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="px-2 py-4" >
              
                <div class="" v-if="notifs.length>0"  v-for="notif in notifs" :key="notif.id">
                    
                    <div class="bg-gray-400 rounded-t-md rounded-bl-2xl  rounded-b-2xl py-2 px-4 mt-2">
                        <div class="flex justify-between space-x-2 text-gray-800 font-bold hover:text-amber-300">
                            <div class="flex  space-x-2">
                                <div class="">
                                    <i class="fas fa-user-circle fa-lg"></i>
                                </div>
                                <div class="">
                                    <Link>
                                    <span>{{ notif.admins.pseudo }} </span>
                                    </Link>
                                </div>
                            </div>
                            <div class="relative z-10" >
                                    <button
                                    @click.prevent="hita(notif.id)"
                                     class="fas fa-list text-gray-800 hover:text-white"></button>
                                    <div class="absolute  right-0 w-28 bg-amber-200" v-if="menus && menu===notif.id">
                                        <ul class="px-2 py-2 space-y-2">
                                            <li
                                            v-if="notif.admins.id===admin.id"
                                            @click.prevent="tsy(notif.id)" 
                                            class="flex justify-between items-center text-sm font-bold text-gray-400 hover:text-gray-600 cursor-pointer">
                                                <button>Efface</button>
                                                <i class="fas fa-trash fa-sm"></i>
                                            </li>
                                            <li class="flex justify-between items-center text-sm font-bold text-gray-400 hover:text-gray-600 cursor-pointer">
                                                <button>Copie</button>
                                                <i class="fas fa-bookmark fa-sm"></i>
                                            </li>
                                            <li class="flex justify-between items-center text-sm font-bold text-gray-400 hover:text-gray-600 cursor-pointer">
                                                <button>Partage</button>
                                                <i class="fas fa-share fa-sm"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="border-l-2  border-b-2 rounded-bl-2xl -z-10  border-gray-400 translate-x-10">
                        <p class="text-gray-400 px-8 py-2 font-bold">
                            <span class="fab fa-autoprefixer"></span>
                            {{ notif.titre.replace("it","informatique") }}
                        </p>
                        <p class="py-2 px-10 indent-8 text-sm font-bold text-slate-400" >
                            {{ notif.description }}
                        </p>
                        <div class="">
                            <img :src="notif.image.image" class="rounded-tr-2xl" :alt="notif.image.image">
                        </div>
                    </div>
                    <div class="border-b-2 border-gray-400 border-r-2 translate-x-10 rounded-br-2xl">
                        <div class="flex py-2 px-4 justify-end items-center space-x-4">
                            <Button class="text-blue-400 font-bold hover:text-gray-400">
                                message <i class="fab fa-facebook-messenger"></i>
                            </Button>
                            <Button class="text-sky-400 font-bold hover:text-gray-400"
                            @click.prevent="comit(notif.id) ">
                                Commente <i class="fab fa-twitch"></i>
                            </Button>
                            {{  }}
                            <Button
                            @click.prevent="suivre(notif.id)"
                             class="text-amber-400 font-bold hover:text-gray-400">
                              <span>suivre <i :class="notif.bell ?'fa-bell':'fa-bell-slash'"  class="fas"></i></span>  
                            </Button>
                        </div>
                        <div class="py-2 px-4" v-if="com" :class="id===notif.id?'':'hidden'">
                            <div class="grid grid-cols-12">
                                <form @submit.prevent="comment(notif.id)">
                                    <div class="relative">
                                        <input
                                        v-model="commenting" 
                                        type="text" class="input indent-20 h-8 w-[320px]"
                                        placeholder="entre votre commentaire">
                                        <button type="submit" @click.prevent="envoyer(notif.id)" class="px-2 py-1 bg-gray-400 rounded-sm absolute -top-1  -translate-x-[14px] h-8 translate-y-1 rounded-r-2xl">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                        <div class="absolute top-0 left-4">
                                            <ul class="" style="font-size: 10px;">
                                                <li class="text-gray-400 font-bold">
                                                    {{ notif.admins.pseudo }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="" v-for="value in notif.commentaire" :key="value.id">
                                    <div class="bg-gray-200 mt-4 rounded-xl">
                                        <div class="grid grid-cols-12 px-2 py-1">
                                            <div class="col-span-3" style="font-size: 14px;">
                                            <ul class="">
                                                <Link class="text-gray-600 hover:text-amber-400">
                                                <li class="">
                                                    <span class="fas fa-user-circle"></span>
                                                </li>
                                                <li>
                                                    {{ value.commentaire_page }}
                                                </li>
                                                </Link>
                                            </ul>
                                            </div>
                                            <div class="col-span-7">
                                                <p class="indent-8 font-bold" style="font-size: 14px;">{{ value.commentaire }} </p>
                                            </div>
                                            <div class="col-span-2 flex text-right space-x-2 items-end -px-4 py-1">
                                                <button
                                                v-if="value.admin_id===admin.id"
                                                @click.prevent="supprimer(value.id) "
                                                 class="fas fa-window-close text-gray-400 hover:text-amber-400"></button>
                                                <button
                                                v-if="value.admin_id===admin.id"
                                                 class="fas fa-edit text-gray-400 hover:text-amber-400"></button>
                                                <button class="fas fa-heart text-gray-400 hover:text-amber-400"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center h-[320px] bg-gray-200 rounded-lg" v-else>
                <div class="w-320px">
                    <p class="text-center font-bold text-gray-400">Aucun de notification pour vous</p>
                </div>
            </div>
            </div>
            
            <div></div>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2';
import { usePage } from '@inertiajs/vue3';
import { Container, comment } from 'postcss';
export default {
    data() {
        return {
            com:false,
            cle:"",
            option:false,
            menus:false,
            menu:null,
            commenting:""
        }
    },
    mounted() {
    },
    methods: {
        supprimer(id)
        {
            this.$inertia.post(route('delete'),{
                id:id
            });

            this.com=true
            Swal.fire({
                title:"suppresion effectue",
                timerProgressBar:true,
                position:"top-end",
                toast:true,
                timer:2000,
                showConfirmButton:false,
                icon:"success"
            })
        },
        envoyer(id)
        {
            const page = usePage()
            const admin = page.props.user
            this.$inertia.post(route("commente"),{
                comment:this.commenting,
                admin:admin.id,
                id:id
            });
            this.commenting="";
            this.com=true
        },
        tsy(id)
        {
            const page = usePage()
            const note = page.props.notif
            const image = page.props.image
            const resultat = image.find(item=>item.notifs_id===id)
            console.log(resultat);
             this.$inertia.post(route('annuler'),{
                 id:id,
                 image:resultat.image
             })
        },
        comit(id){
            this.com=!this.com
            this.id=id
           
        },
        hita(id)
        {
            this.menus=!this.menus
            this.menu=id
        },
        suivre(id)
        {
           const page = usePage();
           let key =null
           const user=page.props.user.id;
           const notif = page.props.notif;
           const resultat = notif.filter(item=>item.id===id)
           resultat.forEach(element => {
                let bien = element.favoris.find(item=>item.notif_id===id && item.admin_id===user);
                return  key = bien?bien.suivre:true
           });
            this.$inertia.post(route('suivre'),{
                admin:user,
                id:id,
                suivre:key
            });
        }
    },

}
</script>
