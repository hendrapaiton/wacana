<template>
    <div class="bg-gray-100">
        <div class="flex min-h-screen">
            <div class="w-full md:w-1/2 bg-blue-600 items-center justify-center p-8 relative hidden md:flex">
                <div class="absolute inset-0">
                    <img alt="A scenic mountain landscape with a clear blue sky"
                        class="w-full h-full object-cover opacity-50" height="800"
                        src="https://storage.googleapis.com/a1aa/image/cECc1-VK3hI8RDOqN0tYg6ctCZvFncUzxD-3uykmYfU.jpg"
                        width="600" />
                </div>
                <div class="relative text-center z-10">
                    <h1 class="text-white text-4xl font-bold mb-4">
                        Welcome Back!
                    </h1>
                    <p class="text-white text-lg mb-8">
                        To keep connected with us please login with your personal info
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex items-center justify-center p-8">
                <div class="w-full max-w-md">
                    <h2 class="text-3xl font-bold text-center mb-6">
                        Login to Your Account
                    </h2>
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Username
                            </label>
                            <input
                                v-model="email"
                                @keyup.enter="handleLogin"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Username" type="text" required />
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input
                                v-model="password"
                                @keyup.enter="handleLogin"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="******************" type="password" required />
                            <p class="text-red-500 text-xs italic">
                                Please choose a password.
                            </p>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                @click.prevent="handleLogin"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="button">
                                Sign In
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                                href="#">
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                    <p class="text-center text-gray-500 text-xs">
                        ©2023 Your Company. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/store/auth'

const router = useRouter()
const authStore = useAuthStore()
const email = ref('')
const password = ref('')
const message = ref('')

const handleLogin = async () => {
    try {
        await authStore.login({
            email: email.value,
            password: password.value,
        })
        const redirectUrl = router.currentRoute.value.query.redirect || '/dashboard'
        router.push(redirectUrl)
    } catch (error) {
        message.value = error.message || 'Login failed. Please try again.'
    }
}
</script>
