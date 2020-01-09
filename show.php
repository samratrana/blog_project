<?php
  require 'config.php';
  require 'database.php';
  
  if (!isset($_GET['id'])) redirect();
  
  $id = $_GET['id'];
  
  $post = find_post_by_id($id);
  
  if (!$post) redirect();
  
  $g_title = BLOG_NAME . ' - Posts';
  require 'header.php';
  require 'footer.php';
  require 'slidebar.php'
?>
<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
      <h2><?= htmlspecialchars($post['title']) ?> </a></h2>
      <p>
        <small>
          <?= format_mysql_datetime($post['created_at']) ?>
        </small>
      </p>
      <div class='blog_content'>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
      </div>
    </div>  
<?php
  require 'footer.php';
?>