<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <!-- bulma css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="~bulma-calendar/dist/css/bulma-calendar.min.css" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/security.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="./css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="./images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
</head>
<body class="main-layout">
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="/"><img src="/images/logo.png" alt="#"/></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav style="background-color:#0c0f38" class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/forms">Form</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/123"> About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/flight"> Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>
                                @auth()
                                    <li class="nav-item logout">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log out') }}
                                            </x-responsive-nav-link>
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/register">Register</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
@auth()
    @if(Auth::user()->email == 'admin@admin.nl')
<section class="section">
    <div class="container">
        <div class="form-description">
            <h1 class="title">
                Create
            </h1>
            <p class="subtitle">
                new Blog
            </p>
        </div>
        <form method="POST" class='blog-form' action="{{ route('forms.store') }}">
            @csrf
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"><span class="text-danger">*</span>First Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input @error('first_name') is-danger @enderror" name="first_name"
                                   type="text"
                                   placeholder="Type your first name">
                        </div>
                        @error('first_name')
                        <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"><span class="text-danger">*</span>Last Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input @error('last_name') is-danger @enderror" name="last_name" type="text"
                                   placeholder="Type your last name">
                        </div>
                        @error('last_name')
                        <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"><span class="text-danger">*</span>Year of Birth</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input @error('year_of_birth') is-danger @enderror" name="year_of_birth" type="date">
                        </div>
                        @error('year_of_birth')
                        <p class="help is-danger">{{ $errors->first('year_of_birth') }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"><span class="text-danger">*</span>Describe Purpose</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                        <textarea class="textarea @error('purpose') is-danger @enderror" name="purpose"
                                  placeholder="Describe your purpose in life"></textarea>
                        </div>
                        @error('purpose')
                        <p class="help is-danger">{{ $errors->first('purpose') }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"><span class="text-danger">*</span>Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-right">
                            <input class="input @error('email') is-danger @enderror" type="text"
                                   placeholder="name@example.com"
                                   id="email" name="contact_email">
                        </p>
                        @error('contact_email')
                        <p class="help is-danger">{{ $errors->first('contact_email') }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button style="background-color:#0c0f38" class="button is-link is-rounded" type="submit"
                                    value="Submit">
                                Send message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    @endif
@endauth
<div id="why" class="why">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Blogposts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($forms as $form)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div id="box_ho" class="why-box">
                        <h3>{{$form->first_name}}</h3>
                        <p>{{$form->purpose}}</p>
                        <p>{{$form->year_of_birth}}</p>
                    </div>
                    <a class="read_more bg" href="forms/{{$form->id}}">Show Blog</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end why -->
<!-- contact -->
<div id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 ">
                <form class="main_form">
                    <div class="row">
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Name" type="text" name="Name">
                        </div>
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Email" type="text" name=" Email">
                        </div>
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Phone" type="text" name="Phone">
                        </div>
                        <div class="col-sm-12">
                            <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                        </div>
                        <div class="col-sm-12">
                            <button class="send">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end contact -->
<!--  footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="cont">
                        <h3>Contact now</h3>
                        <span>Free Multipurpose Responsive Landing Page 2019</span>
                        <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quissed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="~bulma-calendar/dist/js/bulma-calendar.min.js"></script>
</body>
</html>
