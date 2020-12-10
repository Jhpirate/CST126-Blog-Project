<?php
require_once "_getAllBlogPostsFromDB.php";

$blogPosts = getAllBlogData();

for ($i = 0; $i < count($blogPosts); $i++) {
    $blogID = $blogPosts[$i][0];

    echo "<table>";
    echo "<form action='_viewSingleBlog.php' method='get'>";
    echo "<hr>";

    echo "<tr>";
    echo "<td>";
    echo "<img class='invert_effect' width='200px' src='images/placeHolderLogo.png' class='invertImage' alt='placeHolderLogoInverted'>";
    echo "</td>";
    echo "</tr>";

//Title display
    echo "<tr>";
    echo "<td>" . $blogPosts[$i][1] . "</td>";
    echo "</tr>";

//Author - Date
    echo "<tr>";
    echo "<td>" . $blogPosts[$i][2] . " - " . $blogPosts[$i][3] . "</td>";
    echo "</tr>";

//Last updated
    echo "<tr>";
    echo "<td>" . "Last Updated: " . $blogPosts[$i][4] . "</td>";
    echo "</tr>";

//Content Summary
    echo "<tr>";
    echo "<td class='text'>" . $blogPosts[$i][5] . "</td>";
    echo "</tr>";

    //Read more
    echo "<tr>";
    echo "<td><input type='hidden' name='blogID' value='$blogID'></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td><input type='submit' value='Read More...'></td>";
    echo "</tr>";

    echo "</form>";
    echo "</table>";
}
