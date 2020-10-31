<?php
require_once 'template/header.tpl' ;
require_once 'template/navbar.tpl'  ;
?>
<!---Start Main----->
<main>
	<p>welcome to<span> my site</span></p>

</main>
<!---End Main----->
<!---Start Article----->
<div class="post">
	<?php
    if(isset($_GET['id'])){
        // collect data
        $id = $_GET['id'];
    		$Newslastall= News::retreiveNews($id);/////title from last 10 New //retreiveNewssw($id_category)
        if(is_array($Newslastall) && count ($Newslastall)>0){
          $editors= Editor::retreiveAllEditors();
          foreach($editors as $editorss){}
          echo '<article class="read">
            <header>
              <h3>'.$Newslastall['title'].'</h3>
            </header>
            <section>
              <p>'.$Newslastall['content'].'</p>
              </br>
              <p>created by '.$editorss['name'].'</p>
            </section>
          </article>';
        }
    }else {
      echo "Not Found This Page";
    }
	?>
</div>
<!---End Article----->
<!---Start Aside----->
<aside>
	<section class="links">
	<h3><a href="Category.php">Catogeries</a></h3>
    <ul>
      <li><a href="index.php">Home</a></li>
      <?php
        $allCategories = Category::retreiveAllCategorys();
        if(is_array($allCategories) && count ($allCategories)>0){
          foreach($allCategories as $category){
            echo '<li><a href="category.php?id='.$category['id'].'">'.$category['name'].'</a></li>';
          }
        }
      ?>
    </ul>
	</section>
	<section class="top-mamber">
		<h3>Top News</h3>
		<ul>
			<?php
			$Newsdifall= News::retreisvedifNews();/////title from last 10 New
			if(is_array($Newsdifall) && count ($Newsdifall)>0){
				foreach($Newsdifall as $Newsdif){
							echo '<li><a href="readnews.php?id='.$Newsdif['id'].'">'.$Newsdif['title'].'</a></li>';
					}
			}
			?>
		</ul>
		<bdi></bdi>
	</section>
</aside>
<!--End Aside--->
<?php
require_once 'template/footer.tpl';
?>
