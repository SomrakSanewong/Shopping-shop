<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="./assets/css/style.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </main>
    <script>
        // Product Detail Page JavaScript

        // Get all thumbnails and main image
        const thumbs = document.querySelectorAll(".thumb");
        const mainImage = document.getElementById("mainImage");
        let currentIndex = 0;

        // Thumbnail click handler
        thumbs.forEach((thumb, index) => {
            thumb.addEventListener("click", () => {
                mainImage.src = thumb.src;
                currentIndex = index;
                
                // Update active state
                document.querySelector(".thumb.active")?.classList.remove("active");
                thumb.classList.add("active");
            });
        });

        // Arrow navigation
        document.querySelector(".arrow-left")?.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + thumbs.length) % thumbs.length;
            thumbs[currentIndex].click();
        });

        document.querySelector(".arrow-right")?.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % thumbs.length;
            thumbs[currentIndex].click();
        });

        // Zoom on mouse move
        const container = document.querySelector(".main-image-container");

        if (container) {
            container.addEventListener("mousemove", (e) => {
                const rect = container.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                
                mainImage.style.transformOrigin = `${x}% ${y}%`;
            });

            container.addEventListener("mouseleave", () => {
                mainImage.style.transform = "scale(1)";
            });
        }

        // Color selection
        const colorCircles = document.querySelectorAll(".color-collection > div");
        const colorText = document.querySelector(".color-article p");

        colorCircles.forEach((circle, index) => {
            circle.addEventListener("click", () => {
                // Remove active state from all
                colorCircles.forEach(c => {
                    c.classList.remove("active");
                });
                
                // Add active state to clicked
                circle.classList.add("active");
                
                // Update color text
                const colors = ["Black", "Grey", "Blue", "Rose Gold"];
                if (colorText) {
                    colorText.textContent = colors[index];
                }
            });
        });

        // Size selection
        const sizeOptions = document.querySelectorAll(".product-size-option");
        const sizeValue = document.querySelector(".size-article-value");

        sizeOptions.forEach(option => {
            option.addEventListener("click", () => {
                // Remove active state from all
                sizeOptions.forEach(opt => opt.classList.remove("product-size-option-active"));
                
                // Add active state to clicked
                option.classList.add("product-size-option-active");
                
                // Update size text
                if (sizeValue) {
                    sizeValue.textContent = option.textContent;
                }
            });
        });

        // Quantity controls
        const quantityMinus = document.querySelector(".quantity-minus");
        const quantityPlus = document.querySelector(".quantity-plus");
        const quantityNumber = document.querySelector(".quantity-number");

        let quantity = 1;

        if (quantityMinus && quantityPlus && quantityNumber) {
            quantityMinus.addEventListener("click", () => {
                if (quantity > 1) {
                    quantity--;
                    quantityNumber.textContent = quantity;
                }
            });

            quantityPlus.addEventListener("click", () => {
                if (quantity < 24) { // Max stock
                    quantity++;
                    quantityNumber.textContent = quantity;
                }
            });
        }

        // Add to Cart Button
        const btnAddCart = document.querySelector(".btn-add-cart");
        if (btnAddCart) {
            btnAddCart.addEventListener("click", () => {
                // Add your cart logic here
                alert(`Added ${quantity} item(s) to cart`);
            });
        }

        // Buy Now Button
        const btnBuyNow = document.querySelector(".btn-buy-now");
        if (btnBuyNow) {
            btnBuyNow.addEventListener("click", () => {
                // Add your buy now logic here
                alert(`Proceeding to checkout with ${quantity} item(s)`);
            });
        }

        // Favourite Button
        const btnFavourite = document.querySelector(".btn-favourite");
        if (btnFavourite) {
            btnFavourite.addEventListener("click", () => {
                btnFavourite.classList.toggle("active");
                
                const icon = btnFavourite.querySelector("i");
                if (btnFavourite.classList.contains("active")) {
                    icon.classList.remove("bi-heart");
                    icon.classList.add("bi-heart-fill");
                } else {
                    icon.classList.remove("bi-heart-fill");
                    icon.classList.add("bi-heart");
                }
            });
        }

        // Scroll to Top Button
        // Check if button already exists
        let scrollBtn = document.querySelector(".scroll-to-top");

        // Create button if it doesn't exist
        if (!scrollBtn) {
            scrollBtn = document.createElement("button");
            scrollBtn.className = "scroll-to-top";
            scrollBtn.innerHTML = "↑";
            scrollBtn.setAttribute("aria-label", "Scroll to top");
            document.body.appendChild(scrollBtn);
        }

        // Show/hide button based on scroll position
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add("show");
            } else {
                scrollBtn.classList.remove("show");
            }
        });

        // Scroll to top when button is clicked
        scrollBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
</body>
</html>