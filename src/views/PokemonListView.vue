<script>
const pokeURL = "https://pokeapi.co/api/v2/";

export default {
  data() {
    return {
      pokemon: [],
      pokemonSearch: [],
      searchTerm: "",
    };
  },
  async mounted() {
    try {
      const response = await fetch(`${pokeURL}pokemon?limit=10000&offset=0`);
      //   parse de response naar json
      const data = await response.json();
      this.pokemon = data.results;
      this.pokemonSearch = this.pokemon;
      console.log(this.pokemon);

      if (this.$route.query.search) {
        this.searchTerm = this.$route.query.search;
        this.search();
      }
    } catch (error) {
      console.log("error", error);
    }
  },
  methods: {
    search() {
      this.$router.replace({ query: { search: this.searchTerm } });
      this.pokemonSearch = this.pokemon.filter((pokemon) =>
        pokemon.name.includes(this.searchTerm)
      );
    },
  },
};
</script>

<template>
  <section>
    <h1>lijst met alle pokemon</h1>
    <form @submit.prevent="search">
      <input v-model="searchTerm" placeholder="zoeken" />
      <button type="submit">Zoeken</button>
    </form>

    <ul v-if="pokemonSearch.length">
      <li
        v-for="pokemonName in pokemonSearch"
        :key="pokemonName.name"
      >
        <router-link :to="'/pokemon/' + pokemonName.name">
          {{ pokemonName.name }}
        </router-link>
      </li>
    </ul>
    <ul v-else>
      <li>Niets gevonden</li>
    </ul>
  </section>
</template>

<style lang="scss" scoped>
section {
  padding: 0 1rem;
}
ul {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  list-style: none;
  padding: 0;
}
</style>