<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    user: Object,
    books: Array,
    borrowings: Array,
});

function returnBook(bookId) {
    router.post(route('books.return', bookId));
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">

                <!-- User Info -->
                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Signed In User</h3>
                    <p><strong>Name:</strong> {{ user.name }}</p>
                    <p><strong>Email:</strong> {{ user.email }}</p>
                </div>

                <!-- Actions -->
                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <Link
                        :href="route('books.create')"
                        class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500"
                    >
                        + Add New Book
                    </Link>
                </div>

                <!-- Books List -->
                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Books in the System</h3>

                    <div v-if="books.length === 0" class="text-gray-500">
                        No books added yet.
                    </div>

                    <ul v-else class="space-y-3">
                        <li
                            v-for="book in books"
                            :key="book.id"
                            class="border p-4 rounded"
                        >
                            <p class="font-semibold">{{ book.title }}</p>
                            <p class="text-sm text-gray-600">
                                {{ book.author }} — Available: {{ book.available_copies }}
                            </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
