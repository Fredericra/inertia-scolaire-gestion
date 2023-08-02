<script setup>
import { computed } from "vue"
import MenuA from "./Layouts/Menu.vue"
import MenuB from "./Layouts/Menu1.vue"
import { usePage } from "@inertiajs/vue3"
const objet = defineProps({
   auth:{
      type:Object,
      require:true
   }
})
const page = usePage()
const valider = computed(()=>{
   return page.props.auth?MenuA:MenuB
 
})

</script>
<template>
   <component :is="valider">
    <slot></slot>
   </component>
</template>