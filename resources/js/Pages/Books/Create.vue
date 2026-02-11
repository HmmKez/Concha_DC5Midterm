<script setup>
import { Head, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, watch } from 'vue';

const form = reactive({
    title: '',
    author: '',
    isbn: '',
    total_copies: 1,
    available_copies: 1,
});

watch(() => form.total_copies, (val) => {
    form.available_copies = val;
});

const errors = reactive({});

function submit() {
    router.post(route('books.store'), form, {
        onError: (errs) => Object.assign(errors, errs),
    });
}

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

                <button
                    @click="goBack"
                    type="button"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400"
                >
                    ← Back to Dashboard
                </button>

                <form @submit.prevent="submit" class="space-y-4">

                    <div>
                        <input v-model="form.title" placeholder="Title" class="w-full border p-2 rounded" />
                        <p v-if="errors.title" class="text-red-600 text-sm">{{ errors.title }}</p>
                    </div>

                    <div>
                        <input v-model="form.author" placeholder="Author" class="w-full border p-2 rounded" />
                        <p v-if="errors.author" class="text-red-600 text-sm">{{ errors.author }}</p>
                    </div>

                    <div>
                        <input v-model="form.isbn" placeholder="ISBN" class="w-full border p-2 rounded" />
                        <p v-if="errors.isbn" class="text-red-600 text-sm">{{ errors.isbn }}</p>
                    </div>

                    <div>
                        <input
                            type="number"
                            v-model="form.total_copies"
                            class="w-full border p-2 rounded"
                            placeholder="Total Copies"
                        />
                        <p v-if="errors.total_copies" class="text-red-600 text-sm">{{ errors.total_copies }}</p>
                    </div>

                    <button class="w-full bg-indigo-600 text-white py-2 rounded">
                        Save Book
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
