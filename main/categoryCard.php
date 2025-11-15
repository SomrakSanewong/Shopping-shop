<section class="category-card-section">
  <div class="container">
    <!-- Tabs -->
    <div class="category-tabs">
      <ul class="nav justify-content-center" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#men">SHOP MEN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#women">SHOP WOMEN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#accessories">SHOP ACCESSORIES</a>
        </li>
      </ul>
    </div>

    <div class="tab-content mt-4">
      <!-- MEN -->
      <div class="tab-pane fade show active" id="men">
        <div class="row g-4">
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="../assets/imang/test.jpg" alt="Leather">
              <div class="btn-category">LEATHER →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="../assets/imang/test.jpg" alt="Denim">
              <div class="btn-category">DENIM →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="../assets/imang/test.jpg" alt="Swimwear">
              <div class="btn-category">SWIMWEAR →</div>
            </div>
          </div>
        </div>
      </div>

      <!-- WOMEN -->
      <div class="tab-pane fade" id="women">
        <div class="row g-4">
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="women1.jpg" alt="Dresses">
              <div class="btn-category">DRESSES →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="women2.jpg" alt="Tops">
              <div class="btn-category">TOPS →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="women3.jpg" alt="Accessories">
              <div class="btn-category">ACCESSORIES →</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ACCESSORIES -->
      <div class="tab-pane fade" id="accessories">
        <div class="row g-4">
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="acc1.jpg" alt="Bags">
              <div class="btn-category">BAGS →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="acc2.jpg" alt="Hats">
              <div class="btn-category">HATS →</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="product-card">
              <img src="acc3.jpg" alt="Belts">
              <div class="btn-category">BELTS →</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".category-card-section .product-card");
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add("show");
          }, index * 200);
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.2
    });
    cards.forEach(card => observer.observe(card));
  });
</script>