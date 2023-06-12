<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Detail</title>
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('registerScript.js')}}"></script>
</head>
<body>
    <!-- Header -->
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

     <!-- Body -->
     <div class="mt-4 mb-4" style="margin-left: 100px; margin-right: 100px;">
        <div class="row justify-content-between">
            <div class="col">
                <h3>{{ $event->event_name }}</h3>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <div class="text-wrap justify-content-end m-0" style="width:fit-content;">
                    <p class="px-2 rounded-pill m-0 fst-italic text-end text-danger" style="border: 1px solid; border-color: red; font-size: small;">Only {{ $event->event_capacity }} seats!</p>
                </div>
            </div>
        </div>
        <p style="color: #6D6969; font-size: 13px;"><i>{{ $event->event_organizer }}</i></p>
        <hr>
        
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="mx-3 mb-0 mt-1">
                        <div class="row">
                            <div class="col-3">
                                <div class="row justify-content-center">
                                    <img src="{{ $event->event_image }}" alt=""> 
                                </div>
                                <div class="row justify-content-center">
                                    <button type="button" class="btn regist-btn btn-danger rounded-pill m-4" style="width: 280px; height: 40px;" data-bs-toggle="modal" data-bs-target="#registerEventModal" data-event-id="1">
                                        Register Now
                                    </button>
                                </div>

                                {{-- PopUp Register Now Button --}}
                                <div class="modal fade" id="registerEventModal" tabindex="-1" aria-labelledby="registerEventModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header mb-2 pb-2">
                                                <h4 class="modal-title text-center" id="registerEventMmodalLabel">Registration Confirmation</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row py-0 mt-2">
                                                <div class="col text-center m-0">
                                                    <img src="{{ $event->event_image }}" class="w-100" alt="event-image">
                                                </div>
                                                <div class="col">
                                                    <p style="margin-bottom:5px;font-size:13px">{{ $event->event_organizer }}</p>
                                                    <h6 class="mt-0">{{ $event->event_name }}</h6>
                                                    <div class="container px-0 py-2">
                                                        <div class="row">
                                                            <div class="col-1 text-end">
                                                                <img src="https://img.freepik.com/free-icon/maps-flags_318-341720.jpg" alt="" width="13">
                                                            </div>
                                                            <div class="col">
                                                                <p class="mt-1 mb-0" style="color: #6D6969; font-size: 12px;">{{ $event->event_place }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1 text-end">
                                                                <img src="https://cdn-icons-png.flaticon.com/512/55/55281.png" alt="" width="13">
                                                            </div>
                                                            <div class="col">
                                                                <p class="mt-1 mb-0" style="color: #6D6969; font-size: 12px;">{{ $event->event_date }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1 text-end">
                                                                <img src="https://cdn-icons-png.flaticon.com/512/61/61227.png" alt="" width="13">
                                                            </div>
                                                            <div class="col">
                                                                <p class="mt-1 mb-0" style="color: #6D6969; font-size: 12px;">{{ $event->event_time }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1 text-end">
                                                                <img src="http://cdn.onlinewebfonts.com/svg/img_19529.png" alt="" width="13">
                                                            </div>
                                                            <div class="col">
                                                                <p class="mt-1 mb-0" style="color: #6D6969; font-size: 12px;">FREE</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div>
                                                        <form id="registEventForm" method="POST" action="{{ route('register.event', ['eventId' => $event->id]) }}">
                                                            @csrf
                                                            <input type="hidden" name="event_id" id="eventId">
                                                            <button type="button" class="mx-1 mb-3 confirm-regist-btn row btn text-end" style="background-color: #FCCE75">
                                                                <p class="fw-semibold p-0 m-0">Register</p>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- PopUp Register Success --}}
                                <div class="modal fade" id="registerSuccessModal" tabindex="-1" aria-labelledby="registerSuccessModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header mb-2 pb-2">
                                                <h4 class="modal-title text-center" id="registerSuceessMmodalLabel">Registration Success</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="text-center m-0">
                                                <img src="https://www.pngall.com/wp-content/uploads/8/Green-Check-Mark-PNG-Free-Download.png" class="" style="width: 30%; height:30%; margin-top:10px" alt="register-success">
                                            </div>
                                            <div class="m-1">
                                                <div style="margin-top:10px; margin-left:12px; margin-right:12px; text-align:center">
                                                    <p>You have been registered to this event. <br>
                                                    You can check your event details in My Events Page</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Lanjutan Event Detail --}}
                            <div class="col ms-4">
                                <div class="container px-0 py-2">
                                    <h6 class="mb-1"><b>Time and Place</b></h6>
                                    <div class="row">
                                        <div class="col-1 text-end">
                                            <img src="https://img.freepik.com/free-icon/maps-flags_318-341720.jpg" alt="" width="13">
                                        </div>
                                        <div class="col">
                                            <p class="mt-1 mb-0" style="color: #6D6969; font-size: 13px;">{{ $event->event_place }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 text-end">
                                            <img src="https://cdn-icons-png.flaticon.com/512/55/55281.png" alt="" width="13">
                                        </div>
                                        <div class="col">
                                            <p class="mt-1 mb-0" style="color: #6D6969; font-size: 13px;">{{ $event->event_date }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 text-end">
                                            <img src="https://cdn-icons-png.flaticon.com/512/61/61227.png" alt="" width="13">
                                        </div>
                                        <div class="col">
                                            <p class="mt-1 mb-0" style="color: #6D6969; font-size: 13px;">{{ $event->event_time }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container px-0 py-2">
                                    <h6 class="mb-1"><b>Category</b></h6>
                                    <div class="row">
                                        <div class="col ms-4">
                                            <div class="text-wrap justify-content-center m-0" style="width:fit-content">
                                                <p class="px-2 mt-1 mb-0" style="background-color: rgb(211, 211, 211); font-size: 13px;">{{ $event->eventCategory->category_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container px-0 py-2">
                                    <h6 class="mb-1"><b>Description</b></h6>
                                    <div class="row">
                                        <div class="col ms-4 mt-1 mb-0">
                                            <p style="text-align:justify; font-size:13px;">
                                                {{ $event->event_desc }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container px-0 py-2">
                                    <h6 class="mb-1"><b>Benefit</b></h6>
                                    <div class="row">
                                        <div class="col ms-4 mt-1 mb-0">
                                            <p style="text-align:justify; font-size:13px;">
                                                {{ $event->event_benefit }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <!-- Footer -->
    <footer class="mt-4 text-center text-white sticky-bottom" style="background-color: #21081a;">
        <!-- Logo -->
        <div class="p-1 pt-3 m-0">
            <img src="https://raw.githubusercontent.com/ferren11/BiFestment-project/main/public/assets/BiFestment-Logo.png" width="200px" alt=""> 
        </div>

        <!-- Copyright -->
        <div class="text-center pb-3" style="background-color: rgba(0, 0, 0, 0.2);">Copyright 2023, All Rights Reserved</div>
    </footer>
</body>
</html>