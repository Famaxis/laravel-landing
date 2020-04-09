@extends('layouts.frontend')

@section('content')

    <nav>
        <a href="#">home</a>
        <a href="#about">about</a>
        <a href="#services">services</a>
        <a href="#contact">contact us</a>
    </nav>
<section class="home"
         @if($image)
            style="background-image: url('/uploaded_images/{{ $image->image }}');"
         @endif
>
    <div class="container">
        <div class="figure-feature">
            <div class="figure-feature__corner figure-feature__corner_top"></div>
            <div class="figure-feature__corner figure-feature__corner_bottom"></div>

            <h1
               @if($image)
               style="background: #ffffffa6;"
               @endif>
                {{ $settings->title }}</h1>
        </div>
    </div>
</section>
<a id="about"></a>
<section class="about">
    <div class="container">
        <div class="figure-feature">
            <div class="figure-feature__corner figure-feature__corner_top"></div>
            <div class="figure-feature__corner figure-feature__corner_bottom"></div>
            <h1>About us</h1>
            {!! $settings->about !!}
        </div>
    </div>
</section>
<a id="services"></a>
<section class="services">
    <div class="container">
        <div class="figure-feature">
            <div class="figure-feature__corner figure-feature__corner_top"></div>
            <div class="figure-feature__corner figure-feature__corner_bottom"></div>
            <h1>Our services</h1>
            <h2>What we can do:</h2>
            <div class="services_list">
                {!! $settings->services !!}
                <img src="/images/emphasis.png" alt="">
            </div>
        </div>
    </div>
</section>
<a id="contact"></a>
<section class="contact">
    <div class="container">
        <div class="figure-feature">
            <div class="figure-feature__corner figure-feature__corner_top"></div>
            <div class="figure-feature__corner figure-feature__corner_bottom"></div>
            <h1>Contact us</h1>
            <div class="contact-form">
                <form action="{{ route('mail') }}" method="post">
                    @csrf
                    <label>
                        <input type="text" name="name" required/>
                        <div class="label-text">Name</div>
                    </label>
                    <label>
                        <input type="email" name="email" required/>
                        <div class="label-text">Email Address</div>
                    </label>
                    <label>
                        <textarea placeholder="MESSAGE" name="content"></textarea>
                    </label>
                    <button>Submit</button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
