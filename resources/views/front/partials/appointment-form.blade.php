<form id="appointment_form" class="appointment_form text-center" action="{{ route('appointment-submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="messages"></div>
    <div class="row">
        <div class="col-md-12">
            <h2>Appointment with Expert</h2>
            <p>Let's Appointment With our Exparts Who Try to Solved Your Problem.</p>
            <div class="form-group text-left">
                <label for="name"><i class="fa fa-user-o"></i> Name <small>*</small></label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    placeholder="enter a name"
                    required="required"
                    data-error="Name is required."
                    type="text"
                >
                @error('name')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group text-left">
                <label for="email"><i class="fa fa-envelope-open-o"></i> Email <small>*</small></label>
                <input
                    id="email"
                    name="email"
                    class="form-control required email"
                    placeholder="enter an email"
                    required="required"
                    data-error="Email is required."
                    type="email">
                @error('email')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="date"><i class="fa fa-calendar-check-o"></i> Date <small>*</small></label>
                <input
                    id="date"
                    name="date"
                    class="form-control required datepicker"
                    placeholder="enter a date"
                    required="required"
                    data-error="date is required."
                    type="text"
                >
                @error('date')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="phone"><i class="fa fa-phone"></i> Phone <small>*</small></label>
                <input
                    id="phone"
                    name="phone"
                    class="form-control required"
                    placeholder="enter a phone"
                    required="required"
                    data-error="Phone Number is required."
                    type="text"
                >
                @error('phone')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group text-left">
        <label for="message"><i class="fa fa-file-text-o"></i> Message</label>
        <textarea
            id="message"
            name="message"
            class="form-control required"
            rows="5"
            placeholder="type in a message"
            required="required"
            data-error="Message is required."
        >

        </textarea>
        @error('message')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-lg ulockd-btn-thm2" data-loading-text="Getting Few Sec...">Send</button>
    </div>
</form>
