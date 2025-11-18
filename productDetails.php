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
        <?php include './main/ProductDetails/productionDetail.php'; ?>
        <?php include './main/ProductDetails/ProductionDescription.php'; ?>
    </main>
    <footer class="footer light-background">
        <?php include './footer/footerTop.php' ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function initImageGallery() {
            const thumbs = document.querySelectorAll(".thumb");
            const mainImage = document.getElementById("mainImage");
            const container = document.querySelector(".main-image-container");
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

        function initStarRating() {
            const stars = document.querySelectorAll("#star-rating i");
            let selected = 0;

            stars.forEach(star => {
                star.addEventListener("mouseover", () => {
                    const value = star.dataset.value;
                    stars.forEach(s => {
                        s.classList.toggle("hover", s.dataset.value <= value);
                    });
                });

                star.addEventListener("mouseleave", () => {
                    stars.forEach(s => s.classList.remove("hover"));
                });

                star.addEventListener("click", () => {
                    selected = star.dataset.value;
                    stars.forEach(s => {
                        s.classList.toggle("active", s.dataset.value <= selected);
                    });
                });
            });
        }

        function initProductSize() {
            const options = document.querySelectorAll(".product-size-option");
            const sizeValue = document.querySelector(".size-article-value");

            options.forEach(option => {
                option.addEventListener("click", () => {
                    document.querySelector(".product-size-option-active")
                        ?.classList.remove("product-size-option-active");

                    option.classList.add("product-size-option-active");

                    if (sizeValue) {
                        sizeValue.textContent = option.textContent.trim();
                    }
                });
            });
        }

        function initColorSelector() {
            const colors = document.querySelectorAll(".color-collection > div");
            const colorLabel = document.querySelector(".color-article p");

            const colorMap = {
                "black-circle": "Black",
                "grey-circle": "Grey",
                "blue-circle": "Blue",
                "rose-gold-circle": "Rose Gold"
            };

            colors.forEach(color => {
                color.addEventListener("click", () => {
                    document.querySelector(".color-collection > div.active")
                        ?.classList.remove("active");

                    color.classList.add("active");

                    const className = [...color.classList].find(c => colorMap[c]);

                    if (className && colorLabel) {
                        colorLabel.textContent = colorMap[className];
                    }
                });
            });
        }

        function initQuantity() {
            const minus = document.querySelector(".quantity-minus");
            const plus = document.querySelector(".quantity-plus");
            const input = document.querySelector(".quantity-number");

            if (!minus || !plus || !input) return;

            // ปุ่มลบ (ล็อก 1)
            minus.addEventListener("click", () => {
                let value = parseInt(input.value) || 1;
                value = Math.max(1, value - 1);
                input.value = value;
            });

            // ปุ่มเพิ่ม (ล็อก 99)
            plus.addEventListener("click", () => {
                let value = parseInt(input.value) || 1;
                value = Math.min(99, value + 1);
                input.value = value;
            });

            // อนุญาตให้พิมพ์อิสระ แต่ห้ามตัวอักษร
            input.addEventListener("input", () => {
                input.value = input.value.replace(/[^0-9]/g, "");
            });

            // ตรวจสอบเมื่อพิมพ์เสร็จ
            function validate() {
                let value = parseInt(input.value);

                if (isNaN(value) || input.value.trim() === "") {
                    input.value = 1;
                    return;
                }

                if (value < 1) input.value = 1;
                else if (value > 99) input.value = 99;
            }

            // Enter = validate
            input.addEventListener("keydown", (e) => {
                if (e.key === "Enter") {
                    validate();
                    input.blur();   // ออกจากช่อง เพื่อความเนียน
                }
            });

            // blur = validate
            input.addEventListener("blur", validate);
        }

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

        document.addEventListener("DOMContentLoaded", () => {
            initImageGallery();
            initStarRating();
            initProductSize();
            initColorSelector();
            initQuantity();
            initFavourite();
        });
    </script>

</body>
</html>