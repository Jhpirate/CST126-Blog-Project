<!doctype html>

<!--
Author: Jared Heeringa
Date: 09/28/2020
Class: CST126
Project: Milestone #2
Description: index.php main landing page for blog site
-->

<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navBar.css">
    <meta charset="UTF-8">
    <title>CST126 Blog Project</title>
</head>

<body>
<!-- Might add some css later to make things look prettier -->
<div>
    <h1>CST126 Blog Project</h1>
</div>


<ul>
    <li class="active"><a href="index.php">Home</a></li>
    <li><a href="viewBlogPosts.php">View Blogs</a></li>
    <li><a href="newBlogPost.php">New Blog Post</a></li>
    <li><a href="searchBlog.php">Search Blogs</a></li>
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        echo "<li style='float: right'><a href='register.html'>Register</a></li>";
        echo "<li style='float: right'><a href='login.php'>Login</a></li>";

    } else {
        if($_SESSION['accessLevel'] == "admin"){
            echo "<li><a href='blogManagement.php'>Blog Management</a></li>";
            echo "<li><a href='userManagement.php'>User Management</a></li>";
            echo "<li style='float: right'><a href='userLogout.php'>Logout</a></li>";
            echo "<li style='float: right'><a href='#'>User: " . $_SESSION['username'] . " | " . $_SESSION['userID'] . "</a></li>";

        } else {
            echo "<li style='float: right'><a href='userLogout.php'>Logout</a></li>";
            echo "<li style='float: right'><a href='#'>User: " . $_SESSION['username'] . " | " . $_SESSION['userID'] . "</a></li>";
        }
    }
    ?>

</ul>

<h2>Placeholder Content</h2>

<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis aliquet lacus. Nunc dignissim dui nec nulla
    viverra scelerisque. Duis id lacinia massa. Aenean posuere luctus tincidunt. Donec dapibus lacus non venenatis
    vestibulum. Maecenas feugiat eget ipsum vel dapibus. Duis sit amet metus orci. Ut non venenatis massa, a ullamcorper
    ligula.
</p>

<p>
    Morbi ac nisi fringilla, luctus tellus sed, bibendum odio. Nulla tempus lacus eu mollis commodo. Etiam commodo neque
    non urna iaculis porttitor. Integer arcu odio, maximus quis interdum sit amet, cursus lacinia orci. Donec imperdiet
    leo sit amet tortor pellentesque consequat. Pellentesque ac tellus vitae mi auctor feugiat non sit amet nisi.
    Integer consequat urna sit amet imperdiet interdum.
</p>

<p>
    Fusce lobortis et ipsum sed imperdiet. Mauris et euismod turpis. Orci varius natoque penatibus et magnis dis
    parturient montes, nascetur ridiculus mus. Maecenas sapien enim, tincidunt vitae accumsan at, condimentum et felis.
    Pellentesque venenatis elit justo, at consectetur sem elementum a. Quisque suscipit ligula sit amet lectus tristique
    sodales. Ut placerat velit non ante ornare vehicula at eget neque. Aliquam erat volutpat. Nullam ultrices, justo non
    dapibus egestas, orci metus convallis tellus, id commodo lorem risus sit amet turpis.
</p>

<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis aliquet lacus. Nunc dignissim dui nec nulla
    viverra scelerisque. Duis id lacinia massa. Aenean posuere luctus tincidunt. Donec dapibus lacus non venenatis
    vestibulum. Maecenas feugiat eget ipsum vel dapibus. Duis sit amet metus orci. Ut non venenatis massa, a ullamcorper
    ligula.
</p>

<p>
    Morbi ac nisi fringilla, luctus tellus sed, bibendum odio. Nulla tempus lacus eu mollis commodo. Etiam commodo neque
    non urna iaculis porttitor. Integer arcu odio, maximus quis interdum sit amet, cursus lacinia orci. Donec imperdiet
    leo sit amet tortor pellentesque consequat. Pellentesque ac tellus vitae mi auctor feugiat non sit amet nisi.
    Integer consequat urna sit amet imperdiet interdum.
</p>

<p>
    Fusce lobortis et ipsum sed imperdiet. Mauris et euismod turpis. Orci varius natoque penatibus et magnis dis
    parturient montes, nascetur ridiculus mus. Maecenas sapien enim, tincidunt vitae accumsan at, condimentum et felis.
    Pellentesque venenatis elit justo, at consectetur sem elementum a. Quisque suscipit ligula sit amet lectus tristique
    sodales. Ut placerat velit non ante ornare vehicula at eget neque. Aliquam erat volutpat. Nullam ultrices, justo non
    dapibus egestas, orci metus convallis tellus, id commodo lorem risus sit amet turpis.
</p>

<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis aliquet lacus. Nunc dignissim dui nec nulla
    viverra scelerisque. Duis id lacinia massa. Aenean posuere luctus tincidunt. Donec dapibus lacus non venenatis
    vestibulum. Maecenas feugiat eget ipsum vel dapibus. Duis sit amet metus orci. Ut non venenatis massa, a ullamcorper
    ligula.
</p>

<p>
    Morbi ac nisi fringilla, luctus tellus sed, bibendum odio. Nulla tempus lacus eu mollis commodo. Etiam commodo neque
    non urna iaculis porttitor. Integer arcu odio, maximus quis interdum sit amet, cursus lacinia orci. Donec imperdiet
    leo sit amet tortor pellentesque consequat. Pellentesque ac tellus vitae mi auctor feugiat non sit amet nisi.
    Integer consequat urna sit amet imperdiet interdum.
</p>

<p>
    Fusce lobortis et ipsum sed imperdiet. Mauris et euismod turpis. Orci varius natoque penatibus et magnis dis
    parturient montes, nascetur ridiculus mus. Maecenas sapien enim, tincidunt vitae accumsan at, condimentum et felis.
    Pellentesque venenatis elit justo, at consectetur sem elementum a. Quisque suscipit ligula sit amet lectus tristique
    sodales. Ut placerat velit non ante ornare vehicula at eget neque. Aliquam erat volutpat. Nullam ultrices, justo non
    dapibus egestas, orci metus convallis tellus, id commodo lorem risus sit amet turpis.
</p>

</body>
</html>
