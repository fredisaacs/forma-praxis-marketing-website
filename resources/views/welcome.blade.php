<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="mx-auto flex max-w-6xl flex-col gap-8 px-6 py-10 lg:px-8">
        <header class="flex items-center justify-between rounded-full border border-slate-800 bg-slate-900/80 px-5 py-3 shadow-lg shadow-slate-950/40">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-cyan-400">Forma Praxis</p>
                <h1 class="text-lg font-semibold">Marketing & growth studio</h1>
            </div>
            <nav class="flex items-center gap-3 text-sm">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-full border border-cyan-500/40 px-4 py-2 text-cyan-300 hover:bg-cyan-500/10">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-full border border-slate-700 px-4 py-2 hover:bg-slate-800">Login</a>
                @endauth
            </nav>
        </header>

        <main class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
            <section class="rounded-3xl border border-slate-800 bg-slate-900/80 p-8 shadow-2xl shadow-slate-950/30">
                <p class="mb-3 inline-flex rounded-full bg-cyan-500/10 px-3 py-1 text-sm font-medium text-cyan-300">Laravel + Vue starter</p>
                <h2 class="text-4xl font-semibold leading-tight">Launch a polished site with a contact experience and an admin inbox.</h2>
                <p class="mt-4 max-w-2xl text-lg text-slate-300">This demo includes a public contact form, email delivery via Laravel Mail, and a protected admin panel for reviewing submissions.</p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-5">
                        <h3 class="font-semibold text-white">Public contact form</h3>
                        <p class="mt-2 text-sm text-slate-400">Visitors can submit their name, email, and message from the landing page.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-5">
                        <h3 class="font-semibold text-white">Admin panel</h3>
                        <p class="mt-2 text-sm text-slate-400">Authenticated users can review each message in a simple inbox view.</p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-800 bg-slate-900/80 p-8 shadow-2xl shadow-slate-950/30">
                <div id="app">
                    <contact-form></contact-form>
                </div>
                <div class="mt-4 space-y-3">
                    @if (session('success'))
                        <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="rounded-2xl border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-300">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
</body>
</html>
