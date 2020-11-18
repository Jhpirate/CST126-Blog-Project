<html lang="en">
<head>
    <title>Blog Manager</title>
    <link rel="stylesheet" href="css/tableStyle.css">
</head>
<body>

<form method="post">
    <table>
        <tr>
            <th>Blog ID</th>
            <th>Blog Title</th>
            <th>Blog Author</th>
            <th>Blog Content</th>
            <th>Blog Tags</th>
            <th>Actions</th>
        </tr>
        <?php

        require_once "_getAllBlogPostsFromDB.php";

        $blogContentArray = getAllBlogPosts();

        for ($i = 0; $i < count($blogContentArray); $i++) {
            echo "<tr>";
//        echo "<td>" . $blogContent[$x][0] . "</td>" . "<td><textarea>" . $blogContent[$x][1] . "</textarea></td>" . "</td>" . "<td><textarea>" . $blogContent[$x][2] . "</textarea></td>" . "<td><textarea rows='10' cols='50'>" . $blogContent[$x][3] . "</textarea></td>" . "<td><textarea>" . $blogContent[$x][4] . "</textarea></td>" . "<td><button >Delete</button><button>Save</button></td>";
            echo
                "<td>" . $blogContentArray[$i][0] . "</td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][1] . "</textarea></td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][2] . "</textarea></td>" .
                "<td><textarea rows='10' cols='50' readonly disabled>" . $blogContentArray[$i][3] . "</textarea></td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][4] . "</textarea></td>" .
                "<td><button type='submit'formaction='_deleteBlogPost.php?id=" . $blogContentArray[$i][0] . "'>Delete Entry</button><br/><button type='submit' formaction='_editBlogPost.php?id=" . $blogContentArray[$i][0] . "'>Update</button></td>";

            echo "</tr>";
        }
        ?>
    </table>
</form>

</body>
</html>
