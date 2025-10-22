@extends('layouts.admin')

@section('title', 'Currency Settings')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3">
        @includeIf('admin.partials.settings_sidebar')
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="card card-accent-primary offcanvas-body mb-0">
            <div class="card-body">
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0"><i class="fa fa-dollar fa-lg mr-2"></i>&nbsp;Currency Settings</h4>
                        <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#currencyModal" onclick="openModal(0)">
                            <i class="ph ph-plus-circle"></i> Add Currency
                        </button>
                    </div>

                    <!-- Currency Form Modal -->
                    <div class="table-responsive mt-4">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Currency Name</th>
                                    <th>Currency Symbol</th>
                                    <th>Currency Code</th>
                                    <th>Is Primary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($currencies as $currency)
                                <tr>
                                    <td>{{ $currency->id }}</td>
                                    <td>{{ $currency->currency_name }}</td>
                                    <td>{{ $currency->currency_symbol }}</td>
                                    <td>{{ $currency->currency_code }}</td>
                                    <td>
                                        @if($currency->is_primary)
                                            <span class="badge bg-success">Default</span>
                                        @else
                                            <span class="badge bg-danger">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center justify-content-end">
                                            @if(!$currency->is_primary)
                                                <button type="button" class="btn btn-warning-subtle btn-sm fs-4" data-bs-toggle="modal" data-bs-target="#currencyModal" onclick="openModal({{ $currency->id }}, '{{ route('admin.settings.currency.edit', $currency->id) }}')">
                                                    <i class="ph ph-pencil-simple-line align-middle"></i>
                                                </button>
                                            @endif
                                            
                                            @if(!$currency->is_primary)
                                                <form action="{{ route('admin.settings.currency.destroy', $currency->id) }}" method="POST" class="d-inline m-0 delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-secondary-subtle btn-sm fs-4 delete-button" data-bs-toggle="tooltip">
                                                        <i class="ph ph-trash align-middle"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No currencies found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="currencyModal" tabindex="-1" aria-labelledby="currencyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="currencyModalLabel">Add New Currency</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="currencyForm" action="{{ route('admin.settings.currency.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST" id="formMethod">

                                    <div class="form-group">
                                        <label for="currencyName" class="form-label">Currency Name <span class="text-danger">*</span></label>
                                        <select id="currencyName" name="currency_name" class="form-control" required>
                                            <option value="">Select Currency</option>
                                            <option value="United States Dollar">United States Dollar</option>
                                            <option value="Euro">Euro</option>
                                            <option value="Indian Rupee">Indian Rupee</option>
                                            <option value="British Pound Sterling">British Pound Sterling</option>
                                            <option value="Japanese Yen">Japanese Yen</option>
                                            <option value="Canadian Dollar">Canadian Dollar</option>
                                            <option value="Australian Dollar">Australian Dollar</option>
                                            <option value="Swiss Franc">Swiss Franc</option>
                                            <option value="Chinese Yuan">Chinese Yuan</option>
                                            <option value="Saudi Riyal">Saudi Riyal</option>
                                            <option value="Mexican Peso">Mexican Peso</option>
                                            <option value="Brazilian Real">Brazilian Real</option>
                                            <option value="South African Rand">South African Rand</option>
                                            <option value="Russian Ruble">Russian Ruble</option>
                                            <option value="Singapore Dollar">Singapore Dollar</option>
                                            <option value="Hong Kong Dollar">Hong Kong Dollar</option>
                                            <option value="Norwegian Krone">Norwegian Krone</option>
                                            <option value="Swedish Krona">Swedish Krona</option>
                                            <option value="New Zealand Dollar">New Zealand Dollar</option>
                                            <option value="South Korean Won">South Korean Won</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="currencySymbol" class="form-label">Currency Symbol <span class="text-danger">*</span></label>
                                        <input type="text" name="currency_symbol" placeholder="Currency Symbol" id="currencySymbol" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="currencyCode" class="form-label">Currency Code <span class="text-danger">*</span></label>
                                        <input type="text" name="currency_code" placeholder="Currency Code" id="currencyCode" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="isPrimary" class="form-label">Is Primary</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_primary" id="isPrimary" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <h6><b>Currency Format Settings</b></h6>
                                    <div class="form-group">
                                        <label for="currencyPosition" class="form-label">Currency Position</label>
                                        <select name="currency_position" id="currencyPosition" class="form-control">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                            <option value="left_with_space">Left With Space</option>
                                            <option value="right_with_space">Right With Space</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thousandSeparator" class="form-label">Thousand Separator <span class="text-danger">*</span></label>
                                        <input type="text" name="thousand_separator" placeholder="Thousand Separator" id="thousandSeparator" class="form-control" value="," required>
                                    </div>
                                    <div class="form-group">
                                        <label for="decimalSeparator" class="form-label">Decimal Separator <span class="text-danger">*</span></label>
                                        <input type="text" name="decimal_separator" placeholder="Decimal Separator" id="decimalSeparator" class="form-control" value="." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="noOfDecimal" class="form-label">Number of Decimals <span class="text-danger">*</span></label>
                                        <input type="number" name="no_of_decimal" placeholder="Number of Decimals" id="noOfDecimal" class="form-control" value="2" required>
                                    </div>
                                </form>
                            </div>
                            <div class="border-top">
                                <div class="d-grid d-md-flex gap-3 p-3">
                                    <button type="submit" form="currencyForm" class="btn btn-primary d-block">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Currency data mapping
    const currencyData = {
        'United States Dollar': {symbol: '$', code: 'USD'},
        'Euro': {symbol: '€', code: 'EUR'},
        'Indian Rupee': {symbol: '₹', code: 'INR'},
        'British Pound Sterling': {symbol: '£', code: 'GBP'},
        'Japanese Yen': {symbol: '¥', code: 'JPY'},
        'Canadian Dollar': {symbol: 'C$', code: 'CAD'},
        'Australian Dollar': {symbol: 'A$', code: 'AUD'},
        'Swiss Franc': {symbol: 'CHF', code: 'CHF'},
        'Chinese Yuan': {symbol: '¥', code: 'CNY'},
        'Saudi Riyal': {symbol: '﷼', code: 'SAR'},
        'Mexican Peso': {symbol: '$', code: 'MXN'},
        'Brazilian Real': {symbol: 'R$', code: 'BRL'},
        'South African Rand': {symbol: 'R', code: 'ZAR'},
        'Russian Ruble': {symbol: '₽', code: 'RUB'},
        'Singapore Dollar': {symbol: 'S$', code: 'SGD'},
        'Hong Kong Dollar': {symbol: 'HK$', code: 'HKD'},
        'Norwegian Krone': {symbol: 'kr', code: 'NOK'},
        'Swedish Krona': {symbol: 'kr', code: 'SEK'},
        'New Zealand Dollar': {symbol: 'NZ$', code: 'NZD'},
        'South Korean Won': {symbol: '₩', code: 'KRW'}
    };

    $('#currencyName').on('change', function() {
        var currencyName = $(this).val();
        
        if(currencyName && currencyData[currencyName]) {
            $('#currencySymbol').val(currencyData[currencyName].symbol);
            $('#currencyCode').val(currencyData[currencyName].code);
        } else {
            $('#currencySymbol').val('');
            $('#currencyCode').val('');
        }
    });

    // Delete confirmation
    $('.delete-form').on('submit', function(e) {
        if (!confirm('Are you sure you want to delete this currency?')) {
            e.preventDefault();
        }
    });
});

function openModal(id, editUrl = null) {
    if (id === 0) {
        // Add mode
        $('#currencyModalLabel').text('Add New Currency');
        $('#currencyForm')[0].reset();
        $('#currencyForm').attr('action', '{{ route("admin.settings.currency.store") }}');
        $('#formMethod').val('POST');
    } else {
        // Edit mode
        $('#currencyModalLabel').text('Edit Currency');
        if (editUrl) {
            // Load currency data via AJAX
            $.get(editUrl, function(data) {
                $('#currencyName').val(data.currency_name);
                $('#currencySymbol').val(data.currency_symbol);
                $('#currencyCode').val(data.currency_code);
                $('#isPrimary').prop('checked', data.is_primary);
                $('#currencyPosition').val(data.currency_position);
                $('#thousandSeparator').val(data.thousand_separator);
                $('#decimalSeparator').val(data.decimal_separator);
                $('#noOfDecimal').val(data.no_of_decimal);
                
                $('#currencyForm').attr('action', '{{ route("admin.settings.currency.store") }}'.replace('/store', '/' + id));
                $('#formMethod').val('PUT');
            });
        }
    }
}
</script>
@endpush

@endsection
