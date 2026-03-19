@extends('frontend.layouts.app')

@section('content')

<!-- Dark/Light area start -->
   <!--  <div class="mode_switcher my_switcher">
        <button id="light--to-dark-button" class="light align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>

            <span class="light__mode">Light</span>
            <span class="dark__mode">Dark</span>
        </button>
    </div> -->
    <!-- Dark/Light area end -->


    

    <!-- herobannerarea__section__start -->
    <div class="herobannerarea herobannerarea__box herobannerarea__single__instructor">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <div class="herobannerarea__content__wraper">

                        <div class="herobannerarea__title">
                            <div class="herobannerarea__small__title">
                                <span>Education </span>
                            </div>
                            <div class="herobannerarea__title__heading__2 font_title">
                                <h1>Trusted Global Tutoring <br><span>For K-12 Students</span></h1>
                            </div>
                        </div>

                        <div class="herobannerarea__text">
                            <p>Ontario Certified Teachers Personalized 1-on-1 Learning All Subjects</p>
                        </div>
                        <div class="hreobannerarea__button">
                            <a class="herobannerarea__button__1" href="{{ url('contact') }}" >Book Free Assessment</a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <div class="aboutarea__img__inner text-center">
                        <div class="aboutarea__img" data-tilt>
                            <img loading="lazy"  class="w-75" src="{{ asset('assets/img/herobanner/bg3.png') }}" alt="aboutimg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="herobannerarea__icon">
            <img loading="lazy"  class="hero__icon__1" src="{{ asset('assets/img/register/register__2.png') }}" alt="photo">
            <img loading="lazy"  class="hero__icon__2" src="{{ asset('assets/img/herobanner/herobanner__6.png') }}" alt="photo">
            <img loading="lazy"  class="hero__icon__3" src="{{ asset('assets/img/herobanner/herobanner__7.png') }}" alt="photo">
            <img loading="lazy"  class="hero__icon__4" src="{{ asset('assets/img/herobanner/herobanner__7.png') }}" alt="photo">
        </div>
    </div>
    <!-- herobannerarea__section__end-->


    <!-- Countries Section Start -->
    <div class="countriesarea mt-4 special-countries">

    <div class="container">

        <!-- Heading -->
        <div class="row ">
            <div class="col-12 text-center">
                <h3>Trusted by Students Across The Globe</h3>
            </div>
        </div>

        <!-- Flags -->
        <div class="row justify-content-center text-center">

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/ca.png" >
                <p>Canada</p>
            </div>

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/us.png" >
                <p>USA</p>
            </div>

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/au.png" >
                <p>Australia</p>
            </div>

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/in.png" >
                <p>India</p>
            </div>

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/pk.png">
                <p>Pakistan</p>
            </div>

            <div class="col-md-2 col-4 mb-3 country-flag">
                <img src="https://flagcdn.com/w40/cn.png">
                <p>China</p>
            </div>

        </div>

    </div>
</div>
    <!-- Countries Section End -->

    <!-- intructor__teacher__start -->
    <div class="instructor sp_top_70 sp_bottom_70" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="instructor__sidebar" data-tilt>
                        <div class="instructor__sidebar__img" data-aos="fade-up">
                            <img loading="lazy" src="{{ asset('assets/img/about/about1.png') }}" alt="Instructor">
                            <!-- <div class="instructor__sidebar__small__img">
                                <img loading="lazy" src="{{ asset('assets/img/about/about_4.png') }}"  alt="img">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="aboutarea__content__wraper__5">
                        <div class="instructor__inner__wraper">
                            <div class="instructor__list">
                                <div class="section__title__button">
                                    <div class="default__small__button aboutlabel">About us</div>
                                </div>
                                <ul>
                                    <li data-aos="fade-up">
                                        <div class="instructor__heading">
                                            <h3>Welcome to the online Learning Center</h3>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="instructor__content__wraper" data-aos="fade-up">

                                <div class="aboutarea__5__small__icon__wraper">
                                    <div class="aboutarea__5__small__icon">
                                        <img loading="lazy" src="{{ asset('assets/img/about/about_15.png') }}" alt="about">
                                    </div>
                                    <div class="aboutarea__small__heading">
                                        <span>20 years in education leadership; 10+ years researching online learning</span>
                                    </div>
                                </div>

                                <p>
                                    Education should be accessible, personalized, and designed around how each student learns. Tutor123 was created to bring that vision to life. 
                                </p>
                                <p>
                                    Built from over 20 years of educational leadership and more than a decade of research into online learning, Tutor123 provides affordable and customized academic support that adapts to the individual learner. Our platform operates using a structured learning framework developed through years of real educational experience and academic research.
                                </p>
                                <div class="aboutarea__bottom__button__5">
                                <a class="default__button" href="{{ url('about') }}"> More About
                                        <i class="icofont-long-arrow-right"></i>
                                    </a>
                            </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>        
    <!-- intructor__teacher__end -->

    <!-- .about__tap__section__end -->
    <div class="gridarea__2 sp_bottom_30 sp_top_10" data-aos="fade-up">
        <div class="container-fluid full__width__padding">

            <div class="section__title">

                <div class="section__title__heading text-center">
                    <h2>1-2-3 Steps to Tutoring Success</h2>
                </div>
            </div>

            <div class="row ">




                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class ">
                    <div class="gridarea__wraper">
                        <div class="gridarea__img"><img loading="lazy"  src="{{ asset('assets/img/contact/email.jpg') }}" alt="grid">
                            <div class="gridarea__small__button gridarea__small__button__1">
                                <div class="grid__badge stepsbadge">Contact Us</div>
                            </div>

                        </div>
                        <div class="gridarea__content">

                            <div class="gridarea__heading">
                                <h3>Reach out by phone, email, or our online form to discuss your child's learning goals.</h3>
                            </div>
                            <div class="text-center">

                                <a href="{{ url('contact') }}"><button class="default__button ">Get in Touch
                                    <i class="icofont-long-arrow-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class ">
                        <div class="gridarea__wraper">
                            <div class="gridarea__img"><img loading="lazy"  src="{{ asset('assets/img/contact/call.jpg') }}" alt="grid">
                                <div class="gridarea__small__button gridarea__small__button__1">
                                    <div class="grid__badge stepsbadge">Consultation Call </div>
                                </div>

                            </div>
                            <div class="gridarea__content">

                                <div class="gridarea__heading">
                                    <h3>We'll schedule a consultation call with you to understand your goals and plan the best approach.</h3>
                                </div>
                                <div class="text-center">

                                    <a href="{{ url('contact') }}"><button class="default__button ">Schedule Call
                                        <i class="icofont-long-arrow-right"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class ">
                            <div class="gridarea__wraper">
                                <div class="gridarea__img"><img loading="lazy"  src="{{ asset('assets/img/contact/confirm.jpg') }}" alt="grid">
                                    <div class="gridarea__small__button gridarea__small__button__1">
                                        <div class="grid__badge stepsbadge">Start Learning</div>
                                    </div>

                                </div>
                                <div class="gridarea__content">

                                    <div class="gridarea__heading">
                                        <h3>Confirm the details, choose your package, and get ready to start boosting your child's education!</h3>
                                    </div>
                                    <div class="text-center">

                                        <a href="{{ url('contact') }}"><button class="default__button ">Start Tutoring
                                            <i class="icofont-long-arrow-right"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- register__section__start-->
                <div class="registerarea sp_top_90 sp_bottom_70" id="contact">
                    <div class="container">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 testi_pad">
                                <div class="section__title__2" data-aos="fade-up">
                                    <div class="section__small__title">
                                        <span>Education Solution</span>
                                    </div>
                                    <div class="section__title__heading__2 section__title__heading__3 heading__fontsize__2">
                                        <h2>What Parents Are Saying About Tutor123</h2>
                                    </div>
                                </div>

                                <div class="testimonial__slider__active__3" data-aos="fade-up">

                                    <div class="testimonialarea__paragraph__3 ">
                                        <p class="testimonial__quote"><i class="icofont-quote-left quote__left"></i>Tutor123 has been amazing for my child. The one-on-one tutoring helped improve both confidence and grades in math and science. The teachers are patient, supportive, and truly care about student success.<i class="icofont-quote-right quote__right"></i></p>

                                        <div class="testimonialarea__person__3">
                                            <div class="testimonial__img__3">
                                                <img loading="lazy" src="{{ asset('assets/img/testimonial/testi_2.png') }}"  alt="">
                                            </div>
                                            <div class="testimonial__name">
                                                <h6>Alex John</h6>
                                                <span>Parent</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonialarea__paragraph__3 ">
                                        <p class="testimonial__quote"><i class="icofont-quote-left quote__left"></i>Amazing tutoring service! My child has imprived so much in such a short time. The teachers are fantastic and patient<i class="icofont-quote-right quote__right"></i></p>

                                        <div class="testimonialarea__person__3">
                                            <div class="testimonial__img__3">
                                                <img loading="lazy" src="{{ asset('assets/img/testimonial/testi_3.png') }}" alt="">
                                            </div>
                                            <div class="testimonial__name">
                                                <h6>Lisa Sam</h6>
                                                <span>Parent</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="testimonialarea__paragraph__3 ">
                                        <p class="testimonial__quote"><i class="icofont-quote-left quote__left"></i>TWe are very happy with Tutor123. The personalized lessons make learning easier for my son, and his academic performance has improved significantly. Highly recommended for K-12 students.<i class="icofont-quote-right quote__right"></i></p>

                                        <div class="testimonialarea__person__3">
                                            <div class="testimonial__img__3">
                                                <img loading="lazy" src="{{ asset('assets/img/testimonial/testi_2.png') }}" alt="">
                                            </div>
                                            <div class="testimonial__name">
                                                <h6>Mirnsdo Jons</h6>
                                                <span>Parent</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                                <div class="registerarea__form homecontact">
                                    <div class="registerarea__form__heading">
                                        <h4>Get Started Today</h4>
                                    </div>
                                    <form id="contact-form" class="contact-form" action="{{ route('contact.submit') }}" method="POST">
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <input name="name" class="register__input" type="text" placeholder="Enter Your Name*">
                                            </div>
                                            <div class="col-xl-6">
                                                <input name="email" class="register__input" type="text" placeholder="Enter Your Email*">
                                            </div>
                                            <div class="col-xl-6">
                                                <input name="phone" class="register__input" type="tel" placeholder="Enter Your Phone*">
                                            </div>
                                            <div class="col-xl-6">
                                                <input name="grade" class="register__input" type="text" placeholder="Enter Grade">
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label>Prefered Learning Format </label>
                                                <div class="dashboard__selector">
                                                    <select name="learning_format" class="form-select dark_select" aria-label="Default select example">
                                                        <option value="online" selected>Online</option>
                                                        <option value="inperson">In Person</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label>Prefered Time of Contact </label>
                                                <div class="dashboard__selector">
                                                    <select name="time_contact" class="form-select" aria-label="Default select example">
                                                        <option value="morning" selected>Morning(9AM-12PM)</option>
                                                        <option value="afternoon">Afternoon (12PM - 4PM)</option>
                                                        <option value="evening">Evening (4PM - 8PM)</option>
                                                        <option value="anytime">Anytime</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <textarea class="register__input textarea" name="message" id="#" cols="30" rows="10" placeholder="Share your child’s goals, challenges, or support needs."></textarea>
                                        <div class="contact__button">

                                            <button type="submit" value="submit" class="default__button contactbtn" name="submit">Send</button>

                                            <p class="form-messege">

                                            </p>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="registerarea__img">
                        <img loading="lazy"  class="register__1" src="{{ asset('assets/img/register/register__1.png') }}" alt="register">
                        <img loading="lazy"  class="register__3" src="{{ asset('assets/img/register/register__3.png') }}" alt="register">
                    </div>
                </div>
                <!-- register__section__start-->


                @endsection
