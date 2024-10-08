@extends('frontend.layouts.master')

<blade
    section|(%26%2339%3Btitle%26%2339%3B%2C%26%2339%3BA%20minite%20jesus%20devotional%20%7C%7C%20Register%20Page%26%2339%3B)%0D />

@section('main-content')

<style>
    .custom-select {
        min-width: 350px;
    }

    .custom-select select {
        appearance: none;
        width: 100%;
        font-size: 1.15rem;
        padding: 0.675em 6em 0.675em 1em;
        background-color: #fff;
        border: 1px solid #caced1;
        border-radius: 0.25rem;
        color: #000;
        cursor: pointer;
    }

</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Breadcrumbs -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Register</h2>
                    <p>Please register {{ config('app.name', 'Laravel') }}</p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Name<span>*</span></label>
                                    <input type="text" name="name" placeholder="Full name" required="required"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Mobile Number (with Country Code)<span>*</span></label>
                                    <input type="text" name="phone" placeholder="e.g. +254712345678" required="required"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" placeholder="info@email.com" required="required"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Date of Birth<span>*</span></label>
                                    <input type="date" name="dob" required="required"
                                        value="{{ old('dob') }}">
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Are you born again? <span>*</span></label>
                                    <select name="born_again" id="born_again" class="form-select" required>
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Where do you go to church?<span>*</span></label>
                                    <input type="text" name="church" placeholder="Enter the name of your church"
                                        required="required" value="{{ old('church') }}">
                                    @error('church')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Are you in a small group?<span>*</span></label>
                                    <select name="in_small_group" id="in_small_group" class="form-select" required>
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-12" id="group_selection" style="display: none;">
                                <div class="form-group">
                                    <label>Select Your Group (1 to 25)<span>*</span></label>
                                    <select name="group_number" class="form-select">
                                        <option value="" disabled selected>Select your group</option>
                                        @for($i = 1; $i <= 25; $i++)
                                            <option value="{{ $i }}">Group {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Are you in any department? <span>*</span></label>
                                    <select name="in_department" id="in_small_group" class="form-select" required>
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Would you like to be receiving Email and Sms notification on the group
                                        updates and schedules? <span>*</span></label>
                                    <select name="notifications" id="in_small_group" class="form-select" required>
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn btn-lg" style="background-color: orange; color: white;"
                                        type="submit">Register</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('in_small_group').addEventListener('change', function () {
        var groupSelection = document.getElementById('group_selection');
        var groupNumberSelect = document.getElementById('group_number');

        if (this.value === 'yes') {
            groupSelection.style.display = 'block';
            groupNumberSelect.value = ''; // Clear previous selection
        } else if (this.value === 'no') {
            groupSelection.style.display = 'none';
            groupNumberSelect.value = '0'; // Set group number to zero
        }
    });
 

</script>



<!-- Optionally, you can use a CDN for the JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script> -->


<!--/ End Login -->
@endsection

@push('styles')

@endpush
