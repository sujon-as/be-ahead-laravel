<div class="row">
    <div class="col-md-6 mb-3">
        <label><strong>Name:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ ($volunteer->f_name & $volunteer->l_name) ? $volunteer->f_name . $volunteer->l_name : 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Status:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer->status ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Email:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer->email ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Phone:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer->phone ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Address:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer?->address ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>City:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer?->city ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>State:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer?->state ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Zip:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer?->zip ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Country:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $volunteer?->country ?? 'N/A' }}</p>
    </div>
</div>
