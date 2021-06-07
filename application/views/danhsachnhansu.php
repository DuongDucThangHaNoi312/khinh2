<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
	<div class="container" >
		<div class="text-md-center addH2">
			<h3 style="padding: 20px">Danh sách nhân sự của shooppe</h3>
			<hr>
		</div>

	</div>

	<div class="container">
		<div class="row addByAjax" >

			

			<?php foreach ($mangketqua as $value): ?>

				<div class="col-sm-4 " >
					<div class="card" style="margin: 7px">

						<img class="card-img-top img-fluid 	" src="<?= $value['anhavatar'] ?>" alt="Card image"  >

						<div class="card-body" >
							<h4 class="card-title ten" ><b><?= $value['ten'] ?></b></h4>
							<p class="card-text tuoi">Tuổi : <b><?= $value['tuoi'] ?></b></p>
							<p class="card-text sdt">Tel : <b><?= $value['sdt'] ?></b></p>
							<p class="card-text sodonhanghoanthang">Số đơn hàng hoàn thành : <b><?= $value['sodonhang'] ?></b></p>
							<p class="card-text linkfb"><small><a class="btn btn-outline-info" href="<?= $value['linkfb'] ?>"><i class="fab fa-facebook-square"></i> Facebook</a></small></p>
							<p class="card-text ">
								<small><a class="btn btn-outline-warning" href="http://localhost/khinh2/index.php/Home/editData/<?= $value['id'] ?>"><i class="fas fa-edit" ></i> Edit </a></small>
								<small><a onclick="return confirm('Bạn có muốn xóa không ');" class="btn btn-outline-danger" href="http://localhost/khinh2/index.php/Home/deleteData/<?= $value['id'] ?>"><i class="fas fa-trash-alt"></i>  Delete </a></small>
							</p>
						</div>
					</div>
				</div>


			<?php endforeach ?>
		</div>
	</div>

	




	<div class="container" >
		<div class="text-md-center append">
			<h3 style="padding: 20px">Thêm nhân sự của shooppe</h3>
			<hr>
		</div>
	</div>


	<div class="container">
		<hr>
		<div class="row">

			<!-- <form class="col-md-4 offset-md-4" method="post" action="http://localhost/khinh2/index.php/Home/add" enctype="multipart/form-data"> -->
				<div class="form-group">
					<label for="anhavatar">Avatar</label>
					<!-- <input type="file" class="form-control" id="anhavatar" aria-describedby="" placeholder="" name="anhavatar"> -->
					<input type="file" class="form-control" id="anhavatar" aria-describedby="" placeholder="" name="files[]">
				</div>
				<div class="form-group">
					<label for="ten">Tên</label>
					<input type="text" class="form-control" id="ten" placeholder="Nhập tên" name="ten">
				</div>
				<div class="form-group">
					<label for="tuoi">Tuổi</label>
					<input type="number" class="form-control" id="tuoi" placeholder="Nhập tuổi" name="tuoi">
				</div>

				<div class="form-group">
					<label for="sdt">SĐT</label>
					<input type="text" class="form-control" id="sdt" placeholder="Nhập SĐT" name="sdt">
				</div>

				<div class="form-group">
					<label for="linkfb">Link Facebook</label>
					<input type="text" class="form-control" id="linkfb" placeholder="Nhập Link Facebook" name="linkfb">
				</div>
				<div class="form-group">
					<label for="sodonhang">Số đơn hàng</label>
					<input type="text" class="form-control" id="sodonhang" placeholder="Nhập Số đơn hàng" name="sodonhang">
				</div>

				<div class="form-group">
					<!-- <button type="submit" class="btn btn-warning btnAjax">Add </button> -->
					<button type="button" class="btn btn-warning btnAjax">Add Ajax </button>
					<button type="reset" class="btn btn-danger">Enter Again</button>
					<!-- </form> -->
				</div>
			</div>



			<script >
				//load code
				$( document ).ready(function() {
					console.log( "document loaded" );






					duongdan  = '<?php echo base_url() ?>';
					$('#anhavatar').fileupload({
						url: duongdan + 'index.php/Home/uploadfile',
						dataType: 'json',
						done: function (e, data) {
							$.each(data.result.files, function (index, file) {
							// console.log(file.url)	
							tenFIle = file.url;
						});

						}
					// load uploadfile();
				})

					$('.btnAjax').click(function(event) {
						/* Act on the event */
						$.ajax({
 				// đường dẫn đến action
 				url: 'Home/ajaxAdd',
 				type: 'POST',
 				dataType: 'json',
 				data: {
 					ten : $('#ten').val(),
 					tuoi : $('#tuoi').val(),
 					sdt : $('#sdt').val(),
 					anhavatar : tenFIle,
 					sodonhang : $('#sodonhang').val(),
 					linkfb : $('#linkfb').val(),

 				},
 			})

						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");

                     // thêm nội dung bằng append

                     noidung = ' <div class="col-sm-4 " >';
                     noidung += '<div class="card" style="margin: 7px">';
                     noidung += '<img class="card-img-top img-fluid" src="'+tenFIle+'" alt="Card image" >';
                     noidung += '<div class="card-body" >';
                     noidung += '<h4 class="card-title ten" ><b>'+$('#ten').val()+'</b></h4>';
                     noidung += '<p class="card-text tuoi">Tuổi : <b>'+ $('#tuoi').val()+'</b></p>';
                     noidung += '<p class="card-text sdt">Tel : <b>'+ $('#sdt').val()+'</b></p>';
                     noidung += '<p class="card-text sodonhanghoanthang">Số đơn hàng hoàn thành : <b>'+$('#sodonhang').val()+'</b></p>';
                     noidung += '<p class="card-text linkfb"><small><a class="btn btn-outline-info" href=" '+$('#linkfb').val()+' "><i class="fab fa-facebook-square"></i> Facebook</a></small></p>';

                     noidung += '<p class="card-text">';
                     noidung += '<small><a class="btn btn-outline-warning" href="http://localhost/khinh2/index.php/Home/editData/<?= $value['id'] ?>"><i class="fas fa-edit" ></i> Edit </a></small>';
                     noidung += '<small><a class="btn btn-outline-danger" href="http://localhost/khinh2/index.php/Home/deleteData/<?= $value['id'] ?>" ><i class="fas fa-trash-alt"></i>  Delete </a></small>';
                     noidung += '</p>';
                     noidung += ' </div>';
                     noidung += ' </div>';
                     noidung += ' </div>';

                     $('.addByAjax').append(noidung);
                     
                      //reset noi dung 
                      $('#ten').val('');
                      $('#tuoi').val('');
                      $('#sdt').val('');
                      $('#sodonhang').val('');
                      $('#linkfb').val('');

                  });
					});



//end load code
});
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>



<script type="text/javascript" src="<?php echo base_url() ?>/jQueryUpload/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript"  src="<?php echo base_url() ?>/jQueryUpload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/jQueryUpload/js/jquery.fileupload.js"> </script>
</body>
</html>