<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content= 
          "width=device-width, initial-scale=1.0"> 
    <title>Stylish Footer</title> 
    
    <!-- Bootstrap CSS -->
    <link href= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet"> 
    
    <!-- Font Awesome -->
    <link href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
          rel="stylesheet"> 
    
    <!-- Bootstrap Bundle with Popper -->
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"> 
    </script> 
    
    <!-- Custom CSS -->
    <style> 
        body { 
            color: black; 
        } 
  
        .footer { 
            background-color: #fff; 
        } 
  
        .footer-content h2 { 
            color: black; 
        } 
  
        .footer-content h5, 
        .footer-content p, 
        .footer-links a { 
            color: #0B79A5; 
        } 
  
        .footer-links a:hover { 
            text-decoration: underline; 
        } 
  
        .footer hr { 
            background-color: black; 
        } 
        li a {
            text-decoration: none; /* Remove underline */
            color: black;
        }
    </style> 
</head> 
  
<body> 
    <footer class="footer p-5 mb-0 bg-light"> 
        <div class="container"> 
            <div class="row"> 
                 
                <div class="col-md-2"> 
                    <h4 style="color: #073A57;">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                    
                </div> 
                <div class="col-md-4 ml-0"> 
                    <h4 style="color: #073A57;">Contact Us</h5> 
                    <ul class="list-unstyled"> 
                        <li><i class="fa-solid fa-envelope"></i> : pallutradex@gmail.com</li> 
                        <li><i class="fa-solid fa-phone"></i> : +91 99788 03500</li> 
                        <li><i class="fa-solid fa-location-dot"></i> : 2/3 Avadh Park Society, Nr. Dabholi Char Rasta, katargam, Surat - 395004.</li> 
                    </ul> 
                </div> 
                <div class="col-md-3"> 
                    <h4 style="color: #073A57;" >Follow Us</h5> 
                    <ul class="list-inline footer-links"> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-facebook"></i> 
                          </a> 
                          </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-twitter"></i> 
                          </a> 
                        </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-instagram"></i> 
                          </a> 
                        </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-linkedin"></i> 
                          </a> 
                        </li> 
                    </ul> 
                </div> 
                <div class="col-md-3"> 
                    <img src="img/logo1.png" alt="logo" style="width: 260px;margin-right: 50px;">
                </div>
            </div> 
            <hr> 
            <div class="row"> 
                 
                    <p>© 2024 Your Website. All rights reserved.</p> 
                
            </div> 
        </div> 
    </footer> 
</body> 
  
</html>