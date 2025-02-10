document.querySelector(".reservation-form form").addEventListener("submit", function (event) {
    var fullName = document.getElementById("full_name").value;
    var email = document.getElementById("email").value;
    var ticketsNumber = document.getElementById("tickets_number").value;

    if (!fullName || !email || !ticketsNumber) {
        alert("من فضلك تأكد من ملء جميع الحقول المطلوبة.");
        event.preventDefault();
    }
});


document.querySelectorAll(".content a").forEach(function (link) {
    link.addEventListener("click", function (event) {
        event.preventDefault();
        document.getElementById("reservationForm").scrollIntoView({ behavior: "smooth" });
    });
});

document.getElementById('email').addEventListener('input', function (event) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(event.target.value)) {
        event.target.style.borderColor = 'red';
        event.target.setCustomValidity("البريد الإلكتروني غير صحيح");
    } else {
        event.target.style.borderColor = 'green';
        event.target.setCustomValidity("");
    }
});

