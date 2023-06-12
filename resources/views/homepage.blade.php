<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Participant</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('script.js')}}"></script>
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    @php
    use Illuminate\Support\Carbon;
    @endphp
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

                <!-- <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarText"> -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end">
                        <li><a class="navmenu" href="#">My Events</a></li>
                        <li><a class="navmenu" href="#">Favourite</a></li>
                        <li><a class="navmenu" href="#">Notification</a></li>
                        <li><a class="navmenu" href="#">Profile</a></li>
                    </ul>
                <!-- </div> -->
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
                    {{-- <ol class="carousel-indicators"> --}}
                        @foreach($event_ads as $key => $item)
                            <ol data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" @if ($loop->first) class="active" @endif></li>
                        @endforeach
                    {{-- </ol> --}}
                
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

            <!-- Upcoming Events -->
            <div class="p-0 ms-4" style="width: 20%">
                <!-- event information -->
                <div class="card">
                    <h5 class="text-center pt-3 pb-2 fs-5 fw-bold">My Upcoming Event</h5>

                    @if ($upcomingevent)
                        @php
                            $eventDate = Carbon::parse($upcomingevent->event_date);
                            $dayName = $eventDate->format('l');
                            $day = $eventDate->day;
                            $month = $eventDate->format('F');
                        @endphp
                            <div class="row position-absolut start-10">
                                <div class="p-0" style="width: 22%">
                                

                                    <p class="ps-4 m-0 fs-5 text-uppercase fw-semibold text-center">{{ Str::limit($dayName, $limit = 3, $end='') }}</p>
                                    <P class="ps-4 m-0 fs-4 fw-semibold text-center">{{ $day }}</P>
                                    <P class="ps-4 m-0 fs-5 text-uppercase fw-semibold text-center">{{ Str::limit($month, $limit = 3, $end='') }}</P>
                                </div>
                                <img src="{{ $upcomingevent->event->event_image }}" class="card-img-top mb-1 mx-1" style="width: 72%" alt="{{ $upcomingevent->event->event_image }}">
                            </div>
                            <h6 class="px-3 pb-1 pt-2 m-0 fs-5">{{ $upcomingevent->event->event_name }}</h6>
                            <p class="px-3 pt-0 pb-3 m-0" style="font-size: small;">{{ $upcomingevent->event->event_time }}</p>
                    @else
                        <img src="https://ask.brightcoding.dev/assets/templates/basic/images/no-data.png" class="px-5">
                        <p class="text-center px-2 pt-4">OOPS! Looks like there is no upcoming event for you. Register one now!</p>
                    @endif
                </div>

                <!-- my events button -->
                <div class="">
                    <div class="text-center rounded gradient-button pb-1 px-3 pt-2 mt-2">
                        <h6 href="#">View My Events ></h6>
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
                            @php
                                $count = 0;
                            @endphp

                            @foreach ($events as $event)
                                @if ($event->category_id == $category->id && $count < 5)
                                    <a id="eventCard" style="all:unset;" href="{{ route('details', ['eventId' => $event->id]) }}">
                                        <div class="col mb-2 mt-0 mx-0">
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

                                                    @php
                                                        $count++;
                                                    @endphp
                                                    {{-- <div class="container px-0 py-2">
                                                        <div class="row">
                                                            <div class="col">
                                                                @if ($event->event_price === 0)
                                                                    <h6 class="fw-bold text-danger m-0" style="font-size: large;">FREE</h6>
                                                                @else
                                                                    <h6 class="fw-bold text-danger m-0" style="font-size: large;">Rp{{ $event->event_price }}</h6>
                                                                @endif
                                                            </div>
                                                            <div class="col text-end"><p class="m-0 justify-content-end" style="font-size: small;">{{ $event->event_participant }} Registered</p></div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- </div> -->

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