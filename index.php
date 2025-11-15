<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>

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
    <?php include './main/advertMain.php' ?>
    <?php include './main/advertMain2.php' ?>
    <?php include './main/categoryCard.php' ?>
    <?php include './main/BestSellers.php' ?>
    <?php include './main/categoryList.php' ?>
  </main>

  <footer class="footer light-background">
    <?php include './footer/footerTop.php' ?>
  </footer>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>