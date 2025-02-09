<?php
// Set the path to the blog folder
$blog_folder = 'blog'; // Path to your blog folder
$blog_files = array_diff(scandir($blog_folder), array('..', '.')); // Get all files excluding '.' and '..'

// Filter only .html files
$html_files = [];
foreach ($blog_files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
        $html_files[] = $file;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Code Conjectures</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to your stylesheets -->
    <style>
        body {
            background-color: #1d1f21; /* Dark background for a terminal look */
            color: #c5c8c6; /* Light text color */
            font-family: 'Courier New', monospace; /* Monospaced font for terminal look */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        header {
            background-color: #222; /* Dark header background */
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

        .blog-posts {
            margin-top: 20px;
        }

        .blog-post {
            background-color: #282a2e;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #444;
        }

            .blog-post h3 {
                font-size: 1.5em;
                color: #f4f4f4;
            }

            .blog-post p {
                font-size: 1em;
                color: #bbb;
            }

            .blog-post a {
                color: #00ff00; /* Green like terminal links */
                text-decoration: none;
            }

                .blog-post a:hover {
                    text-decoration: underline;
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
            .blog-post {
                width: 100%;
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
            <h1>Welcome to the Code Conjectures Blog</h1>
            <p>Explore the latest posts on data, mathematics, AI, and more!</p>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <div class="container">
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <a href="gallery.php">Gallery</a> <!-- Added Gallery link -->
        </div>
    </nav>

    <!-- Blog Content Section -->
    <section class="blog-posts">
        <div class="container">
            <h2>Our Latest Blog Posts</h2>

            <!-- Blog Post List -->
            <?php foreach ($html_files as $file): ?>
                <article class="blog-post">
                    <h3><a href="<?php echo $blog_folder . '/' . $file; ?>"><?php echo pathinfo($file, PATHINFO_FILENAME); ?></a></h3>
                    <p><strong>Published on:</strong> <?php echo date("D, d M Y", filemtime($blog_folder . '/' . $file)); ?></p>
                    <p>Click the title to read the full post.</p>
                </article>
            <?php endforeach; ?>

        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <small>© 2025 Code Conjectures | Created by Lavian Dsouza</small>
            <p><a href="contact.html">Contact</a> | <a href="about.html">About</a> | <a href="gallery.php">Gallery</a></p>
        </div>
    </footer>

</body>
</html>
