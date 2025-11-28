<script>
export default {
  name: "mediaqueryview",
};
</script>

<template>
  <main>
    <h1>verschillende kleurtjes</h1>
  </main>
</template>

<style scoped>
main {
  width: 100vw;
  height: 100vw;
  background: pink;

  @media (min-width: 600px) {
    background: yellow;
  }

  @media (min-width: 1080px) {
    background: blue;
  }

  @media (min-width: 1400px) {
    background: red;
  }
}
</style>