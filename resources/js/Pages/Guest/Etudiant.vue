<script setup>
defineProps({
    un:Object,
    deux:Object,
    trois:Object,
    quatre:Object,
    cinq:Object
})
</script>
<template>
    <div class="py-4">
        <div class="px-4 h-[250px] overflow-hidden overflow-y-auto y">
            <div class="bg-gray-400 px-4 py-2 rounded-b-2xl sticky top-0">
                <p class="text-white font-bold flex justify-between">
                  <span>Etudiant premiere année IT</span>
                  <span class="comic">{{ un.length }} etudiant </span>
                </p>
            </div>
            <div class="px-10">
                <div class="border-l-2 border-b-2 rounded-bl-2xl  border-amber-400 px-4">
                    <div class="py-3" v-for="uns in un" :key="uns.id">
                        <Link :href="route('persone',uns.email)" class="flex justify-between items-center">
                            <p>
                            <span class="text-gray-400 font-bold space-x-5">
                            <span class="fas fa-user"></span>
                            <span>{{ uns.nom }} </span>
                            <span>{{ uns.prenom }} </span>
                            </span>
                            </p>
                            <p class="text-blue-400 underline" v-if="uns.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></p>
                            <p class="text-yellow-400 underline" v-else-if="uns.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></p>
                            <p class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></p>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 h-[250px] overflow-hidden overflow-y-auto y mt-2">
            <div class="bg-gray-400 px-4 py-2 rounded-b-2xl sticky top-0">
                <p class="text-white font-bold flex justify-between">
                  <span>Etudiant deuxieme année IT</span>
                  <span class="comic">{{ deux.length }} etudiant </span>
                </p>
            </div>
            <div class="px-10">
                <div class="border-l-2 border-b-2 rounded-bl-2xl   border-amber-400 px-4">
                    <div class="py-3" v-for="deuxs in deux" :key="deuxs.id">
                        <Link :href="route('persone',deuxs.email)" class="flex justify-between items-center">
                            <p>
                            <span class="text-gray-400 font-bold space-x-5">
                            <span class="fas fa-user"></span>
                            <span>{{ deuxs.nom }} </span>
                            <span>{{ deuxs.prenom }} </span>
                            </span>
                            </p>
                            <p class="text-blue-400 underline" v-if="deuxs.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></p>
                            <p class="text-yellow-400 underline" v-else-if="deuxs.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></p>
                            <p class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></p>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 h-[250px] overflow-hidden overflow-y-auto y mt-2">
            <div class="bg-gray-400 px-4 py-2 rounded-b-2xl sticky top-0">
                <p class="text-white font-bold flex justify-between">
                  <span>Etudiant troisieme année IT</span>
                  <span class="comic">{{ trois.length }} etudiant </span>
                </p>
            </div>
            <div class="px-10">
                <div class="border-l-2 border-b-2 rounded-bl-2xl   border-amber-400 px-4">
                    <div class="py-3" v-for="troiss in trois " :key="troiss.id">
                        <Link :href="route('persone',troiss.email)" class="flex justify-between items-center">
                            <p>
                            <span class="text-gray-400 font-bold space-x-5">
                            <span class="fas fa-user"></span>
                            <span>{{ troiss.nom }} </span>
                            <span>{{ troiss.prenom }} </span>
                            </span>
                            </p>
                            <p class="text-blue-400 underline" v-if="troiss.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></p>
                            <p class="text-yellow-400 underline" v-else-if="troiss.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></p>
                            <p class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></p>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 h-[250px] overflow-hidden overflow-y-auto y mt-4">
            <div class="bg-gray-400 px-4 py-2 rounded-b-2xl sticky top-0">
                <p class="text-white font-bold flex justify-between">
                  <span>Etudiant Master ONE  IT</span>
                  <span class="comic">{{ quatre.length }} etudiant </span>
                </p>
            </div>
            <div class="px-10">
                <div class="border-l-2 border-b-2 rounded-bl-2xl   border-amber-400 px-4">
                    <div class="py-3" v-for="quatres in quatre" :key="quatres.id">
                        <Link :href="route('persone',quatres.email)" class="flex justify-between items-center">
                            <p>
                            <span class="text-gray-400 font-bold space-x-5">
                            <span class="fas fa-user"></span>
                            <span>{{ quatres.nom }} </span>
                            <span>{{ quatres.prenom }} </span>
                            </span>
                            </p>
                            <p class="text-blue-400 underline" v-if="quatres.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></p>
                            <p class="text-yellow-400 underline" v-else-if="quatres.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></p>
                            <p class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></p>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 h-[250px] overflow-hidden overflow-y-auto y mt-4">
            <div class="bg-gray-400 px-4 py-2 rounded-b-2xl sticky top-0">
                <p class="text-white font-bold flex justify-between">
                  <span>Etudiant Master TWO  IT</span>
                  <span class="comic">{{ cinq.length }} etudiant </span>
                </p>
            </div>
            <div class="px-10">
                <div class="border-l-2 border-b-2 rounded-bl-2xl  border-amber-400 px-4">
                    <div class="py-3" v-for="cinqs in cinq" :key="cinqs.id">
                        <Link :href="route('persone',cinqs.email)" class="flex justify-between items-center">
                            <p>
                            <span class="text-gray-400 font-bold space-x-5">
                            <span class="fas fa-user"></span>
                            <span>{{ cinqs.nom }} </span>
                            <span>{{ cinqs.prenom }} </span>
                            </span>
                            </p>
                            <p class="text-blue-400 underline" v-if="cinqs.filiere===0"><span>Cours</span> | <span>Developpeur Web</span></p>
                            <p class="text-yellow-400 underline" v-else-if="cinqs.filiere===1"><span>Cours</span> | <span>Developpeur Apps</span></p>
                            <p class="text-amber-400 underline" v-else><span>Cours</span> | <span>Reseaux et Systeme</span></p>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
