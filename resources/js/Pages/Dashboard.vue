<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <body>
      <main>
        <h1>I love Web</h1>
        <div>
          <div class="dashboard-button">New note</div>
          <!-- <div class="dashboard-button">Zoeken</div> -->
        </div>

        <div>

        </div>
      </main>
    </body>
  </AuthenticatedLayout>
</template>

<style>
.dashboard-button {
  width: fit-content;
  margin: 0 auto 0 auto;
  font-size: 1rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  background-color: darkcyan;
  color: white;
  text-align: center;
}
</style>