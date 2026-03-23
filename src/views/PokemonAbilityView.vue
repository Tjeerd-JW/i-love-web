<script>
import router from "@/router";
import { watch } from "vue";

const pokeURL = "https://pokeapi.co/api/v2/";
export default {
    data() {
        return {
            ability: []
        }
    },
    methods: {
        async fetchAbility(abilityName) {
            try {
                const response = await fetch(`${pokeURL}ability/${abilityName}`);
                // parse de response naar een json
                this.ability = await response.json();
            } catch (error) {
                console.log("error: ", error);
            }
        }
    },
    watch: {
        // watch reageert op veranderingen op de pagina
        "$route.params.abilityName": {
            immediate: true,
            handler(abilityName) {
                this.fetchAbility(abilityName);
            },
        },
    },

}
</script>

<template>
    {{ ability }}
</template>