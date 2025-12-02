<script setup>
import { useRoute } from "vue-router";
import { defineAsyncComponent } from "vue";

const route = useRoute();
const id = route.params.id;

const componentMap = {
  9: defineAsyncComponent(() => import("../components/CSSChallenge-9.vue")),
};

const ComponentToLoad = componentMap[id] || null;
</script>

<template>
  <main>
    <component :is="ComponentToLoad" />
  </main>
</template>

<style>
.css-challenge {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    .css-title{
        font-size: 1rem;
        margin: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
  @layer basis {
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    :root * {
      --tmplt-size-blokje: min(calc(8em + 5.333vw), 11.667em);
      --tmplt-number-blokjes: 5;
    }
    ul {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      gap: 1rem;
    }

    li {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: white;
      width: 10rem;
      aspect-ratio: 1 /1 ;
    }

    div {
      position: relative;
      height: 1em;

      aspect-ratio: 1/1;
      z-index: 10000;

      display: flex;
      justify-content: center;
      align-items: center;
      line-height: 1em;

      font-size: 2.5em;
    }
  }
}
</style>
