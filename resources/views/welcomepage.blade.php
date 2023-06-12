<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- HEADER -->
    <nav class="navbar sticky-top container-fluid navbar-expand-lg navbar-light bg-light p-3">
        <div class="container-fluid">
            <div class="navbar-collapse container-fluid d-flex justify-content-between m-0" id="navbar">
                <div class="navbar-brand ms-2" href="#">
                    <img src="{{ asset('/Bifestment Logo.png')}}" width="180px" alt=""> 
                </div>
    
                <div class="collapse navbar-collapse search_box d-flex justify-content-center">
                    <input type="search" placeholder="Search event here">
                    <span class="fa fa-search"></span>
                </div>
    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end">
                    <li><a class="navmenu" href="#">Login</a></li>
                    <li><a class="navmenu" href="#">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- BODY -->
        <!-- welcoming -->
        <div class="image-container">
            <img src="{{asset ('/seminar-conference.jpg')}}" alt="Image">
            <div class="overlay text-light d-flex justify-content-center flex-column text-center">
                <h1 class="mb-2 fw-bold fs-1" id="tagline">Invest in Yourself!</h1>
                <p class="m-0 fst-italic fw-semibold">Cause it's the best investment you can give for your future self</p>
            </div>
        </div>
        
        <div class="row mt-4 mx-5 mb-3">
            <!-- Carousel -->
            <div class="me-3" style="width: 70%">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    @foreach($event_ads as $key => $item)
                        <ol data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" @if ($loop->first) class="active" @endif></li>
                    @endforeach
                
                    <div class="carousel-inner" style="margin-left: 2%;">
                        @foreach ($event_ads as $key => $item)
                            <div class="carousel-item c-item @if ($loop->first) active @endif">
                                <img src="{{ $item->ads_image }}" class="d-block c-img rounded w-100" alt="Slide {{ $item->id }}">
                            </div>
                        @endforeach
                    </div>
                    
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <!-- Welcoming Login/Register -->
            <div class="p-0 ms-4" style="width: 20%">
                <!-- event information -->
                <div class="card">
                    <h5 class="text-center pt-3 pb-2 fs-5 fw-bold">Hello!</h5>
                    <div class="text-center">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/user-rating-4118325-3414906.png" class="w-75" alt="newuser-illustration">
                    </div>
                    <h6 class="px-3 pb-1 pt-2 m-0 fs-5 text-center">New here? Register now to experience more!</h6>
                    <p class="px-3 pt-0 pb-3 m-0 text-center" style="font-size: medium;">Already have an account? Welcome back! Sign in to your account!</p>
                </div>

                <!-- login/regist button -->
                <div class="row ms-1">
                    <div class="col text-center rounded p-0">
                        <button type="button" class="btn w-100 pb-1 pt-2 mt-2 mx-0 gradient-button">
                            <h6 class="text-light">Login</h6>
                        </button>
                    </div>
                    <div class="col text-center rounded">
                        <button type="button" class="btn w-100 pb-1 pt-2 mt-2 mx-0 gradient-button">
                            <h6 class="text-light">Register</h6>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Event List -->
        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach ($eventcategories as $category)
                        <div class="row py-3 justify-content-between">
                            <div class="col" id="{{ $category }}"><h2>{{ $category->category_name }}</h2></div>
                            <div class="col"><p class="fst-italic text-end align-bottom mb-0 mt-2">View More ></p></div>
                        </div>

                        <div class="row">
                            @foreach ($events as $event)
                                @if ($event->category_id == $category->id)
                                    <div class="col mb-2 mt-0 mx-0" data-bs-toggle="modal" data-bs-target="#eventModal">
                                        <div class="mb-4 shadow-sm rounded">
                                            <img src="{{ $event -> event_image }}" class="card-img-top mb-1" alt="{{ $event -> event_name }}">
                                            <div class="mx-3 mb-0 mt-1">
                                                <div class="text-wrap justify-content-center m-0 pt-1" style="width:fit-content">
                                                    <p class="px-2 rounded-pill m-0" style="background-color: #D9D9D9; font-size: smaller;">{{ $event->eventCategory->category_name }}</p>
                                                </div>

                                                <h5 class="mb-1 pt-2">
                                                    {{ Str::limit($event->event_name, $limit = 35, $end = ' ...') }}
                                                </h5>
                                                <p class="mt-1 pt-1 mb-0 mx-0" style="font-size: medium;">{{ $event->event_date }}</p>
                                                <p class="mt-0 pt-1 pb-3 mx-0" style="font-size: small;">{{ $event->event_time }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            {{-- PopUp Regist/Login Button --}}
                             <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eventMmodalLabel">Please Log in To Continue!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row py-0">
                                            <div class="col text-center m-0 mt-3">
                                                <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-registration-4489363-3723270.png" class="w-100" alt="register-illustration">
                                            </div>
                                            <div class="col mb-3">
                                                <p class="mt-3">You need to be logged in to access this page! or register yourself to experience all features in Bifestment! Let's invest more for the future you!</p>
                                                <button type="button" class="mx-1 row btn btn-primary" href="/login">Log in</button>
                                                <button type="button" class="mx-1 row btn btn-outline-danger" href="/register">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    <!-- FOOTER -->
    <footer class="footer mt-4 text-center text-white" style="background-color: #21081a; bottom: 0;">
        <!-- Logo -->
        <div class="p-1 pt-3 m-0">
            <img src="{{ asset('/Bifestment Logo.png')}}" width="200px" alt=""> 
        </div>

        <!-- Copyright -->
        <div class="text-center pb-3">Copyright 2023, All Rights Reserved</div>
    </footer>
</body>
</html>