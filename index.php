<?php
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?load_template("_head");?>
  <body style="display: flex; flex-direction: column; min-height: 100vh;">
  <?load_template("_DarkLightMode");?>

<main>
  <?load_template("_header");?>
  <?load_template("_comments");
  // if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['comment']) && !empty($_POST['comment'])){
    load_template("_commentsResult");
  //}?>
</main>
<?load_template("_footer");?> 
<script src="/cng/assets/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>
