<?php
ob_start();//start output buffering, to handle headers properly
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<? load_template("_head"); ?>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <? load_template("_DarkLightMode"); ?>
  <main>
    <? load_template("_header"); ?>
    <? load_template("_comments"); ?>
    <? load_template("_commentsResult"); ?>
  </main>
  <? load_template("_footer"); ?>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?
ob_end_flush();//flushes output buffer, handles headers properly
?>