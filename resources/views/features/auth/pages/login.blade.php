@extends('layouts.auth')

@section('content')
    {{-- Mobile: allow page scroll. Desktop: lock screen + right column scroll --}}
    <div class="bg-slate-950 text-slate-100 lg:max-h-screen">
        <div class="min-h-screen lg:h-full">
            <div class="grid min-h-screen grid-cols-1 lg:h-full lg:grid-cols-12">

                {{-- HERO (Mobile visible) --}}
                <section class="relative lg:hidden">
                    <div class="absolute inset-0 from-indigo-700/25 via-purple-700/15 to-cyan-500/10"></div>
                    <div
                        class="absolute inset-0 bg-[radial-gradient(circle_at_15%_25%,rgba(99,102,241,0.35),transparent_55%),radial-gradient(circle_at_75%_30%,rgba(168,85,247,0.25),transparent_55%),radial-gradient(circle_at_50%_85%,rgba(34,211,238,0.16),transparent_60%)]">
                    </div>
                    <div class="relative">
                        <div class="mx-auto max-w-xl">
                            <div
                                class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200">
                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                Game Hub • Secure Login
                            </div>
                            <h1 class="mt-6 text-3xl font-semibold tracking-tight">
                                Welcome back to
                                <span class=" from-indigo-400 to-purple-400 bg-clip-text text-transparent">Game Hub</span>
                            </h1>
                            <p class="mt-3 text-sm leading-relaxed text-slate-300">
                                Quản lý game, session và tài khoản trong một dashboard gọn gàng.
                            </p>
                        </div>
                    </div>
                </section>

                {{-- LEFT (Desktop only) --}}
                <section class="relative hidden lg:col-span-8 lg:block lg:h-full">
                    <div class="absolute inset-0 from-indigo-700/25 via-purple-700/15 to-cyan-500/10"></div>
                    <div
                        class="absolute inset-0 bg-[radial-gradient(circle_at_15%_25%,rgba(99,102,241,0.35),transparent_55%),radial-gradient(circle_at_75%_30%,rgba(168,85,247,0.25),transparent_55%),radial-gradient(circle_at_50%_85%,rgba(34,211,238,0.16),transparent_60%)]">
                    </div>
                    <div class="absolute inset-0 from-slate-950/0 via-slate-950/0 to-slate-950/35"></div>

                    <div class="relative z-10 flex h-full items-center">
                        <div class="w-full px-14 xl:px-20">
                            <div class="max-w-3xl">
                                <div
                                    class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                    Game Hub • Secure Login
                                </div>

                                <h1 class="mt-8 text-5xl font-semibold tracking-tight">
                                    Welcome back to
                                    <span
                                        class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Game
                                        Hub</span>
                                </h1>

                                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-slate-300">
                                    Quản lý game, session và tài khoản trong một dashboard gọn gàng.
                                    Đăng nhập để tiếp tục trải nghiệm.
                                </p>

                                <div class="mt-10 grid max-w-2xl grid-cols-3 gap-4">
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                        <div class="text-sm text-slate-300">JWT</div>
                                        <div class="mt-2 text-2xl font-semibold">Rotation</div>
                                        <div class="mt-1 text-sm text-slate-400">Refresh token an toàn</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                        <div class="text-sm text-slate-300">OAuth</div>
                                        <div class="mt-2 text-2xl font-semibold">Providers</div>
                                        <div class="mt-1 text-sm text-slate-400">Google/Facebook/Apple</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                        <div class="text-sm text-slate-300">Security</div>
                                        <div class="mt-2 text-2xl font-semibold">Guard</div>
                                        <div class="mt-1 text-sm text-slate-400">Chặn reuse token</div>
                                    </div>
                                </div>

                                <div class="mt-12 text-sm text-slate-400">
                                    © {{ date('Y') }} Game Hub. All rights reserved.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="relative lg:col-span-4 lg:h-screen">
                    <div class="absolute inset-0 bg-slate-950"></div>
                    <div class="absolute inset-0 hidden border-l border-white/5 lg:block"></div>

                    <div class="relative lg:h-screen">

                        <div class="mx-auto w-full lg:flex lg:min-h-screen lg:items-center">
                            <div
                                class="w-full h-screen border border-white/10 bg-slate-900/55 p-7 shadow-2xl shadow-black/35 backdrop-blur">
                                <div class="mb-6">
                                    <h2 class="text-2xl font-semibold tracking-tight">Đăng nhập</h2>
                                    <p class="mt-1 text-sm text-slate-400">Nhập thông tin để tiếp tục.</p>
                                </div>

                                @if ($errors->any())
                                    <div
                                        class="mb-5 rounded-2xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-200">
                                        <div class="font-medium">Có lỗi xảy ra:</div>
                                        <ul class="mt-2 list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('auth.login') }}" class="space-y-4">
                                    @csrf

                                    <div>
                                        <label for="email"
                                            class="mb-1.5 block text-sm font-medium text-slate-200">Email</label>
                                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                                            required
                                            class="w-full rounded-2xl border border-white/10 bg-slate-950/50 px-4 py-3 text-slate-100 outline-none placeholder:text-slate-500 focus:border-indigo-400/50 focus:ring-4 focus:ring-indigo-500/15"
                                            placeholder="you@example.com" />
                                    </div>

                                    <div>
                                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-200">Mật
                                            khẩu</label>
                                        <input id="password" name="password" type="password" required
                                            class="w-full rounded-2xl border border-white/10 bg-slate-950/50 px-4 py-3 text-slate-100 outline-none placeholder:text-slate-500 focus:border-indigo-400/50 focus:ring-4 focus:ring-indigo-500/15"
                                            placeholder="••••••••" />
                                    </div>

                                    <div class="flex items-center justify-between gap-3">
                                        <label class="inline-flex items-center gap-2 text-sm text-slate-300">
                                            <input type="checkbox" name="remember"
                                                class="h-4 w-4 rounded border-white/20 bg-slate-950/60 text-indigo-500 focus:ring-indigo-500/20" />
                                            Ghi nhớ
                                        </label>
                                        <a href="#" class="text-sm text-indigo-300 hover:text-indigo-200">Quên mật
                                            khẩu?</a>
                                    </div>

                                    <button type="submit"
                                        class="mt-2 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-4 py-3 font-semibold text-white shadow-lg shadow-indigo-600/25 transition hover:bg-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/30">
                                        Đăng nhập <span aria-hidden="true">→</span>
                                    </button>

                                    <div class="relative py-2">
                                        <div class="absolute inset-0 flex items-center">
                                            <div class="w-full border-t border-white/10"></div>
                                        </div>
                                        <div class="relative flex justify-center">
                                            <span class="bg-slate-900/55 px-3 text-xs text-slate-400">HOẶC</span>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-3">

                                        <a href="{{ route('auth.oauth.redirect', ['provider' => 'google']) }}"
                                            class="flex items-center justify-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-slate-100 transition hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/10">

                                            <svg class="h-5 w-5" viewBox="0 0 48 48">
                                                <path fill="#EA4335"
                                                    d="M24 9.5c3.54 0 6.73 1.22 9.24 3.6l6.9-6.9C35.64 2.36 30.24 0 24 0 14.64 0 6.36 5.4 2.4 13.26l8.04 6.24C12.3 13.14 17.64 9.5 24 9.5z" />
                                                <path fill="#4285F4"
                                                    d="M46.08 24.55c0-1.64-.14-3.22-.4-4.75H24v9h12.4c-.54 2.9-2.18 5.36-4.64 7.02l7.2 5.6c4.2-3.88 6.6-9.6 6.6-16.87z" />
                                                <path fill="#FBBC05"
                                                    d="M10.44 28.5A14.5 14.5 0 019.5 24c0-1.56.28-3.06.78-4.5l-8.04-6.24A23.94 23.94 0 000 24c0 3.96.96 7.7 2.64 11.04l7.8-6.54z" />
                                                <path fill="#34A853"
                                                    d="M24 48c6.24 0 11.64-2.06 15.52-5.58l-7.2-5.6c-2 1.34-4.56 2.13-8.32 2.13-6.36 0-11.7-3.64-13.56-8.96l-7.8 6.54C6.36 42.6 14.64 48 24 48z" />
                                            </svg>

                                            Google
                                        </a>

                                        <a href="{{ route('auth.oauth.redirect', ['provider' => 'facebook']) }}"
                                            class="flex items-center justify-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-slate-100 transition hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/10">

                                            <svg class="h-5 w-5 fill-[#1877F2]" viewBox="0 0 24 24">
                                                <path
                                                    d="M22 12a10 10 0 10-11.56 9.87v-6.99h-2.9V12h2.9V9.8c0-2.87 1.71-4.46 4.34-4.46 1.26 0 2.58.23 2.58.23v2.83h-1.45c-1.43 0-1.88.89-1.88 1.8V12h3.2l-.51 2.88h-2.69v6.99A10 10 0 0022 12z" />
                                            </svg>

                                            Facebook
                                        </a>

                                        <a href="{{ route('auth.oauth.redirect', ['provider' => 'apple']) }}"
                                            class="flex items-center justify-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-slate-100 transition hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/10">

                                            <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M16.365 1.43c0 1.14-.465 2.24-1.26 3.06-.84.87-2.22 1.53-3.33 1.44-.15-1.17.42-2.43 1.2-3.24.87-.9 2.31-1.56 3.39-1.26zM21.75 17.1c-.63 1.44-.93 2.07-1.74 3.33-1.14 1.83-2.73 4.11-4.68 4.14-1.74.03-2.19-1.11-4.56-1.11-2.37 0-2.88 1.08-4.62 1.14-1.95.06-3.45-2.07-4.59-3.9C.93 18.27 0 15.42 0 12.75c0-4.32 2.82-6.63 5.58-6.66 1.74-.03 3.39 1.17 4.56 1.17 1.17 0 3.03-1.44 5.1-1.23.87.03 3.33.36 4.92 2.67-.12.09-2.94 1.71-2.91 5.1.03 4.05 3.57 5.4 3.6 5.43z" />
                                            </svg>

                                            Apple
                                        </a>
                                    </div>

                                    <p class="pt-3 text-center text-sm text-slate-400">
                                        Chưa có tài khoản?
                                        <a href="#" class="font-semibold text-indigo-300 hover:text-indigo-200">Đăng
                                            ký</a>
                                    </p>
                                </form>
                            </div>

                            <div class="mt-6 text-center text-xs text-slate-500 lg:hidden">
                                © {{ date('Y') }} Game Hub
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection
