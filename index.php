<?php

	require 'header.html';

?>
    <!-- Page Content -->
    <div class="container">
		<?php
		
		require 'database.php';
		
		$date  = date("Y-m-d");

		if(isset($_GET['cat']))
			$cat = $_GET['cat'];
		else
			$cat = "Daily";

		$query = "SELECT `news_id`, `headline_short`, `story_short` FROM `news` WHERE `newspaper` = '$cat' ORDER BY `date` DESC LIMIT 20";

		if($rs = mysql_query($query))
		{
			$i=0;
			while($qr = mysql_fetch_assoc($rs))
			{
				echo "<div class='row'>
            			<div class='col-md-8'>
                			<img class='img-responsive img-rounded' src='uploads/".$qr['news_id']."' alt='Image not available'>
            			</div>
            
            			<div class='col-md-4'>
                			<h2>".$qr['headline_short']."</h2>
                			<p style = 'text-align: justify; text-justify: inter-word;'>".$qr['story_short']."</p>
                			<a class='btn btn-primary btn-lg' href='read.php?id=".$qr['news_id']."'>Read more</a>
            			</div>
        			  </div>

        			  <hr>";
			}
		}

		?>
        
        <!-- Footer -->
        <?php
            include "footer.html";
        ?>
    </div>
    <!-- /.container -->


</body>

</html>
