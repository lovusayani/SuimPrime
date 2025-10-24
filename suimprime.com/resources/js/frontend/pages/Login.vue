<template>
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-5 col-md-8 col-11">
            <div class="card user-login-card my-5 p-4">
                <!-- Header -->
                <div class="text-center auth-heading mb-3">
                    <a href="#" class="d-inline-block mb-2">
                        <img
                            :src="settings.dark_logo"
                            alt="Logo"
                            class="img-fluid logo h-4 mb-2"
                        />
                    </a>
                    <h5>
                        Welcome Back to {{ settings.app_name }}: Your Ultimate
                        Entertainment Hub!
                    </h5>
                    <p class="fs-14">We've eagerly awaited your return.</p>
                </div>

                <!-- Error Message -->
                <p class="text-danger" v-if="errorMessage">
                    {{ errorMessage }}
                </p>

                <!-- Login Form -->
                <form @submit.prevent="login" novalidate>
                    <input type="hidden" name="_token" value="..." />
                    <div class="input-group mb-3">
                        <span class="input-group-text px-0">
                            <PhEnvelope :size="20" />
                        </span>
                        <input
                            type="email"
                            v-model="email"
                            class="form-control"
                            placeholder="Email"
                            required
                        />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text px-0">
                            <PhLockKey :size="20" />
                        </span>
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            v-model="password"
                            class="form-control"
                            placeholder="Enter password"
                            required
                        />
                        <span
                            class="input-group-text px-0"
                            style="cursor: pointer"
                            @click="togglePassword"
                        >
                            <PhEye v-if="showPassword" :size="20" />
                            <PhEyeSlash v-else :size="20" />
                        </span>
                    </div>

                    <div
                        class="d-flex flex-wrap align-items-center justify-content-between mb-3"
                    >
                        <label class="form-check-label">
                            <input
                                type="checkbox"
                                v-model="rememberMe"
                                class="form-check-input me-2"
                            />
                            Remember Me
                        </label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Sign In
                        </button>
                    </div>

                    <p class="text-center mb-3">
                        Don't have an account? <a href="/signup">Sign up</a>
                    </p>

                    <div class="border-style text-center mb-3">
                        <span>Or</span>
                    </div>

                    <!-- Social Buttons -->
                    <!-- <div class="d-grid gap-2">
                        <button
                            class="btn btn-dark w-100"
                            @click.prevent="loginWithGoogle"
                        >
                            <svg
                                class="me-2"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                              
                            </svg>
                            Sign in with Google
                        </button>
                        <button
                            class="btn btn-dark w-100"
                            @click.prevent="loginWithOTP"
                        >
                            Login With OTP
                        </button>
                        <a href="#" class="btn btn-link text-center mt-2"
                            >Admin Panel</a
                        >
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios, { setAuthToken } from "../axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { PhEnvelope, PhLockKey, PhEye, PhEyeSlash } from "@phosphor-icons/vue";

const email = ref("test2@gmail.com");
const password = ref("12345678");
const rememberMe = ref(false);
const showPassword = ref(false);
const errorMessage = ref("");
const router = useRouter();

const settings = ref({
    app_name: "SuimPrime",
    dark_logo: "/public/assets/logo/dark_logo.png",
});

// Fetch settings on mount
onMounted(async () => {
    try {
        const response = await axios.get("/api/settings");
        settings.value = response.data;
    } catch (error) {
        console.error("Failed to load settings:", error);
    }
});

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};

// axios instance configured in ../axios.js handles baseURL and withCredentials

const login = async () => {
    try {
        // Step 1: Get CSRF cookie
        await axios.get("/sanctum/csrf-cookie");

        // Step 2: Submit login to API login route
        // Note: backend routes are registered at '/login' (no /api prefix in this app)
        const res = await axios.post("/login", {
            email: email.value,
            password: password.value,
        });
        console.log(email);

        // Step 3: Save token and user data if returned
        const returnedToken = res.data?.access_token;
        if (returnedToken) {
            setAuthToken(returnedToken);
        }

        // If the backend returned a user object, persist it so the navbar can show the name
        const returnedUser = res.data?.user || res.data;
        if (returnedUser && returnedUser?.id) {
            try {
                localStorage.setItem("user", JSON.stringify(returnedUser));
            } catch (e) {}
            // Emit an in-page event so Navbar (already mounted) can update immediately
            try {
                window.dispatchEvent(
                    new CustomEvent("auth:login", {
                        detail: { user: returnedUser },
                    })
                );
            } catch (e) {}
        }

        // Navigate to Home; Home will call /me to fetch user via cookie or token if necessary.
        router.push({ name: "Home" });
    } catch (err) {
        console.error("Login error:", err);
        errorMessage.value = err.response?.data?.message || "Login failed";
    }
};
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
