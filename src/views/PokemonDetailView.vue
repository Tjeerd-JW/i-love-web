<script>
import router from "@/router";
import { watch } from "vue";

const pokeURL = "https://pokeapi.co/api/v2/";

export default {
  data() {
    return {
      pokemon: [],
      species: [],
      pokemonCry: null,
      pokemonCryLegacy: null,
      descriptions: [],
      currentImg: null,
      evolutionChain: [],
      pokemonEvolutions: [],
    };
  },
  methods: 
  {
    playCryLatest() {
      this.pokemonCry.play();
    },
    playCryLegacy() {
      this.pokemonCryLegacy.play();
    },
    async fetchPokemon(pokemonName) {
      try {
        const response = await fetch(`${pokeURL}pokemon/${pokemonName}`);
        // parse de response naar een json
        this.pokemon = await response.json();
        this.pokemonCry = new Audio(this.pokemon.cries.latest);
        this.pokemonCryLegacy = new Audio(this.pokemon.cries.legacy);
        this.currentImg = this.pokemon.sprites.front_default;
        this.fetchSpecies();
      } catch (error) {
        console.log("error: ", error);
      }
    },
    async fetchSpecies() {
      try {
        const response = await fetch(this.pokemon.species.url);
        // parse de data naar json
        this.species = await response.json();
        this.fetchEvolutionChain();
      } catch (error) {
        console.log("error ", error);
      }
    },
    async fetchEvolutionChain() {
      try {
        const response = await fetch(this.species.evolution_chain.url);
        this.evolutionChain = await response.json();
        this.evolutionHandler();
      } catch (error) {
        console.log("error", error);
      }
    },
    async fetchEvolutionImg(name) {
      try {
        const response = await fetch(`${pokeURL}pokemon/${name}`);
        // parse de response naar een json
        let evoImgResponse = await response.json();
        let evoImg = evoImgResponse.sprites.front_default;
        // console.log(evoImg);
        return evoImg;
      } catch (error) {
        console.log("error: ", error);
      }
    },
    async changeForm(url) {
      try {
        const response = await fetch(url);
        // weer ff parsen
        let formData = await response.json();
        this.currentImg = formData.sprites.front_default;
      } catch (error) {
        console.log("error", error);
      }
    },
    async evolutionHandler() {
      // normalize de api data zodat alleen de belangrijke dingen erin zitten
      // een recursive function, roept zichzelf opnieuwe op voor elke evolutie
      const buildNode = async (chainNode) => {
        const name = chainNode.species.name;
        const img = await this.fetchEvolutionImg(name);
        const node = {
          // bouw 1 stukje data voor de chain
          name,
          img,
          evoDetails: chainNode.evolution_details?.[0] ?? null,
          evolvesTo: [],
        };
        // door naar de volgdende

        // wacht totdat de api heeft gereageerd met de images van de evo's
        node.evolvesTo = await Promise.all(
          chainNode.evolves_to.map(next => buildNode(next))
        )
        // oude versie werkte niet voor afbeeldingen
        // chainNode.evolves_to.forEach((next) => {
        //   node.evolvesTo.push(buildNode(next));
        // });

        return node;
      };

      // roep de build node om de data beter in elkaar te zetten
      this.pokemonEvolutions = await buildNode(this.evolutionChain.chain);
      // oude versie
      // let evoChain = this.evolutionChain.chain;
      // this.pokemonEvolutions.name = evoChain.species.name;
      // let evoName = this.pokemonEvolutions.name;
      // this.pokemonEvolutions.img = this.fetchEvolutionImg(evoName);

      // // console.log(this.pokemonEvolutions);
      // let i = 0;
      // evoChain.evolves_to.forEach((pokemonStage2) => {
      //   // naam in array zetten
      //   let currentEvo = evoChain.evolves_to[i];
      //   this.pokemonEvolutions.evolvesTo[i].name = currentEvo.species.name;
      //   // img in array zetten
      //   evoName = currentEvo.species.name;
      //   this.pokemonEvolutions.evolvesTo[i].img =
      //     this.fetchEvolutionImg(evoName);
      //   // laatste stage evoluties hetzefde weer doen
      //   console.log(this.pokemonEvolutions.evolvesTo[i]);
      //   pokemonStage2.evolves_to.forEach((pokemonStage3) => {
      //     let evoName = pokemonStage3.species.name;
      //     console.log(evoName);
      //   });
      //   console.log(this.pokemonEvolutions);
      // });
    },
  },
  computed:
  {
    // computed is voor data
    descriptions() {
      // entries is een array of undefined
      const entries = this.species?.flavor_text_entries;

      // als ze bestaan filter op engels anders stuur niks terug
      return entries ? entries.filter((e) => e.language.name === "en") : [];
    },
    hasVariants() {
      // computed om de template dom te houden
      return this.species?.varieties?.length > 1;
    },
    hasEvolutionChain() {
      return this.evolutionChain?.chain;
    },
  },
  watch: {
    // watch reageert op veranderingen op de pagina
    "$route.params.pokemonName": {
      immediate: true,
      handler(pokemonName) {
        this.fetchPokemon(pokemonName);
      },
    },
  },
};
</script>

<template>
  <a @click="$router.go(-1)"> Terug gaan</a>
  <div class="pokedex" v-if="pokemon.name">
    <h1>{{ pokemon.name }}</h1>
    <p class="pokemon-id">#{{ pokemon.id }}</p>
    <ul class="types">
      <li v-for="type in pokemon.types" :key="type.type.name">
        {{ type.type.name }}
      </li>
    </ul>

    <p v-if="descriptions.length" class="description">
      {{ descriptions[0].flavor_text }}
    </p>
    <p v-else>helaas ik weet niks</p>

    <img :src="currentImg" alt="" />
    <div class="pokemonCry">
      <button @click="playCryLatest">Hudig geluid</button>
      <button v-if="pokemon.cries.legacy" @click="playCryLegacy">
        Oud Geluid
      </button>
    </div>

    <article class="stats">
      <h2>stats</h2>
      <ul>
        <li v-for="stat in pokemon.stats" :key="stat.stat.name">
          {{ stat.stat.name }}
          {{ stat.base_stat }}
        </li>
      </ul>
    </article>
    <article class="abilities">
      <h2>abilities</h2>
      <button v-for="ability in pokemon.abilities" :key="ability.ability.name">
        {{ ability.ability.name }}
      </button>
    </article>
    <article v-if="pokemon.forms.length > 1" class="forms">
      <h2>Vormen</h2>
      <ul>
        <li v-for="form in pokemon.forms" :key="form.name">
          <button @click="changeForm(form.url)">{{ form.name }}</button>
        </li>
      </ul>
    </article>

    <article v-if="hasVariants" class="variants">
      <h2>Varianten</h2>
      <ul>
        <li v-for="variant in species.varieties" :key="variant.pokemon.name">
          <router-link :to="variant.pokemon.name">{{
            variant.pokemon.name
          }}</router-link>
        </li>
      </ul>
    </article>

    <article v-if="pokemonEvolutions" class="evolution">
      <h2>Evoluties</h2>
      <div class="stage1">
        <img @click="fetchPokemon(pokemonEvolutions.name)" :src="pokemonEvolutions.img" class="evoImg" alt="" />
        <p>{{ pokemonEvolutions.name }}</p>
      </div>
      <!-- stage 2 evoluties -->
      <div class="stage2" v-for="stage2 in pokemonEvolutions.evolvesTo" :key="stage2.evolvesTo.name">
        <div class="stage2-details" :style="{ '--var-col-length': stage2.evolvesTo.length * 100 + '%' }">
          <img @click="fetchPokemon(stage2.name)" :src="stage2.img" class="evoImg" alt="" />
          <p>
            {{ stage2.name }}
          </p>
        </div>

        <!-- stage 3 evoluties -->

        <div class="stage3" v-for="(stage3, i) in stage2.evolvesTo" :key="stage3.evolvesTo.name"
          :style="{ '--var-grid-row': i }">
          <img @click="fetchPokemon(stage3.name)" :src="stage3.img" class="evoImg" alt="" />
          <p>
            {{ stage3.name }}
          </p>
        </div>
      </div>
    </article>

    <article>
      <h2>Moves</h2>
    </article>
  </div>
  <div v-else>
    <h1>FF wachten</h1>
  </div>
</template>



<style lang="scss" scoped>
a {
  cursor: pointer;
  text-decoration: underline;
}

.pokedex {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 0.5rem;
  width: fit-content;
  margin: 0 auto;

  .pokemonCry {
    grid-row: 4;
    grid-column: 1 / -1;
  }

  h1 {
    grid-column: 2 / -1;
    grid-row: 1;
    font-size: 4rem;
    display: flex;
    justify-content: start;
    padding: 0 1rem;
  }

  article {
    padding: 0 1rem;

    h2 {
      text-align: center;
    }
  }

  .evolution {
    grid-column: 1 / -1;
    display: grid;
    grid-template-columns: 1fr 2fr;

    h2 {
      grid-column: 1 /-1;
    }

    .stage1 {
      grid-column: 1;
      grid-row: 2 / 100;
      justify-content: center;
      display: grid;
      align-content: center;
      height: 100%;

      .evoImg {
        height: 125px;
        width: 125px;
      }

      p {
        text-align: center;
        width: 100%;
      }
    }

    .stage2 {
      grid-column: 2;
      display: grid;

      grid-template-columns: 1fr 1fr;

      .stage2-details {
        height: var(--var-col-length);
        align-content: center;
      }

      p {
        grid-column: 1;
        text-align: center;
        width: 100%;
      }

      .evoImg {
        grid-column: 1;
        margin: 0 auto;
      }

      .stage3 {
        grid-column: 2;
        display: grid;
        justify-content: center;
        grid-row: var(--var-grid-row);
        grid-template-columns: 1fr;
        height: 100%;

        p {
          grid-column: 1;
          grid-row: 3;
        }

        .evoImg {
          grid-column: 1;
        }
      }
    }

    p {
      width: 100px;
    }

    .evoImg {
      height: 125px;
      width: 125px;
      grid-row: unset;
      cursor: pointer;
    }
  }

  .pokemon-id {
    grid-column: 2;
    grid-row: 1;
    height: fit-content;
    padding: 0 1rem;

    // display: flex;
    // justify-content: center;
    // align-items: baseline;
  }

  img {
    grid-column: 1;
    grid-row: 1 / 4;
    width: clamp(100px, 100%, 300px);
    display: flex;
    align-items: center;
    padding: 0.5rem;
    height: clamp(100px, 100%, 300px);
  }

  .types {
    list-style: none;
    display: flex;
    flex-direction: row;
    height: fit-content;
    gap: 0.5rem;
    padding: 0 1rem;

    li {
      background-color: blueviolet;
      color: white;
      padding: 0.1rem;
      width: 75px;
      text-align: center;
      border: 2px solid black;
    }
  }

  .description {
    grid-column: 2 / -1;
    padding: 0 1rem;
  }

  .stats {
    h2 {
      text-align: center;
    }

    ul {
      list-style: none;

      li {}
    }
  }

  .abilities {
    h2 {
      text-align: center;
    }

    ul {
      list-style: none;

      li {}
    }
  }
}
</style>