<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - New Post';
  $g_page = 'create';
  require 'slidebar.php';
  require 'header.php';
  session_start();
if(!isset($_SESSION['username']))
{
	header("location:main_login.php");
}
	
?>
<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
  <form class="w3-container" action="process_post.php" method="post">
   
      <h3>Create Blog Post</h3>
      <p>
        <h6>Title</h6>
        <input class="w3-input" name="title" id="title" />
      </p>
      <p>
        <label for="content">Content</label>
        <textarea class="w3-input" name="content" id="content" style="min-height:200px; resize:none" ></textarea>
      </p>
      <p>
        <button class="w3-btn w3-black" type="submit" name="command" >Create</button>
      </p>
  
  </form>
</div>

<?php
  require 'footer.php';
?>