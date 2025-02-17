(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();



    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent page reload

        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let contact = document.getElementById("contact").value;
        let message = document.getElementById("message").value;

        debugger;
        Email.send({
            SecureToken: "85ad1da2-9dbb-48c7-8978-71acf59bfe74", // Get this from https://smtpjs.com/
            To: "faiq3265@gmail.com",  // Static recipient email
            From: "faiq3265@gmail.com",  // Your verified sender email
            Subject: `Contact Form Submission from ${name}`,
            Body: `Name: ${name}<br>Email: ${email}<br>Contact: ${contact}<br>Message: ${message}`
        }).then(response => {
            debugger;
            if (response === "OK") {
                document.getElementById("responseMessage").innerText = "Email sent successfully!";
                document.getElementById("contactForm").reset();
            } else {
                document.getElementById("responseMessage").innerText = "Error sending email. Try again.";
            }
        });
    });

    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: false,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });

})(jQuery);

