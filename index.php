<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shasheera Bags</title>
	<link rel="stylesheet" href="./assets/css/test.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
	
	
	<div class="header">
	<div class="container">
		<div class="navbar">
		<div class="logo">
			<img src="./assets/images/logo.png" width="125px">
		</div>
		<nav>
			<ul>
				<li> <a href="">Home</a></li>
				<li> <a href="">Products</a></li>
				<li> <a href="">About</a></li>
				<li> <a href="">Contact</a></li>
				<li> <a href="">Account</a></li>
			</ul>
		
		</nav>
		<img src="./assets/images/cart.png" width="30px" height="30px">
		<img src="./assets/images/menu.png" class="menu-icon">
	</div>
	<div class="row">
		<div class="col-2">
			<h1> Welcome to Shasheera Bags</h1>
			<p> Shasheera creates an extensive range of beaded bags that hold your everyday essentials and are perfect for evenings. Shasheera ethos is to produce work that reflects her interest in international fashion trends and her love for all things Sri Lankan. For Shasheera, fashion extends beyond just art, it’s a vehicle for positivity and change. Her beaded bags engage and inspire the modern Sri Lankan woman.</p>
			<a href="" class="btn">Explore Now &#10132;</a>
		</div>
		<div class="col-2">
			<img src="./assets/images/mainImage.jpg">
		</div>
	</div>
		
		
	</div>
	</div>
	
	<!--------- latest products --------->
	
	
	<br>
	<br>
	<br><div class="small-container">
		<h2 class="title"> Our Products </h2>
		<div class="row">
			<div class="col-5">
				<img src="./assets/images/mainImage.jpg">
				<h4>White Pearls beaded Bag</h4>
				<p> Rs 9,550.00</p>
			</div>
			<div class="col-5">
				<img src="./assets/images/blackBag.jpg">
				<h4>Black pearl beaded bag</h4>
				<p> Rs 8,590.00</p>
			</div>
			<div class="col-5">
				<img src="./assets/images/redBag.jpg">
				<h4> Blue & White Crystal Beaded Bag</h4>
				<p> Rs 8,990.00</p>
			</div>
			<div class="col-5">
				<img src="./assets/images/blueBag.jpg">
				<h4>Red Crystal Beaded Bag</h4>
				<p> Rs 9,800.00</p>
			</div>
			<div class="col-5">
				<img src="./assets/images/whitebag.jpg">
				<h4>White Crystal Beaded Bag</h4>
				<p> Rs 9,400.00</p>
			</div>
		</div>
	
	</div>
	<!---------footer------>
 
	<div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="WhatsApp Image 2024-03-26 at 21.19.59_1610437b.jpg" >
                </div>
                
                <div class="footer-col-3">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright"> Copytight 2024-Shasheera Wicjaramaarachchci</p>
        </div>
    </div>
	<script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>
