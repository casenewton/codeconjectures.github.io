<?php
// Fetch images for the gallery
$gallery_folder = 'gallery'; // Path to your gallery folder
$images = array_diff(scandir($gallery_folder), array('..', '.')); // Get all files excluding '.' and '..'

// Ensure the gallery images are in an array
$image_files = [];
foreach ($images as $image) {
    if (in_array(pathinfo($image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $image_files[] = $gallery_folder . '/' . $image;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Code Conjectures</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #1d1f21;
            color: #c5c8c6;
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        header {
            background-color: #222;
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid #444;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
            font-weight: bold;
        }

        header p {
            font-size: 1em;
            color: #888;
        }

        nav {
            text-align: center;
            background-color: #333;
            padding: 10px 0;
        }

        nav a {
            color: #f0f0f0;
            text-decoration: none;
            margin: 0 15px;
            font-size: 0.9em;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 images per row */
            gap: 15px;
            margin-top: 40px;
        }

        .gallery-grid img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        footer {
            background-color: #222;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
        }

        footer small {
            color: #777;
            font-size: 0.8em;
        }

        @media screen and (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 images per row on smaller screens */
            }

            header h1 {
                font-size: 1.8em;
            }

            nav a {
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>Gallery - Code Conjectures</h1>
            <p>Explore our image gallery showcasing our work, projects, and inspirations.</p>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="blog.html">Blog</a>
            <a href="gallery.php">Gallery</a>
            <a href="contact.html">Contact</a>
        </div>
    </nav>

    <!-- Gallery Section -->
    <div class="container">
        <div class="gallery-grid">
            <?php foreach ($image_files as $image) : ?>
                <div class="gallery-item">
                    <img src="<?php echo $image; ?>" alt="Gallery Image">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <small>© 2025 Code Conjectures | Created by Lavian Dsouza</small>
        </div>
    </footer>

</body>
</html>
