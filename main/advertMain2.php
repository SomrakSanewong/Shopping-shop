<section class="promo-section">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="promo-card card-1">
                    <div class="promo-content">
                        <p class="smal-text">สินค้าใหม่</p>
                        <h3 class="promo-title">เสื้อกีฬาแฟชั่น</h3>
                        <p class="promo-description">ใส่สบาย ระบายอากาศดี เหมาะสำหรับออกกำลังกายและใส่ลำลองทุกวัน</p>
                        <a href="#" class="btn-shop">ช้อปเลย</a>
                    </div>
                    <div class="promo-image">
                        <img src="../assets/imang/test.jpg" alt="เสื้อกีฬา">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="promo-card card-2">
                    <div class="promo-content">
                        <p class="smal-text">แนะนำ</p>
                        <h3 class="promo-title">กางเกงวิ่ง</h3>
                        <p class="promo-description">น้ำหนักเบา ยืดหยุ่นสูง ช่วยให้วิ่งได้อย่างคล่องตัวทุกท่วงท่า</p>
                        <a href="#" class="btn-shop">ช้อปเลย</a>
                    </div>
                    <img src="../assets/imang/test.jpg" alt="กางเกงวิ่ง" class="promo-image">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="promo-card card-3">
                    <div class="promo-content">
                        <p class="smal-text">โปรโมชั่นพิเศษ</p>
                        <h3 class="promo-title">รองเท้ากีฬา</h3>
                        <p class="promo-description">รองรับแรงกระแทก น้ำหนักเบา ดีไซน์ทันสมัย พร้อมลุยทุกสนาม</p>
                        <a href="#" class="btn-shop">ช้อปเลย</a>
                    </div>
                    <img src="woman.png" alt="รองเท้ากีฬา" class="promo-image">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="promo-card card-4">
                    <div class="promo-content">
                        <p class="smal-text">ขายดี</p>
                        <h3 class="promo-title">อุปกรณ์ฟิตเนส</h3>
                        <p class="promo-description">ครบครันทั้งถุงมือ เทปพันข้อมือ และอุปกรณ์เสริมเพื่อการออกกำลังที่มั่นใจ</p>
                        <a href="#" class="btn-shop">ช้อปเลย</a>
                    </div>
                    <img src="man.png" alt="อุปกรณ์ฟิตเนส" class="promo-image">
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".promo-card");

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