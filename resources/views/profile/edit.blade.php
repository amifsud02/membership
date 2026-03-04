<x-app-layout>
    <x-slot name="header">Account Settings</x-slot>

    <div class="space-y-12 pb-20">
        <!-- Header Info -->
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900 mb-2">My Profile</h1>
            <p class="text-slate-500 font-medium">Manage your personal information, security, and account preferences.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-12 max-w-4xl">
            <!-- Profile Information -->
            <section
                class="bg-white rounded-[40px] p-8 md:p-12 shadow-xl shadow-slate-100 border border-slate-50 overflow-hidden relative">
                <div
                    class="absolute top-0 right-0 w-48 h-48 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <div class="mb-10">
                        <h2 class="text-2xl font-black text-slate-900 mb-1">Personal Details</h2>
                        <p class="text-slate-400 text-sm font-medium">Update your account's profile information and
                            email address.</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            <!-- Password Update -->
            <section
                class="bg-white rounded-[40px] p-8 md:p-12 shadow-xl shadow-slate-100 border border-slate-50 overflow-hidden relative">
                <div
                    class="absolute top-0 right-0 w-48 h-48 bg-indigo-500/5 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <div class="mb-10">
                        <h2 class="text-2xl font-black text-slate-900 mb-1">Security</h2>
                        <p class="text-slate-400 text-sm font-medium">Ensure your account is using a long, random
                            password to stay secure.</p>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            <!-- Danger Zone -->
            <section class="bg-red-50/30 rounded-[40px] p-8 md:p-12 border border-red-100 overflow-hidden relative">
                <div class="relative z-10">
                    <div class="mb-10">
                        <h2 class="text-2xl font-black text-red-900 mb-1">Danger Zone</h2>
                        <p class="text-red-900/60 text-sm font-medium">Once your account is deleted, all of its
                            resources and data will be permanently deleted.</p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </section>
        </div>
    </div>
</x-app-layout>