<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";
import { marked } from "marked";

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  props: {
    note: {
      type: Object,
      required: true,
    },
    types: {
      type: Object,
      required: false,
    },
  },
  data() {
    return {
      type_id: this.note.type_id || "",
      title: this.note.title || "",
      description: this.note.description || "",
      sprint: this.note.sprint || "",
      content: this.note.content || "",
      user_id: this.note.user_id || "",
    };
  },
  computed: {
    formattedContent() {
      return marked.parse(this.content || "");
    },
  },
  methods: {
    async updateNote() {
      try {
        const response = await axios.put(`/notes/${this.note.id}`, {
          type_id: this.type_id,
          title: this.title,
          description: this.description,
          sprint: this.sprint,
          content: this.content,
          user_id: this.user_id,
        });
        console.log("Note updated:", response.data);
        this.$inertia.visit(`/notes/${response.data.id}`);
      } catch (error) {
        console.error("Error updating note:", error);
      }
    },
    async deleteNote() {
      if (confirm("Are you sure you want to delete this note?")) {
        try {
          const response = await axios.delete(`/notes/${this.note.id}`);
          console.log("Note deleted:", response.data);
          this.$inertia.visit(`/dashboard`);
        } catch (error) {
          console.error("Error deleting note:", error);
        }
      }
    },
  },
};
</script>
<template>
  <div>
    <Head title="Create Note" />
    <AuthenticatedLayout>
      <body>
        <main>
          <h1>Edit Note</h1>
          <form @submit.prevent="updateNote">
            <div>
              <label for="type_id">Type:</label>
              <select v-model="type_id" id="type_id" required>
                <option disabled value="">Please select</option>
                <option v-for="(type, id) in types" :key="id" :value="id">
                  {{ type.name }}
                </option>
              </select>
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
                <label>Preview:</label>
                <div v-html="formattedContent" style="border:1px solid #ccc; padding:10px; min-height:50px;"></div>
              </div>

            <button type="submit">Update Note</button>
          </form>
          <button @click="deleteNote">Delete Note</button>
        </main>
      </body>
    </AuthenticatedLayout>
  </div>
</template>
<style></style>