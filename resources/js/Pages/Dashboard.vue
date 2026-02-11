<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    user: Object,   // <-- Add this to receive the logged-in user
    books: Array,
});

// Delete a book
function deleteBook(bookId) {
    if (confirm('Are you sure you want to delete this book?')) {
        router.delete(route('books.destroy', bookId));
    }
}

// Borrow a book
function borrowBook(bookId) {
    router.post(route('books.borrow', bookId));
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-6xl mx-auto space-y-6">

                <!-- User Info -->
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-lg font-semibold mb-2">Signed-in User</h3>
                    <p><strong>Name:</strong> {{ user.name }}</p>
                    <p><strong>Email:</strong> {{ user.email }}</p>
                </div>

                <!-- Add Book Button -->
                <div>
                    <Link
                        :href="route('books.create')"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500"
                    >
                        + Add New Book
                    </Link>
                </div>

                <!-- No books message -->
                <div v-if="books.length === 0" class="text-gray-500 mt-4">
                    No books added yet.
                </div>

                <!-- Books grid -->
                <div v-else class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 mt-4">
                    <div v-for="book in books" :key="book.id" class="p-4 border rounded bg-white shadow">
                        <p class="font-semibold text-lg">{{ book.title }}</p>
                        <p class="text-sm text-gray-600">{{ book.author }}</p>
                        <p class="text-sm text-gray-600 mt-1">Available: {{ book.available_copies }}</p>

                        <div class="mt-3 flex space-x-2">
                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500"
                                @click="deleteBook(book.id)"
                            >
                                Delete
                            </button>

                            <button
                                class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500"
                                :disabled="book.available_copies < 1"
                                @click="borrowBook(book.id)"
                            >
                                Borrow
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
