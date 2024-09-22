<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Register</h1>
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" v-model="name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" v-model="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" v-model="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" v-model="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="flex items-center justify-between mb-6">
                    <a href="/login" class="text-sm text-blue-600 hover:underline">
                        Already have an account? Login
                    </a>
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Register
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
    name: 'RegisterPage',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            showError: false,
            errorMessage: ''
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post('/api/users', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                });

                // Succesvolle registratie
                console.log('Registration successful:', response.data);
                window.location.href = '/login';
            } catch (error) {
                // Als er een fout is, toon de foutmelding
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'An unexpected error occurred. Please try again.';
                }
                this.showError = true;
            }
        },
        closeError() {
            this.showError = false;
            this.errorMessage = '';
        }
    }
};
</script>
