<?php
// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Checks before adding a comment
    if (isset($_POST['username']) && isset($_POST['comment'])) {
        $username = $_POST['username'];
        $comment = $_POST['comment'];
        
        // Validate and set comment
        if (!empty($username) && !empty($comment)) {
            Database::setComment($username, $comment);
            // Redirect to avoid resubmission on page refresh
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    // Checks before deleting a comment
    if (isset($_POST['delete_comment_id'])) {
        $id = $_POST['delete_comment_id'];
        Database::deleteComment($id);
        // Redirect to avoid resubmission on page refresh
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Get comments from database
$comments = Database::getComment();
?>

<div class="container">
    <h2 class="mt-5">Comments</h2>
    <ul class="list-group mt-3">
        <?php
        // Check if there are comments to display
        if (!empty($comments)) {
            // Reverse array to display latest comments first
            $comments = array_reverse($comments);
            foreach ($comments as $comment) {
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                
                // Display username and comment content
                echo '<div>';
                echo '<strong>' . $comment['username'] . ':</strong> ' . $comment['comment'];
                echo '</div>';
                /*
                * The user input from the comment section is not validated and unsanitized.
                * Due to that, XSS scripts(Javascript codes in usual) can be included in the comments.
                * When echoing the comment from Database, the user input JS script will be executed on the webpage.
                * Example script is <script>alert("Vulnerable to XSS")</script> will display an alertbox with text "Vulnerable to XSS".
                * Using this cookie hijacking can be done with this script, <script>alert(document.cookie)</script>
                * The above script will display all the cookies stored by the site in an alert box.
                * Then the cookies can be sent to the attacker's device in many ways.
                * site link: https://cng.selfmade.one/
                 */
                
                // Display timestamp near delete button
                echo '<div class="d-flex align-items-center">';
                echo '<small class="text-muted mr-3">' . $comment['comment_time'] . '</small>';
                
                // Delete button form
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="delete_comment_id" value="' . $comment['id'] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                echo '</form>';
                
                echo '</div>'; // End timestamp and delete button container
                
                echo '</li>';
            }
        } else {
            // Display message if no comments exist
            echo '<li class="list-group-item">No comments yet.</li>';
        }
        ?>
    </ul>
</div>
