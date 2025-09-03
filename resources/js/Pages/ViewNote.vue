<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";

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
  },
};

</script>
<template>
    <Head title="View Note" />
    
    <AuthenticatedLayout>
        <body>
        <main>
            <a :href="`/notes/edit/${note.id}`">bewerken</a>
            <h1>View Note</h1>
            <div class="note-details">
                <h2>{{ note.title }}</h2>
                <p>{{ note.description }}</p>
                <p><strong>{{ note.sprint }}</strong> </p>
                <div v-html="note.content"></div>
            </div>
        </main>
        </body>
    </AuthenticatedLayout>
</template>
<style></style>