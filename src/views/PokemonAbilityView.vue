<script>
import router from "@/router";
import { watch } from "vue";

const pokeURL = "https://pokeapi.co/api/v2/";
export default {
  data() {
    return {
      ability: [],
      pokemonNotHidden: [],
      pokemonHidden: [],
    };
  },
  methods: {
    async fetchAbility(abilityName) {
      try {
        const response = await fetch(`${pokeURL}ability/${abilityName}`);
        // parse de response naar een json
        const abilityJSON = await response.json();

        this.pokemonHandler(abilityJSON);
        this.abilityHandler(abilityJSON);
      } catch (error) {
        console.log("error: ", error);
      }
    },
    pokemonHandler(abilityJSON) {
      abilityJSON.pokemon.forEach((pokemon) => {
        if (pokemon.is_hidden == true) {
          this.pokemonHidden.push(pokemon.pokemon.name);
        } else {
          this.pokemonNotHidden.push(pokemon.pokemon.name);
        }
      });
    },
    abilityHandler(abilityJSON) {
      console.log("abilityHandler aan", abilityJSON);
      // ability effecten
      abilityJSON.effect_entries.forEach((effect) => {
        if (effect.language.name == "en") {
          console.log(effect.effect);
          console.log(effect.short_effect);
          this.ability.push(effect.effect);
        }
        console.log(this.ability);
      });

      abilityJSON.flavor_text_entries.forEach((entry) => {
        if (entry.language.name == "en") {
          console.log(entry.flavor_text, entry.version_group.name);
        }
      });

      console.log(abilityJSON.generation.name);
    },
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
};
</script>

<template>
  <ul>
    <h2>Hidden</h2>
    <li v-for="pokemon in this.pokemonHidden">
      <router-link :to="'/pokemon/' + pokemon">
        {{ pokemon }}
      </router-link>
    </li>
  </ul>
  <ul>
    <h2>Not hidden</h2>
    <li v-for="pokemon in this.pokemonNotHidden">
      <router-link :to="'/pokemon/' + pokemon">
        {{ pokemon }}
      </router-link>
    </li>
  </ul>
</template>