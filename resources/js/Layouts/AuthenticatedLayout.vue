<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
    <div class="">
      <nav class="navbar">
        <!-- Primary Navigation Menu -->

        
              <!-- Logo -->
              <div class="">
                <NavLink
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                >
                  <img src="../../../storage/img/T-logo.png" alt="logo" />
                </NavLink>
              </div>

              <div>
                <img src="../../../storage/img/logout.png" alt="logout">
              </div>

      </nav>

      <!-- Page Content -->
      <main>
        <slot/>
      </main>
    </div>
  </div>
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

img {
  height: 40px;
  margin: 5px;
}
</style>