<template>
    <main class="flex-fill subscription-page">
        <div class="section-spacing-bottom">
            <div class="container" id="payment-container">
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
                        <i class="ph ph-crown text-warning fs-1"></i>
                        <div>
                            <h6 class="super-plan mb-2">No Active Plan</h6>
                            <p class="mb-0 text-body">
                                You do not have an active subscription.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <button class="btn btn-light subscription-btn">
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
                                <ul class="list-inline subscription-details">
                                    <!-- Video Casting -->
                                    <li
                                        class="list-desc d-flex align-items-start gap-3 mb-2"
                                    >
                                        <i
                                            :class="
                                                plan.features.casting_enabled
                                                    ? 'ph ph-check-circle text-success'
                                                    : 'ph ph-x-circle text-danger'
                                            "
                                            class="align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
                                            {{
                                                plan.features.casting_enabled
                                                    ? "Video Casting is enabled."
                                                    : "Video Casting is disabled."
                                            }}
                                        </span>
                                    </li>

                                    <!-- Ads -->
                                    <li
                                        class="list-desc d-flex align-items-start gap-3 mb-2"
                                    >
                                        <i
                                            :class="
                                                plan.features.ads_enabled
                                                    ? 'ph ph-check-circle text-success'
                                                    : 'ph ph-x-circle text-danger'
                                            "
                                            class="align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
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
                                        <i
                                            class="ph ph-check-circle text-success align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
                                            You can use up to
                                            {{
                                                plan.features.device_limit
                                            }}
                                            device(s) simultaneously.
                                        </span>
                                    </li>

                                    <!-- Download Resolutions -->
                                    <li
                                        class="list-desc d-flex align-items-start gap-3 mb-2"
                                        v-if="
                                            plan.features
                                                .download_resolutions &&
                                            plan.features.download_resolutions
                                                .length > 0
                                        "
                                    >
                                        <i
                                            class="ph ph-check-circle text-success align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
                                            Download resolutions:
                                            <ul class="sub-limits ps-0 mt-1">
                                                <li
                                                    class="d-flex align-items-center gap-2 mb-2"
                                                    v-for="resolution in plan
                                                        .features
                                                        .download_resolutions"
                                                    :key="resolution"
                                                >
                                                    <i
                                                        class="ph ph-check-circle text-success"
                                                    ></i>
                                                    {{ resolution }}
                                                </li>
                                            </ul>
                                        </span>
                                    </li>

                                    <!-- Supported Devices -->
                                    <li
                                        class="list-desc d-flex align-items-start gap-3 mb-2"
                                        v-if="
                                            plan.features.supported_devices &&
                                            plan.features.supported_devices
                                                .length > 0
                                        "
                                    >
                                        <i
                                            class="ph ph-check-circle text-success align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
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
                                        <i
                                            class="ph ph-check-circle text-success align-middle"
                                        ></i>
                                        <span class="font-size-16 text-white">
                                            You can create up to
                                            {{
                                                plan.features.profile_limit
                                            }}
                                            profiles on this plan for different
                                            users.
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <button
                                type="button"
                                class="rounded btn btn-primary subscription-btn w-100"
                                @click="
                                    selectPlan(plan.id, plan.name, plan.price)
                                "
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
                    <p class="text-white mt-3">Loading subscription plans...</p>
                </div>

                <!-- No Plans Available -->
                <div v-else class="text-center py-5">
                    <h5 class="text-white">
                        No subscription plans available at the moment.
                    </h5>
                    <p class="text-muted">Please check back later.</p>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "../axios";

const router = useRouter();

// Reactive data
const plans = ref([]);
const loading = ref(true);

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

// Select plan function
const selectPlan = async (planId, planName, price) => {
    try {
        const response = await axios.post("/api/select-plan", {
            plan_id: planId,
            plan_name: planName,
            price: price,
        });

        // Handle successful plan selection
        console.log("Plan selected:", response.data);
        alert(`You have selected the ${planName} plan!`);

        // You can redirect to payment page or update UI
        // router.push({ name: 'Payment', params: { planId } });
    } catch (error) {
        if (error.response?.status === 419 || error.response?.status === 401) {
            // Token mismatch or unauthorized, redirect to login
            router.push({ name: "Login" });
        } else {
            console.error("Error selecting plan:", error);
            alert("An error occurred while selecting the plan.");
        }
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
