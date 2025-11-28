<script>
export default {
  name: "HomeView",
};
</script>

<template>
  <main>
    <h1>Digitale tuin</h1>
    <p>Welkom op de homepagina!</p>
    <section>
      <h2>Verschillende pagina's met stuff</h2>
      <article>
        <h3>Mediaquery</h3>
        <router-link to="/mediaquery">bekijken</router-link>
      </article>

      <article>
        <h3>LeesbareTeksten</h3>
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
</style>