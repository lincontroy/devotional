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

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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
                    <form class="form" method="post" action="{{ route('register.submit') }}" id="multiStepForm">
                        @csrf
                        <div class="step">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Mobile Number (with Country Code)<span>*</span></label>
                                        <input type="text" name="phone" placeholder="e.g. +254712345678"
                                            required="required" value="{{ old('phone') }}" >
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email" placeholder="info@email.com"
                                            required="required" value="{{ old('email') }}" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
                                <div class="col-12" id="group_selection" style="display: none;">
                                    <div class="form-group">
                                        <label>Select Your Group (1 to 25)<span>*</span></label>
                                        <select name="group_number" class="form-select" required>
                                            <option value="" disabled selected>Select your group</option>
                                            @for($i = 1; $i <= 25; $i++)
                                                <option value="{{ $i }}">Group {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="step" style="display:none;">
                            <div class="row">
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
                                    <!-- <div class="form-group login-btn">
                                        <button class="btn btn-lg" style="background-color: orange; color: white;"
                                            type="submit">Register</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        


                        <div class="row">
        <div class="col-12">
            
            <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-secondary" style="display:none;">Back</button>
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

    var currentStep = 0; // Start at the first step
    showStep(currentStep);

    function showStep(step) {
        var steps = document.getElementsByClassName("step");
        steps[step].style.display = "block";
        if (step == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (step == (steps.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
    }

    function nextPrev(n) {
        var steps = document.getElementsByClassName("step");
        
        // Validate the current step before advancing
        if (n == 1 && !validateForm()) return false;

        // Hide the current step
        steps[currentStep].style.display = "none";
        currentStep = currentStep + n;

        // If reached the end of the form, submit it
        if (currentStep >= steps.length) {
            document.getElementById("multiStepForm").submit();
            return false;
        }

        // Otherwise, display the correct step
        showStep(currentStep);
    }

    function validateForm() {
        var valid = true;
        var currentFields = document.getElementsByClassName("step")[currentStep].getElementsByTagName("input");
        var selectFields = document.getElementsByClassName("step")[currentStep].getElementsByTagName("select");

        // Loop through all inputs in the current step
        for (var i = 0; i < currentFields.length; i++) {
            if (currentFields[i].hasAttribute("required") && currentFields[i].value == "") {
                currentFields[i].classList.add("invalid");
                valid = false;
            } else {
                currentFields[i].classList.remove("invalid");
            }
        }

        // Loop through all select elements in the current step
        for (var j = 0; j < selectFields.length; j++) {
            if (selectFields[j].hasAttribute("required") && selectFields[j].value == "") {
                selectFields[j].classList.add("invalid");
                valid = false;
            } else {
                selectFields[j].classList.remove("invalid");
            }
        }

        return valid; // Return true if all fields are valid
    }

</script>



<!-- Optionally, you can use a CDN for the JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script> -->


<!--/ End Login -->
@endsection

@push('styles')

@endpush
