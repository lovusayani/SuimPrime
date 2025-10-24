<template>
    <main class="flex-fill subscription-page">
        <div class="section-spacing-bottom">
            <div class="container" id="payment-container">
                <!-- Subscription Plans View -->
                <div v-if="!showPaymentForm">
                    <div class="page-title mb-5">
                        <h4 class="m-0 text-center text-white">
                            Subscription plans
                        </h4>
                    </div>

                    <!-- Active Plan Status -->
                    <div
                        class="upgrade-plan d-flex flex-wrap gap-3 align-items-center justify-content-between rounded p-4 bg-warning-subtle border border-warning mb-5"
                    >
                        <div
                            class="d-flex justify-content-center align-items-center gap-4"
                        >
                            <PhCrown
                                :size="48"
                                weight="fill"
                                class="text-warning"
                            />
                            <div>
                                <h6 class="super-plan mb-2">No Active Plan</h6>
                                <p class="mb-0 text-body">
                                    You do not have an active subscription.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button
                                class="btn btn-primary subscription-btn"
                                @click="scrollToPlans"
                            >
                                Subscribe
                            </button>
                        </div>
                    </div>

                    <!-- Subscription Plans Grid -->
                    <div
                        class="row gy-4 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3"
                        v-if="plans.length > 0"
                    >
                        <!-- Dynamic Plans from Database -->
                        <div class="col" v-for="plan in plans" :key="plan.id">
                            <div class="subscription-plan-wrapper rounded">
                                <div class="subscription-plan-header">
                                    <p class="subscription-name text-uppercase">
                                        {{ plan.name }}
                                    </p>
                                    <p class="subscription-price mb-3">
                                        <span
                                            v-if="
                                                plan.discount > 0 ||
                                                plan.discount_percentage > 0
                                            "
                                            class="original-price"
                                            >₹{{ plan.original_price }}</span
                                        >
                                        ₹{{ plan.price }}
                                        <span class="subscription-price-desc"
                                            >/ {{ plan.duration }}</span
                                        >
                                    </p>
                                    <p class="line-count-3">
                                        {{
                                            plan.description ||
                                            `The ${plan.name} plan provides access to content with various features and benefits.`
                                        }}
                                    </p>
                                </div>
                                <div class="readmore-wrapper">
                                    <ul
                                        class="list-inline subscription-details"
                                    >
                                        <!-- Video Casting -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                        >
                                            <PhCheckCircle
                                                v-if="
                                                    plan.features
                                                        .casting_enabled
                                                "
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <PhXCircle
                                                v-else
                                                weight="fill"
                                                class="text-danger align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                {{
                                                    plan.features
                                                        .casting_enabled
                                                        ? "Video Casting is enabled."
                                                        : "Video Casting is disabled."
                                                }}
                                            </span>
                                        </li>

                                        <!-- Ads -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                        >
                                            <PhCheckCircle
                                                v-if="plan.features.ads_enabled"
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <PhXCircle
                                                v-else
                                                weight="fill"
                                                class="text-danger align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                {{
                                                    plan.features.ads_enabled
                                                        ? "Ads will be shown."
                                                        : "Ads will not be shown."
                                                }}
                                            </span>
                                        </li>

                                        <!-- Device Limit -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                        >
                                            <PhCheckCircle
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                You can use up to
                                                {{ plan.features.device_limit }}
                                                device(s) simultaneously.
                                            </span>
                                        </li>

                                        <!-- Download Resolutions -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                            v-if="
                                                plan.features
                                                    .download_resolutions &&
                                                plan.features
                                                    .download_resolutions
                                                    .length > 0
                                            "
                                        >
                                            <PhCheckCircle
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                Download resolutions:
                                                <ul
                                                    class="sub-limits ps-0 mt-1"
                                                >
                                                    <li
                                                        class="d-flex align-items-center gap-2 mb-2"
                                                        v-for="resolution in plan
                                                            .features
                                                            .download_resolutions"
                                                        :key="resolution"
                                                    >
                                                        <PhCheckCircle
                                                            weight="fill"
                                                            class="text-success"
                                                        />
                                                        {{ resolution }}
                                                    </li>
                                                </ul>
                                            </span>
                                        </li>

                                        <!-- Supported Devices -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                            v-if="
                                                plan.features
                                                    .supported_devices &&
                                                plan.features.supported_devices
                                                    .length > 0
                                            "
                                        >
                                            <PhCheckCircle
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                Supported on:
                                                {{
                                                    plan.features.supported_devices.join(
                                                        ", "
                                                    )
                                                }}.
                                            </span>
                                        </li>

                                        <!-- Profile Limit -->
                                        <li
                                            class="list-desc d-flex align-items-start gap-3 mb-2"
                                        >
                                            <PhCheckCircle
                                                weight="fill"
                                                class="text-success align-middle"
                                            />
                                            <span
                                                class="font-size-16 text-white"
                                            >
                                                You can create up to
                                                {{
                                                    plan.features.profile_limit
                                                }}
                                                profiles on this plan for
                                                different users.
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <button
                                    type="button"
                                    class="rounded btn btn-primary subscription-btn w-100"
                                    @click="selectPlan(plan)"
                                >
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div v-else-if="loading" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="text-white mt-3">
                            Loading subscription plans...
                        </p>
                    </div>

                    <!-- No Plans Available -->
                    <div v-else class="text-center py-5">
                        <h5 class="text-white">
                            No subscription plans available at the moment.
                        </h5>
                        <p class="text-muted">Please check back later.</p>
                    </div>
                </div>

                <!-- Payment Form View -->
                <div v-else class="section-spacing-bottom">
                    <div class="container">
                        <!-- Back Button -->
                        <a
                            href="#"
                            @click.prevent="showPaymentForm = false"
                            class="text-decoration-none text-white flex-none mb-5 d-inline-block"
                        >
                            <PhCaretLeft :size="20" />
                            <span class="font-size-18 fw-medium"
                                >Back to subscription plan</span
                            >
                        </a>

                        <div class="row">
                            <!-- Plan Selection Column -->
                            <div class="col-lg-3">
                                <form id="plan-form">
                                    <div
                                        class="col-12 mb-4"
                                        v-for="plan in plans"
                                        :key="plan.id"
                                    >
                                        <label
                                            class="form-check stripe-payment-form p-4 position-relative rounded"
                                            :for="`plan-${plan.id}`"
                                        >
                                            <input
                                                type="radio"
                                                :id="`plan-${plan.id}`"
                                                name="plan_name"
                                                :value="plan.id"
                                                :data-amount="plan.price"
                                                class="form-check-input payment-radio-btn"
                                                :checked="
                                                    selectedPlan &&
                                                    selectedPlan.id === plan.id
                                                "
                                                @change="
                                                    updateSelectedPlan(plan)
                                                "
                                            />
                                            <span class="form-check-label">
                                                <span
                                                    class="text-uppercase fw-medium d-block mb-2 text-white"
                                                    >{{ plan.name }}</span
                                                >
                                                <span class="h4 text-white">
                                                    ₹{{ plan.price }}
                                                    <span
                                                        class="font-size-14 text-body"
                                                        >/
                                                        {{
                                                            plan.duration
                                                        }}</span
                                                    >
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </form>
                            </div>

                            <!-- Payment Details Column -->
                            <div class="col-lg-9 mt-lg-0 mt-5">
                                <form
                                    @submit.prevent="processPayment"
                                    id="payment-form"
                                >
                                    <!-- Payment Method Selection -->
                                    <div class="form-group mb-4">
                                        <label
                                            class="form-label text-white"
                                            for="payment-method"
                                            >Choose Payment Method:</label
                                        >
                                        <select
                                            id="payment-method"
                                            name="payment_method"
                                            class="form-select"
                                            v-model="paymentMethod"
                                        >
                                            <option value="" disabled>
                                                Select Payment Method
                                            </option>
                                            <option value="cashfree">
                                                Cashfree
                                            </option>
                                            <option value="razorpay">
                                                Razorpay
                                            </option>
                                            <option value="stripe">
                                                Stripe
                                            </option>
                                            <option value="paypal">
                                                PayPal
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Payment Details Table -->
                                    <div class="mt-4">
                                        <div
                                            class="payment-detail rounded p-4"
                                            style="
                                                background: #1a1a1a;
                                                border: 1px solid #333;
                                            "
                                        >
                                            <h6
                                                class="font-size-18 mb-4"
                                                style="
                                                    color: #ffffff !important;
                                                "
                                            >
                                                Payment Details
                                            </h6>
                                            <div
                                                class="table-responsive"
                                                style="
                                                    background: transparent !important;
                                                "
                                            >
                                                <table
                                                    class="table table-borderless"
                                                    style="
                                                        background: transparent !important;
                                                        color: #ffffff !important;
                                                    "
                                                >
                                                    <tbody
                                                        style="
                                                            background: transparent !important;
                                                        "
                                                    >
                                                        <tr
                                                            style="
                                                                background: transparent !important;
                                                            "
                                                        >
                                                            <td
                                                                style="
                                                                    color: #ffffff !important;
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                Amount
                                                            </td>
                                                            <td
                                                                style="
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                <h6
                                                                    class="font-size-18 text-end mb-0"
                                                                    style="
                                                                        color: #ffffff !important;
                                                                    "
                                                                >
                                                                    ₹{{
                                                                        selectedPlan
                                                                            ? selectedPlan.price
                                                                            : "0.00"
                                                                    }}
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="discount > 0"
                                                            style="
                                                                background: transparent !important;
                                                            "
                                                        >
                                                            <td
                                                                style="
                                                                    color: #ffffff !important;
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                Discount
                                                            </td>
                                                            <td
                                                                style="
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                <h6
                                                                    class="font-size-18 text-end mb-0"
                                                                    style="
                                                                        color: #28a745 !important;
                                                                    "
                                                                >
                                                                    -₹{{
                                                                        discount
                                                                    }}
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            style="
                                                                background: transparent !important;
                                                            "
                                                        >
                                                            <td
                                                                style="
                                                                    color: #ffffff !important;
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                Tax
                                                            </td>
                                                            <td
                                                                style="
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                <h6
                                                                    class="font-size-18 text-end mb-0"
                                                                    style="
                                                                        color: #007bff !important;
                                                                    "
                                                                >
                                                                    +₹{{ tax }}
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            class="border-bottom"
                                                            style="
                                                                background: transparent !important;
                                                                border-bottom: 1px
                                                                    solid #444 !important;
                                                            "
                                                        >
                                                            <td
                                                                style="
                                                                    color: #ffffff !important;
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                Total
                                                            </td>
                                                            <td
                                                                style="
                                                                    background: transparent !important;
                                                                    border: none !important;
                                                                "
                                                            >
                                                                <h6
                                                                    class="font-size-18 text-end mb-0"
                                                                    style="
                                                                        color: #ffffff !important;
                                                                    "
                                                                >
                                                                    ₹{{
                                                                        totalAmount
                                                                    }}
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="mt-4">
                                                    <div
                                                        class="d-flex justify-content-between gap-3"
                                                    >
                                                        <h6
                                                            style="
                                                                color: #ffffff !important;
                                                            "
                                                        >
                                                            Total Payment
                                                        </h6>
                                                        <div
                                                            class="d-flex justify-content-center align-items-center gap-3"
                                                        >
                                                            <h5
                                                                class="mb-0"
                                                                style="
                                                                    color: #ffffff !important;
                                                                "
                                                            >
                                                                ₹{{
                                                                    totalAmount
                                                                }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mt-4">
                                            <div
                                                class="d-flex justify-content-end"
                                            >
                                                <div
                                                    class="d-flex justify-content-center align-items-center gap-4 flex-wrap"
                                                >
                                                    <div
                                                        class="d-flex justify-content-center align-items-center gap-2"
                                                    >
                                                        <PhLockKey
                                                            weight="fill"
                                                            class="text-primary"
                                                        />
                                                        <p
                                                            class="mb-0 text-white"
                                                        >
                                                            Payments are secured
                                                            and encrypted
                                                        </p>
                                                    </div>
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary"
                                                        :disabled="
                                                            !paymentMethod ||
                                                            processing
                                                        "
                                                    >
                                                        <span v-if="processing"
                                                            >Processing...</span
                                                        >
                                                        <span v-else
                                                            >Proceed
                                                            Payment</span
                                                        >
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import { useRouter } from "vue-router";
import axios from "../axios";
import {
    PhCrown,
    PhCaretLeft,
    PhLockKey,
    PhCheckCircle,
    PhXCircle,
} from "@phosphor-icons/vue";

const router = useRouter();

// Reactive data
const plans = ref([]);
const loading = ref(true);
const showPaymentForm = ref(false);
const selectedPlan = ref(null);
const paymentMethod = ref("");
const processing = ref(false);

// Payment calculation
const discount = ref(0);
const tax = computed(() => {
    if (!selectedPlan.value) return 0;
    return Math.round(selectedPlan.value.price * 0.18); // 18% tax
});

const totalAmount = computed(() => {
    if (!selectedPlan.value) return 0;
    return selectedPlan.value.price - discount.value + tax.value;
});

// Fetch plans from API
const fetchPlans = async () => {
    try {
        loading.value = true;
        const response = await axios.get("/api/plans");

        if (response.data.success) {
            plans.value = response.data.plans;
        } else {
            console.error("Failed to fetch plans:", response.data.message);
        }
    } catch (error) {
        console.error("Error fetching plans:", error);
    } finally {
        loading.value = false;
    }
};

// Scroll to plans section function
const scrollToPlans = () => {
    const plansSection = document.querySelector(".row.gy-4");
    if (plansSection) {
        plansSection.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });
    }
};

// Select plan function - now shows payment form
const selectPlan = (plan) => {
    selectedPlan.value = plan;
    showPaymentForm.value = true;
};

// Update selected plan in payment form
const updateSelectedPlan = (plan) => {
    selectedPlan.value = plan;
};

// Process payment
const processPayment = async () => {
    if (!paymentMethod.value) {
        alert("Please select a payment method.");
        return;
    }

    if (!selectedPlan.value) {
        alert("Please select a plan.");
        return;
    }

    try {
        processing.value = true;

        const response = await axios.post("/api/select-plan", {
            plan_id: selectedPlan.value.id,
            plan_name: selectedPlan.value.name,
            price: totalAmount.value,
            payment_method: paymentMethod.value,
        });

        // Handle successful plan selection
        console.log("Plan selected:", response.data);
        alert(
            `Payment initiated for ${selectedPlan.value.name} plan! Total: ₹${totalAmount.value}`
        );

        // Reset form
        showPaymentForm.value = false;
        selectedPlan.value = null;
        paymentMethod.value = "";
    } catch (error) {
        if (error.response?.status === 419 || error.response?.status === 401) {
            // Token mismatch or unauthorized, redirect to login
            router.push({ name: "Login" });
        } else {
            console.error("Error processing payment:", error);
            alert("An error occurred while processing payment.");
        }
    } finally {
        processing.value = false;
    }
};

// Fetch plans on component mount
onMounted(() => {
    fetchPlans();
});
</script>
<style scoped>
.subscription-page {
    background-color: #0d0d0d;
    min-height: 100vh;
    padding-top: 100px;
    padding-bottom: 50px;
}

.section-spacing-bottom {
    padding-bottom: 3rem;
}

.page-title h4 {
    font-size: 2rem;
    font-weight: 700;
}

.bg-warning-subtle {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.border-warning {
    border-color: rgba(255, 193, 7, 0.3) !important;
}

.super-plan {
    color: #ffc107;
    font-weight: 600;
    font-size: 1.25rem;
}

.text-body {
    color: #aaa !important;
}

.subscription-plan-wrapper {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.subscription-plan-wrapper:hover {
    transform: translateY(-8px);
    border-color: rgba(229, 9, 20, 0.5);
    box-shadow: 0 8px 24px rgba(229, 9, 20, 0.3);
}

.subscription-plan-header {
    margin-bottom: 1.5rem;
}

.subscription-name {
    color: #e50914;
    font-weight: 700;
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.subscription-price {
    color: #fff;
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1;
}

.original-price {
    color: #999;
    font-size: 1.5rem;
    text-decoration: line-through;
    margin-right: 0.5rem;
    font-weight: 400;
}

.subscription-price-desc {
    color: #999;
    font-size: 1rem;
    font-weight: 400;
}

.line-count-3 {
    color: #aaa;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.readmore-wrapper {
    flex: 1;
    margin-bottom: 1.5rem;
}

.subscription-details {
    padding: 0;
    margin: 0;
}

.list-desc {
    color: #fff;
    line-height: 1.8;
}

.font-size-16 {
    font-size: 0.95rem;
}

.sub-limits {
    list-style: none;
    margin-left: 1rem;
}

.text-success {
    color: #28a745 !important;
}

.text-danger {
    color: #dc3545 !important;
}

.subscription-btn {
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.subscription-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(229, 9, 20, 0.4);
}

.btn-primary {
    background-color: #e50914;
    border-color: #e50914;
}

.btn-primary:hover {
    background-color: #ff1a1a;
    border-color: #ff1a1a;
}

.ph {
    font-size: 1.25rem;
}

.stripe-payment-form {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.stripe-payment-form:hover {
    border-color: rgba(229, 9, 20, 0.5);
    transform: translateY(-2px);
}

.stripe-payment-form input[type="radio"]:checked + .form-check-label {
    color: #e50914;
}

.stripe-payment-form:has(input[type="radio"]:checked) {
    border-color: #e50914;
    background: linear-gradient(135deg, #2d1a1a 0%, #3d2d2d 100%);
}

.form-select {
    background-color: #222;
    border-color: #444;
    color: #fff;
}

.form-select:focus {
    background-color: #222;
    border-color: #e50914;
    color: #fff;
    box-shadow: 0 0 0 0.2rem rgba(229, 9, 20, 0.25);
}

.form-select option {
    background-color: #222;
    color: #fff;
}

.table {
    color: #fff;
}

.border-bottom {
    border-bottom: 1px solid #444 !important;
}

@media (max-width: 768px) {
    .subscription-page {
        padding-top: 80px;
    }

    .subscription-name {
        font-size: 1.25rem;
    }

    .subscription-price {
        font-size: 2rem;
    }
}
</style>
