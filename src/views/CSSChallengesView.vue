<script>
export default {
  name: "CSSChallengeView",
};
</script>

<template>
  <main>
    <h1>CSS challenges</h1>
    <p>Dit is een testpagina via Vue Router.</p>

     <section>
      <article>
        <h2>CSS challenge #9</h2>
        <p>Animations en beetje JS</p>
        <router-link to="/css/9">bekijken</router-link>
      </article>


      <!-- <article>
        <h3></h3>
        <router-link to="/">bekijken</router-link>
      </article> -->
    </section>

        <router-view />
  </main>
</template>

<style scoped>
main {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  width: clamp(275px, 95vw, 1000px);
  margin: auto;
  h1 {
    grid-column: 2;
    text-align: center;
  }
  p {
    grid-column: 2;
    text-align: center;
  }
  section {
    grid-column: 1 / -1;
    display: grid;
    grid-template-columns: inherit;
    gap: 0.5rem;
    article {
      border: 2px solid black;
      border-radius: 0.5rem;
      padding: 0.5rem;
      a {
        transition: 0.4s ease-in-out;
        text-decoration: none;
        &::after {
          content: "→";
          opacity: 0;
          transition: .2s ease-in-out;
        }
        &:hover {
          margin-left: 0.4rem;
          &::after {
            opacity: 1;
          }
        }
      }
    }
  }
}
</style>

