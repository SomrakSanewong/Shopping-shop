<div class="main-header">
    <div class="container-fluid container-xl">
        <div class="d-flex align-items-center justify-content-between py-3">

            <a href="index.php" class="logo fw-bold fs-3 text-decoration-none">
                <h1>FashionStore</h1>
            </a>

            <form class="d-none d-lg-block" style="min-width: 440px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหาสินค้า">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <div class="d-flex align-items-center">
                <button class="btn d-lg-none me-2">
                    <i class="bi bi-search "></i>
                </button>
                <button class="btn me-2">
                    <i class="bi bi-person"></i>
                    <span class="action-text">Account</span>
                </button>
                <button class="btn me-2">
                    <i class="bi bi-heart none"></i>
                    <span class="action-text">Wishlist</span>
                </button>
                <button class="btn">
                    <i class="bi bi-cart3"></i>
                    <span class="action-text">Cart</span>
                </button>
                <button class="btn d-lg-none" onclick="document.querySelector('.navmenu ul').classList.toggle('active')">
                    <i class="bi bi-list" style="font-size: 28px;"></i>
                </button>

            </div>
        </div>
    </div>
</div>