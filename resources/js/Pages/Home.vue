<script setup>
import { Head, Link } from '@inertiajs/vue3';

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
    <div>

        <header class="navbar">
            <div>
                logo
            </div>
            <div>
                zoeken
            </div>
            <div v-if="canLogin">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')">
                Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')">
                    Log in</Link>

                    <Link v-if="canRegister" :href="route('register')">
                    Register</Link>

                </template>
            </div>
        </header>

        <body>

            <main>
<h1> I love Web</h1>

                <div class="notes">

                    <div class="note">
                        <h2>Notes 1</h2>
                        <p>Sprint 1</p>
                        <p>2-9-25</p>
                    </div>
                    <div class="note">
                        <h2>Notes 1</h2>
                        <p>Sprint 1</p>
                        <p>2-9-25</p>
                    </div>
                    <div class="note">
                        <h2>Notes 1</h2>
                        <p>Sprint 1</p>
                        <p>2-9-25</p>
                    </div>
                    <div class="note">
                        <h2>Notes 1</h2>
                        <p>Sprint 1</p>
                        <p>2-9-25</p>
                    </div>
                </div>
            </main>



        </body>



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

main {}

main h1{
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
