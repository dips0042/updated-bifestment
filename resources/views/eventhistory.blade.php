<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event History</title>
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <!-- Header -->
    <nav class="navbar sticky-top container-fluid navbar-expand-lg navbar-light bg-light p-3">
        <div class="container-fluid">
            <div class="navbar-collapse container-fluid d-flex justify-content-between m-0" id="navbar">
                <div class="navbar-brand ms-2" href="#">
                    <img src="https://raw.githubusercontent.com/ferren11/BiFestment-project/main/public/assets/BiFestment-Logo.png" width="200px" alt=""> 
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
                        <li><a class="navmenu" href="\history">My Events</a></li>
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
        <h3>Registered Events</h3>
        <hr>
        <div class="col">
            <div class="row">
                <div class="" style="width:65%">
                    @foreach ($histories as $history)
                        <div class="mb-4 shadow-sm rounded">
                            <div class="mx-3 mb-0 mt-1">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ $history->event->event_image }}" alt="" width="175"> 
                                    </div>
                                    <div class="col">
                                        <p style="color: #6D6969; font-size: 13px;"><i>{{ $history->event->event_organizer }}</i></p>
                                        <h5 class="mb-1"><b>{{ $history->event->event_name }}</b></h5>
                                        <div class="container px-0 py-2">
                                            <div class="row">
                                                <div class="col-1">
                                                    <img src="https://img.freepik.com/free-icon/maps-flags_318-341720.jpg" alt="" width="20">
                                                </div>
                                                <div class="col">
                                                    <p class="m-0" style="font-size: medium;">{{ $history->event->event_place }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container px-0 py-2">
                                            <div class="row">
                                                <div class="col-1">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/55/55281.png" alt="" width="20">
                                                </div>
                                                <div class="col">
                                                    <p class="m-0" style="font-size: medium;">{{ $history->event->event_date }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container px-0 py-2">
                                            <div class="row">
                                                <div class="col-1">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/61/61227.png" alt="" width="20">
                                                </div>
                                                <div class="col">
                                                    <p class="m-0" style="font-size: medium;">{{ $history->event->event_time }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col">
                    <div class="mb-4 shadow-sm rounded" style="width:90%">
                        <h5 class="mb-1 mx-3" style="color:#125582;">Summary</h5>
                        <div class="container px-0 py-2">
                            <div class="row">
                                <div class="col-8 mx-3">
                                    <p class="m-0">Event Registered This Month</p>
                                </div>
                                <div class="col text-end mx-3">
                                    <p class="m-0 justify-content-end">{{ $thisMonthRegistration }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="container px-0 py-2">
                            <div class="row ">
                                <div class="col-8 mx-3">
                                    <p class="m-0">Event Held in This Month</p>
                                </div>
                                <div class="col text-end mx-3">
                                    <p class="m-0 justify-content-end">{{ $thisMonthEvent }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="container px-0 py-2">
                            <div class="row">
                                <div class="col-8 mx-3">
                                    <p class="m-0">Total Registered Events</p>
                                </div>
                                <div class="col text-end mx-3">
                                    <p class="m-0 justify-content-end">{{ $totalevent }}</p>
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