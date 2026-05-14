<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore thoughtful book reviews and discover your next favorite read with our curated collection.">
    <meta name="keywords" content="book reviews, best books, book recommendations">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
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
            <h2>Contact Form</h2>
            <p>If you have any questions, feel free to reach out using the form below.</p>
            
            <!-- Contact Form -->
            <form id="contact-form" method="POST" action="contact.php">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br><br>

                <button type="submit">Send</button>
            </form>
        </section>

  
        <?php
        // PHP: Handling form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Saving submitted data into a text file
            $file = "messages.txt";
            $content = "Name: $name\nEmail: $email\nMessage: $message\n\n";
            file_put_contents($file, $content, FILE_APPEND);
            echo "<p style='color: green;'>Thank you for your message, $name!</p>";
        }
        ?>
        
    </main>

    <footer>
        <p>&copy; 2024 Book Review Website</p>
    </footer>

    <script>
        // JavaScript: Form Validation
        const form = document.getElementById("contact-form");

        form.addEventListener("submit", function(event) {
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;

            if (name === "" || email === "") {
                alert("Please fill in all fields!");
                event.preventDefault(); // Formun gönderilmesini engeller
            }
        });

       
    </script>
</body>
</html>