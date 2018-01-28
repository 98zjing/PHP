<?php 
	function filePath(){
		if(!empty($_SESSION["file"])){
			return "background: url('" .$_SESSION["file"]."') no-repeat center center !important;";
		}else{
			return "background: url('uploads/photo.jpg') no-repeat center center !important;";
		}
	}
	function data(){
		if(!empty($_SESSION["data"])){
			foreach ($_SESSION["data"] as $value) {
				return <<< data
							<article class="score">
								<h4 class="pos" style="background: url('$value[3]')no-repeat center center;background-size: cover"></h4>
								<h4 class="name-high"> $value[1] 
									<span class="moves">
										$value[4]
									</span>
								</h4>
							<p>
								<span class="date-high">$value[2]</span>
								<span class="time-high">$value[0] sec</span>
							</p>
						</article>
data;
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TIC-TAC-TOE</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<style type="text/css">
	/* style for user image (overwrite .o) */
	.o {
		<?php echo filePath(); ?>
		background-size: 60px !important; 
		border-radius: 50%; 
		border: 1px solid rgba(0, 0, 0, .2) !important;
	}
	</style>
	<!-- put any js-code into this file -->
	<script src="assets/js/jquery-2.1.1.js"></script>
	<script src="assets/js/app.js"></script>
</head>
<body>
<?php if($_SESSION["template"] == 0): ?>
	<section class="container-game">
		<article class="title-row">
			<h1>TIC-TAC-TOE</h1>
		</article>
		<article class="row initial-page">
			<article class="col">
				<article class="subtitle-row">
					<h2>Instructions</h2>
				</article>
				<article class="container-row">
					Instructions of game:
					<ul>
						<li>Select Photo (optional)</li>
						<li>Press "Start New Game"</li>
						<li>Play Game: try to mark three fields in a vertical, horizontal or diagonal row one move before the computer</li>
					</ul>
				</article>
				<article class="subtitle-row">
					<h2>High Scores</h2>
				</article>
				<article class="container-row high scroll">
					<article class="scroll-view">
						<?php echo data(); ?>
						<article class="score">
							<h4 class="pos">1</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">13/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">2</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">12/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos" style="background: url('uploads/photo.jpg')no-repeat center center;background-size: cover">3</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">11/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">4</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">5</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">6</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">09/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">7</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">08/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">8</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">07/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
					</article>
			</article>
			</article>
			<article class="col border-line col-game-spacing">
				<article class="subtitle-row">
					<h2>Start new game</h2>
				</article>
				<article class="container-row form">
					<form  class="form-content" action="index.php?template=1" enctype="multipart/form-data" method="POST">
						<label for="photo">Upload photo <span class="optional right"> Optional </span></label>
						<input id="photo" type="file" name="photo"><br>
						<input type="hidden" name="template" id="" class="" value="1">
						<input type="submit" name="" id="" value="START NEW GAME">
					</form>
					<article class="alert-spacing-error">
						<article class="alert"><span class="underline">Error uploading photo:</span> Verify size or type of file!!</article>
					</article>
				</article>
			</article>
	</section>
<?php elseif($_SESSION["template"] == 1): ?>
	<section class="container-game">
		<article class="title-row">
			<h1>TIC-TAC-TOE</h1>
		</article>
		<article class="row initial-page">
			<article class="col">
				<article class="subtitle-row">
					<h2>Instructions</h2>
				</article>
				<article class="container-row">
					Instructions of game:
					<ul>
						<li>Select Photo (optional)</li>
						<li>Press "Start New Game"</li>
						<li>Play Game: try to mark three fields in a vertical, horizontal or diagonal row one move before the computer</li>
					</ul>
				</article>
				<article class="subtitle-row">
					<h2>High Scores</h2>
				</article>
				<article class="container-row high scroll">
					<article class="scroll-view">
						<?php echo data(); ?>
						<article class="score">
							<h4 class="pos">1</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">13/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">2</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">12/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos" style="background: url('uploads/photo.jpg')no-repeat center center;background-size: cover">3</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">11/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">4</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">5</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">6</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">09/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">7</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">08/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">8</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">07/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
					</article>
				</article>
			</article>
			<article class="col col-game-spacing">
				<article class="subtitle-row">
					<h2>Playing game...</h2>
					<article class="alert-spacing">
						<!--<article class="alert">You Win!!</article>-->
					</article>
					<figure class="container-photo circle img_tic o"></figure>
					<figure class="container-photo circle img_tic x"></figure>
					<p class="dates">Time: <span class="time">12 sec</span></p>
					<h3 class="relative-pos-game">
						<span class="points"><span class="nameuser">Player: <span class="usermoves moves">2</span></span></span><span class="points"><span class="computer">Computer: <span class="computermoves moves">2</span></span></span>
					</h3>
				</article>
				<article class="container-row relative-pos-game">
					<article class="game">
						<article class="field"><button id="1" class="btn img_tic"></button></article>
						<article class="field"><button id="2" class="btn img_tic"></button></article>
						<article class="field"><button id="3" class="btn img_tic"></button></article>
						<article class="field"><button id="4" class="btn img_tic"></button></article>
						<article class="field"><button id="5" disabled class="btn img_tic o"></button></article>
						<article class="field"><button id="6" class="btn img_tic "></button></article>
						<article class="field"><button id="7" disabled class="btn img_tic x"></button></article>
						<article class="field"><button id="8" disabled class="btn img_tic x"></button></article>
						<article class="field"><button id="9" disabled class="btn img_tic o"></button></article>
					</article>
				</article>
				<article class="container-row center form">
					<br>				
				</article>
				<div class="button-start">
					<a href="index.php?template=1"><button class="start">START NEW GAME</button ></a>
				</div>
			</article>
	</section>
<?php elseif($_SESSION["template"] == 2): ?>
	<section class="container-game">
		<article class="title-row">
			<h1>TIC-TAC-TOE</h1>
		</article>
		<article class="row initial-page">
			<article class="col">
				<article class="subtitle-row">
					<h2>Instructions</h2>
				</article>
				<article class="container-row">
					Instructions of game:
					<ul>
						<li>Select Photo (optional)</li>
						<li>Press "Start New Game"</li>
						<li>Play Game: try to mark three fields in a vertical, horizontal or diagonal row one move before the computer</li>
					</ul>
				</article>
				<article class="subtitle-row">
					<h2>High Scores</h2>
				</article>
				<article id="container-row" class="container-row high scroll">
					<article class="scroll-view">
						<?php echo data(); ?>
						<article class="score">
							<h4 class="pos">1</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">13/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">2</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">12/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos" style="background: url('uploads/photo.jpg')no-repeat center center;background-size: cover">3</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">11/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">4</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">5</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">6</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">09/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">7</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">08/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
						<article class="score">
							<h4 class="pos">8</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
							<p><span class="date-high">07/05/2015</span><span class="time-high">60 sec</span></p>
						</article>
					</article>
				</article>
			</article>
			<article class="col col-game-spacing">
				<article class="subtitle-row">
					<h2>Playing game...</h2>
					<article class="alert-spacing">
						<article class="alert game-alert">You Win!!</article>
					</article>
					<figure class="container-photo circle img_tic o"></figure>
					<figure class="container-photo circle img_tic x"></figure>
					<h3 class="relative-pos-game">
						<span class="points"><span class="nameuser">Player: <span class="usermoves moves">3</span></span></span><span class="points"><span class="computer">Computer: <span class="computermoves moves">2</span></span></span>
					</h3>
				</article>
				<article class="container-row relative-pos-game">
					<article class="game">
						<article class="field"><button id="1" disabled class="btn img_tic o"></button></article>
						<article class="field"><button id="2" class="btn img_tic"></button></article>
						<article class="field"><button id="3" class="btn img_tic"></button></article>
						<article class="field"><button id="4" class="btn img_tic"></button></article>
						<article class="field"><button id="5" disabled class="btn img_tic o"></button></article>
						<article class="field"><button id="6" class="btn img_tic "></button></article>
						<article class="field"><button id="7" disabled class="btn img_tic x"></button></article>
						<article class="field"><button id="8" disabled class="btn img_tic x"></button></article>
						<article class="field"><button id="9" disabled class="btn img_tic o"></button></article>
					</article>
				</article>
				<article class="container-row center form">
					<article class="form-win">
						<form action="index.php?template=2" method="GET">
							<label for="nickname">Enter your Nickname </label>
							<input id="nickname" type="text" name="nickname" placeholder="Nickname" >
							<input type="hidden" name="template" value="2">
							<input type="submit" name="" id="" class="ok">
						</form>
						<article class="alert-spacing-error">
							<article id="hots" class="alert"><span class="underline">Message:</span> Enter your nickname !!</article>
						</article>
					</article>
					<br>
				</article>
				<div class="button-start">
					<a href="index.php?template=1"><button class="start">START NEW GAME</button></a>
				</div>
			</article>
	</section>
<?php endif; ?>
</body>
</html>