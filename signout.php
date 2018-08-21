<?php
session_start();
session_destroy();
  header('Location: http://localhost/forum_tut_reloaded-master/');
  exit();
?>