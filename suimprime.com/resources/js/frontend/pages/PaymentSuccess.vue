<template>
    <main class="flex-fill payment-success-page">
        <div class="section-spacing-bottom">
            <div class="container-fluid px-4">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card bg-dark text-white">
                            <div class="card-body text-center p-5">
                                <div v-if="loading" class="loading-state">
                                    <div
                                        class="spinner-border text-primary mb-3"
                                        role="status"
                                    >
                                        <span class="visually-hidden"
                                            >Loading...</span
                                        >
                                    </div>
                                    <h5 class="text-white">
                                        Verifying Payment...
                                    </h5>
                                    <p class="text-muted">
                                        Please wait while we confirm your
                                        payment.
                                    </p>
                                </div>

                                <div
                                    v-else-if="paymentStatus === 'success'"
                                    class="success-state"
                                >
                                    <div class="mb-4">
                                        <PhCheckCircle
                                            :size="80"
                                            weight="fill"
                                            class="text-success"
                                        />
                                    </div>
                                    <h3 class="text-success mb-3">
                                        Payment Successful!
                                    </h3>
                                    <p class="text-white mb-4">
                                        Your subscription to
                                        <strong>{{ planName }}</strong> has been
                                        activated.
                                    </p>
                                    <div
                                        class="payment-details bg-secondary rounded p-3 mb-4"
                                    >
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <strong class="text-white"
                                                    >Order ID:</strong
                                                ><br />
                                                <strong>{{ orderId }}</strong>
                                            </div>
                                            <div class="col-6 text-end">
                                                <strong class="text-white"
                                                    >Amount:</strong
                                                ><br />
                                                <strong>₹{{ amount }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <router-link
                                            to="/home"
                                            class="btn btn-primary"
                                        >
                                            Go to Dashboard
                                        </router-link>
                                        <router-link
                                            to="/subscription-history"
                                            class="btn btn-outline-light"
                                        >
                                            View Subscription
                                        </router-link>
                                    </div>
                                </div>

                                <div
                                    v-else-if="paymentStatus === 'failed'"
                                    class="failed-state"
                                >
                                    <div class="mb-4">
                                        <PhXCircle
                                            :size="80"
                                            weight="fill"
                                            class="text-danger"
                                        />
                                    </div>
                                    <h3 class="text-danger mb-3">
                                        Payment Failed
                                    </h3>
                                    <p class="text-white mb-4">
                                        Unfortunately, your payment could not be
                                        processed.
                                    </p>
                                    <div class="d-grid gap-2">
                                        <router-link
                                            to="/subscription-plan"
                                            class="btn btn-primary"
                                        >
                                            Try Again
                                        </router-link>
                                        <router-link
                                            to="/home"
                                            class="btn btn-outline-light"
                                        >
                                            Go Home
                                        </router-link>
                                    </div>
                                </div>

                                <div v-else class="error-state">
                                    <div class="mb-4">
                                        <PhWarning
                                            :size="80"
                                            weight="fill"
                                            class="text-warning"
                                        />
                                    </div>
                                    <h3 class="text-warning mb-3">
                                        Payment Status Unknown
                                    </h3>
                                    <p class="text-white mb-4">
                                        We couldn't verify your payment status.
                                        Please contact support.
                                    </p>
                                    <div class="d-grid gap-2">
                                        <router-link
                                            to="/subscription-plan"
                                            class="btn btn-primary"
                                        >
                                            Back to Plans
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "../axios";
import { PhCheckCircle, PhXCircle, PhWarning } from "@phosphor-icons/vue";

const route = useRoute();
const router = useRouter();

const loading = ref(true);
const paymentStatus = ref("");
const orderId = ref("");
const planName = ref("");
const amount = ref("");

const verifyPayment = async () => {
    try {
        const orderIdParam = route.query.order_id;
        const paymentGateway = route.query.gateway || "cashfree";

        if (!orderIdParam) {
            paymentStatus.value = "failed";
            return;
        }

        orderId.value = orderIdParam;

        const response = await axios.post("/api/payment/verify", {
            order_id: orderIdParam,
            payment_gateway: paymentGateway,
        });

        if (response.data.success) {
            const data = response.data.data;
            const transaction = response.data.transaction;

            if (
                data.order_status === "PAID" ||
                transaction?.status === "success"
            ) {
                paymentStatus.value = "success";
                planName.value = transaction?.plan?.name || "Unknown Plan";
                amount.value = transaction?.total_amount || "0";
            } else {
                paymentStatus.value = "failed";
            }
        } else {
            paymentStatus.value = "failed";
        }
    } catch (error) {
        console.error("Payment verification error:", error);
        paymentStatus.value = "failed";
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    verifyPayment();
});
</script>

<style scoped>
.payment-success-page {
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.card {
    border: 1px solid #333;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

.payment-details {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

.spinner-border {
    width: 3rem;
    height: 3rem;
}
</style>
