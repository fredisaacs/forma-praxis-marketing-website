<template>
    <div class="space-y-4">
        <div>
            <h2 class="text-2xl font-semibold text-white">Tell us about your project</h2>
            <p class="mt-2 text-sm text-slate-400">A lightweight Vue-powered form for collecting inquiries and sending them to your admin inbox.</p>
        </div>

        <form @submit.prevent="submitForm" class="space-y-4">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200" for="name">Name</label>
                <input id="name" v-model="form.name" type="text" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none ring-0 focus:border-cyan-500" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200" for="email">Email</label>
                <input id="email" v-model="form.email" type="email" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200" for="message">Message</label>
                <textarea id="message" v-model="form.message" rows="4" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500" required></textarea>
            </div>
            <button type="submit" class="w-full rounded-2xl bg-cyan-500 px-4 py-3 font-semibold text-slate-950 transition hover:bg-cyan-400" :disabled="loading">
                {{ loading ? 'Sending...' : 'Send message' }}
            </button>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';

const form = reactive({ name: '', email: '', message: '' });
const loading = ref(false);

async function submitForm() {
    loading.value = true;

    const response = await fetch('/contact', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: JSON.stringify(form),
    });

    if (response.ok) {
        form.name = '';
        form.email = '';
        form.message = '';
        window.location.reload();
    }

    loading.value = false;
}
</script>
