<div class="row">
    <div class="col-md-6 mb-3">
        <label><strong>Name:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ ($donation->f_name & $donation->l_name) ? $donation->f_name . $donation->l_name : 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Payment Time Selection:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation->pts ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Amount:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation->amount ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Email:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation->email ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Phone:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation->phone ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Address 1:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->address_1 ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Address 2:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->address_2 ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>City:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->city ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Zip:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->zip ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Note:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->note ?? 'N/A' }}</p>
    </div>

{{--    <div class="col-md-6 mb-3">--}}
{{--        <label for="title"><strong>Time:</strong></label>--}}
{{--        <p class="form-control-plaintext border p-2 bg-light">{{ $donation?->created_at ? \Carbon\Carbon::createFromTimestamp($donation->created_at)->pretty() : 'N/A' }}</p>--}}
{{--    </div>--}}
</div>
