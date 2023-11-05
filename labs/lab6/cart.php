<?php include 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Lab 5: Shopping Cart</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
		      integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
		      crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="card">
				<h1 class="card-header text-center">Your Shopping Cart</h1>
				<div class="card-body">
					<?php // if there are items in the cart, populate the cart ?>
						<table class="table table-bordered ">
							<thead class="thead-dark">
							<tr>
								<th>Item Description</th>
								<th>Price</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($cart as $item): ?>
								<tr class="table-info">
									<td><?php // description of the item ?></td>
									<td>
										<p class="font-weight-bold">$<?php //price of the item ?></p>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							<tfoot>
							<tr class="table-danger">
								<td>Total:</td>
								<td class="font-weight-bold">$<?php //calculate the total to be paid ?></td>
							</tr>
							</tfoot>
						</table>
					<?php else: ?>
						<p>Your cart is empty!</p>
					<?php endif; ?>
					<form action="?" method="post">
						<p class="card-text">
							<a href="?" class="badge badge-primary">Continue shopping</a> or
							<input type="submit" name="action" value="Empty cart" class="btn btn-danger"/>
						</p>
					</form>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			        crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
			        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
			        crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
			        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
			        crossorigin="anonymous"></script>
	</body>
</html>
