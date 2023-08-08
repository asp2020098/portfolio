<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Website</title>  
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->  
</head>
<body>
<?php
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $nameErr = $emailErr = $messageErr = "";

                $name = $email = $message = "";

                $validated  = true;


               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["name"])) {
                    $fnameErr = "Name is required";
                    $validated  = false;
                    } else {
                    $fname = test_input($_POST["name"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed";
                        $validated  = false;
                    }
                    }
                    
                    if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $validated  = false;
                    } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                        $validated  = false;
                    }
                    }

                    if (empty($_POST["message"])) {
                        $messageErr = "Message is required";
                        $validated  = false;
                    } else {
                    $message = test_input($_POST["message"]);
                    }
                    echo '<script type="text/javascript">
                    window.location = "index.php#contact"
                    </script>';

                    if($validated){
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "db_musician";

                        $conn = new mysqli($host,$username,$password,$db);
                        if($conn->connect_error){
                            echo "$conn->connect_error";
                            echo '<script>alert("Error Occured...")</script>';
                            echo '<script type="text/javascript">
                            window.location = "index.php"
                            </script>';
                        } else {
                            $stmt = $conn->prepare("insert into tbl_mail(name,email,message) values(?, ?, ?)");
                            $stmt->bind_param("sss", $name,$email,$message);
                            $execval = $stmt->execute();
                            //echo '<script>alert("Request Sent...")</script>';
                            echo '<script>alert("Thank you for being with us..")</script>';
                            echo '<script type="text/javascript">
                            window.location = "index.php"
                            </script>';
                            $stmt->close();
                            $conn->close();
                    }
                    }else{
                        echo '<script type="text/javascript">
                        window.location = "index.php#contactForm"
                        </script>';
                    }
                
                }
                
        ?>
    <!----hero section start---->
    <div class="hero">            
        <nav>
            <h2 class="logo">Portfo<span>lio</span></h2>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
            <a href="#" class="btn">Subscribe</a>
        </nav>
        <section class="home" id="home">
            <div class="content">
                <h4>Hello, my name is</h4>
                <h1 id="heading"></h1>
                <h3>I'm a Music Producer.</h3>
                <div class="newslatter">
                    <form>
                        <input type="email" name="email" id="mail" placeholder="Enter Your Email">
                        <input type="submit" name="submit" value="Let's Start">
                    </form>
                </div>
            </div>
        </section>
    </div>
        <section class="slideshow-container">
            <div class="mySlides fade">
                <img src="web-1.jpg">
            </div>
              
            <div class="mySlides fade">
                <img src="web-2.jpg">
            </div>
              
            <div class="mySlides fade">
                <img src="web-3.jpg">
            </div>
              
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </section>
    <section class="about" id="about">
        <div class="main">
            
            <div class="about-text">
                <h1>ABOUT ME</h1>
                <p>Yiannis Chryssomallis, known professionally as Yanni, is a Greek composer, keyboardist, pianist, and music producer. Yanni continues to use the musical shorthand that he developed as a child, blending jazz, classical, soft rock, and world music to create predominantly instrumental works.</p>
            </div>
            <img src="pianos.jpg">
        </div>
    </section>
    <section class="service" id="service">
        <div class="title">
            <h1>OUR SERVICES</h1>
        </div>
        <div class="box">
            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Audio Mixing Services</h5>
                <div class="pra"></div>
                <p>Audio mixing services come into play after the recording process. This process involves combining multiple sounds together to make all parts sound cohesive and tonally balanced. The ultimate goal of audio mixing is to create the best possible version of your multi-track recording.</p>
                <p style="text-align: center;"></p>
            </div>
            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Music Mastering Services</h5>
                <div class="pra">
                    <p>An online mastering service is an online program designed to analyze your tracks and apply pre-established mastering chains to improve the sound quality of your songs and get them ready for distribution on different streaming platforms or physical formats.</p>
                    <p style="text-align: center;"></p>
                </div> 
            </div>
            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Audio Consulting Services</h5>
                <div class="pra">
                    <p>Audio Consulting is a Swiss company producing very sophisticated audio equipment mostly for the music enthusiast but also for professional applications. True research in acoustics, electronics, and other fields of physics leads to innovative solutions.</p>
                    <p style="text-align: center;"></p>
                </div> 
            </div>
        </div>
    </section>
    <section class="skills" id="skills">
        <div class="read-more-container">
            <h1>SKILLS</h1>
            <div class="container">
                <p>
                    One of the greatest new age musicians of all times, Yanni was a self-taught artist who continues to push the boundaries of music. Born in Greece, Yanni became an American citizen. He traveled extensively and used his world experience to create complex and multi-cultural music. He has performed in restrictively exclusive venues like the Taj Mahal and the Acropolis of Athens. His creative and unique approach to music led him to develop his own musical shorthand when he was a child; he still uses it for his compositions. His long creative partnership with PBS proved that he is also effective at fundraising and has raised millions of dollars to fund his own and other broadcast events. In addition to producing, directing, and performing in his own orchestra, he also lends his charitable fundraising efforts to the World Wildlife Fund to promote the conservation of endangered species. As a keyboardist, composer, and musician, he has received two Grammy nominations. Although his music is consistently labeled and enjoyed as a great example of the popular new age genre, he famously defies genre definitions and makes unique orchestral music that embodies his international repute.
                    <span class="read-more-text">Yanni's music is a blend of various genres, including jazz, classical, soft rock, and world music. His compositions often feature orchestral arrangements with powerful melodies and emotional depth. He is known for his captivating live performances and has performed at iconic venues around the world, such as the Taj Mahal and the Acropolis of Athens. Yanni's music has a timeless quality and has garnered a dedicated fan base worldwide. His influential career spans several decades, and he continues to create and inspire with his unique sound.</span>
                </p>
                <span class="read-more-btn">Read More...</span>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <h1>Contact Us</h1>
        <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contactForm">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <span class="error"><?php echo $nameErr;?></span>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span class="error"><?php echo $emailErr;?></span>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <span class="error"><?php echo $messageErr;?></span>
            </div>
            <button type="submit">Send</button>
        </form>
    </section>
    <footer style="background-color: blueviolet;">
        <p>Yiannis Chryssomallis (Yaani)</p>
        <p>For more music - please click on the link below to Subscribe to my channel:</p>
        <div class="contact-info">
            <p>
                <a href="https://www.instagram.com/yanni" target="_blank" title="Instagram"><img src="instagram.png" alt="Instagram"></a>
                <a href="https://www.youtube.com/user/youtubechannel" target="_blank" title="YouTube"><img src="youtube.png" alt="YouTube"></a>
                <a href="https://open.spotify.com/artist/spotifyartistid" target="_blank" title="Spotify"><img src="spotify.png" alt="Spotify"></a>
                <a href="https://twitter.com/yannitwitter" target="_blank" title="Twitter"><img src="twitter.png" alt="Twitter"></a>
                <a href="https://www.facebook.com/OfficialYanni/" target="_blank" title="Facebook"><img src="facebook.png" alt="Facebook"></a>
            </p>
        </div>
        <p class="end">© Yiannis Chryssomallis (Yaani)</p>
    </footer>
    
</body>
<script src="script.js"></script>
</html>
