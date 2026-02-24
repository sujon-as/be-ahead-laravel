<form class="volunteer-reg-form" action="{{ route('donation-submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-6 col-md-12 donation-form-samount">
        <h4>Select Your Amount</h4>
{{--        <ul class="list-inline selected-amount">--}}
{{--            <li class="amount-box">--}}
{{--                <input id="radio-one" type="radio" name="payment-groups" value="10">--}}
{{--                <label for="radio-one"> $10</label>--}}
{{--            </li>--}}
{{--            <li class="amount-box">--}}
{{--                <input id="radio-two" type="radio" name="payment-groups" value="20">--}}
{{--                <label for="radio-two"> $20</label>--}}
{{--            </li>--}}
{{--            <li class="amount-box">--}}
{{--                <input id="radio-three" type="radio" name="payment-groups" value="30">--}}
{{--                <label for="radio-three"> $30</label>--}}
{{--            </li>--}}
{{--            <li class="amount-box">--}}
{{--                <input id="radio-four" type="radio" name="payment-groups" value="50">--}}
{{--                <label for="radio-four"> $50</label>--}}
{{--            </li>--}}
{{--            <li class="amount-box">--}}
{{--                <input id="radio-five" type="radio" name="payment-groups" value="100">--}}
{{--                <label for="radio-five"> $100</label>--}}
{{--            </li>--}}
            <div class="ulockd-mrgn950">
                <div class="form-inline" style="margin-left: -50px !important;">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="number" name="amount" class="form-control" id="exampleInputAmount" placeholder="Custom Amount">
                            @error('amount')
                            <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group-addon">.00</div>
                        </div>
                    </div>
                </div>
            </div>
{{--        </ul>--}}
        <h5>Would you like to make regular donations?</h5>
        <ul class="list-inline">
            <li><p>I would like to make </p></li>
            <li>
                <select name="pts" class="payment-time-selection" required>
                    <option value="one_time">a one time</option>
                    <option value="weekly">weekly</option>
                    <option value="monthly">monthly</option>
                    <option value="yearly">yearly</option>
                </select>
            </li>
            <li> Donations</li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-12">
        <form class="donation-form donor-details">
            <h4>Donor Information</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="f_name"
                            class="form-control required"
                            id="exampleInputNamex"
                            placeholder="First Name *"
                        >
                @error('f_name')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="l_name"
                            class="form-control required"
                            id="exampleInputNamexx"
                            placeholder="Last Name *"
                        >
                @error('l_name')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="email"
                            name="email"
                            class="form-control required"
                            id="exampleInputEmailxy"
                            placeholder="Email *"
                        >
                @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="phone"
                            class="form-control required"
                            id="exampleInputPhone"
                            placeholder="Phone *"
                        >
                @error('phone')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address_1"
                            class="form-control required"
                            id="exampleInputAddress"
                            placeholder="Address line 1 *"
                        >
                @error('address_1')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address_2"
                            class="form-control required"
                            id="exampleInputAddress2"
                            placeholder="Address line 2 *"
                        >
                @error('address_2')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="city"
                            class="form-control required"
                            id="exampleInputCity"
                            placeholder="City *"
                        >
                @error('city')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="zip"
                            class="form-control required"
                            id="exampleInputZip"
                            placeholder="Zipcode/Postcode *"
                        >
                @error('zip')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea
                    id="form_message"
                    name="note"
                    class="form-control required"
                    rows="4"
                    placeholder="Additional Note"
                >

                </textarea>
                @error('note')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 form-group">
                <label for="image">Screenshot  <span class="required">*</span></label>
                <input
                    type="file"
                    placeholder="Image"
                    class="form-control"
                    required=""
                    name="img"
                >
                @error('img')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2">Donate now</button>
            </div>
        </form>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Target only radios that have a value attribute
            var $radios = $('.selected-amount input[name="payment-group"][value]');
            var $amountInput = $('#exampleInputAmount');

            console.log('Valid radios with values:', $radios.length);

            $radios.off('change').on('change', function() {
                var val = $(this).attr('value');
                console.log('Valid radio clicked, value:', val);
                $amountInput.val(val);
            });

            $amountInput.off('input').on('input', function() {
                $radios.prop('checked', false);
            });
        });
    </script>
@endpush
