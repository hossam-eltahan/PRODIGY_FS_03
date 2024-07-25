<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script>
    // StartToggle the Sidebar
    function toggleMenu() {
        var sidebar = document.getElementById("mySidebar");
        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
        } else {
            sidebar.style.width = "250px";
        }
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    }

    // EndToggle the Sidebar
    // clients rates
    // Start testimonial-swiper
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".testimonial-swiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                // el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            direction: "horizontal",
            grabCursor: true,
            allowTouchMove: false,
            autoplay: {
                delay: 2000,
            },
        });
    });
</script>
@yield('js')
