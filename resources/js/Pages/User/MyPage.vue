<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="col-span-1 px-5 py-2">
                <div class="relative rounded-2xl">
                    <div class="bg-gray-200 px-4 h-[50px] rounded-t-xl"></div>
                    <div class="absolute right-4 top-4 overflow-visible">
                        <div class="flex justify-center">
                            <div>
                                <div class="flex justify-end">
                                    <i class="fas fa-user-circle fa-3x text-gray-400 "></i>
                                </div>
                                <div>
                                    <Link class="text-gray-600 hover:text-amber-200 font-bold comic">{{ pejy.nom }} </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-400 h-[50px] overflow-hidden">
                    </div>
                </div>
                <div class=" px-4">
                    <ul>
                        <li class="space-x-4 font-bold py-2 border-l-2 border-gray-400 border-b-2 px-10 rounded-bl-2xl">
                            <div>
                                <span class="underline comic text-slate-400">Slog</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-400">{{ pejy.slog }} </span>
                            </div>
                        </li>
                        <li class="space-x-4 font-bold py-2   border-r-2 border-gray-400 border-b-2 px-10  rounded-br-2xl">
                            <div class="py-4 space-x-4">
                                <span class="underline comic text-slate-400">Admin</span>
                                <Link class="text-gray-400 hover:text-amber-400">{{ pejy.admin.pseudo }} </Link>
                            </div>
                        </li>
                        <li class="space-x-4 font-bold py-2  border-l-2 border-gray-400 border-b-2 px-10 rounded-bl-2xl">
                            <div class="space-x-4">
                                <span class="underline comic text-slate-400">Page type</span>
                                <span class="text-sm text-gray-400">{{ pejy.type }} </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-end px-5 py-2 space-x-4" style="font-size:12px">
                    <span class="text-amber-200 comic font-bold" v-if="suiving[0].vous===true">Vous</span>
                    <span class="text-blue-400" v-if="suiving[0].nombre-1>0 && suiving.vous===true">et {{ suiving[0].nombre-1 }} persone</span>
                    <span class="comic text-gray-400" v-if="suiving[0].vous"> et {{ suiving[0].nombre-1 }}persone suivre cette page</span>
                    <p class="text-gray-400 font-bold" v-if="suiving[0].nombre>0">Suivre <span class="h-2 px-2 w-4 rounded-full bg-blue-200">{{ suiving[0].nombre }}</span></p>
                </div>
                <div class="px-5 py-2">
                    <div class="flex justify-end space-x-4 font-bold  px-4">
                        <Button v-if="pejy.admin.id !== admin.id"
                            class="px-2 py-1 rounded bg-gray-400 text-white hover:bg-white hover:text-gray-400">Contact <i
                                class="fas fa-phone"></i></Button>
                        <Button class="px-2 py-1 rounded text-sky-400   hover:bg-white hover:text-gray-400"
                            v-if="pejy.admin.id !== admin.id">Message <i class="fab fa-facebook-messenger"></i></Button>
                        <Button
                        @click.prevent="creer"
                         class="px-2 py-1 rounded text-amber-400 hover:bg-white hover:text-gray-400">Creer <i
                                class="fas fa-plus"></i></Button>
                    </div>
                </div>
                <div v-if="publica.length > 0" >
                    <div class="mt-8" v-for="pub in publica" :key="pub.id">
                        <div class="bg-gray-400 rounded-sm">
                            <div class="flex justify-between px-2 py-2 items-center">
                                <div class="font-bold space-x-4 text-white">
                                    <span class="fas fa-flag fa-lg"></span>
                                    <Link
                                    :href="route('mypage',pub.page.nom)"
                                     class="">{{ pub.page.nom }} </Link>
                                </div>
                                <div class="relative" >
                                    <button
                                    @click.prevent="hita(pub.id)"
                                     class="fas fa-list text-gray-800 hover:text-white"></button>
                                    <div class="absolute  right-0 w-28 bg-amber-200" v-if="menus && id===pub.id">
                                        <ul class="px-2 py-2 space-y-2">
                                            <li
                                            v-if="pub.admin.id===admin.id"
                                            @click.prevent="tsy(pub.id)" 
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
                            <div class="">
                            </div>
                        </div>
                        <div class="border-l-4 border-b-4 rounded-bl-2xl">
                            <div class="px-2 py-2">
                                <p class="text-gray-400 font-bold indent-4">{{ pub.titre }} </p>
                            </div>
                            <div class="px-2 py-2">
                                <p class="text-gray-400 font-bold indent-12 text-sm">{{ pub.description }} </p>
                            </div>
                            <div v-if="pub.image">
                                <img :src="pub.image.image_page" class="overflow-hidden rounded-bl-2xl" alt="">
                            </div>
                        </div>
                        <div class="border-b-3 border-gray-400 border-r-2  rounded-br-2xl">
                        <div class="flex py-2 px-4 justify-end items-center space-x-4">
                            <Button class="text-blue-400 font-bold hover:text-gray-400">
                                message <i class="fab fa-facebook-messenger"></i>
                            </Button>
                            <Button class="text-sky-400 font-bold hover:text-gray-400"
                            @click.prevent="comit(pub.id) ">
                                Commente <i class="fab fa-twitch"></i>
                            </Button>
                            <Button
                            @click.prevent="suivre(pub.page.id)"
                             class="text-amber-400 font-bold hover:text-gray-400">
                                <span class="" v-if="suiving[0].vous">déja <i class="fas fa-bell"></i> </span>
                                <span class="" v-else>suivre <i class="fas fa-bell-slash"></i> </span>
                            </Button>
                        </div>
                        <div class="py-2 px-4" v-if="com && id===pub.id">
                            <div class="grid grid-cols-12">
                                <form @submit.prevent="comment">
                                    <div class="relative">
                                        <input type="text" class="input indent-20 h-8 w-[320px]"
                                        placeholder="entre votre commentaire">
                                        <button class="px-2 py-1 bg-gray-400 rounded-sm absolute -top-1  -translate-x-[14px] h-8 translate-y-1 rounded-r-2xl">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                        <div class="absolute top-0 left-4">
                                            <ul class="" style="font-size: 10px;">
                                                <li class="text-gray-400 font-bold">
                                                    {{ admin.pseudo }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div v-else>
                    <div class="h-[250px] bg-gray-200 px-2 py-2 rounded-md flex justify-center items-center">
                        <div>
                            <p class="text-gray-600 font-bold">Aucun publication sur {{ pejy.nom }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-span-1">
                <div class="px-4 py-4">
                    <div class="bg-gray-200 rounded relative" v-if="menu">
                        <div class="flex justify-end px-2">
                            <button
                            @click.prevent="close"
                             class="fas fa-window-close fa-2x"></button>
                        </div>
                        <div class="py-2 text-center">
                            <p class="text-gray-400 font-bold">entre votre publication</p>
                        </div>
                        <div class="px-5 py-2">
                            <form @submit.prevent="registre" class="space-y-3">
                                <div class="relative">
                                    <input type="text" class="input bg-gray-300" v-model="form.titre"
                                        placeholder="entre titre votre annonce">
                                    <i class="fas fa-notes-medical absolute top-2 left-3 text-gray-400"></i>
                                    <div v-if="errors.titre">
                                        <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.titre }} </p>
                                    </div>
                                </div>
                                <div class="flex justify-end px-2 py-2">
                                    <input type="file" @input="form.avatar = $event.target.files[0]" name="file" id="file"
                                        accept="image/*">
                                </div>
                                <div v-if="errors.avatar">
                                    <p class="indent-4 text-red-500 font-bold text-sm">{{
                                        errors.avatar.replace("avatar", "image") }} </p>
                                </div>
                                <div>
                                </div>
                                <div>
                                    <div v-if="form.progress" class="h-2 rounded-full bg-black"
                                        style="width:{{ form.pregress.percentage }}%;"></div>
                                </div>
                                <div class="">
                                    <p class="text-gray-400 font-bold">votre description</p>
                                    <textarea v-model="form.description" name="" id="" cols="10" rows="10"
                                        class="bg-gray-300 rounded h-20 w-full"></textarea>
                                    <div v-if="errors.description">
                                        <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.description }} </p>
                                    </div>
                                </div>
                                <div class="flex justify-end px-2 py-2">
                                    <button type="submit"
                                        class="px-2 py-1 bg-gray-400 text-white font-bold hover:bg-gray-600 rounded ring-offset-black outline-fuchsia-700">Enregistre</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3'; 
import { router } from '@inertiajs/vue3';
import { computed } from "vue"
import { onMounted } from 'vue';
defineProps({errors:Object})
const page = usePage();
const pejy = page.props.mypage
const admin = page.props.user
const suiving = computed(()=>{
    const pejy = page.props.mypage.suivre
    let admin = page.props.user
    let donne = [];
    let vrai = pejy.find(item=>item.admin_id===admin.id);
    if(pejy.length>0 && !vrai)
    {
        donne.push({vous:false,nombre:pejy.length})
    }
    else if(pejy.length>0 && pejy)
    {
        donne.push({vous:true,nombre:pejy.length})
    }
    else{
        donne.push({nombre:0,vous:false})
    }
    return donne;
    
})
const publica = computed(()=>{
    const page = usePage()
    const usering = page.props.user
    const mapage=page.props.mypage
    const menu = [];
    const repre = [];
    let factory =  page.props.pub;


    factory.forEach(element => {
      
        menu.push(element);
       
    });

    return menu
})
const form = useForm({
    titre:"",
    description:"",
    id:pejy.id,
    admin:admin.id,
    avatar:null
})
function registre()
{
    router.post(route('pagepub'),form);
}
</script>
<script>
import { usePage } from '@inertiajs/vue3';
export default {
    data() {
        return {
            menu: false,
            com:false,
            id:null,
            menus:false
        }
    },
    methods: {
        suivre(id)
        {
            const page = usePage();
            const admin = page.props.user.id;
            this.$inertia.post(route('abonne'),{
                page_id : id,
                admin : admin
            });
        },
        creer()
        {
            this.menu=true
        },
        comit(id)
        {
            this.id=id
            this.com=!this.com
           
        },  
        close()
        {
            this.menu=false
        },
        hita(id)
        {
            this.id=id
            this.menus=!this.menus
        },
        tsy(id)
        {
            const page = usePage()
            const mypages = page.props.mypage
            const pagine = page.props.pub.find(item=>item.id===id);
            const envoyer = this.$inertia.post(route('supprime'),{
                id:id,
                nom:mypages.nom,
                image:pagine.image?pagine.image.image_page:null
            });
            this.menus=false;
        }
    },
}
</script>