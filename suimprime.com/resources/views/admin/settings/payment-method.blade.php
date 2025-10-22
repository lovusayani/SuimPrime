@extends('layouts.admin')

@section('title', 'Payment Method Settings')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="card card-accent-primary offcanvas-body mb-0">
                <div class="card-body">
                    <div class="container">
                        <div class="mb-4">
                            <h4><i class="fa-solid fa-coins"></i> Payment Method </h4>
                        </div>

                        <form method="POST" action="{{ route('admin.settings.payment.update') }}" id="payment-settings-form">
                            @csrf

                            {{-- Razorpay --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_razorpay">Razorpay</label>
                                    <input type="hidden" value="0" name="razor_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#razorpay-fields"
                                            value="1" name="razor_payment_method" id="payment_method_razorpay"
                                            type="checkbox"
                                            {{ old('razor_payment_method', \App\Models\Setting::get('razor_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="razorpay-fields"
                                class="ps-3 {{ old('razor_payment_method', \App\Models\Setting::get('razor_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="razorpay_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="razorpay_secretkey"
                                                id="razorpay_secretkey"
                                                value="{{ old('razorpay_secretkey', \App\Models\Setting::get('razorpay_secretkey', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="razorpay_publickey">App key</label>
                                            <input type="text" class="form-control" name="razorpay_publickey"
                                                id="razorpay_publickey"
                                                value="{{ old('razorpay_publickey', \App\Models\Setting::get('razorpay_publickey', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Stripe --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_stripe">Stripe</label>
                                    <input type="hidden" value="0" name="str_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#stripe-fields"
                                            value="1" name="str_payment_method" id="payment_method_stripe"
                                            type="checkbox"
                                            {{ old('str_payment_method', \App\Models\Setting::get('str_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="stripe-fields"
                                class="ps-3 {{ old('str_payment_method', \App\Models\Setting::get('str_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="stripe_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="stripe_secretkey"
                                                id="stripe_secretkey"
                                                value="{{ old('stripe_secretkey', \App\Models\Setting::get('stripe_secretkey', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="stripe_publickey">App key</label>
                                            <input type="text" class="form-control" name="stripe_publickey"
                                                id="stripe_publickey"
                                                value="{{ old('stripe_publickey', \App\Models\Setting::get('stripe_publickey', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Paystack --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_paystack">Paystack</label>
                                    <input type="hidden" value="0" name="paystack_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#paystack-fields"
                                            value="1" name="paystack_payment_method" id="payment_method_paystack"
                                            type="checkbox"
                                            {{ old('paystack_payment_method', \App\Models\Setting::get('paystack_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="paystack-fields"
                                class="ps-3 {{ old('paystack_payment_method', \App\Models\Setting::get('paystack_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="paystack_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="paystack_secretkey"
                                                id="paystack_secretkey"
                                                value="{{ old('paystack_secretkey', \App\Models\Setting::get('paystack_secretkey', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="paystack_publickey">App key</label>
                                            <input type="text" class="form-control" name="paystack_publickey"
                                                id="paystack_publickey"
                                                value="{{ old('paystack_publickey', \App\Models\Setting::get('paystack_publickey', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Paypal --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_paypal">Paypal</label>
                                    <input type="hidden" value="0" name="paypal_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#paypal-fields"
                                            value="1" name="paypal_payment_method" id="payment_method_paypal"
                                            type="checkbox"
                                            {{ old('paypal_payment_method', \App\Models\Setting::get('paypal_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="paypal-fields"
                                class="ps-3 {{ old('paypal_payment_method', \App\Models\Setting::get('paypal_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="paypal_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="paypal_secretkey"
                                                id="paypal_secretkey"
                                                value="{{ old('paypal_secretkey', \App\Models\Setting::get('paypal_secretkey', 'EGvqxtKeQIK5LIPbYLuWTMLoCtqzuoNaFUEvaltLlW2Ka58OwTg5fiv_Q')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="paypal_clientid">Client Id</label>
                                            <input type="text" class="form-control" name="paypal_clientid"
                                                id="paypal_clientid"
                                                value="{{ old('paypal_clientid', \App\Models\Setting::get('paypal_clientid', 'AepfSIAvfjV4DCulR7pzq2baaxjpkt0vcl0CBJt-YFKaQ6i7fwSY6LubCPtftIGXBX4elIvUL-aPyB2e')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Flutterwave --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_flutterwave">Flutterwave</label>
                                    <input type="hidden" value="0" name="flutterwave_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input"
                                            data-toggle-target="#flutterwave-fields" value="1"
                                            name="flutterwave_payment_method" id="payment_method_flutterwave"
                                            type="checkbox"
                                            {{ old('flutterwave_payment_method', \App\Models\Setting::get('flutterwave_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="flutterwave-fields"
                                class="ps-3 {{ old('flutterwave_payment_method', \App\Models\Setting::get('flutterwave_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="flutterwave_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="flutterwave_secretkey"
                                                id="flutterwave_secretkey"
                                                value="{{ old('flutterwave_secretkey', \App\Models\Setting::get('flutterwave_secretkey', 'FLWSECK_TEST-d2759023efce6198a853b8e2dd3beb55-X')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="flutterwave_publickey">App key</label>
                                            <input type="text" class="form-control" name="flutterwave_publickey"
                                                id="flutterwave_publickey"
                                                value="{{ old('flutterwave_publickey', \App\Models\Setting::get('flutterwave_publickey', 'FLWPUBK_TEST-eb3edef083c890a7e22dc7eec9e0daa5-X')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Cinet --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_cinet">Cinet</label>
                                    <input type="hidden" value="0" name="cinet_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#cinet-fields"
                                            value="1" name="cinet_payment_method" id="payment_method_cinet"
                                            type="checkbox"
                                            {{ old('cinet_payment_method', \App\Models\Setting::get('cinet_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="cinet-fields"
                                class="ps-3 {{ old('cinet_payment_method', \App\Models\Setting::get('cinet_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="cinet_siteid">Site ID</label>
                                            <input type="text" class="form-control" name="cinet_siteid"
                                                id="cinet_siteid"
                                                value="{{ old('cinet_siteid', \App\Models\Setting::get('cinet_siteid', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="cinet_api_key">Api Key</label>
                                            <input type="text" class="form-control" name="cinet_api_key"
                                                id="cinet_api_key"
                                                value="{{ old('cinet_api_key', \App\Models\Setting::get('cinet_api_key', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="cinet_Secret_key">Secret Key</label>
                                            <input type="text" class="form-control" name="cinet_Secret_key"
                                                id="cinet_Secret_key"
                                                value="{{ old('cinet_Secret_key', \App\Models\Setting::get('cinet_Secret_key', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Sadad --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_sadad">Sadad</label>
                                    <input type="hidden" value="0" name="sadad_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#sadad-fields"
                                            value="1" name="sadad_payment_method" id="payment_method_sadad"
                                            type="checkbox"
                                            {{ old('sadad_payment_method', \App\Models\Setting::get('sadad_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="sadad-fields"
                                class="ps-3 {{ old('sadad_payment_method', \App\Models\Setting::get('sadad_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sadad_Sadadkey">Sadad Key</label>
                                            <input type="text" class="form-control" name="sadad_Sadadkey"
                                                id="sadad_Sadadkey"
                                                value="{{ old('sadad_Sadadkey', \App\Models\Setting::get('sadad_Sadadkey', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sadad_id_key">ID Key</label>
                                            <input type="text" class="form-control" name="sadad_id_key"
                                                id="sadad_id_key"
                                                value="{{ old('sadad_id_key', \App\Models\Setting::get('sadad_id_key', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sadad_Domain">Domain Key</label>
                                            <input type="text" class="form-control" name="sadad_Domain"
                                                id="sadad_Domain"
                                                value="{{ old('sadad_Domain', \App\Models\Setting::get('sadad_Domain', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Airtel Money --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_airtel_money">Airtel Money</label>
                                    <input type="hidden" value="0" name="airtel_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input"
                                            data-toggle-target="#airtel-money-fields" value="1"
                                            name="airtel_payment_method" id="payment_method_airtel_money" type="checkbox"
                                            {{ old('airtel_payment_method', \App\Models\Setting::get('airtel_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="airtel-money-fields"
                                class="ps-3 {{ old('airtel_payment_method', \App\Models\Setting::get('airtel_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="airtel_money_secretkey">Secret Key</label>
                                            <input type="text" class="form-control" name="airtel_money_secretkey"
                                                id="airtel_money_secretkey"
                                                value="{{ old('airtel_money_secretkey', \App\Models\Setting::get('airtel_money_secretkey', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="airtel_money_client_id">Client Id</label>
                                            <input type="text" class="form-control" name="airtel_money_client_id"
                                                id="airtel_money_client_id"
                                                value="{{ old('airtel_money_client_id', \App\Models\Setting::get('airtel_money_client_id', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- PhonePe --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_phonepe">PhonePe</label>
                                    <input type="hidden" value="0" name="phonepe_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#phonepe-fields"
                                            value="1" name="phonepe_payment_method" id="payment_method_phonepe"
                                            type="checkbox"
                                            {{ old('phonepe_payment_method', \App\Models\Setting::get('phonepe_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="phonepe-fields"
                                class="ps-3 {{ old('phonepe_payment_method', \App\Models\Setting::get('phonepe_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phonepe_App_id">App ID</label>
                                            <input type="text" class="form-control" name="phonepe_App_id"
                                                id="phonepe_App_id"
                                                value="{{ old('phonepe_App_id', \App\Models\Setting::get('phonepe_App_id', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phonepe_Merchant_id">Merchant ID</label>
                                            <input type="text" class="form-control" name="phonepe_Merchant_id"
                                                id="phonepe_Merchant_id"
                                                value="{{ old('phonepe_Merchant_id', \App\Models\Setting::get('phonepe_Merchant_id', '')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="phonepe_salt_key">Salt Key ID</label>
                                            <input type="text" class="form-control" name="phonepe_salt_key"
                                                id="phonepe_salt_key"
                                                value="{{ old('phonepe_salt_key', \App\Models\Setting::get('phonepe_salt_key', '')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="phonepe_salt_index">Salt Index</label>
                                            <input type="text" class="form-control" name="phonepe_salt_index"
                                                id="phonepe_salt_index"
                                                value="{{ old('phonepe_salt_index', \App\Models\Setting::get('phonepe_salt_index', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Midtrans --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_midtrans">Midtrans</label>
                                    <input type="hidden" value="0" name="midtrans_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#midtrans-fields"
                                            value="1" name="midtrans_payment_method" id="payment_method_midtrans"
                                            type="checkbox"
                                            {{ old('midtrans_payment_method', \App\Models\Setting::get('midtrans_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="midtrans-fields"
                                class="ps-3 {{ old('midtrans_payment_method', \App\Models\Setting::get('midtrans_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="midtrans_client_id">App key</label>
                                            <input type="text" class="form-control" name="midtrans_client_id"
                                                id="midtrans_client_id"
                                                value="{{ old('midtrans_client_id', \App\Models\Setting::get('midtrans_client_id', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="midtrans_server_key">Server Key</label>
                                            <input type="text" class="form-control" name="midtrans_server_key"
                                                id="midtrans_server_key"
                                                value="{{ old('midtrans_server_key', \App\Models\Setting::get('midtrans_server_key', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- In App Purchase --}}
                            <div class="form-group border-bottom pb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label m-0" for="payment_method_iap">In App Purchase</label>
                                    <input type="hidden" value="0" name="iap_payment_method">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-input" data-toggle-target="#iap-fields"
                                            value="1" name="iap_payment_method" id="payment_method_iap"
                                            type="checkbox"
                                            {{ old('iap_payment_method', \App\Models\Setting::get('iap_payment_method', '0')) == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="iap-fields"
                                class="ps-3 {{ old('iap_payment_method', \App\Models\Setting::get('iap_payment_method', '0')) == '1' ? '' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="entertainment_id">Entitlement ID</label>
                                            <input type="text" class="form-control" name="entertainment_id"
                                                id="entertainment_id"
                                                value="{{ old('entertainment_id', \App\Models\Setting::get('entertainment_id', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="apple_api_key">Apple API ID</label>
                                            <input type="text" class="form-control" name="apple_api_key"
                                                id="apple_api_key"
                                                value="{{ old('apple_api_key', \App\Models\Setting::get('apple_api_key', '')) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="google_api_key">Google API ID</label>
                                            <input type="text" class="form-control" name="google_api_key"
                                                id="google_api_key"
                                                value="{{ old('google_api_key', \App\Models\Setting::get('google_api_key', '')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Toggle fields visibility based on checkbox state
                $('.toggle-input').on('change', function() {
                    const target = $(this).data('toggle-target');
                    const $targetFields = $(target);
                    const $inputs = $targetFields.find('input, select, textarea');

                    if ($(this).is(':checked')) {
                        $targetFields.removeClass('d-none');
                        $inputs.prop('disabled', false);
                    } else {
                        $targetFields.addClass('d-none');
                        $inputs.prop('disabled', true);
                    }
                });

                // Initialize on page load
                $('.toggle-input').each(function() {
                    const target = $(this).data('toggle-target');
                    const $targetFields = $(target);
                    const $inputs = $targetFields.find('input, select, textarea');

                    if (!$(this).is(':checked')) {
                        $targetFields.addClass('d-none');
                        $inputs.prop('disabled', true);
                    } else {
                        $targetFields.removeClass('d-none');
                        $inputs.prop('disabled', false);
                    }
                });
            });
        </script>
    @endpush

@endsection
