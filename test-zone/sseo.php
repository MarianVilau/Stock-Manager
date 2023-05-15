<?php
function generate_clean_url($url) {
    // Convert URL to lowercase
    $url = strtolower($url);

    // Remove special characters and spaces
    $url = preg_replace('/[^a-z0-9]+/', '-', $url);

    // Remove leading and trailing hyphens
    $url = trim($url, '-');

    // Replace multiple consecutive hyphens with a single hyphen
    return preg_replace('/-+/', '-', $url);
}

// Example usage
$pageTitle = "http://localhost/Stock-Manager/test-zone/sseo.php";
$cleanUrl = generate_clean_url($pageTitle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to My Website</title>
    <!-- Other meta tags and CSS styles -->
</head>
<body>
<!-- Your page content goes here -->
<h1>Welcome to My Website</h1>
<p>This is the content of the page.</p>

<!-- Example link using the clean URL -->
<a href="<?php echo $cleanUrl; ?>.html">Read More</a>
</body>
</html>
