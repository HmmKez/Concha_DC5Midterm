<script setup>
import { Head, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';

const form = reactive({
    title: '',
    author: '',
    isbn: '',
    total_copies: 1,
    available_copies: 1,
});

function submit() {
    router.post(route('books.store'), form);
}

// Navigate back to the dashboard
function goBack() {
    router.get(route('dashboard'));
}
</script>

<template>
    <Head title="Add Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold">Add New Book</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto bg-white p-6 shadow rounded space-y-4">

                <!-- Back Button -->
                <button
                    @click="goBack"
                    type="button"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400"
                >
                    ← Back to Dashboard
                </button>

                <!-- Form -->
                <form @submit.prevent="submit" class="space-y-4">
                    <input v-model="form.title" placeholder="Title" class="w-full border p-2 rounded" />
                    <input v-model="form.author" placeholder="Author" class="w-full border p-2 rounded" />
                    <input v-model="form.isbn" placeholder="ISBN" class="w-full border p-2 rounded" />

                    <div>
                        <input
                            id="totalcopies"
                            name="totalcopies"
                            type="number"
                            v-model="form.total_copies"
                            class="w-full border p-2 rounded"
                            placeholder="Total Copies"
                        />
                        <label for="totalcopies" class="text-gray-600 text-sm">Total Copies</label>
                    </div>

                    <button class="w-full bg-indigo-600 text-white py-2 rounded">
                        Save Book
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
