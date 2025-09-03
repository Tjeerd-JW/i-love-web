<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  data() {
    return {
      notes: [],
    };
  },
  mounted() {
    this.fetchNotes();
  },
  methods:{
    async fetchNotes() {
      try {
        const response = await axios.get('/notes');
        this.notes = response.data;
        console.log(this.notes);
      } catch (error) {
        console.error('Error fetching notes:', error);
      }
    }
  }
};  

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

        <div class="notes-list">
          <div v-for="note in notes" :key="note.id" class="note-item">
            <h2>{{ note.title }}</h2>
            <p>{{ note.description }}</p>
            <p><strong>{{ note.sprint }}</strong> </p>
            <a :href="`/notes/${note.id}`">bekijk</a>
          </div>


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