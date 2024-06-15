<div class="container">
    <h1 class="mt-5">Enter your name and comment</h1>
    <form action="index.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="username">Enter your name:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="comment">Enter your comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>