@extends('master')

@section('navbar')
    <!-- header -->
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
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    @auth()
                                        <li class="nav-item">
                                            <a class="nav-link" href="/form">Form</a>
                                        </li>
                                    @endauth()
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
    <!-- end header inner -->
    <!-- end header -->
@endsection
