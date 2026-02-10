<template>
    <Head title="About | Library Book Borrowing System" />

    <div class="min-h-screen bg-gray-50 dark:bg-black text-gray-800 dark:text-gray-200">
        <!-- Header -->
        <header class="border-b border-gray-200 dark:border-gray-800">
            <div class="mx-auto max-w-7xl px-6 py-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600 text-white font-bold">
                        📚
                    </div>
                    <span class="text-lg font-semibold">
                        Library Borrowing System
                    </span>
                </div>

                <nav class="flex items-center gap-4">
                    <Link
                        :href="route('welcome')"
                        class="rounded-md px-4 py-2 text-sm font-medium hover:text-indigo-600"
                    >
                        Home
                    </Link>

                    <Link
                        :href="route('login')"
                        class="rounded-md px-4 py-2 text-sm font-medium hover:text-indigo-600"
                    >
                        Log in
                    </Link>

                    <Link
                        :href="route('register')"
                        class="rounded-md px-4 py-2 text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-500"
                    >
                        Register
                    </Link>
                </nav>
            </div>
        </header>

        <!-- About Section -->
        <section class="mx-auto max-w-5xl px-6 py-20">
            <h1 class="text-4xl font-bold text-center">
                About the System
            </h1>

            <p class="mt-6 text-center text-lg text-gray-600 dark:text-gray-400">
                The Library Book Borrowing System is a web-based application
                designed to modernize and simplify library operations.
            </p>

            <div class="mt-16 grid gap-12 md:grid-cols-2">
                <!-- Purpose -->
                <div>
                    <h2 class="text-2xl font-semibold">🎯 Purpose</h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        This system was developed to provide an efficient and
                        user-friendly way for libraries to manage books and
                        borrowing transactions. It allows users to browse
                        available books, borrow and return them digitally, and
                        track due dates without relying on manual processes.
                    </p>
                </div>

                <!-- Technology -->
                <div>
                    <h2 class="text-2xl font-semibold">🛠 Technology Stack</h2>
                    <ul class="mt-4 space-y-3 text-gray-600 dark:text-gray-400">
                        <li>• Laravel (Backend Framework)</li>
                        <li>• Laravel Breeze (Authentication)</li>
                        <li>• Inertia.js + Vue 3 (Frontend)</li>
                        <li>• Tailwind CSS (Styling)</li>
                        <li>• MySQL / PostgreSQL (Database)</li>
                    </ul>
                </div>

                <!-- Users -->
                <div>
                    <h2 class="text-2xl font-semibold">👥 Target Users</h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        The system is intended for students, library staff, and
                        administrators who need a reliable platform to manage
                        library resources and borrowing records efficiently.
                    </p>
                </div>

                <!-- Goals -->
                <div>
                    <h2 class="text-2xl font-semibold">🚀 Project Goals</h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        The main goal of this project is to improve accessibility,
                        reduce manual work, and ensure accurate tracking of
                        borrowed materials through a secure and scalable system.
                    </p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-gray-200 dark:border-gray-800 py-10 text-center text-sm text-gray-500">
            Library Book Borrowing System • Built with Laravel & Vue
        </footer>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>
