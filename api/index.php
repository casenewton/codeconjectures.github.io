<?php
$blog_folder = 'blog'; // Path to your blog folder
$blog_posts = [];
if (is_dir($blog_folder)) {
    $files = array_slice(scandir($blog_folder, SCANDIR_SORT_DESCENDING), 0, 6); // Get the latest 6 files
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
            $blog_posts[] = $file; // Only add .html files
        }
    }
}

// Fetch images for the gallery from the 'gallery' folder
$gallery_folder = 'gallery'; // Path to your gallery folder
$image_files = [];
if (is_dir($gallery_folder)) {
    $images = array_diff(scandir($gallery_folder), array('..', '.')); // Get all files excluding '.' and '..'
    foreach ($images as $image) {
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        // Check for all valid image extensions
        if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'])) {
            $image_files[] = $gallery_folder . '/' . $image; // Add valid image files to the array
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Code Conjectures</title>
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

        .main-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .blog-post {
            background-color: #282a2e;
            margin: 10px;
            padding: 15px;
            width: 45%;
            border-radius: 5px;
            border: 1px solid #444;
        }

        .blog-post h3 {
            font-size: 1.2em;
            color: #f4f4f4;
        }

        .blog-post p {
            font-size: 0.9em;
            color: #bbb;
        }

        .blog-post a {
            color: #00ff00;
            text-decoration: none;
        }

        .blog-post a:hover {
            text-decoration: underline;
        }

        .gallery {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(10%, 1fr));
            gap: 10px;
        }

        .gallery img {
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
            .main-content {
                flex-direction: column;
                align-items: center;
            }

            .blog-post {
                width: 100%;
            }

            header h1 {
                font-size: 1.8em;
            }

            nav a {
                font-size: 0.8em;
            }

            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(20%, 1fr));
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>Welcome to Code Conjectures</h1>
            <p>Where ideas meet innovation. Explore the latest in data, mathematics, AI, and more!</p>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="blog.php">Blog</a>
            <a href="contact.html">Contact</a>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="main-content">
        <!-- Display Latest Blog Posts -->
        <?php foreach ($blog_posts as $blog) : ?>
            <div class="blog-post">
                <h3><a href="blog/<?php echo $blog; ?>"><?php echo pathinfo($blog, PATHINFO_FILENAME); ?></a></h3>
                <a href="blog/<?php echo $blog; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Gallery Section -->
    <div class="gallery">
        <?php foreach ($image_files as $image) : ?>
            <img src="<?php echo $image; ?>" alt="Gallery Image">
        <?php endforeach; ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <small>© 2025 Code Conjectures | Created by Lavian Dsouza</small>
        </div>
    </footer>

</body>
</html>
