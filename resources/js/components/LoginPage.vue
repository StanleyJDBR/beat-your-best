<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Login</h1>
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" v-model="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" v-model="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="flex items-center justify-between">
                    <a href="/register" class="text-sm text-blue-600 hover:underline">
                        Don't have an account? Register
                    </a>
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Login
                </button>
            </form>
        </div>

        <Status
            :message="errorMessage"
            :visible="showError"
            @close="closeError"
        />

    </div>
</template>

<script>
import axios from 'axios';
import Status from './Status.vue';

export default {
    components: {
        Status
    },
    name: 'LoginPage',
    data() {
        return {
            email: '',
            password: '',
            showError: false,
            errorMessage: ''
        };
    },
    methods: {
        submitForm() {
            axios.post('/api/users/login', {
                email: this.email,
                password: this.password,
            }).then((response) => {
                // Handle successful login, e.g., redirect or show success message
                console.log('Login successful:', response.data);
                window.location.href = '/homepage';
            }).catch((error) => {
                // Als er een fout is, toon de foutmelding
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'An unexpected error occurred. Please try again.';
                }
                
                this.showError = true;
            });
        }

    }
};
</script>
