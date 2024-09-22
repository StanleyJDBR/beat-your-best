<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to BeatYourBest</h1>
            <p class="text-gray-600 mb-8">Track your fitness progress and achieve your goals!</p>
            <div class="space-x-4">
                <a href="/login">
                    <button class="w-40 py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Login
                    </button>
                </a>
                <a href="/register">
                    <button class="w-40 py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                        Register
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HomePage',
};
</script>