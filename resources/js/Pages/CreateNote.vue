<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";
import { usePage } from "@inertiajs/vue3";
import { marked } from "marked";

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  props: {
    types: {
      type: Object,
      required: false,
    },
  },
  data() {
    return {
      user: usePage().props.auth.user,
      content: "",
    };
  },
  mounted() {
    console.log(this.user.name);
    console.log(this.types);
  },
  computed: {
    formattedContent() {
      return marked.parse(this.content || "");
    },
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
          user_id: this.user.id,
        });
        console.log("Note created:", response.data);
        this.$inertia.visit(`/notes/${response.data.id}`);
      } catch (error) {
        console.error("Error creating note:", error);
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
          <h1>Create Note</h1>
          <form @submit.prevent="createNote">
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




            <div style="display: flex; gap: 20px; align-items: flex-start;">
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label for="content">Content:</label>
                <textarea v-model="content" id="content" required style="min-height: 200px; width: 100%;"></textarea>
              </div>
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label>Live Preview:</label>
                <div v-html="formattedContent" style="border:1px solid #ccc; padding:10px; min-height:200px; background: #fafbfc;"></div>
              </div>
            </div>




            <button type="submit">Create Note</button>
          </form>
        </main>
      </body>
    </AuthenticatedLayout>
  </div>
</template>
<style></style>