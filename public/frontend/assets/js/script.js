// StartToggle the Sidebar
function toggleMenu() {
    var sidebar = document.getElementById("mySidebar");
    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
    } else {
        sidebar.style.width = "250px";
    }
}
// EndToggle the Sidebar

// Start Home-swiper
document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1, // عرض شريحة واحدة على الهواتف (mobile)
        spaceBetween: 30, // المسافة بين الشرائح
        loop: true, // تكرار الشرائح
        pagination: {
            // el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            576: {
                slidesPerView: 2, // عرض 2 شريحة على الأجهزة اللوحية (tablet screen)
                spaceBetween: 30, // المسافة بين الشرائح على الأجهزة اللوحية
            },
            992: {
                slidesPerView: 3, // عرض 3 شرائح كحد أقصى على الشاشات الكبيرة
                spaceBetween: 30, // المسافة بين الشرائح على الشاشات الكبيرة
            },
        },
    });
});
// End Home-swiper

// Start Timer
function startTimer(duration, display) {
    var timer = duration,
        days,
        hours,
        minutes,
        seconds;

    setInterval(function () {
        // حساب الوقت المتبقي
        var currentTime = new Date().getTime();
        var startTime = localStorage.getItem("startTime");
        if (!startTime) {
            localStorage.setItem("startTime", currentTime);
            startTime = currentTime;
        }
        var elapsedTime = currentTime - startTime;
        var remainingTime = duration - (elapsedTime / 1000);

        // تحويل الزمن المتبقي إلى أيام، ساعات، دقائق، ثواني
        days = parseInt(remainingTime / (60 * 60 * 24), 10);
        hours = parseInt((remainingTime % (60 * 60 * 24)) / (60 * 60), 10);
        minutes = parseInt((remainingTime % (60 * 60)) / 60, 10);
        seconds = parseInt(remainingTime % 60, 10);

        days = days < 10 ? "0" + days : days;
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        // عرض الوقت المتبقي
        display.days.textContent = days;
        display.hours.textContent = hours;
        display.minutes.textContent = minutes;
        display.seconds.textContent = seconds;

        // إعادة العد بعد 3 أيام
        if (elapsedTime >= duration * 1000) {
            localStorage.removeItem("startTime");
        }
    }, 1000);
}

window.onload = function () {
    var countdownTime = 60 * 60 * 24 * 3; // 3 أيام
    var display = {
        days: document.getElementById("days"),
        hours: document.getElementById("hours"),
        minutes: document.getElementById("minutes"),
        seconds: document.getElementById("seconds"),
    };
    startTimer(countdownTime, display);
};

// End Timer
