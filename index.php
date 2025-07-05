<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyDuka</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar">
    <!-- Sidebar Navigation -->
    <label class="popup">
      <input type="checkbox"/>
      <div class="burger" tabindex="0">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="popup-window">
        <legend>Navigation</legend>
        <ul>
          <li><button className='dropdown'><span className='fig'>Home</span></button></li>
          <li><button class="dropdown" id="cat" value="Clothing"><span className='fig'>Clothing</span></button></li>
          <li><button id="cat2" value="electronics"><span className='fig'>Electronics</span></button></li>
          <hr/>
          <li>
            <legend>Your Collection</legend>
            <button>
              <span className='fig' onclick="window.location.assign('./cart.php')">Your Cart</span>
            </button>
          </li>
        </ul>
      </nav>
    </label>

    <div class="logo">MyDuka</div>

    <div class="location">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
      </svg>
      <div class="location-text">
        <div class="line1">Deliver to</div>
        <div class="line2"><strong>Kenya</strong></div>
      </div>
    </div>

    <div class="search-container">
      <select>
        <option>All</option>
      </select>
      <input type="text" placeholder="Search MyDuka" id="Search-bar" />
      <button class="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
      </button>
    </div>

    <!-- ✅ User session section -->
    <div class="user-session" style="margin-left: auto; padding: 10px; color: white;">
      <?php if (isset($_SESSION['user'])): ?>
        Logged in as <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong>
        | <a href="logout.php" style="color: orange;">Logout</a>
      <?php else: ?>
        <a href="login.php" style="color: orange;">Login</a> |
        <a href="register.php" style="color: orange;">Register</a>
      <?php endif; ?>
    </div>

  </nav>

  <div id="overlay"></div>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/laptops.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/clothes.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/phone.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <div class="showcasecontainer"></div>
  <script src="./scripts/index.js"></script>
</body>
</html>
