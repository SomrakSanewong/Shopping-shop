<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
        <?php include './main/cart/cart.php'; ?>
    </main>
    <footer class="footer light-background">
        <?php include './footer/footerTop.php' ?>
    </footer>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function initQuantity() {
            const quantityBoxes = document.querySelectorAll(".cart-qty");

            quantityBoxes.forEach((box) => {
                const minus = box.querySelector(".quantity-minus");
                const plus = box.querySelector(".quantity-plus");
                const input = box.querySelector(".quantity-number");

                if (!minus || !plus || !input) return;
                minus.addEventListener("click", () => {
                    let value = parseInt(input.value) || 1;
                    value = Math.max(1, value - 1);
                    input.value = value;
                });
                plus.addEventListener("click", () => {
                    let value = parseInt(input.value) || 1;
                    value = Math.min(99, value + 1);
                    input.value = value;
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

                    if (value < 1) input.value = 1;
                    else if (value > 99) input.value = 99;
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

        document.addEventListener("DOMContentLoaded", () => {
            initQuantity();
        });
    </script>

</body>

</html>