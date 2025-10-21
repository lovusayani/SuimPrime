<template>
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-5 col-md-8 col-11 align-self-center">
            <div class="user-login-card card my-5 p-4">
                <!-- Header -->
                <div class="text-center auth-heading mb-3">
                    <a href="#" class="d-inline-block mb-2">
                        <img
                            src="/public/assets/logo/dark_logo.png"
                            alt="Logo"
                            class="img-fluid logo h-4 mb-4"
                        />
                    </a>
                    <h5>Sign up to Begin Your Adventure</h5>
                    <p class="font-size-14">
                        Create Your Account for unforgettable Experience
                    </p>
                </div>

                <!-- Error Message -->
                <p class="text-danger" v-if="errorMessage" id="error_message">
                    {{ errorMessage }}
                </p>

                <!-- Form -->
                <form
                    @submit.prevent="register"
                    id="registerForm"
                    class="requires-validation"
                    novalidate
                >
                    <!-- First Name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0"
                            ><i class="ph ph-user"></i
                        ></span>
                        <input
                            type="text"
                            v-model="firstName"
                            name="first_name"
                            class="form-control"
                            placeholder="First Name"
                            required
                        />
                        <div
                            class="invalid-feedback text-start"
                            id="first_name_error"
                        >
                            First Name field is required
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0"
                            ><i class="ph ph-user"></i
                        ></span>
                        <input
                            type="text"
                            v-model="lastName"
                            name="last_name"
                            class="form-control"
                            placeholder="Last Name"
                            required
                        />
                        <div
                            class="invalid-feedback text-start"
                            id="last_name_error"
                        >
                            Last Name field is required
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0"
                            ><i class="ph ph-envelope"></i
                        ></span>
                        <input
                            type="email"
                            v-model="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            required
                        />
                        <div
                            class="invalid-feedback text-start"
                            id="email_error"
                        >
                            Email field is required
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0"
                            ><i class="ph ph-lock-key"></i
                        ></span>
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            v-model="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Password"
                            required
                        />
                        <span
                            class="input-group-text px-0"
                            style="cursor: pointer"
                            @click="togglePassword"
                        >
                            <i
                                :class="
                                    showPassword
                                        ? 'ph ph-eye'
                                        : 'ph ph-eye-slash'
                                "
                                id="togglePassword"
                            ></i>
                        </span>
                        <div
                            class="invalid-feedback text-start"
                            id="password_error"
                        >
                            Password field is required
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0"
                            ><i class="ph ph-lock-key"></i
                        ></span>
                        <input
                            :type="showConfirmPassword ? 'text' : 'password'"
                            v-model="confirmPassword"
                            name="confirm_password"
                            id="confirm_password"
                            class="form-control"
                            placeholder="Confirm Password"
                            required
                        />
                        <span
                            class="input-group-text px-0"
                            style="cursor: pointer"
                            @click="toggleConfirmPassword"
                        >
                            <i
                                :class="
                                    showConfirmPassword
                                        ? 'ph ph-eye'
                                        : 'ph ph-eye-slash'
                                "
                                id="toggleConfirmPassword"
                            ></i>
                        </span>
                        <div
                            class="invalid-feedback text-start"
                            id="confirm_password_error"
                        >
                            Confirm Password field is required
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="full-button text-center">
                        <button
                            type="submit"
                            id="register-button"
                            class="btn btn-primary w-100"
                            data-signup-text="Sign up"
                        >
                            Sign up
                        </button>
                        <p class="mt-2 mb-0 fw-normal">
                            Already have an account?
                            <router-link to="/login" class="ms-1"
                                >Sign In</router-link
                            >
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const firstName = ref("");
const lastName = ref("");
const email = ref("");
const password = ref("");
const confirmPassword = ref("");
const showPassword = ref(false);
const showConfirmPassword = ref(false);
const errorMessage = ref("");

const togglePassword = () => (showPassword.value = !showPassword.value);
const toggleConfirmPassword = () =>
    (showConfirmPassword.value = !showConfirmPassword.value);

import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://127.0.0.1:8000";

import { useRouter } from "vue-router";
const router = useRouter();

const register = async () => {
    try {
        await axios.get("/sanctum/csrf-cookie"); // <--- important
        // Call your API
        const res = await axios.post("/register", {
            first_name: firstName.value,
            last_name: lastName.value,
            email: email.value,
            password: password.value,
            password_confirmation: confirmPassword.value,
        });
        localStorage.setItem("token", res.data.access_token);
        router.push({ name: "Home" });
    } catch (err) {
        errorMessage.value =
            err.response?.data?.message || "Registration failed";
    }
};
/* const register = () => {
    // simple validation example
    if (
        !firstName.value ||
        !lastName.value ||
        !email.value ||
        !password.value ||
        !confirmPassword.value
    ) {
        errorMessage.value = "All fields are required";
        return;
    }
    if (password.value !== confirmPassword.value) {
        errorMessage.value = "Passwords do not match";
        return;
    }

    errorMessage.value = "";
    console.log("Register form submitted:", {
        firstName: firstName.value,
        lastName: lastName.value,
        email: email.value,
        password: password.value,
    });

    // TODO: Call Laravel API to register
}; */
</script>

<style scoped>
.user-login-card {
    padding: 2.5em;
    margin: 0 auto;
    -webkit-backdrop-filter: blur(1.5625em);
    backdrop-filter: blur(1.5625em);
}
.user-login-card .auth-heading {
    margin-bottom: 2rem;
}
.user-login-card .input-group {
    border-bottom: 1px solid var(--bs-border-color);
    margin-bottom: 1.75rem;
}
.user-login-card .input-group .form-control {
    padding: 0.786rem 0.75rem;
}
.user-login-card .input-group .form-control:focus {
    border-color: transparent;
}
.user-login-card .logo {
    height: 45px;
}
.user-login-card .full-button {
    margin-top: 3.75rem;
}
</style>
