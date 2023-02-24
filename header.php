<marquee behavior="" direction="" style="width:80%;">「請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地!詳見最新文章」</marquee>
<div style="width:18%;display:inline-block;">
					<?php
					if(isset($_SESSION['ac'])){
						echo "歡迎，".$_SESSION['ac'];
						echo "<div>";
						if($_SESSION['ac']=='admin'){
							echo "<a href='admin.php' class='button'>管理</a>";
						}
						echo "<a href='./api/logout.php' class='button'>登出</a>";
						echo "</div>";
					}else{
						?>
						<a href="?do=user">會員登入</a>
						<?php
					}
					?>
</div>