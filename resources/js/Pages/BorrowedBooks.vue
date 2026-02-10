<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold">My Borrowed Books</h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto bg-white p-6 shadow rounded space-y-4">
                <table class="w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Author</th>
                            <th class="border px-4 py-2">ISBN</th>
                            <th class="border px-4 py-2">Borrowed On</th>
                            <th class="border px-4 py-2">Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="borrow in borrowedBooks" :key="borrow.id">
                            <td class="border px-4 py-2">{{ borrow.book.title }}</td>
                            <td class="border px-4 py-2">{{ borrow.book.author }}</td>
                            <td class="border px-4 py-2">{{ borrow.book.isbn }}</td>
                            <td class="border px-4 py-2">{{ borrow.created_at }}</td>
                            <td class="border px-4 py-2">{{ borrow.due_date }}</td>
                        </tr>
                        <tr v-if="borrowedBooks.length === 0">
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                You have no borrowed books.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/vue3';

const borrowedBooks = ref([]);

// Fetch borrowed books for the logged-in user
onMounted(async () => {
    try {
        const response = await fetch('/api/my-borrowed-books');
        borrowedBooks.value = await response.json();
    } catch (error) {
        console.error('Failed to load borrowed books', error);
    }
});
</script>
