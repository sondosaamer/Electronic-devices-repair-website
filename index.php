<?php
$title = "Home";
require("Nav.php");

?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<main class="d-flex container-fluid position-relative" 
      style="background: url('support.webp') no-repeat center center / cover; height: 100vh;">

  <!-- Overlay -->
  <div class="overlay position-absolute top-0 start-0 w-100 h-100"
       style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));">
  </div>

  <!-- Content -->
  <div class="container d-flex position-relative z-1">
    <div class="align-self-center ms-2 text-white"
         style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">

      <h2>All technichants with you</h2>

      <p class="ms-4 w-50">
        With a team full of trained technichants and great employess just to help you
        and to provide the best service ever.
      </p>

      <a href="Support.php" class="btn btn-success text-center align-self-center">Start Now</a>
    </div>
  </div>
</main>


<!-- four cards showing the features -->
<div class=" container d-flex justify-content-center mt-3">
    <div class="card text-ite bg m-2 border-success" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title ">
            <ion-icon name="lock-closed"></ion-icon>
            Security
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">All of your data is safe</h6>
            <p class="card-text">We provide a safe environment for your data and information to allow you to rest while we fix.</p>
            <div>
                <a href="#security"class='text-success'>See more</a>
            </div>
        </div>
    </div>
    <div class="card text-ite bg m-2 border-success" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title">
            <ion-icon name="call"></ion-icon>
            Contact
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">Always at your service</h6>
            <p class="card-text">WHenever you need we'll always be there for you to help with any technical issue.</p>
            <div>
                <a href="#contact" class='text-success'>See more</a>
            </div>
        </div>
    </div>
    <div class="card text-ite bg m-2 border-success" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title">
            <ion-icon name="hammer"></ion-icon>
            Maintainance
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">More issues? We're always here</h6>
            <p class="card-text">If you find more issues in your device after the end of service you can always come back to us.</p>
            <div>
                <a href="#maintainance" class='text-success'>See more</a>
            </div>
        </div>
    </div>
    <div class="card text-ite bg m-2 border-success" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title">
            <ion-icon name="brush"></ion-icon>
            Creativity
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">New options are our thing</h6>
            <p class="card-text">Our service doesn't stop there we always look for creative and up-to-date solution to help more.</p>
            <div>
                <a href="#creativity" class='text-success'>See more</a>
            </div>
        </div>
    </div>
</div>

<div class="container border-top mt-2   " id="features">
    <div class="row d-flex  mt-5 " id="security" >
        <div class="text-center col-3">
            <h1><ion-icon name="lock-closed" class="text-success"></ion-icon></h1>
            <h4 class="" >Security</h4>
        </div>
        <div class="col-8 text-muted">
            <p>Your data is safe with us. We prioritize creating a secure environment for all your information, ensuring that it remains protected at all times. With our dedicated security measures, you can rest easy knowing that we are actively working to safeguard your data. Our team implements the latest technologies and protocols to prevent unauthorized access and data breaches. Trust us to manage your information securely while you focus on what matters most. Your peace of mind is our commitment.</p>
        </div>
    </div>
</div>

<div class="container border-top mt-2   " >
    <div class="row d-flex  mt-5 " id="contact" >
        <div class="col-8 text-muted">
            <p>Always at your service! Whenever you need assistance, we're here to help with any technical issues you may encounter. Our dedicated support team is available to provide prompt and effective solutions to ensure a smooth experience. Whether you have questions, need troubleshooting, or require guidance, simply reach out to us. Your satisfaction is our priority, and we are committed to being there for you whenever you need us. Don't hesitate to contact us—we're just a message away!</p>
        </div>
        <div class="text-center col-3 ">
            <h1><ion-icon name="call" class="text-success"></ion-icon></h1>
            <h4>Contact</h4>
        </div>
    </div>
</div>

<div class="container border-top mt-2   " >
    <div class="row d-flex  mt-5 " id="maintainance" >
        <div class="text-center col-3 ">
            <h1><ion-icon name="hammer" class="text-success"></ion-icon></h1>
            <h4>Maintainance</h4>
        </div>
        <div class="col-8 text-muted">
            <p>More issues? We're always here to help! If you encounter any additional problems with your device after our service, don't hesitate to reach out. Our commitment to your satisfaction doesn't end with the initial repair. We're dedicated to providing ongoing support and solutions to ensure your device runs smoothly. Whether it's a minor glitch or a more significant concern, you can count on us to assist you. Your peace of mind is our mission, and we're just a call away for any maintenance needs!</p>
        </div>
    </div>
</div>

<div class="container border-top mt-2   " >
    <div class="row d-flex  mt-5 " id="creativity" >
        <div class="col-8 text-muted">
            <p>New options are our thing! Our service goes beyond the basics; we continuously seek innovative and up-to-date solutions to better serve you. We believe in thinking outside the box and embracing creativity to address your unique challenges. Whether it’s enhancing existing services or introducing fresh ideas, our goal is to provide you with the best possible outcomes. With us, you’ll always find a partner eager to explore new possibilities and elevate your experience. Let's innovate together!</p>
        </div>
        <div class="text-center col-3 ">
            <h1><ion-icon name="brush" class="text-success"></ion-icon></h1>
            <h4>Creativity</h4>
        </div>
    </div>
</div>

<?php

require("Footer.php");