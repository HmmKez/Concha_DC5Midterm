<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    books: Array
});

function borrowBook(bookId) {
    router.post(route('books.borrow', bookId));
}
</script>

<template>
    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Available Books</h1>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div
                v-for="book in books"
                :key="book.id"
                class="border rounded-lg p-5 bg-white shadow"
            >
                <h2 class="text-xl font-semibold">{{ book.title }}</h2>
                <p class="text-sm text-gray-600">by {{ book.author }}</p>

                <p class="mt-3 text-sm">
                    Available: {{ book.available_copies }}
                </p>

                <button
                    class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded disabled:opacity-50"
                    :disabled="book.available_copies < 1"
                    @click="borrowBook(book.id)"
                >
                    Borrow
                </button>
            </div>
        </div>
    </div>
</template>
