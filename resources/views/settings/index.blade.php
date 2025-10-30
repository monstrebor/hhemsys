@extends('layout.layout')

@section('title', 'Settings')

@section('content')
    <div class="flex min-h-screen bg-gray-100">

        @include("partials.sidebar")

        <div class="flex-1 flex flex-col">
            @include("partials.navbar")
            @include("layout.all-notif")
            <main class="flex-1 p-6 overflow-y-auto bg-gray-50">
                <div class="w-full max-w-4xl mx-auto">
                    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Settings</h1>
                    <p class="text-center text-gray-600 mb-8">Manage your account and security settings here.</p>

                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-700">Account Settings</h2>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#settingsModal">
                                    Change Password
                                </button>
                            </div>
                            <p class="text-gray-500">Update your password or other account settings below.</p>

                            <div class="mt-8">
                                <h2 class="text-xl font-semibold text-gray-700">Notifications</h2>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="emailNotifications">
                                    <label class="form-check-label" for="emailNotifications">Receive email
                                        notifications</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">Receive SMS notifications</label>
                                </div>
                            </div>

                            <div class="mt-8">
                                <h2 class="text-xl font-semibold text-gray-700">Privacy Settings</h2>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="twoFactorAuth">
                                    <label class="form-check-label" for="twoFactorAuth">Enable Two-Factor
                                        Authentication</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="publicProfile">
                                    <label class="form-check-label" for="publicProfile">Make my profile public</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('settings.modal-password')
        </div>
    </div>
@endsection