let myCarousel = document.getElementById('myCarousel');
let carousel = new bootstrap.Carousel(myCarousel, {
    interval: 2000, // Set the desired interval for automatic sliding (in milliseconds)
    pause: 'hover' // Pause on mouse hover
});
