<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    borrowedBooks: Array
});

function returnBook(bookId) {
    if (confirm('Do you want to return this book?')) {
        router.post(route('books.return', bookId));
    }
}
</script>

<template>
    <Head title="My Borrowed Books" />

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
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="borrow in borrowedBooks" :key="borrow.id">
                            <td class="border px-4 py-2">{{ borrow.book.title }}</td>
                            <td class="border px-4 py-2">{{ borrow.book.author }}</td>
                            <td class="border px-4 py-2">{{ borrow.book.isbn }}</td>
                            <td class="border px-4 py-2">{{ borrow.borrowed_at }}</td>
                            <td class="border px-4 py-2">{{ borrow.due_date }}</td>
                            <td class="border px-4 py-2">
                                <button
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500"
                                    @click="returnBook(borrow.book.id)"
                                >
                                    Return
                                </button>
                            </td>
                        </tr>

                        <tr v-if="borrowedBooks.length === 0">
                            <td colspan="6" class="text-center py-4 text-gray-500">
                                You have no borrowed books.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
