<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['nama_prodi']) && isset($_GET['id_prodi'])) {
		$id 	= $_GET['id_prodi'];
		$nama	= $_GET['nama_prodi'];

		// hapus record
		$query 	= "SELECT nama_prodi FROM ahp_data_prodi WHERE id_prodi=$id";
		$result	= mysqli_query($koneksi, $query);
		
		while ($row = mysqli_fetch_array($result)) {
			$nama = $row['nama_prodi'];
		}
	}

	if (isset($_POST['update'])) {
		$id 	= $_POST['id_prodi'];
		$nama 	= $_POST['nama_prodi'];

		$query 	= "UPDATE $jenis SET nama_prodi='$nama_prodi' WHERE id=$id_prodi";
		$result	= mysqli_query($koneksi, $query);

		if (!$result) {
			echo "Update gagal";
			exit();
		} else {
			header('Location: '.$jenis.'.php');
			exit();
		}
	}

	include('header.php');
?>

<section class="content">
	<h2>Edit <?php echo $nama?></h2>

	<form class="ui form" method="post" action="edit.php">
		<div class="inline field">
			<label>Nama <?php echo $nama ?></label>
			<select> <option value="<?php echo $row['nama_prodi'];?>"><?php echo $row['nama_prodi'];?> </option> </select>
			<input type="hidden" name="id" value="<?php echo $id?>">
		
	  </div>
		<br>
		<input class="ui green button" type="submit" name="update" value="UPDATE">
	</form>
</section>

<?php include('footer.php'); ?>