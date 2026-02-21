<div class="col-md-6 col-md-offset-3">
    <div class="ulockd-login-form">
        <h2 class="text-center">Send Us A Message</h2>
        <form id="contact_form" class="contact_form" action="{{ route('message-submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="messages"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Your Name *"
                            required="required"
                            data-error="Name is required."
                            type="text"
                        >
                        @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Your Email *"
                            required="required"
                            data-error="Email is required."
                            type="email"
                        >
                        @error('email')
                        <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input
                            id="subject"
                            name="subject"
                            class="form-control"
                            placeholder="Subject"
                            required="required"
                            data-error="Subject is required."
                        >
                        @error('subject')
                        <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea
                            id="message"
                            name="message"
                            class="form-control"
                            placeholder="Your Message *"
                            rows="4"
                            required="required"
                            data-error="Message is required."
                        >

                        </textarea>
                        @error('message')
                        <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg ulockd-btn-thm2" data-loading-text="Getting Ready...">Send Message</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
