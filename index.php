<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Posts';
  $g_page = 'posts';
  require 'header.php';
  require 'slidebar.php';
  
  $posts = find_all_blogs(BLOG_INDEX_NUM_POSTS);
?>

<div class="w3-container w3-content w3-margin-top" style="max-width:1000px;">
<?php foreach($posts as $post): ?>
	<div class="w3-card w3-container">
		<header>
		 <h2><a href="show.php?id=<?=$post['id']?>"><?= htmlspecialchars($post['title']) ?></a></h2>
		</header>

		<div>
		  <p>  <?= nl2br(htmlspecialchars($post['content'])) ?></p>
		</div>

		<footer>
		<hr>
		  <small> <?= $post['created_at'] ?> </small>
		</footer>
	</div>
<br>
<?php endforeach; ?>
</div>

<?php
  require 'footer.php';
?>
