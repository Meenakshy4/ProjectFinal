<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Gallery</title>
    <style>
	/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
   background-image: url('gallerybackground.png');
    color: #333;
}

/* Header Styling */
.header {
    text-align: center;
    padding: 2rem;
    background-color: #333;
    color: white;
}

.header h1 {
    font-size: 3rem;
    letter-spacing: 2px;
    text-transform: uppercase;
}

/* Gallery Section */
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease-in-out;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.gallery-item:hover::before {
    opacity: 1;
}

.gallery-item:hover {
    transform: scale(1.05);
}

/* Footer Styling */
.footer {
    text-align: center;
    padding: 1rem;
    background-color: #040404;
    color: white;
}
.logo-link {
    display: inline-block;
    position: absolute;
    top: 1px;
    left: 1px;
	
    z-index: 1001;
   transition: transform 0.3s ease;
    }
 .logo-image {
    width: 180px; /* Adjust as needed */
    height: 190px;
    }
	.logo-link:hover {
    transform: scale(1.5);
    }
	
	

	</style>
</head>
<body>
    <a href="TestHome.php" class="logo-link">
            <img src="SahyaLogo.png" alt="Sahya Logo" class="logo-image">
        </a> 
<br><br><br><br><br><br><br><br>
    <section class="gallery">
        <div class="gallery-item">
            <img src="image1.jpg" alt="Event 1">
        </div>
        <div class="gallery-item">
            <img src="image2.jpg" alt="Event 2">
        </div>
        <div class="gallery-item">
            <img src="image3.jpg" alt="Event 3">
        </div>
        <div class="gallery-item">
            <img src="image4.jpg" alt="Event 4">
        </div>
        <div class="gallery-item">
            <img src="image5.jpg" alt="Event 5">
        </div>
        <div class="gallery-item">
            <img src="image6.png" alt="Event 6">
        </div>
		 <div class="gallery-item">
            <img src="image4.png" alt="Event 7">
        </div>
		<div class="gallery-item">
            <img src="image8.png" alt="Event 8">
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2024 Sahya Marian Fest</p>
    </footer>

    <script>
	// Add any interactivity you want to trigger on hover or click events
// For example, adding click events for future interactions

const galleryItems = document.querySelectorAll('.gallery-item');

galleryItems.forEach(item => {
    item.addEventListener('click', () => {
        alert("Photo clicked!");
        // You can add a lightbox effect or modal to show the image in a larger view
    });
});
</script>
</body>
</html>
