<template>
    <div>
        <div class="media">
            <div class="col-span-6 px-2 mt-10">
                <div class="mx-4 bg-gray-200 rounded px-10 py-4">
                    <div class="flex justify-between items-center font-bold comic text-sm"><h3 class="text-gray-400">{{ user.pseudo }} </h3> <span class="fas fa-user-circle fa-2x text-gray-400"></span></div>
                    <hr class="px-2 py-2">
                    <div class="flex justify-center"><h3 class="text-gray-400">Creer annonce </h3></div>
                    <div class="px-2 py-2">
                        <form @submit.prevent="registre" class="space-y-3">
                            
                            <div class="relative">
                                <input type="text" class="input bg-gray-300"
                                v-model="form.titre"
                                placeholder="entre titre votre annonce">
                                <i class="fas fa-notes-medical absolute top-2 left-3 text-gray-400"></i>
                                <div v-if="errors.titre">
                                    <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.titre }} </p>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="text" class="input bg-gray-300"
                                v-model="form.recupe"
                                @input="tous"
                                placeholder="entre votre mention">
                                <i class="fas fa-notes-medical absolute top-2 left-3 text-gray-400"></i>
                                <div v-if="errors.recupe">
                                    <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.recupe.replace("recupe","votre mention") }} </p>
                                </div>
                            </div>
                            <div class="flex justify-end px-2 py-2">
                                <input type="file" 
                                @input="form.avatar = $event.target.files[0]"
                                 name="file" id="file" accept="image/*">
                            </div>
                            <div v-if="errors.avatar">
                                    <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.avatar.replace("avatar","image") }} </p>
                            </div>
                            <div>
                            </div>
                            <div>
                                <div v-if="form.progress" class="h-2 rounded-full bg-black" style="width:{{ form.pregress.percentage }}%;"></div>
                            </div>
                            <div class="">
                                <p class="text-gray-400 font-bold">votre description</p>
                                <textarea
                                v-model="form.description"
                                 name="" id="" cols="10" rows="10" class="bg-gray-300 rounded h-20 w-full"></textarea>
                                 <div v-if="errors.description">
                                    <p class="indent-4 text-red-500 font-bold text-sm">{{ errors.description }} </p>
                                </div>
                            </div>
                            <div class="flex justify-end px-2 py-2">
                                <button type="submit" class="px-2 py-1 bg-gray-400 text-white font-bold hover:bg-gray-600 rounded ring-offset-black outline-fuchsia-700">Enregistre</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-span-6"></div>
        </div>
    </div>
</template>
<script setup>
import { router } from "@inertiajs/vue3"
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2"; 
import { usePage } from "@inertiajs/vue3"
defineProps({errors:Object})

const form = useForm({
    titre:"",
    recupe:"",
    avatar:null,
    description:""
})
function registre()
{
   
    form.post(route('store.post'));
   
}
const page = usePage()
const user = page.props.user
</script>
<script>
export default {
    methods: {
        tous()
        {

        }
    },
    data() {
        return {
            recupe:""
        }
    },
}
</script>