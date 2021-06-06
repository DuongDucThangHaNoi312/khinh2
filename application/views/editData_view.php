<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
	

	<div class="container" >
		<div class="text-md-center">
			<h3 style="padding: 20px">Sửa nhân sự của shooppe</h3>
			<hr>
		</div>
	</div>
	<div class="container">
		<hr>
		<div class="row">
			<?php foreach ($dulieuketqua as $value): ?>


			<form  class="col-md-4 offset-md-4" method="post" action="http://localhost/khinh2/index.php/Home/updateData" enctype="multipart/form-data">
				<div class="form-group">
					<label for="id">Id</label>
					<input type="hidden" class="form-control" id="exampleInput" placeholder="Nhập tên" name="id" value="<?= $value['id'] ?>">
				</div>
				<div class="form-group">
					<img src="<?= $value['anhavatar'] ?>" alt="" class="img-fluid">
					<br>
					<label for="">Avatar</label>
                    <input type="hidden" class="form-control" id="exampleInputAvatar" aria-describedby="" placeholder="" name="anhavatarOld" value="<?= $value['anhavatar'] ?>">
					

					<input type="file" class="form-control" id="exampleInputAvatar" aria-describedby="" placeholder="" name="anhavatar">
					
				</div>
				<div class="form-group">
					<label for="ten">Tên</label>
					<input type="text" class="form-control" id="exampleInput" placeholder="Nhập tên" name="ten" value="<?= $value['ten'] ?>">
				</div>
				<div class="form-group">
					<label for="tuoi">Tuổi</label>
					<input type="number" class="form-control" id="exampleInput" placeholder="Nhập tuổi" name="tuoi" value="<?= $value['tuoi'] ?>">
				</div>
				
				<div class="form-group">
					<label for="sdt">SĐT</label>
					<input type="text" class="form-control" id="exampleInput" placeholder="Nhập SĐT" name="sdt" value="<?= $value['sdt'] ?>">
				</div>
				
				<div class="form-group">
					<label for="linkfb">Link Facebook</label>
					<input type="text" class="form-control" id="exampleInput" placeholder="Nhập Link Facebook" name="linkfb" value="<?= $value['linkfb'] ?>">
				</div>
				<div class="form-group">
					<label for="sodonhang">Số đơn hàng</label>
					<input type="text" class="form-control" id="exampleInput" placeholder="Nhập Số đơn hàng" name="sodonhang" value="<?= $value['sodonhang'] ?>">
				</div>

				
				<button type="submit" class="btn btn-success">Lưu</button>
				<a href="http://localhost/khinh2/index.php/Home" class="btn btn-success">Home</a>
			</form>
			<?php endforeach ?>
		</div>


	</div>
</body>
</html>