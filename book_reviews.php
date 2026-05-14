<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="description" content="Explore thoughtful book reviews and discover your next favorite read with our curated collection.">
    <meta name="keywords" content="book reviews, best books, book recommendations">
    <title>Book Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Book Reviews</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="book_reviews.php">Book Reviews</a></li>
            <li><a href="links.php">Related Links</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
 
    <main class="book-gallery">
    <section class="intro">
            <h2>Choose Your Favorite Genre</h2>
            <form id="poll-form">
                <input type="radio" id="fiction" name="poll" value="Fiction">
                <label for="fiction">Fiction</label><br>
                <input type="radio" id="nonfiction" name="poll" value="Non-Fiction">
                <label for="nonfiction">Non-Fiction</label><br>
                <input type="radio" id="scifi" name="poll" value="Sci-Fi">
                <label for="scifi">Sci-Fi</label><br>
                <input type="radio" id="fantasy" name="poll" value="Fantasy">
                <label for="fantasy">Fantasy</label><br><br>
                <button type="submit">Submit Vote</button>

                 <!-- Books to display after vote -->
                 <div id="recommended-books" class="recommended-books" style="display:none; margin-top: 20px; background-color: #e0f7fa; padding: 15px; border-radius: 8px;">
                    <h3>Recommended Books:</h3>
                    <div id="books-container"></div>
                </div>
            </form>
        </section>

        <!-- Section to display books based on the selected genre, below the form -->
        

        <script>
            // JavaScript: Poll Voting and Book Recommendation
            const pollForm = document.getElementById("poll-form");
            const booksContainer = document.getElementById("books-container");
            const recommendedBooks = document.getElementById("recommended-books");

            // Defining books by genre
            const books = {
                "Fiction": [
                    "The Great Gabsy",
                    "1984"
                ],
                "Non-Fiction": [
                    "To Kill a Mockingbird",
                    "Pride and Prejudice"
                ],
                "Sci-Fi": [
                    "Harry Potter and the Sorcerer's Stone",
                    "Frankenstein"
                ],
                "Fantasy": [
                    "Brave New World",
                    "The Catcher in the Rye"
                ]
            };

            pollForm.addEventListener("submit", function(event) {
                event.preventDefault(); // Formu göndermeyi engelle

                const choice = document.querySelector('input[name="poll"]:checked');
                if (choice) {
                    // Seçilen türü alıyoruz
                    const selectedGenre = choice.value;

                    // Kitapları yükleyip ekliyoruz
                    displayBooks(selectedGenre);
                } else {
                    booksContainer.innerHTML = "<p>Please select a genre!</p>";
                }
            });

            function displayBooks(genre) {
                // Kitapları dinamik olarak ekliyoruz
                const selectedBooks = books[genre];
                let bookHTML = '';

                selectedBooks.forEach(book => {
                    bookHTML += `<p>${book}</p>`;
                });

                booksContainer.innerHTML = bookHTML;
                recommendedBooks.style.display = "block";
            }
        </script>
        <!-- Book 1 -->
        <div class="book-review">
            <a href="#img1">
                <img src="images/book1.jpg" alt="The Great Gabsy" class="book-cover">
            </a>
            <h3>The Great Gabsy</h3>
            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
            <p>A fascinating tale that explores the depths of human experience.</p>
        </div>
        <div class="lightbox" id="img1">
            <img src="images/book1.jpg" alt="The Great Gabsy">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 2 -->
        <div class="book-review">
            <a href="#img2">
                <img src="images/book2.jpg" alt="1984" class="book-cover">
            </a>
            <h3>1984</h3>
            <p><strong>Author:</strong> George Orwell</p>
            <p>A dystopian novel that explores the dangers of totalitarianism and the loss of individual freedom.</p>
        </div>
        <div class="lightbox" id="img2">
            <img src="images/book2.jpg" alt="1984">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 3 -->
        <div class="book-review">
            <a href="#img3">
                <img src="images/book3.jpg" alt="To Kill a Mockingbird" class="book-cover">
            </a>
            <h3>To Kill a Mockingbird</h3>
            <p><strong>Author:</strong> Harper Lee</p>
            <p>An exploration of racial injustice and moral growth in the American South during the 1930s.</p>
        </div>
        <div class="lightbox" id="img3">
            <img src="images/book3.jpg" alt="To Kill a Mockingbird">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 4 -->
        <div class="book-review">
            <a href="#img4">
                <img src="images/book4.jpg" alt="Pride and Prejudice" class="book-cover">
            </a>
            <h3>Pride and Prejudice</h3>
            <p><strong>Author:</strong> Jane Austen</p>
            <p>A romantic novel that explores the intricacies of manners, marriage, and social status in 19th-century England.</p>
        </div>
        <div class="lightbox" id="img4">
            <img src="images/book4.jpg" alt="Pride and Prejudice">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 5 -->
        <div class="book-review">
            <a href="#img5">
                <img src="images/book5.jpg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
            </a>
            <h3>Harry Potter and the Sorcerer's Stone</h3>
            <p><strong>Author:</strong> J.K. Rowling</p>
            <p>A young boy discovers he's a wizard and attends a magical school where he faces dangerous adventures and uncovers family secrets.</p>
        </div>
        <div class="lightbox" id="img5">
            <img src="images/book5.jpg" alt="Harry Potter and the Sorcerer's Stone">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 6 -->
        <div class="book-review">
            <a href="#img6">
                <img src="images/book6.jpg" alt="Frankenstein" class="book-cover">
            </a>
            <h3>Frankenstein</h3>
            <p><strong>Author:</strong> Mary Shelley</p>
            <p>A gothic novel about the creation of a monster and its tragic consequences for its creator.</p>
        </div>
        <div class="lightbox" id="img6">
            <img src="images/book6.jpg" alt="Frankenstein">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 7 -->
        <div class="book-review">
            <a href="#img7">
                <img src="images/book7.jpg" alt="Brave New World" class="book-cover">
            </a>
            <h3>Brave New World</h3>
            <p><strong>Author:</strong> Aldous Huxley</p>
            <p>In a dystopian future, society is engineered for happiness through technology, genetic manipulation, and social control.</p>
        </div>
        <div class="lightbox" id="img7">
            <img src="images/book7.jpg" alt="Brave New World">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 8 -->
        <div class="book-review">
            <a href="#img8">
                <img src="images/book8.jpg" alt="The Catcher in the Rye" class="book-cover">
            </a>
            <h3>The Catcher in the Rye</h3>
            <p><strong>Author:</strong> J.D. Salinger</p>
            <p>A classic novel about the struggles of a teenage boy in a world full of alienation and confusion.</p>
        </div>
        <div class="lightbox" id="img8">
            <img src="images/book8.jpg" alt="The Catcher in the Rye">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 9 -->
        <div class="book-review">
            <a href="#img9">
                <img src="images/book9.jpg" alt="Wuthering Heights" class="book-cover">
            </a>
            <h3>Wuthering Heights</h3>
            <p><strong>Author:</strong> Emily Brontë</p>
            <p>A passionate and tragic tale of love and revenge set on the remote Yorkshire moors.</p>
        </div>
        <div class="lightbox" id="img9">
            <img src="images/book9.jpg" alt="Wuthering Heights">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 10 - Chess Story -->
        <div class="book-review">
            <a href="#img10">
                <img src="images/book10.jpg" alt="Chess Story" class="book-cover">
            </a>
            <h3>Chess Story</h3>
            <p><strong>Author:</strong> Stefan Zweig</p>
            <p>This classic delves into the psychological effects of isolation and competition.</p>
        </div>
        <div class="lightbox" id="img10">
            <img src="images/book10.jpg" alt="Chess Story">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 11 -->
        <div class="book-review">
            <a href="#img11">
                <img src="images/book11.jpg" alt="Little Women" class="book-cover">
            </a>
            <h3>Little Women</h3>
            <p><strong>Author:</strong> Louisa May Alcott</p>
            <p>Set during the American Civil War, this heartwarming novel follows the four March sisters—Jo, Meg, Beth, and Amy—through their struggles and triumphs as they grow into adulthood.</p>
        </div>
        <div class="lightbox" id="img11">
            <img src="images/book11.jpg" alt="Little Women">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>

        <!-- Book 12 - The Alchemist -->
        <div class="book-review">
            <a href="#img12">
                <img src="images/book12.jpg" alt="The Alchemist" class="book-cover">
            </a>
            <h3>The Alchemist</h3>
            <p><strong>Author:</strong> Paulo Coelho</p>
            <p>A philosophical story of a young shepherd's journey to find a hidden treasure in Egypt, emphasizing the importance of following one's dreams.</p>
        </div>
        <div class="lightbox" id="img12">
            <img src="images/book12.jpg" alt="The Alchemist">
            <a href="#gallery" class="close-btn">&times;</a>
        </div>
        <section class="review-form">
    <h2>Submit Your Review</h2>
    <form action="submit_review.php" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
      
        
        <label for="book">Select a Book:</label>
        <select id="book" name="book" required>
            <option value="The Great Gatsby">The Great Gatsby</option>
            <option value="1984">1984</option>
            <option value="To Kill a Mockingbird">To Kill a Mockingbird</option>
            <option value="Pride and Prejudice">Pride and Prejudice</option>
            <option value="Harry Potter and the Sorcerer's Stone">Harry Potter and the Sorcerer's Stone</option>
            <option value="Frankenstein">Frankenstein</option>
            <option value="Brave New World">Brave New World</option>
            <option value="The Catcher in the Rye">The Catcher in the Rye</option>
            <option value="Wuthering Heights">Wuthering Heights</option>
            <option value="Chess Story">Chess Story</option>
            <option value="Little Women">Little Women</option>
            <option value="The Alchemist">The Alchemist</option>
        </select>
        
        <label for="review">Your Review:</label>
        <textarea id="review" name="review" rows="4" required></textarea>
        
        <button type="submit">Submit Review</button>
    </form>
</section>

    </main>
    <footer>
        <p>&copy; 2024 Book Review Website</p>
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
