<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ballot Maker</title>
    <!-- Styles -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		body {
		  padding-top: 20px;
		  padding-bottom: 20px;
		}

		a {
			color: #bc0000;
		}

		a:hover {
			color: #9a0000;
		}

		.center {
			text-align: center;
		}
	</style>
</head>
<body>
	<!-- Content -->
	<div class="container well">
		<div class="row">
			<div class="col-md-12 center">
				<h1>CSH Constitution Ballot Maker</h1> 
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="ballot_maker.php" method="POST">
					<div class="form-group">
						<label for="title">Amendment Title</label>
						<input type="text" id="title" name="title" class="form-control" placeholder="Article 7: Ben Centra Gets All The Money" />
					</div>
					<div class="form-group">
						<label for="body">Amendment Text</label>
						<textarea id="body" name="body" class="form-control" rows="5" placeholder="Every year, all the dues money is given to Ben Centra to spend on hookers and blow."></textarea>
						<p class="help-block">You can totally inject HTML, it's a feature. Also, line breaks are maintained.</p>
					</div>
					<div class="form-group">
						<label for="num">Number of Ballots</label>
						<input type="number" id="num" name="num" class="form-control" min="0" max="100" value="60"/>
					</div>
					<div class="form-group">
						<label>
							Include Yes/No Vote?
							<input type="checkbox" name="vote" checked/>
						</label>
					</div>
					<div class="form-group center">
						<input type="submit" class="btn btn-primary" value="Create Ballots"/>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<!--<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
</body>
</html>
