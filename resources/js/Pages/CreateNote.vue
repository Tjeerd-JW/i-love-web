<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
methods: {
    async createNote() {
      try {
        const response = await axios.post("/notes/store", {
          type_id: this.type_id,
          title: this.title,
          description: this.description,
          sprint: this.sprint,
          content: this.content,
          user_id: this.user_id,
        });
        console.log("Note created:", response.data);
      } catch (error) {
        console.error("Error creating note:", error);
      }
    },
  },
};</script>
<template>
   <div>
    <Head title="Create Note" />
    <AuthenticatedLayout>
      <body>
        <main>
          <h1>Create Note</h1>
          <form @submit.prevent="createNote">
            <div>
              <label for="type_id">Type ID:</label>
              <input v-model="type_id" type="number" id="type_id" required />
            </div>
            <div>
              <label for="title">Title:</label>
              <input v-model="title" type="text" id="title" required />
            </div>
            <div>
              <label for="description">Description:</label>
              <input
                v-model="description"
                type="text"
                id="description"
                required
              />
            </div>
            <div>
              <label for="sprint">Sprint:</label>
              <input v-model="sprint" type="text" id="sprint" required />
            </div>
            <div>
              <label for="content">Content:</label>
              <textarea v-model="content" id="content" required></textarea>
            </div>
            <div>
              <label for="user_id">User ID:</label>
              <input v-model="user_id" type="number" id="user_id" required />
            </div>
            <button type="submit">Create Note</button>
          </form>
        </main>
      </body>
    </AuthenticatedLayout>
   </div>
   
</template>
<style></style>