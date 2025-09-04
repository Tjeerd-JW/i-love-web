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
  mounted() {
    console.log(this.note);
  },
  props: {
    note: {
      type: Object,
      required: true,
    },
  },
  computed: {
    formattedContent() {
      return marked.parse(this.note.content || "");
    },
  },
};

</script>
<template>
  <Head title="View Note" />
  <AuthenticatedLayout>
    <main>
      <a :href="`/notes/edit/${note.id}`">bewerken</a>
      <h1>View Note</h1>
      <div class="note-details">
        <h2>{{ note.title }}</h2>
        <p>{{ note.description }}</p>
        <p>{{  }}</p>
        <p><strong>{{ note.sprint }}</strong> </p>
        <div style="border:1px solid #ccc; padding:10px; min-height:300px; background:#fafafa;">
          <div v-html="formattedContent"></div>
        </div>
      </div>
    </main>
  </AuthenticatedLayout>
</template>
<style></style>