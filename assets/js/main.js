/* ===================================================================
   MAIN.JS — รวมฟังก์ชันทั้งหมดจาก checkout / cart / productDetail
=================================================================== */


/* =====================================================
   0) Global — Scroll to Top
===================================================== */
function initScrollToTop() {
    const scrollBtn = document.getElementById("scrollTopBtn");
    if (!scrollBtn) return;

    window.addEventListener("scroll", () => {
        scrollBtn.classList.toggle("show", window.scrollY > 200);
    });

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}


/* =====================================================
   1) CHECKOUT — Step Navigation
===================================================== */
function initCheckoutSteps() {
    let currentStep = 1;
    const stepPages = document.querySelectorAll(".step-page");
    const steps = document.querySelectorAll(".step");

    if (!stepPages.length || !steps.length) return;

    function updateStepUI() {
        stepPages.forEach(p => p.style.display = "none");
        document.getElementById("step-" + currentStep).style.display = "block";

        steps.forEach(s => {
            const step = parseInt(s.dataset.step);
            s.classList.remove("active", "done");

            if (step < currentStep) s.classList.add("done");
            if (step === currentStep) s.classList.add("active");
        });
    }

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

    // EDIT link
    document.querySelectorAll(".edit-link").forEach(link => {
        link.addEventListener("click", () => {
            currentStep = parseInt(link.dataset.edit);
            updateStepUI();
        });
    });

    updateStepUI();
}


/* =====================================================
   2) CHECKOUT — Payment Logic
===================================================== */
function initCheckoutPayment() {
    const cardBox = document.querySelector(".payment-box");
    const cardRadio = document.querySelector('.payment-box input[type="radio"]');
    const cardForm = document.querySelector(".cc-form");
    const options = document.querySelectorAll(".payment-option");

    if (!cardBox || !cardRadio) return;

    function showCard() {
        cardForm.style.display = "flex";
        cardBox.classList.add("active");

        document.querySelectorAll(".payment-info").forEach(p => p.classList.remove("active"));
        options.forEach(o => o.classList.remove("active"));
    }

    function hideCard() {
        cardForm.style.display = "none";
        cardBox.classList.remove("active");
    }

    function showOption(option) {
        hideCard();
        document.querySelectorAll(".payment-info").forEach(p => p.classList.remove("active"));
        options.forEach(o => o.classList.remove("active"));

        option.classList.add("active");
        option.querySelector(".payment-info")?.classList.add("active");
    }

    // Click handlers
    cardBox.addEventListener("click", (e) => {
        if (e.target.tagName === "INPUT" && e.target.type !== "radio") return;
        cardRadio.checked = true;
        showCard();
    });

    options.forEach(option => {
        option.addEventListener("click", () => {
            option.querySelector('input[type="radio"]').checked = true;
            showOption(option);
        });
    });

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

    // Initial state
    if (cardRadio.checked) showCard();
    else hideCard();

    // Terms Checkbox
    const termsCheck = document.getElementById("agree-terms");
    const placeOrderBtn = document.querySelector(".place-order-btn");

    if (termsCheck && placeOrderBtn) {
        termsCheck.addEventListener("change", () => {
            placeOrderBtn.disabled = !termsCheck.checked;
        });
    }
}


/* =====================================================
   3) CART — Quantity System
===================================================== */
function initCartQuantity() {
    const quantityBoxes = document.querySelectorAll(".cart-qty");
    if (!quantityBoxes.length) return;

    quantityBoxes.forEach((box) => {
        const minus = box.querySelector(".quantity-minus");
        const plus = box.querySelector(".quantity-plus");
        const input = box.querySelector(".quantity-number");
        if (!minus || !plus || !input) return;

        // ลบ event listener เดิมก่อน (ถ้ามี)
        const minusClone = minus.cloneNode(true);
        const plusClone = plus.cloneNode(true);
        minus.replaceWith(minusClone);
        plus.replaceWith(plusClone);

        const newMinus = box.querySelector(".quantity-minus");
        const newPlus = box.querySelector(".quantity-plus");

        newMinus.addEventListener("click", () => {
            let value = parseInt(input.value) || 1;
            input.value = Math.max(1, value - 1);
        });

        newPlus.addEventListener("click", () => {
            let value = parseInt(input.value) || 1;
            input.value = Math.min(99, value + 1);
        });

        input.addEventListener("input", () => {
            input.value = input.value.replace(/[^0-9]/g, "");
        });

        function validate() {
            let value = parseInt(input.value);

            if (isNaN(value) || input.value.trim() === "") {
                input.value = 1;
                return;
            }

            input.value = Math.min(99, Math.max(1, value));
        }

        input.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                validate();
                input.blur();
            }
        });

        input.addEventListener("blur", validate);
    });
}


/* =====================================================
   4) PRODUCT DETAIL — Image Gallery
===================================================== */
function initImageGallery() {
    const thumbs = document.querySelectorAll(".thumb");
    const mainImage = document.getElementById("mainImage");
    const container = document.querySelector(".main-image-container");
    if (!thumbs.length || !mainImage) return;

    let currentIndex = 0;

    function resetZoom() {
        mainImage.style.transform = "scale(1)";
        mainImage.style.transformOrigin = "center center";
    }

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener("click", () => {
            currentIndex = index;
            mainImage.src = thumb.src;

            document.querySelector(".thumb.active")?.classList.remove("active");
            thumb.classList.add("active");

            resetZoom();
        });
    });

    document.querySelector(".arrow-left")?.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + thumbs.length) % thumbs.length;
        thumbs[currentIndex].click();
    });

    document.querySelector(".arrow-right")?.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % thumbs.length;
        thumbs[currentIndex].click();
    });

    if (container) {
        container.addEventListener("mousemove", (e) => {
            const rect = container.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;

            mainImage.style.transformOrigin = `${x}% ${y}%`;
            mainImage.style.transform = "scale(2.8)";
        });

        container.addEventListener("mouseleave", () => resetZoom());
    }
}


/* =====================================================
   5) PRODUCT DETAIL — Star Rating
===================================================== */
function initStarRating() {
    const stars = document.querySelectorAll("#star-rating i");
    if (!stars.length) return;

    let selected = 0;

    stars.forEach(star => {
        star.addEventListener("mouseover", () => {
            const value = star.dataset.value;
            stars.forEach(s => s.classList.toggle("hover", s.dataset.value <= value));
        });

        star.addEventListener("mouseleave", () => {
            stars.forEach(s => s.classList.remove("hover"));
        });

        star.addEventListener("click", () => {
            selected = star.dataset.value;
            stars.forEach(s => s.classList.toggle("active", s.dataset.value <= selected));
        });
    });
}


/* =====================================================
   6) PRODUCT DETAIL — Size Selector
===================================================== */
function initProductSize() {
    const options = document.querySelectorAll(".product-size-option");
    const sizeValue = document.querySelector(".size-article-value");

    if (!options.length) return;

    options.forEach(option => {
        option.addEventListener("click", () => {
            document.querySelector(".product-size-option-active")?.classList.remove("product-size-option-active");

            option.classList.add("product-size-option-active");
            if (sizeValue) sizeValue.textContent = option.textContent.trim();
        });
    });
}


/* =====================================================
   7) PRODUCT DETAIL — Color Selector
===================================================== */
function initColorSelector() {
    const colors = document.querySelectorAll(".color-collection > div");
    const colorLabel = document.querySelector(".color-article p");

    if (!colors.length) return;

    const colorMap = {
        "black-circle": "Black",
        "grey-circle": "Grey",
        "blue-circle": "Blue",
        "rose-gold-circle": "Rose Gold"
    };

    colors.forEach(color => {
        color.addEventListener("click", () => {
            document.querySelector(".color-collection > div.active")?.classList.remove("active");
            color.classList.add("active");

            const className = [...color.classList].find(c => colorMap[c]);
            if (className && colorLabel) colorLabel.textContent = colorMap[className];
        });
    });
}


/* =====================================================
   8) PRODUCT DETAIL — Quantity
===================================================== */
function initProductQuantity() {
    const quantityBox = document.querySelector(".quantity-box");
    if (!quantityBox) return;

    const minus = quantityBox.querySelector(".quantity-minus");
    const plus = quantityBox.querySelector(".quantity-plus");
    const input = quantityBox.querySelector(".quantity-number");

    if (!minus || !plus || !input) return;

    minus.addEventListener("click", () => {
        let value = parseInt(input.value) || 1;
        input.value = Math.max(1, value - 1);
    });

    plus.addEventListener("click", () => {
        let value = parseInt(input.value) || 1;
        input.value = Math.min(99, value + 1);
    });

    input.addEventListener("input", () => {
        input.value = input.value.replace(/[^0-9]/g, "");
    });

    function validate() {
        let value = parseInt(input.value);
        if (isNaN(value) || input.value.trim() === "") {
            input.value = 1;
            return;
        }
        input.value = Math.min(99, Math.max(1, value));
    }

    input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            validate();
            input.blur();
        }
    });

    input.addEventListener("blur", validate);
}


/* =====================================================
   9) PRODUCT DETAIL — Favourite
===================================================== */
function initFavourite() {
    const favBtn = document.querySelector(".btn-favourite");
    if (!favBtn) return;

    favBtn.addEventListener("click", () => {
        favBtn.classList.toggle("active");

        const icon = favBtn.querySelector("i");

        if (favBtn.classList.contains("active")) {
            icon.classList.remove("bi-heart");
            icon.classList.add("bi-heart-fill");
        } else {
            icon.classList.remove("bi-heart-fill");
            icon.classList.add("bi-heart");
        }
    });
}


/* =====================================================
   DOMContentLoaded — Initialize All
===================================================== */
document.addEventListener("DOMContentLoaded", function () {
    
    /* ===== Swiper Init ===== */
    const swiperEls = document.querySelectorAll(".swiper");
    
    if (swiperEls.length && typeof Swiper !== "undefined") {
        swiperEls.forEach(function (swiperEl) {
            const configEl = swiperEl.nextElementSibling?.matches(".swiper-config")
                ? swiperEl.nextElementSibling
                : null;

            let config = {};
            if (configEl) {
                try {
                    config = JSON.parse(configEl.textContent || "{}");
                } catch (e) {
                    console.error("Invalid Swiper config JSON", e);
                }
            }

            new Swiper(swiperEl, config);
        });
    }

    /* ===== Promo Card Animation ===== */
    const cards = document.querySelectorAll(".promo-card");

    if (cards.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add("show");
                    }, index * 200);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        cards.forEach(card => observer.observe(card));
    }

    /* ===== Initialize All Functions ===== */
    initScrollToTop();
    initCheckoutSteps();
    initCheckoutPayment();
    initCartQuantity();
    initImageGallery();
    initStarRating();
    initProductSize();
    initColorSelector();
    initProductQuantity();
    initFavourite();
});