<script setup>

</script>
<template>
    <div>
        <div class="h-[450px] flex justify-center items-center">
            <div>
                <h3 class="font-bold text-gray-400 comic">Bienvenue sur <span class="underline"> It connect </span></h3>
                <div class="text-left">
                    <p class="text-blue-400 indent-8 py-1">
                        Cette site web a pour vous, etudiant <span class="underline"> It connect </span>, 
                        <ul class="px-5 space-y-3 py-2">
                            <li class="space-x-3">
                                <span class="fas fa-check-circle text-green-400"></span>
                                <span class="text-gray-400 font-bold">Apprende nouvelle techologie</span>
                            </li>
                            <li class="space-x-3">
                                <span class="fas fa-check-circle text-green-400"></span>
                                <span class="text-gray-400 font-bold">Developeur Web et Application</span>
                            </li>
                            <li class="space-x-3">
                                <span class="fas fa-check-circle text-green-400"></span>
                                <span class="text-gray-400 font-bold">Systeme et reseaux informatique </span>
                            </li>
                            <li class="space-x-3">
                                <span class="fas fa-check-circle text-green-400"></span>
                                <span class="text-gray-400 font-bold">Arduino et Robotique </span>
                            </li>
                            <li class="space-x-3">
                                <span class="fas fa-check-circle text-green-400"></span>
                                <span class="text-gray-400 font-bold">Alogarithe </span>
                            </li>
                        
                        </ul>
                    </p>
                    <div class="flex justify-center items-center space-x-4 py-4">
                        <Link 
                        class="border-2 border-blue-400 text-gray-400 font-bold px-2 py-1 hover:bg-gray-400 hover:text-white rounded-full">inscription</Link>
                        <Link 
                        class=" text-gray-400 font-bold py-2 px-4 hover:bg-gray-400 hover:text-white rounded-2xl">Plus</Link>
                    </div> 
                </div>
            </div>
        </div>
        <div class="py-4">
            <p class="text-blue-400 font-bold">
               
                
            </p>
        </div>
    </div>
</template>

<script>
import MainLayout from './MainLayout.vue';
export default {
    
}
</script>