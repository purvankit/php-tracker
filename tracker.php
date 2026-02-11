<?php
// PHP logic to track activity
$currentPage = basename($_SERVER['PHP_SELF']);
$currentTime = date("Y-m-d H:i:s");

// Store data in an associative array
$activityData = [
    "page" => $currentPage,
    "time" => $currentTime
];

// Set cookie 'user_activity' (JSON string, expires in 30 days)
setcookie("user_activity", json_encode($activityData), time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>User Activity Tracker</h2>
        <div id="display-area">
            <p><strong>Last Visited Page:</strong> <span id="lastPage">Loading...</span></p>
            <p><strong>Visit Timestamp:</strong> <span id="visitTime">Loading...</span></p>
        </div>
        <p class="note">The information above is retrieved from your browser cookies.</p>
    </div>

    <script src="tracker.js"></script>
</body>
</html>