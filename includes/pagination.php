<?php
$images = array_diff(scandir('../images/'), array('.', '..'));

$imagesPerPage = 6;
$totalImages = count($images);
$totalPages = ceil($totalImages / $imagesPerPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $totalPages);

$startIndex = ($page - 1) * $imagesPerPage;
$currentImages = array_slice($images, $startIndex, $imagesPerPage);

foreach ($currentImages as $image) {
    echo '<div class="image-box">';
    echo '<img src="../images/'.$image.'" alt="'.$image.'" class="thumbnail" onclick="openLightbox(\''.$image.'\')">';
    echo '</div>';
}
