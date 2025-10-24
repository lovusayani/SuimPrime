<template>
    <main class="flex-fill subscription-history-page">
        <div class="section-spacing-bottom">
            <div class="container-fluid px-4">
                <div class="page-title mb-5">
                    <h4 class="m-0 text-center text-white">
                        Subscription History
                    </h4>
                </div>

                <!-- Current Active Subscription -->
                <div v-if="activeSubscription" class="mb-5">
                    <h5 class="text-white mb-3">Current Subscription</h5>
                    <div class="card bg-dark text-white border-success">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <h6 class="text-success mb-1">
                                        {{ activeSubscription.plan?.name }}
                                    </h6>
                                    <small class="text-muted"
                                        >Active Plan</small
                                    >
                                </div>
                                <div class="col-md-3">
                                    <strong class="text-white"
                                        >₹{{
                                            activeSubscription.transaction
                                                ?.total_amount
                                        }}</strong
                                    ><br />
                                    <small class="text-muted"
                                        >Amount Paid</small
                                    >
                                </div>
                                <div class="col-md-3">
                                    <span class="text-white">{{
                                        formatDate(activeSubscription.starts_at)
                                    }}</span
                                    ><br />
                                    <small class="text-muted">Started On</small>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-warning">{{
                                        formatDate(activeSubscription.ends_at)
                                    }}</span
                                    ><br />
                                    <small class="text-muted">Expires On</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subscription History -->
                <div class="mb-4">
                    <h5 class="text-white mb-3">Subscription History</h5>
                </div>

                <!-- Loading State -->
                <div v-if="loading" class="text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-white">Loading subscription history...</p>
                </div>

                <!-- No Subscriptions -->
                <div
                    v-else-if="subscriptions.length === 0"
                    class="text-center py-5"
                >
                    <PhWarning
                        :size="64"
                        weight="fill"
                        class="text-warning mb-3"
                    />
                    <h5 class="text-white mb-3">No Subscription History</h5>
                    <p class="text-muted mb-4">
                        You haven't subscribed to any plans yet.
                    </p>
                    <router-link
                        to="/subscription-plan"
                        class="btn btn-primary"
                    >
                        Browse Plans
                    </router-link>
                </div>

                <!-- Subscriptions List -->
                <div v-else class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="subscription in subscriptions"
                                        :key="subscription.id"
                                    >
                                        <td>
                                            <div>
                                                <strong class="text-white">{{
                                                    subscription.plan?.name ||
                                                    "Unknown Plan"
                                                }}</strong>
                                                <br />
                                                <small class="text-muted">{{
                                                    subscription.plan
                                                        ?.duration || "N/A"
                                                }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="badge"
                                                :class="
                                                    getStatusBadgeClass(
                                                        subscription.status
                                                    )
                                                "
                                            >
                                                {{
                                                    subscription.status
                                                        .charAt(0)
                                                        .toUpperCase() +
                                                    subscription.status.slice(1)
                                                }}
                                            </span>
                                        </td>
                                        <td>
                                            <strong class="text-white"
                                                >₹{{
                                                    subscription.transaction
                                                        ?.total_amount || "N/A"
                                                }}</strong
                                            >
                                        </td>
                                        <td>
                                            <span class="text-white">{{
                                                formatDate(
                                                    subscription.starts_at
                                                )
                                            }}</span>
                                        </td>
                                        <td>
                                            <span class="text-white">{{
                                                formatDate(subscription.ends_at)
                                            }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge"
                                                :class="
                                                    getPaymentStatusBadgeClass(
                                                        subscription.transaction
                                                            ?.status
                                                    )
                                                "
                                            >
                                                {{
                                                    subscription.transaction?.status
                                                        ?.charAt(0)
                                                        .toUpperCase() +
                                                        subscription.transaction?.status?.slice(
                                                            1
                                                        ) || "Unknown"
                                                }}
                                            </span>
                                        </td>
                                        <td>
                                            <button
                                                @click="
                                                    viewDetails(subscription)
                                                "
                                                class="btn btn-sm btn-outline-primary me-2"
                                            >
                                                <PhEye :size="16" /> Details
                                            </button>
                                            <button
                                                v-if="
                                                    subscription.status ===
                                                    'active'
                                                "
                                                @click="
                                                    renewSubscription(
                                                        subscription
                                                    )
                                                "
                                                class="btn btn-sm btn-outline-success"
                                            >
                                                <PhArrowClockwise :size="16" />
                                                Renew
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Subscription Details Modal -->
                <div
                    v-if="selectedSubscription"
                    class="modal show d-block"
                    style="background-color: rgba(0, 0, 0, 0.8)"
                    @click.self="closeModal"
                >
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header border-secondary">
                                <h5 class="modal-title">
                                    Subscription Details
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    @click="closeModal"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-primary">
                                            Plan Information
                                        </h6>
                                        <p>
                                            <strong>Plan Name:</strong>
                                            {{
                                                selectedSubscription.plan?.name
                                            }}
                                        </p>
                                        <p>
                                            <strong>Duration:</strong>
                                            {{
                                                selectedSubscription.plan
                                                    ?.duration
                                            }}
                                        </p>
                                        <p>
                                            <strong>Price:</strong> ₹{{
                                                selectedSubscription.plan?.price
                                            }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-primary">
                                            Subscription Details
                                        </h6>
                                        <p>
                                            <strong>Status:</strong>
                                            <span
                                                class="badge"
                                                :class="
                                                    getStatusBadgeClass(
                                                        selectedSubscription.status
                                                    )
                                                "
                                            >
                                                {{
                                                    selectedSubscription.status
                                                        .charAt(0)
                                                        .toUpperCase() +
                                                    selectedSubscription.status.slice(
                                                        1
                                                    )
                                                }}
                                            </span>
                                        </p>
                                        <p>
                                            <strong>Start Date:</strong>
                                            {{
                                                formatDate(
                                                    selectedSubscription.starts_at
                                                )
                                            }}
                                        </p>
                                        <p>
                                            <strong>End Date:</strong>
                                            {{
                                                formatDate(
                                                    selectedSubscription.ends_at
                                                )
                                            }}
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="row mt-3"
                                    v-if="selectedSubscription.transaction"
                                >
                                    <div class="col-12">
                                        <h6 class="text-primary">
                                            Payment Information
                                        </h6>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-dark table-sm"
                                            >
                                                <tr>
                                                    <td>
                                                        <strong
                                                            >Order ID:</strong
                                                        >
                                                    </td>
                                                    <td>
                                                        {{
                                                            selectedSubscription
                                                                .transaction
                                                                .order_id
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong
                                                            >Transaction
                                                            ID:</strong
                                                        >
                                                    </td>
                                                    <td>
                                                        {{
                                                            selectedSubscription
                                                                .transaction
                                                                .transaction_id ||
                                                            "N/A"
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong
                                                            >Payment
                                                            Gateway:</strong
                                                        >
                                                    </td>
                                                    <td class="text-capitalize">
                                                        {{
                                                            selectedSubscription
                                                                .transaction
                                                                .payment_gateway
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Amount:</strong>
                                                    </td>
                                                    <td>
                                                        ₹{{
                                                            selectedSubscription
                                                                .transaction
                                                                .amount
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Tax:</strong>
                                                    </td>
                                                    <td>
                                                        ₹{{
                                                            selectedSubscription
                                                                .transaction
                                                                .tax_amount
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong
                                                            >Total
                                                            Amount:</strong
                                                        >
                                                    </td>
                                                    <td>
                                                        <strong
                                                            >₹{{
                                                                selectedSubscription
                                                                    .transaction
                                                                    .total_amount
                                                            }}</strong
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong
                                                            >Payment
                                                            Status:</strong
                                                        >
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge"
                                                            :class="
                                                                getPaymentStatusBadgeClass(
                                                                    selectedSubscription
                                                                        .transaction
                                                                        .status
                                                                )
                                                            "
                                                        >
                                                            {{
                                                                selectedSubscription.transaction.status
                                                                    .charAt(0)
                                                                    .toUpperCase() +
                                                                selectedSubscription.transaction.status.slice(
                                                                    1
                                                                )
                                                            }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr
                                                    v-if="
                                                        selectedSubscription
                                                            .transaction.paid_at
                                                    "
                                                >
                                                    <td>
                                                        <strong
                                                            >Paid At:</strong
                                                        >
                                                    </td>
                                                    <td>
                                                        {{
                                                            formatDateTime(
                                                                selectedSubscription
                                                                    .transaction
                                                                    .paid_at
                                                            )
                                                        }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="row mt-3"
                                    v-if="selectedSubscription.features"
                                >
                                    <div class="col-12">
                                        <h6 class="text-primary">
                                            Plan Features
                                        </h6>
                                        <div class="row">
                                            <div
                                                class="col-md-6"
                                                v-if="
                                                    selectedSubscription
                                                        .features.video_quality
                                                "
                                            >
                                                <p>
                                                    <strong
                                                        >Video Quality:</strong
                                                    >
                                                    {{
                                                        selectedSubscription
                                                            .features
                                                            .video_quality
                                                    }}
                                                </p>
                                            </div>
                                            <div
                                                class="col-md-6"
                                                v-if="
                                                    selectedSubscription
                                                        .features
                                                        .concurrent_streams
                                                "
                                            >
                                                <p>
                                                    <strong
                                                        >Concurrent
                                                        Streams:</strong
                                                    >
                                                    {{
                                                        selectedSubscription
                                                            .features
                                                            .concurrent_streams
                                                    }}
                                                </p>
                                            </div>
                                            <div
                                                class="col-md-6"
                                                v-if="
                                                    selectedSubscription
                                                        .features.download_limit
                                                "
                                            >
                                                <p>
                                                    <strong
                                                        >Download Limit:</strong
                                                    >
                                                    {{
                                                        selectedSubscription
                                                            .features
                                                            .download_limit
                                                    }}
                                                </p>
                                            </div>
                                            <div
                                                class="col-md-6"
                                                v-if="
                                                    selectedSubscription
                                                        .features.ads_free !==
                                                    undefined
                                                "
                                            >
                                                <p>
                                                    <strong>Ad-Free:</strong>
                                                    {{
                                                        selectedSubscription
                                                            .features.ads_free
                                                            ? "Yes"
                                                            : "No"
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-secondary">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    @click="closeModal"
                                >
                                    Close
                                </button>
                                <button
                                    v-if="
                                        selectedSubscription.status === 'active'
                                    "
                                    type="button"
                                    class="btn btn-success"
                                    @click="
                                        renewSubscription(selectedSubscription)
                                    "
                                >
                                    Renew Subscription
                                </button>
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
import { useRouter } from "vue-router";
import axios from "../axios";
import { PhWarning, PhEye, PhArrowClockwise } from "@phosphor-icons/vue";

const router = useRouter();

const loading = ref(true);
const subscriptions = ref([]);
const activeSubscription = ref(null);
const selectedSubscription = ref(null);

// Fetch user subscription history
const fetchSubscriptionHistory = async () => {
    try {
        loading.value = true;
        const response = await axios.get("/api/user/subscriptions");

        if (response.data.success) {
            subscriptions.value = response.data.subscriptions;
            activeSubscription.value = response.data.active_subscription;
        }
    } catch (error) {
        console.error("Failed to fetch subscription history:", error);
    } finally {
        loading.value = false;
    }
};

// Format date helper
const formatDate = (dateString) => {
    if (!dateString) return "N/A";
    return new Date(dateString).toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};

// Format date time helper
const formatDateTime = (dateString) => {
    if (!dateString) return "N/A";
    return new Date(dateString).toLocaleString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
};

// Get status badge class
const getStatusBadgeClass = (status) => {
    switch (status) {
        case "active":
            return "bg-success";
        case "expired":
            return "bg-warning";
        case "cancelled":
            return "bg-danger";
        default:
            return "bg-secondary";
    }
};

// Get payment status badge class
const getPaymentStatusBadgeClass = (status) => {
    switch (status) {
        case "success":
            return "bg-success";
        case "failed":
            return "bg-danger";
        case "pending":
            return "bg-warning";
        default:
            return "bg-secondary";
    }
};

// View subscription details
const viewDetails = (subscription) => {
    selectedSubscription.value = subscription;
};

// Close modal
const closeModal = () => {
    selectedSubscription.value = null;
};

// Renew subscription
const renewSubscription = (subscription) => {
    router.push(`/subscription-plan?renew=${subscription.plan.id}`);
};

// Fetch data on component mount
onMounted(() => {
    fetchSubscriptionHistory();
});
</script>

<style scoped>
.subscription-history-page {
    background-color: #0d0d0d;
    min-height: 100vh;
    padding-top: 100px;
    padding-bottom: 50px;
}

.section-spacing-bottom {
    padding-bottom: 60px;
}

.table-dark {
    --bs-table-bg: rgba(255, 255, 255, 0.05);
}

.table-dark td,
.table-dark th {
    border-color: rgba(255, 255, 255, 0.1);
}

.modal.show {
    display: block !important;
}

.card {
    border: 1px solid #333;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

.border-success {
    border-color: #198754 !important;
}

.btn-outline-primary:hover,
.btn-outline-success:hover {
    color: #000;
}
</style>
