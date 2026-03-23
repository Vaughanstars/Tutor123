
@extends('frontend.layouts.app')

@section('content')


<!-- breadcrumbarea__section__start -->

<div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Register Tutor123</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Register </li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="shape__icon__2">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{ asset('assets/img/herobanner/herobanner__1.png') }}" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{ asset('assets/img/herobanner/herobanner__2.png') }}" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{ asset('assets/img/herobanner/herobanner__3.png') }}" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{ asset('assets/img/herobanner/herobanner__5.png') }}" alt="photo">
    </div>

</div>
<!-- breadcrumbarea__section__end-->


<!-- login__section__start -->
<div class="loginarea sp_top_50 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                <div class="tab-pane active show" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="col-xl-8 offset-md-2">
                        <div class="loginarea__wraper register_area">
                            <div class="login__heading">
                                <h5 class="login__title">Register</h5>
                            </div>
                            <p class="mb-3">* Please fill out all mandatory fields</p>

                            <form id="register-form" class="contact-form" action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label" for="first_name">Student First Name*</label>
                                            <input name="first_name" id="first_name" class="common__login__input" type="text" placeholder="First Name" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Student Middle Name</label>
                                            <input name="middle_name" class="common__login__input" type="text" placeholder="Middle Name">

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Student Last Name*</label>
                                            <input name="last_name" class="common__login__input" type="text" placeholder="Last Name" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Parent/Guardian*</label>
                                            <input name="parent_name" class="common__login__input" type="text" placeholder="Parent/Guardian" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Date of Birth*</label>
                                            <input name="dob" class="common__login__input" type="date" placeholder="Date of Birth" max="{{ now()->subYears(3)->format('Y-m-d') }}"  required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Email*</label>
                                            <input name="email" class="common__login__input" type="email" placeholder="Your Email" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label" for="gender">Gender*</label>
                                            <select id="gender" name="gender" class="common__login__input form-control" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Phone*</label>
                                            <input name="phone" class="common__login__input" type="tel" placeholder="Enter Phone" required pattern="[0-9]{10}">

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Grade*</label>
                                            <input name="grade" class="common__login__input" type="text" placeholder="Enter Grade" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Address*</label>
                                            <input name="address" class="common__login__input" type="text" placeholder="Enter Address" required>

                                        </div>
                                    </div>
                                    <hr class="my-4 border-4 border-warning opacity-100">
                                    <div class="col-xl-12">
                                        <div class="login__form">
                                            <label class="form__label">Medical Condition/Allergies</label>
                                            <input name="medical_condition" class="common__login__input" type="text" placeholder="Enter Medical Condition/Allergies (if any)">

                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="login__form">
                                            <label class="form__label" for="performance">Student Performance & Expectations</label>
                                            <textarea name="performance" class="common__login__input"
                                            placeholder="Write about student performance and expectations..." rows="4" required
                                            ></textarea>
                                        </div>
                                    </div>

                                    <hr class="my-4 border-4 border-warning opacity-100">
                                    <div class="col-12">
                                        <div class="login__form">
                                            <label class="form__label">Select preferred time slot for each day* </label>
                                            <!--  <p class="mb-2"><strong>Select preferred time slot for each day:</strong></p> -->
                                            <p id="scheduleError" class="text-danger mt-2" style="display:none;">
                                                Please select at least 3 days for the schedule.
                                            </p>

                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="monday">Monday</label>
                                                    <select id="monday" name="schedule[Monday]" class="form-select" ></select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="tuesday">Tuesday</label>
                                                    <select id="tuesday" name="schedule[Tuesday]" class="form-select" ></select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="wednesday">Wednesday</label>
                                                    <select id="wednesday" name="schedule[Wednesday]" class="form-select" ></select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="thursday">Thursday</label>
                                                    <select id="thursday" name="schedule[Thursday]" class="form-select" ></select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="friday">Friday</label>
                                                    <select id="friday" name="schedule[Friday]" class="form-select" ></select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="saturday">Saturday</label>
                                                    <select id="saturday" name="schedule[Saturday]" class="form-select" ></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input name="terms" id="terms" type="checkbox" required> <label class="form-check-label" for="terms" >
                                            I agree to the <a href="{{ url('terms') }}" class="text-warning" target="_blank">Terms & Conditions</a>
                                        </label>
                                    </div>

                                </div>
                                <div class="login__button">
                                    <button type="submit" class="default__button w-100 disabled-btn" id="registerBtn" disabled>Register</button>
                                </div>
                            </form>

                            @if(session('success'))
                            <div class="text-success mb-3">{{ session('success') }}</div>
                            @endif


                            <div id="formMessage"></div>

                        </div>
                    </div>

                </div>



            </div>

        </div>

        <div class=" login__shape__img educationarea__shape_image">
            <img loading="lazy"  class="hero__shape hero__shape__1" src="{{ asset('assets/img/education/hero_shape2.png') }}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__2" src="{{ asset('assets/img/education/hero_shape3.png') }}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__3" src="{{ asset('assets/img/education/hero_shape4.png') }}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__4" src="{{ asset('assets/img/education/hero_shape5.png') }}" alt="Shape">
        </div>


    </div>
</div>

<!-- login__section__end -->

<script>


document.addEventListener('DOMContentLoaded', function () {
    const dobInput = document.querySelector('input[name="dob"]');
    const todayMinus3Years = new Date();
    todayMinus3Years.setFullYear(todayMinus3Years.getFullYear() - 3);
    const maxDate = todayMinus3Years.toISOString().split('T')[0];

    dobInput.setAttribute('max', maxDate);

    // Prevent typing future dates
    dobInput.addEventListener('input', function() {
        if (dobInput.value > maxDate) {
            dobInput.value = maxDate; // reset to max
        }
    });
});




// Time array
const timeSlots = ["3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM"];

// Days array
const days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

// Populate each dropdown dynamically
days.forEach(day => {
    const select = document.getElementById(day);
    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.text = "Select time";
    //defaultOption.disabled = true;
    select.appendChild(defaultOption);

    timeSlots.forEach(time => {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        select.appendChild(option);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const termsCheckbox = document.getElementById('terms');
    const registerBtn = document.getElementById('registerBtn');

    // Toggle button on checkbox change
    termsCheckbox.addEventListener('change', function() {
        registerBtn.disabled = !this.checked;
    });
});


// document.addEventListener('DOMContentLoaded', function() {
//     const form = document.getElementById('register-form');
//     const scheduleSelects = [
//     'monday', 'tuesday', 'wednesday', 
//     'thursday', 'friday', 'saturday'
//     ].map(id => document.getElementById(id));
//     const errorMsg = document.getElementById('scheduleError');

//     form.addEventListener('submit', function(e) {
//         // Count how many selects have a value
//         const selectedCount = scheduleSelects.filter(select => select.value).length;

//         if (selectedCount < 3) {
//             e.preventDefault(); // stop form submission
//             errorMsg.style.display = 'block'; // show error message
//         } else {
//             errorMsg.style.display = 'none'; // hide error message
//         }
//     });
// });


document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById('register-form');
    const registerBtn = document.getElementById('registerBtn');
    const errorMsg = document.getElementById('scheduleError');

    const scheduleSelects = [
    'monday','tuesday','wednesday',
    'thursday','friday','saturday'
    ].map(id => document.getElementById(id));

    form.addEventListener('submit', function(e) {
        e.preventDefault(); //  stop reload

        //  Validate min 3 days
        const selectedCount = scheduleSelects.filter(s => s.value).length;
        if (selectedCount < 3) {
            errorMsg.style.display = 'block';
            return;
        } else {
            errorMsg.style.display = 'none';
        }

        //  Disable button while submitting
        registerBtn.disabled = true;
        registerBtn.innerText = 'Submitting...';

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) throw res;
            return res.json();
        })
        .then(data => {
            showMessage(data.message, 'success');

            form.reset(); // clear form

            // reset button again
            registerBtn.innerText = 'Register';
            registerBtn.disabled = true;
        })
        .catch(async err => {
            let msg = 'Something went wrong try again';

            if (err.json) {
                const errorData = await err.json();
                if (errorData.errors) {
                    msg = Object.values(errorData.errors)[0][0];
                }
            }

            showMessage(msg, 'error');

            registerBtn.innerText = 'Register';
            registerBtn.disabled = false;
        });
    });

    //  message UI
    function showMessage(message, type) {
        let box = document.getElementById('formMessage');

        box.innerHTML = `
        <div class="alert ${type === 'success' ? 'text-success' : 'alert-danger'} mt-3">
        ${message}
        </div>
        `;
    }
});


</script>

@endsection

