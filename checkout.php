<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="./assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <header>
        <?php include './header/topbar.php'; ?>
        <?php include './header/mainbar.php'; ?>
        <?php include './header/navmenu.php'; ?>
        <?php include './header/announcement.php'; ?>
    </header>
    <main>
        <?php include './main/About/historybar.php'; ?>
        <?php include './main/checkout/checkout.php'; ?>
    </main>
    <footer class="footer light-background">
        <?php include './footer/footerTop.php' ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
/* ============================================
   STEP NAVIGATION
============================================ */
let currentStep = 1;

const updateStepUI = () => {
    document.querySelectorAll(".step-page").forEach(p => p.style.display = "none");
    document.getElementById("step-" + currentStep).style.display = "block";

    document.querySelectorAll(".step").forEach(s => {
        const step = parseInt(s.dataset.step);
        s.classList.remove("active", "done");

        if (step < currentStep) s.classList.add("done");
        if (step === currentStep) s.classList.add("active");
    });
};

document.querySelectorAll(".next-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        currentStep = parseInt(btn.dataset.next);
        updateStepUI();
    });
});

document.querySelectorAll(".back-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        currentStep = parseInt(btn.dataset.back);
        updateStepUI();
    });
});

updateStepUI(); // initial view



/* ============================================
   PAYMENT LOGIC — FINAL FIXED VERSION
============================================ */

const cardBox = document.querySelector(".payment-box");
const cardRadio = document.querySelector('.payment-box input[type="radio"]');
const cardForm = document.querySelector(".cc-form");
const options = document.querySelectorAll(".payment-option");


function showCard() {
    cardForm.style.display = "flex";   // แสดงฟอร์ม
    cardBox.classList.add("active");

    // ซ่อนข้อความของ PayPal/Apple
    document.querySelectorAll(".payment-info").forEach(p => p.classList.remove("active"));
    options.forEach(o => o.classList.remove("active"));
}

function hideCard() {
    cardForm.style.display = "none";   // ซ่อนฟอร์ม
    cardBox.classList.remove("active");
}

function showOption(option) {
    hideCard();

    // ซ่อนทั้งหมดก่อน
    document.querySelectorAll(".payment-info").forEach(p => p.classList.remove("active"));
    options.forEach(o => o.classList.remove("active"));

    // เปิดเฉพาะตัวที่คลิก
    option.classList.add("active");
    option.querySelector(".payment-info")?.classList.add("active");
}


/* =============================
   CLICK HANDLERS
============================= */

// กด Credit/Debit (ทั้งกล่อง)
cardBox.addEventListener("click", (e) => {
    // ไม่ override ถ้าพิมพ์ใน input text
    if (e.target.tagName === "INPUT" && e.target.type !== "radio") return;

    cardRadio.checked = true;
    showCard();
});

// กด PayPal / Apple Pay
options.forEach(option => {
    option.addEventListener("click", () => {
        option.querySelector('input[type="radio"]').checked = true;
        showOption(option);
    });
});

// กรณีกด radio โดยตรง
document.querySelectorAll('input[name="payment"]').forEach(radio => {
    radio.addEventListener("change", () => {

        if (radio === cardRadio) {
            showCard();
        } else {
            const opt = radio.closest(".payment-option");
            showOption(opt);
        }
    });
});


// โหลดครั้งแรก → ต้องเปิด Credit Card
window.addEventListener("DOMContentLoaded", () => {
    if (cardRadio.checked) {
        showCard();
    } else {
        hideCard();
    }
});


// EDIT BUTTONS → Jump back to specific step
document.querySelectorAll(".edit-link").forEach(link => {
    link.addEventListener("click", () => {
        const step = parseInt(link.dataset.edit);
        currentStep = step;
        updateStepUI();
    });
});

// Enable place order only when checkbox is checked
const termsCheck = document.getElementById("agree-terms");
const placeOrderBtn = document.querySelector(".place-order-btn");

termsCheck.addEventListener("change", () => {
    placeOrderBtn.disabled = !termsCheck.checked;
});

const paymentBoxes = document.querySelectorAll(".payment-box, .payment-option");

document.querySelectorAll('input[name="payment"]').forEach(radio => {
  radio.addEventListener("change", function () {

    // ล้าง active ทั้งหมด
    paymentBoxes.forEach(box => box.classList.remove("active"));

    // active เฉพาะอันที่ถูกเลือก
    const parent = this.closest(".payment-box") || this.closest(".payment-option");
    parent.classList.add("active");

    // ซ่อน/แสดงฟอร์ม Credit Card
    const ccForm = document.querySelector(".cc-form");
    if (this.value === "card") {
      ccForm.classList.add("active");
    } else {
      ccForm.classList.remove("active");
    }
  });
});

</script>


</body>
</html>