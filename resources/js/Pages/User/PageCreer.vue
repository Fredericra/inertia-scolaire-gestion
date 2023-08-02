<template>
    <div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2">
            <div class="col-span-1">
                <div class="py-4 px-5">
                    <div class="px-4 py-4">
                    <div class="bg-gray-200 rounded relative">
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
            <div class="col-span-1"></div>
        </div>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3"
import { computed } from "vue"
import { router } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
const page = usePage()
const id =page.props.page
defineProps({errors:Object})
const form =useForm({
    titre:"",
    description:"",
    avatar:null,

})
function registre()
{
    router.post(route('pagepub'))
    titre.value=""
    description.value=""
    avatar.value=null
}
</script>