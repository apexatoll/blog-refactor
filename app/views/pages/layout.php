<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bristol code | <?=$title;?></title>
	<link rel="stylesheet" href="css/style.css">
	<?\core\Scripts::jquery();?>
	<?\core\Scripts::load();?>
</head>
<body>
	<div id="window">
		<div class="wrapper">
			<main>
				<header>
					<h1>
						<a href="/">
							<span class="blue">$ </span>bristol code</a>
					</h1>
				</header>
				<nav>
					<ul>
						<li><a href="/">home</a></li>
						<li><a href="/posts">posts</a></li>
						<li><a href="/about">about</a></li>
						<li><a href="/contact">contact</a></li>
					</ul>
				</nav>
				<article>
					<?require_once($content);?>
				</article>
			</main>
			<footer>
				<?(new \controllers\Footer)->default();?>
			</footer>
		</div>
	</div>
</body>
</html>
