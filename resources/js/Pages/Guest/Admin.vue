<template>
    <div>
       <div class="grid sm:grid-cols-1 md:grid-cols-2 py-12  px-12">
            <div class="px-2 py-2">
                <div class="bg-gray-400 rounded-b-2xl py-2 px-2 text-white text-center">
                    <p class="comic font-bold">Registre autant que admin</p>
                </div>
                <div class="border-gray-400 border-l-2 border-b-2 rounded-bl-2xl translate-x-6 py-4 px-8">
                    <p class="text-sm text-gray-400 font-bold">Veuillez verifier votre email pour acceder aux compte admin de site web it
                        <span class="fas fa-check-circle text-sky-400"></span>
                    </p>
                    <form @submit.prevent="connexion"></form>
                    <div class="relative mt-4 px-4">
                        <input type="text"
                        v-model="email"
                        placeholder="entre votre email..."
                         class="input">
                        <i class="fas fa-envelope absolute left-8 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative mt-4 px-4">
                        <input :type="show?'text':'password'"
                        v-model="password"
                        placeholder="mots de pass..."
                         class="input">
                        <i class="fas fa-lock absolute left-8 top-3 text-gray-400"></i>
                        <i
                        @click.prevent="eye" 
                        :class="show?'fa-eye':'fa-eye-slash'"
                        class="far absolute right-8 top-3 text-gray-400 cursor-pointer"></i>
                    </div>
            
                    <div class="mt-4 px-5">
                        <label for="">
                            <input
                            v-model="check" 
                            type="checkbox" class="text-gray-200 font-bold" name="" id=""> accepter <Link class="text-gray-400 hover:text-amber-300">terme et condition</Link>
                        </label>
                    </div>
                    <div class="mt-4 flex space-x-6">
                        <div>
                            <button class="bg-gray-400 font-bold hover:bg-gray-200 text-gray-600 hover:text-gray-400 rounded-xl px-2 py-1">Connexion</button>
                        </div>
                        <div>
                            <Link class="text-sm font-bold text-gray-400 hover:text-amber-400">mots de pass oublier</Link>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
       </div>
    </div>
</template>
<script setup></script>
<script>
export default {
    data() {
        return {
            show:false
        }
    },
    methods: {
        eye()
        {
            this.show=!this.show
        }
    },
}
</script>