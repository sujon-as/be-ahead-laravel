<div class="row">
    <div class="col-md-6 mb-3">
        <label><strong>Name:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ ($message->name) ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Email:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $message->email ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label><strong>Phone:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $message->subject ?? 'N/A' }}</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="title"><strong>Message:</strong></label>
        <p class="form-control-plaintext border p-2 bg-light">{{ $message?->message ?? 'N/A' }}</p>
    </div>
</div>
