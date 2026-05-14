<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews - Discover Your Next Favorite Read</title>
    <meta name="description" content="Explore thoughtful book reviews and discover your next favorite read with our curated collection.">
    <meta name="keywords" content="book reviews, best books, book recommendations">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Welcome message container */
        .welcome-message {
            text-align: center;
            font-size: 1.2em;
            color: #4CAF50;
            margin: 20px 0;
        }

        /* Successful login message style */
        .login-message {
            font-size: 1.5em;
            color: #00796b;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* General message style */
        .welcome-message p {
            font-size: 1.2em;
            color: #333;
            margin-top: 10px;
        }

        /* Button Styles */
        .button {
            background-color: #ff0000; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Login container */
        .login-container {
            text-align: right;
            margin-top: -50px;
        }

        .login-container a {
            color: white;
            text-decoration: none;
        }

        .login-container a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Book Review Website</h1>
        <div class="login-container">
            <!-- Login/Register or Logout buttons based on session -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- User is logged in, show Logout button -->
                <a href="logout.php" class="button">Logout</a>
            <?php else: ?>
                <!-- User is not logged in, show Login and Register buttons -->
                <a href="index.php" class="button">Log out</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Welcome Message -->
    <div class="welcome-message">
        <?php if (isset($_SESSION['user_id'])): ?>
            <p class="login-message">🎉 You have successfully logged in! 🎉</p>
        <?php endif; ?>
        <p>🎉 You have successfully logged in!🌟</p>

        <p>Welcome to our site, Book Lover! 📚 Discover your next favorite read with us. 🌟</p>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="book_reviews.php">Book Reviews</a></li>
            <li><a href="links.php">Related Links</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    
    <main>
        <section class="intro">
            <h2>About This Site</h2>
            <p>This website is dedicated to exploring and analyzing various classic and modern books. Here, you will find insightful reviews, summaries, and critical analyses that aim to enhance your reading experience and understanding of each book. Our goal is to inspire readers and provide thoughtful perspectives on timeless literature.</p>
        </section>

        <section class="featured-books">
            <h2>Featured Books</h2>
            <div class="book">
                <img src="images/book5.jpg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                <h3>Harry Potter and the Sorcerer's Stone</h3>
                <p>Discover the magic of the wizarding world with this timeless fantasy classic.</p>
            </div>
            <div class="book">
                <img src="images/book7.jpg" alt="Brave New World" class="book-cover">
                <h3>Brave New World</h3>
                <p>Explore a dystopian future where happiness is controlled by science and technology.</p>
            </div>
        </section>

        <section class="book-quotes">
            <h2>Quotes from Popular Books</h2>
            <?php
            $quotes = [
                "It takes a great deal of bravery to stand up to our enemies, but just as much to stand up to our friends. — J.K. Rowling, *Harry Potter and the Sorcerer's Stone*",
                "Community, identity, stability. — Aldous Huxley, *Brave New World*",
                "Whatever our souls are made of, his and mine are the same. — Emily Brontë, *Wuthering Heights*",
                "Real courage is when you know you're licked before you begin, but you begin anyway and see it through no matter what. — Harper Lee, *To Kill a Mockingbird*",
                "The only way to get rid of a temptation is to yield to it. — Oscar Wilde, *The Picture of Dorian Gray*"
            ];
            $randomQuote = $quotes[array_rand($quotes)];
            echo "<blockquote>$randomQuote</blockquote>";
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Book Review Website</p>
        <?php
        $file = "counter.txt";
        if (!file_exists($file)) {
            file_put_contents($file, 0);
        }
        if (is_writable($file)) {
            $counter = (int)file_get_contents($file);
            $counter++;
            file_put_contents($file, $counter);
            echo "<p style='text-align: center;'>This site has been visited <strong>$counter</strong> times.</p>";
        } else {
            echo "<p style='color: red;'>Counter file is not writable!</p>";
        }
        ?>
    </footer>

    <button id="scroll-top" style="display:none;">Top</button>
    <script>
        const scrollButton = document.getElementById("scroll-top");
        window.addEventListener("scroll", () => {
            scrollButton.style.display = window.scrollY > 200 ? "block" : "none";
        });
        scrollButton.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>
</body>
</html>
	