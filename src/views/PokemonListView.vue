<script>
const pokeURL = "https://pokeapi.co/api/v2/";

export default {
  data() {
    return {
      pokemon: [],
    };
  },
  async mounted() {
    try {
      const response = await fetch(`${pokeURL}pokemon?limit=156&offset=493`);

      //   parse de response naar json
      const data = await response.json();
      this.pokemon = data.results;
    } catch (error) {
      console.log("error", error);
    }
  },
};
</script>

<template>
  <h1>lijst met alle pokemon</h1>
  <ul v-if="pokemon.length">
    <li v-for="pokemonName in pokemon" :key="pokemonName.name">
      <router-link :to="'/pokemon/' + pokemonName.name"> {{ pokemonName.name }} </router-link>
    </li>
  </ul>
  <ul v-else>
    <li>Geduld we landen zo...</li>
  </ul>
</template>



<style>
</style>