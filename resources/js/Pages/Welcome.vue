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

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Library Book Borrowing System" />

    <div class="min-h-screen bg-gray-50 dark:bg-black text-gray-800 dark:text-gray-200">
        <!-- Header -->
        <header class="border-b border-gray-200 dark:border-gray-800">
            <div class="mx-auto max-w-7xl px-6 py-6 flex items-center justify-between">
                <!-- Logo / Title -->
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600 text-white font-bold">
                        📚
                    </div>
                    <span class="text-lg font-semibold">
                        Library Borrowing System
                    </span>
                </div>

                <!-- Navigation -->
                <nav v-if="canLogin" class="flex items-center gap-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md px-4 py-2 text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-500"
                    >
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('about-page')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:text-indigo-600"
                        >
                            About
                        </Link>
                        
                        <Link
                            :href="route('login')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:text-indigo-600"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-4 py-2 text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-500"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="mx-auto max-w-7xl px-6 py-24 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight">
                Smart Library Book Borrowing System
            </h1>

            <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400">
                A modern web-based system that allows users to browse, borrow,
                and manage library books efficiently — anytime, anywhere.
            </p>

            <div class="mt-10 flex justify-center gap-4">
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="rounded-lg bg-indigo-600 px-6 py-3 text-white font-medium hover:bg-indigo-500"
                >
                    Get Started
                </Link>

                <Link
                    :href="route('login')"
                    class="rounded-lg border border-gray-300 dark:border-gray-700 px-6 py-3 font-medium hover:border-indigo-600 hover:text-indigo-600"
                >
                    Sign In
                </Link>
            </div>
        </section>

        <!-- Features Section -->
        <section class="bg-white dark:bg-zinc-900">
            <div class="mx-auto max-w-7xl px-6 py-20">
                <h2 class="text-3xl font-bold text-center">
                    Key Features
                </h2>

                <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature Card -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">📖 Book Catalog</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Browse available books with detailed information,
                            categories, and real-time availability.
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">🔄 Borrow & Return</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Easily borrow and return books while keeping track
                            of due dates and borrowing history.
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">👤 User Accounts</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Secure authentication with personalized dashboards
                            for students, staff, or administrators.
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">⏰ Due Date Tracking</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Automatic tracking of borrowed books and deadlines
                            to reduce overdue returns.
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">📊 Admin Management</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Admins can manage books, users, and borrowing
                            records through a centralized system.
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold">🔐 Secure & Reliable</h3>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Built with Laravel and modern security practices to
                            ensure data protection and reliability.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-gray-200 dark:border-gray-800 py-10 text-center text-sm text-gray-500">
            Library Book Borrowing System • Laravel v{{ laravelVersion }} • PHP v{{ phpVersion }}
        </footer>
    </div>
</template>

