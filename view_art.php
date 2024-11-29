<?php
include 'dbconnection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <style>
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .gallery-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 10px;
            padding: 10px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .gallery-item img {
            max-width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            box-sizing: border-box;
        }
        .gallery-item h3 {
            margin: 10px 0 5px;
            font-size: 18px;
            color: #333;
        }
        .gallery-item p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.php" class="nav_link">Home</a></li>
            <li><a href="view_art.php" class="nav_link active">Gallery</a></li>
            <li><a href="contact.php" class="nav_link">Contact</a></li>
        </ul>
    </nav>
    <header>
        <section id="home" class="content">
            <h1>Art Gallery</h1>
            <p>Discover the best art pieces</p>
        </section>
    </header>
    <section id="gallery" class="gallery">
        <h2>Gallery</h2>
        <div class="gallery-container">
            <?php
            $sql = "SELECT * FROM art";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-item">';
                    echo '<img src="' . $row['image_path'] . '" alt="' . $row['title'] . '">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No art found.</p>';
            }
            ?>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="primarycenter">Contact Us</div>
        <div class="contact-box">
            <form action="contact_submission.php" method="POST">
                <div class="form-group">
                    <label for="description">Message:</label>
                    <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                </div>
                <input type="submit" value="Send" name="submit">
            </form>
        </div>
    </section>
    <section class="footer">
        <div class="first">
            <div class="contactus">
                <b>Contact Us</b>
                <p>Chhabdi Barahi Temple</p>
                <p>+9779829182166</p>
                <p>monikabict@gmail.com</p>
            </div>
            <div class="social">
                <h4>Social links</h4>
                <a href="https://www.facebook.com/monika.stha.549"><i class="fa-brands fa-facebook"
                        style="color: blue;font-size: 1.3rem;"></i></a>
                <a href="https://www.instagram.com/riko_amanai.0/"> <i class="fa-brands fa-square-instagram"
                        style="color:rgb(242, 92, 117);font-size: 1.3rem;"></i></a>
                <a href="https://github.com/moonikastha"> <i class="fa-brands fa-github"
                        style="color:black;font-size: 1.3rem;"> </i></a>

            </div>
        </div>
        <div class="second">
            <div class="resources">
                <h4>Resources</h4>
                <p>Portfolio</p>
                <p>Home</p>
                <p>Gallery</p>
                <p>Services</p>
                <p>Contact Us</p>
                <p>Projects</p>
                <p>Artist</p>
            </div>
        </div>
        <div class="third">
            <h4>Locate Us</h4>
            <p>Sitemaps</p>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>