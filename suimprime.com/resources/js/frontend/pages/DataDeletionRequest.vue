<template>
    <main class="flex-fill">
        <div class="page-title">
            <h4 class="m-0 text-center">Data Deletion Request</h4>
        </div>

        <div class="section-spacing-bottom">
            <div class="container">
                <div class="data-deletion-content">
                    <p>
                        At Iqonic Design, we value the privacy of our users and
                        are committed to ensuring your personal data is handled
                        securely. If you wish to request the deletion of your
                        data associated with Streamit Laravel, please review the
                        following guidelines.
                    </p>

                    <h5>1. Right to Data Deletion</h5>
                    <p>
                        In accordance with global data protection laws, you have
                        the right to request the deletion of your personal data
                        stored within our systems. Once your request is
                        verified, we will remove your data from our servers
                        unless certain legal obligations require us to retain
                        it.
                    </p>

                    <h5>2. Information We Delete</h5>
                    <p>
                        When submitting a data deletion request, the following
                        data will be removed:
                    </p>
                    <ul class="info-list">
                        <li>
                            <strong>Personal Information:</strong> Name, email
                            address, phone number, and any other personally
                            identifiable information.
                        </li>
                        <li>
                            <strong>Account Details:</strong> Subscription
                            history, payment details, and usage data.
                        </li>
                        <li>
                            <strong>Watchlists and Preferences:</strong> Any
                            watchlist, preferences, or custom content
                            recommendations.
                        </li>
                    </ul>
                    <div class="alert-box">
                        <p>
                            <strong
                                >Please note: After the data is deleted, you
                                will no longer have access to your Streamit
                                Laravel account, and the action is
                                irreversible.</strong
                            >
                        </p>
                    </div>

                    <h5>3. How to Submit a Data Deletion Request</h5>
                    <p>To request the deletion of your data:</p>
                    <ul class="steps-list">
                        <li>
                            <strong>Email Request:</strong> Send an email to
                            hello@iqonic.design with the subject line "Data
                            Deletion Request."
                        </li>
                        <li>
                            <strong>Required Information:</strong> Include the
                            following details in your email:
                            <ul class="sub-list">
                                <li>Your full name.</li>
                                <li>Your registered email address.</li>
                                <li>
                                    Reason for your data deletion request
                                    (optional).
                                </li>
                            </ul>
                        </li>
                        <li>
                            <strong>Verification:</strong> We may contact you to
                            verify your identity before proceeding with the
                            deletion.
                        </li>
                    </ul>

                    <h5>4. Processing Time</h5>
                    <p>
                        Upon receiving and verifying your request, we will
                        process the deletion within 30 days. You will be
                        notified once your data has been successfully deleted.
                    </p>

                    <h5>5. Exceptions to Data Deletion</h5>
                    <p>Certain data may not be eligible for deletion if:</p>
                    <ul class="info-list">
                        <li>
                            <strong>Legal Obligations:</strong> We are required
                            to retain your data for legal, regulatory, or
                            contractual reasons.
                        </li>
                        <li>
                            <strong>Ongoing Transactions:</strong> If there are
                            any unresolved issues such as pending transactions,
                            your data may be retained until those issues are
                            resolved.
                        </li>
                    </ul>

                    <h5>6. Impact of Data Deletion</h5>
                    <p>Once your data is deleted:</p>
                    <ul class="info-list">
                        <li>
                            You will lose access to your Streamit Laravel
                            account.
                        </li>
                        <li>
                            Any remaining subscription time will be forfeited,
                            and no refunds will be issued.
                        </li>
                        <li>
                            You will need to create a new account if you wish to
                            use our services again in the future.
                        </li>
                    </ul>

                    <h5>7. Contact Us</h5>
                    <p>
                        If you have any questions about this policy or need
                        assistance with your data deletion request, please reach
                        out to us at:
                    </p>
                    <p class="contact-email">
                        📧 <strong>Email: hello@suimprime.com</strong>
                    </p>
                    <p>
                        Our team is here to help you with any concerns related
                        to your personal data and privacy.
                    </p>

                    <p class="mt-4">
                        <strong>
                            Thank you for using Streamit Laravel, and for
                            trusting Iqonic Design with your privacy.
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
// No specific logic needed for static content
</script>

<style scoped>
.page-title {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 3rem 0;
    margin-bottom: 3rem;
    border-bottom: 3px solid #e50914;
}

.page-title h4 {
    color: #fff;
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.section-spacing-bottom {
    padding-bottom: 4rem;
}

.data-deletion-content {
    background: rgba(255, 255, 255, 0.05);
    padding: 3rem;
    border-radius: 10px;
    color: #ddd;
    line-height: 1.8;
}

.data-deletion-content h5 {
    color: #e50914;
    font-size: 1.5rem;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.data-deletion-content p {
    margin-bottom: 1rem;
    font-size: 1rem;
}

.data-deletion-content strong {
    color: #fff;
    font-weight: 600;
}

.info-list,
.steps-list {
    padding-left: 1.5rem;
    margin-bottom: 1.5rem;
    list-style-type: disc;
}

.info-list li,
.steps-list li {
    margin-bottom: 0.8rem;
    color: #ddd;
}

.sub-list {
    padding-left: 1.5rem;
    margin-top: 0.5rem;
    list-style-type: circle;
}

.sub-list li {
    margin-bottom: 0.5rem;
}

.alert-box {
    background: rgba(229, 9, 20, 0.15);
    border: 2px solid #e50914;
    border-radius: 8px;
    padding: 1.5rem;
    margin: 1.5rem 0;
}

.alert-box p {
    margin-bottom: 0;
    color: #fff;
    font-size: 1.05rem;
}

.contact-email {
    font-size: 1.1rem;
    color: #fff;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title h4 {
        font-size: 1.8rem;
    }

    .data-deletion-content {
        padding: 1.5rem;
    }

    .data-deletion-content h5 {
        font-size: 1.2rem;
    }

    .alert-box {
        padding: 1rem;
    }
}
</style>
