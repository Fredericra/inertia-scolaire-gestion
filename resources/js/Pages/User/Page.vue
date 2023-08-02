<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="py-10 px-5">
                <div class="rounded-md bg-gray-50 shadow-md hover:shadow-lg">
                    <div class="flex justify-center">
                        <p class="text-gray-400 font-bold ">creer votre page <Link class="text-blue-400 underline">{{ admin.pseudo }} </Link></p>
                    </div>
                    <div class="px-2 py-2">
                        <form @submit.prevent="creer" class="space-y-5 px-5">
                            <div v-if="errors.type">
                            <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.type.replace("type","votre type page") }} </p>
                            </div>
                            <div class="flex justify-end px-2 py-2">
                                <span class="font-bold text-gray-400">Type page</span>
                                <select v-model="form.type">
                                    <option value="">....</option>
                                    <option value="cours">Cours</option>
                                    <option value="annonce">Annonce</option>
                                    <option value="annonce">Autre</option>
                                </select>
                            </div>
                           
                            <div class="relative mt-2">
                                <input type="text" v-model="form.nom"
                                placeholder="entre votre nom page"
                                class="input">
                                <i class="fas fab fa-accusoft top-3 left-3 text-gray-400 absolute"></i>
                                <div v-if="errors.nom">
                                <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.nom.replace("nom","nom du page") }} </p>
                                </div>
                            </div>
                            <div class="relative mt-2">
                                <input type="text" v-model="form.slog"
                                placeholder="entre votre slog de votre page"
                                class="input">
                                <i class="fas fab fa-atlassian top-3 left-3 text-gray-400 absolute"></i>
                                <div v-if="errors.slog">
                                <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.slog }} </p>
                                </div>
                            </div>
                           
                            <div class="relative mt-2">
                                <textarea name="" id="" cols="30" rows="10" 
                                class="h-20 rounded bg-gray-300"
                                placeholder="entre votre description"
                                v-model="form.description"></textarea>
                                <div v-if="errors.description">
                                <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.description }} </p>
                                </div>
                            </div>
                            <div class="px-4">
                                <label for="">
                                    <input type="checkbox" name="" id=""> <Link>j'accepter</Link>
                                </label>
                            </div>
                            <div class="mb-4 flex justify-end">
                                <button class="px-2 py-1 rounded font-bold text-gray-400 bg-white hover:text-white hover:bg-gray-400">Creer <i class="fas fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="py-4 px-4">
                    <div class="bg-gray-400 rounded-b-2xl rounded-t-sm ">
                        <div class="flex justify-between py-1 items-center px-8">
                            <p class="text-gray-6 font-bold">Votre page</p>
                        <p class="text-gray-6 font-bold fas fa-flag"></p>
                        </div>
                    </div>
                    <div class="translate-x-2 -translate-y-2 px-8 overflow-hidden border-l-4 border-b-4 rounded-bl-2xl border-gray-400">
                            <div class="px-4 py-1">
                                <p class="text-amber-400 font-bold">vous avez {{ recon.length }} page </p>
                            </div>
                            <div class=" px-4 py-2" v-if="recon.length>0">
                                <div class="" v-for="value in recon" :key="value.id">
                                    <Link :href="route('mypage',value.nom)">
                                   <div
                                    class="bg-gray-200 px-2 py-2 mt-4 relative">
                                        <button
                                        @click.prevent="efface(value.id)"
                                         class="fas fa-window-close text-gray-800 hover:text-amber-400 absolute -top-2 right-0"></button>
                                        <div class="flex justify-between px-2">
                                            <div class="text-sm font-bold space-x-2 text-gray-600">
                                                <span class="fas fa-flag"></span>
                                                <span>{{ value.nom }} </span>
                                            </div>
                                        </div>
                                        <div>
                                            <ul>
                                                <li class="flex justify-end px-2 space-x-2 font-bold text-gray-400">
                                                    <span>Type</span>
                                                    <span class="underline">{{ value.type }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                   </div>
                                    </Link>
                                </div>
                            </div>
                            <div class="py-4 mb-4 px-4 h-[150px] flex justify-center items-center bg-gray-200 rounded" v-else>
                                <div class="">
                                    <p class="text-gray-400 font-bold">vous n'avez aucun page</p>
                                </div>
                            </div>
                    </div>
                    <!-- page regenerate -->
                    <div class="bg-gray-400 rounded-b-2xl rounded-t-sm mt-5">
                        <div class="flex justify-between py-1 items-center px-8">
                            <p class="text-gray-6 font-bold">Suggestion page</p>
                        <p class="text-gray-6 font-bold fas fa-flag"></p>
                        </div>
                    </div>
                    <div class=" -translate-y-3 translate-x-2  px-20 px-8 overflow-hidden border-l-4 border-b-4 rounded-bl-2xl border-gray-400">
                            <div class="px-4 py-1">
                                <p class="text-amber-400 font-bold">vous avez {{ suggest.length }} page </p>
                            </div>
                            <div class=" px-4 py-2" v-if="suggest.length>0">
                                <div class="" v-for="value in suggest" :key="value.id">
                                    <Link :href="route('mypage',value.nom)">
                                   <div
                                    class="bg-gray-200 px-2 py-2 mt-4 relative">
                    
                                        <div class="flex justify-between px-2">
                                            <div class="text-sm font-bold space-x-2 text-gray-600">
                                                <span class="fas fa-flag"></span>
                                                <span>{{ value.nom }} </span>
                                            </div>
                                        </div>
                                        <div>
                                            <ul>
                                                <li class="flex justify-end px-2 space-x-2 font-bold text-gray-400">
                                                    <span>Type</span>
                                                    <span class="underline">{{ value.type }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                   </div>
                                    </Link>
                                </div>
                            </div>
                            <div class="py-4 mb-4 px-4 h-[150px] flex justify-center items-center bg-gray-200 rounded" v-else>
                                <div class="">
                                    <p class="text-gray-400 font-bold">vous n'avez aucun page</p>
                                </div>
                            </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<script setup>
import { usePage } from '@inertiajs/vue3';
import { reactive } from "vue"
import { router } from '@inertiajs/vue3';
import { computed } from 'vue';
defineProps({errors:Object})
const page = usePage()
const admin = page.props.user
const recon =computed(()=>{
    return page.props.page
})
const suggest = computed(()=>{
    return page.props.suggest
})
const form =reactive({
    type : "",
    nom  :"",
    slog :"",
    description:"",
    user:admin.id
})
function creer()
{
    router.post(route('pages'),form)
    
}
function efface(id)
{
    router.get(route('efface',id))
}

</script>