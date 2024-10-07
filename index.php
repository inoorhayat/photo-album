<?php
$images = array_diff(scandir('images/'), array('.', '..'));

$imagesPerPage = 3;
$totalImages = count($images);
$totalPages = ceil($totalImages / $imagesPerPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $totalPages);

$startIndex = ($page - 1) * $imagesPerPage;
$currentImages = array_slice($images, $startIndex, $imagesPerPage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Album</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Photo Album</h1>
        
        <!-- Photo Album Layout -->
        <div class="album-grid">
            <?php if (count($currentImages) > 0): ?>
                <div class="main-image">
                    <img src="images/<?php echo $currentImages[0]; ?>" alt="Main Image">
                </div>
                <div class="small-images">
                    <?php for ($i = 1; $i < count($currentImages); $i++): ?>
                        <div class="small-image">
                            <img src="images/<?php echo $currentImages[$i]; ?>" alt="Small Image <?php echo $i; ?>">
                        </div>
                    <?php endfor; ?>
                </div>
            <?php else: ?>
                <p>No images found.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="prev">Previous</a>
            <?php endif; ?>

            <span class="page-info">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="next">Next</a>
            <?php endif; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
