<x-layout>
    <x-nav-bar />
    @if (session('status'))
        <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
            {{ __(session('status')) }}
        </div>
    @endif
    <h2 class="text-center">"Don't keep your secrets, share them anonymously!"</h2>
    <div class="container my-5">
        <div class="row acc">
            <!-- Profile Information Section -->
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="title-account">Account</h3>
                        <p>Update your account's profile information and email address</p>
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    value="{{ old('name', auth()->user()->name) }}" required autofocus
                                    autocomplete="name" />
                                @error('name')
                                    <p class="wrong">{{ $message }}</p>
                                    <p class="wrong">something wrong</p>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    value="{{ old('email', auth()->user()->email) }}" required
                                    autocomplete="username" />
                                @error('email')
                                    <p class="wrong">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Edit Account Button -->
                            <button type="submit" class="btn btn-dark">Edit Account</button>
                        </form>

                        <!-- Logout Button -->

                    </div>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="title-account">Change Password</h4>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')

                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="update_password_current_password">Current Password</label>
                                <input class="form-control" id="update_password_current_password"
                                    name="current_password" type="password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <!-- New Password -->
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="update_password_password" name="password" type="password"
                                    class="form-control" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm New Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="update_password_password_confirmation" name="password_confirmation"
                                    type="password" class="form-control" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Change Password Button -->
                            <button type="submit" class="btn btn-dark">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="row justify-content-center mt-4">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="title-account">Delete Account</h2>
                        <p>
                            Once your account is deleted, all of its resources and data will be permanently deleted.
                            Before deleting your account, please download any data or information that you wish to
                            retain.
                        </p>

                        <!-- Delete Account Button -->
                        <button type="button" class="btn btn-dark" id="delete-account-btn">Delete Account</button>

                        <!-- Custom Modal for Deleting Account -->
                        <div id="customModal" class="custom-modal" style="display: none;">
                            <div class="custom-modal-dialog p-6">
                                <h2 class="text-lg font-medium text-gray-900">
                                    Are you sure you want to delete your account?
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    Once your account is deleted, all of its resources and data will be permanently
                                    deleted. Please enter your password to confirm you would like to permanently delete
                                    your account.
                                </p>

                                <!-- Delete Account Form -->
                                <form id="delete-account-form" method="post" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    <div class="mt-6">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" name="password" type="password"
                                            class="mt-1 block w-3/4 form-control" placeholder="Password" />
                                        @error('password', 'userDeletion')
                                            <p class="wrong">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button type="button" class="btn btn-secondary me-3" id="cancelDelete">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-danger" id="confirmDelete">
                                            Delete Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButton = document.getElementById("delete-account-btn");
            const confirmButton = document.getElementById("confirmDelete");
            const cancelButton = document.getElementById("cancelDelete");
            const customModal = document.getElementById("customModal");
            const form = document.getElementById("delete-account-form");

            deleteButton.addEventListener("click", function() {
                customModal.style.display = "block";
            });

            confirmButton.addEventListener("click", function() {
                form.submit();
            });

            cancelButton.addEventListener("click", function() {
                customModal.style.display = "none";
            });

            window.addEventListener("click", function(event) {
                if (event.target === customModal) {
                    customModal.style.display = "none";
                }
            });
        });
    </script>
</x-layout>
