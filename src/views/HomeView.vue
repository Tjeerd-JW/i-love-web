<script>
export default {
  name: "HomeView",
};
</script>

<template>
  <main>
    <h1>Digitale tuin</h1>
    <p>Allemaal troep, het meeste niet perse mooi</p>
    <section>
      <h2>Verschillende pagina's met stuff</h2>
      <article>
        <h3>Mediaquery</h3>
        <router-link to="/mediaquery">bekijken</router-link>
      </article>

      <article>
        <h3>Leesbare teksten</h3>
        <router-link to="/LeesbareTeksten">bekijken</router-link>
      </article>

      <!-- <article>
        <h3></h3>
        <router-link to="/">bekijken</router-link>
      </article> -->
    </section>
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
    h2 {
      grid-column: 1 / -1;
      text-align: center;
    }
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