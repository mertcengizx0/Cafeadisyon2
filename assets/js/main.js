(function ($) {
    $(document).ready(function () {
        "use strict";

        // sticky header
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('.header-section').addClass('sticky');
            } else {
                $('.header-section').removeClass('sticky');
            }
        });


        // init Isotope
        var $grid = $('.product-menu-isotop').isotope({
            // options
        });

        $grid.isotope({
            filter: '.salads'
        });

        // filter items on button click
        $('.isotop_button_wrapper').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        $('.isotop_button_wrapper').on('click', 'button', function () {
            $(this).addClass('active').siblings().removeClass('active');
        });

        // In your Javascript (external .js resource or <script> tag)
        $('.select2').select2();
        $('#select-person').select2();
        $('#select-category').select2();


        // Initiate datetime picker for pickup date
        $('.booking-form-pickup-date').daterangepicker({
            startDate: moment(),
            minDate: moment(),
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        // Initiate datetime picker for pickup date
        $('.booking-form-pickup-time').daterangepicker({
            timePicker: true,
            singleDatePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            timePickerSeconds: true,
            locale: {
                format: 'HH:mm:ss'
            }
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });

        //testimonial carousel slider
        $('.testimonial-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

        //Menu carousel slider
        $('.menu-slide').owlCarousel({
            margin: 20,
            loop: true,
            nav: true,
            navText: ["<img src='assets/images/arrow-left.svg' alt=''>", "<img src='assets/images/arrow-rights.svg' alt=''>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

        //Product carousel slider
        $('.product-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

        //LEAFLET JS MAPS
        if ($("#map").length) {
            function myMaps() {
                var location = [30.647500, -89.626670];
                var mapInit = L.map('map', {
                    zoomControl: false
                }).setView(location, 8);
                var markerIcon = L.icon({
                    iconUrl: "assets/images/location.svg",
                    iconSize: [50, 50],
                });
                var marker = L.marker(location, {
                    icon: markerIcon
                }).addTo(mapInit);
                marker.bindPopup("<h3>Adrress:</h3> <p>85 Bay Meadows Drive Woodstock, GA 30188, US </p><h3>Phone:</h3>+37462 7864 3728  ||  +7347 3827 37421");

                L.tileLayer('https://api.mapbox.com/styles/v1/noruzzamanrubel/ckk2a0cal38yc17js3xmhi66z/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1Ijoibm9ydXp6YW1hbnJ1YmVsIiwiYSI6ImNrdHR6YWZobjBkNTYyb21yMzhodXZyYnQifQ.JwGGCyyu_eq03wbG61-yvg', {
                    attribution: 'Food Ex &copy; <a href="https://www.openstreetmap.org/copyright"></a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mapInit);
            }
            myMaps();
        }
        //counter up
        $('.counter').countUp();


        //input Number increase decrease
        $('.btn__minus').click(function () {
            var input = $(this).closest('.input_number').find('.input_value');
            var currentVal = parseInt(input.val());

            if (currentVal > 0) {
                input.val(--currentVal);
            }
        });

        $('.btn__plus').click(function () {
            var input = $(this).closest('.input_number').find('.input_value');
            var currentVal = parseInt(input.val());
            input.val(++currentVal);
        });

        //ScrollUp
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fas fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });


    })
})(jQuery);