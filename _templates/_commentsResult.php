<? //if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['comment']) && !empty($_POST['comment'])) {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    Database::setComment($username, $comment);
    $comments = Database::getComment(); ?>
    <div class="container">
        <h2 class="mt-5">Comments</h2>
        <ul class="list-group mt-3">
            <?php
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    echo '<li class="list-group-item"><strong>' . $comment['username'] . ':</strong> ' . $comment['comment'] . ' <small class="text-muted">' . $comment['comment_time'] . '</small></li>';
                }
            } else {
                echo '<li class="list-group-item">No comments yet.</li>';
            }
            ?>
        </ul>
    </div>
<? //} ?>