<div class="row">
    <div class="col-md-6 mb-3">
        <label><strong>Name:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ ($appointment->name) ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Email:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $appointment->email ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Phone:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $appointment->phone ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Date:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $appointment?->date ? \Carbon\Carbon::parse($appointment?->date)->format('Y-m-d H:i') : 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Message:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $appointment?->message ?? 'N/A' }}</p>
    </div>
</div>
