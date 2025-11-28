<template>
  <div id="app">
    <nav>
      <router-link to="/">Home</router-link>
      <!-- <router-link to="/about">About</router-link> -->
    </nav>
    <router-view />
  </div>
</template>

<style>
body {
  background: #2a7b9b;
  background: linear-gradient(
      180deg,
      rgba(42, 123, 155, 1) 0%,
      rgba(255, 255, 255, 1) 100%
    )
    no-repeat;
  background-size: cover;
  height: 100%;
  min-height: 100vh;

  nav {
    width: 100vw;
    height: 40px;
    background-color: #2a7b9b;
    border-bottom: 2px solid white;
    display: flex;
    justify-content: space-around;

    a {
      color: black;
      text-decoration: none;
      font-size: 1.5rem;
    }
  }
  main {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    width: clamp(275px, 95vw, 1000px);
    margin: auto;

  }
}
</style>