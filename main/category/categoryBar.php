<section class="category-header section">
    <div class="container">
        <div class="filter-container mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="filter-item search-form">
                        <label for="productSearch" class="form-label">Search Products</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="productSearch" placeholder="Search for products...">
                            <button class="btn search-btn" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                        <label for="priceRange" class="form-label">Price Range</label>
                        <select class="form-select" id="priceRange">
                            <option selected="">All Prices</option>
                            <option>Under $25</option>
                            <option>$25 to $50</option>
                            <option>$50 to $100</option>
                            <option>$100 to $200</option>
                            <option>$200 &amp; Above</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                        <label for="sortBy" class="form-label">Sort By</label>
                        <select class="form-select" id="sortBy">
                            <option selected="">Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Customer Rating</option>
                            <option>Newest Arrivals</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <div class="active-filters">
                      <span class="active-filter-label">Active Filters:</span>
                      <div class="filter-tags">
                        <span class="filter-tag">
                          Electronics <button class="filter-remove"><i class="bi bi-x"></i></button>
                        </span>
                        <span class="filter-tag">
                          $50 to $100 <button class="filter-remove"><i class="bi bi-x"></i></button>
                        </span>
                        <button class="clear-all-btn">Clear All</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>