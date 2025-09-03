<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <Head title="Welcome" />
  <header>
    <div class="navbar">
      <div>
        <img src="../../../storage/img/T-logo.png" alt="Logo" />
      </div>
    </div>
  </header>
  <main>
    <h1>I love web</h1>
    <div>
      <div class="home-button" v-if="$page.props.auth.user">
        <Link  :href="route('dashboard')">
          Dashboard</Link
        >
      </div>

      <div class="home-button" v-else>
        <Link :href="route('login')"> Log in</Link>
      </div>
    </div>
  </main>
</template>

<style>
.navbar {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  height: 50px;
  background-color: darkcyan;
  color: white;
}

.navbar img {
  height: 40px;
  margin: 5px;
}

.home-button {
  width: fit-content;
  margin: 0 auto 0 auto;
  font-size: 2rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  background-color: darkcyan;
  color: white;
  text-align: center;
}

main {
}

main h1 {
  width: fit-content;
  margin: 0 auto 0 auto;
  font-size: 5rem;
}

.notes {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  margin: 0 auto 0 auto;
  width: fit-content;
  max-width: 600px;
  justify-content: space-between;
}

.note {
  width: 280px;
  border-color: red;
  border-width: 1px;
}
</style>
