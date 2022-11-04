<?php
include "../inc/koneksi.php";

if (isset($_POST['Cetak'])) {
	$id = $_POST['lahir'];
}

$tanggal = date("m/y");
$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
	<style>
		@page {
			size: auto;
			margin: 0;
		}

		body {
			padding: 50px;
		}

		img {
			width: 80px;
			margin-left: 0px;
		}

		table.kop {
			width: 100%;
			border-bottom: 5px solid #000;
		}

		p.ttd {
			margin-left: 60%;
		}
	</style>
</head>

<body>
	<table class="kop">
		<tr>
			<td><img src="../dist/img/LogoWeb.png"></td>
			<td class="tekskop">
				<center>
					<h2>PEMERINTAH KABUPATEN PAREPARE</h2>
					<h3>KECAMATAN SOREANG
						<br>KELURAHAN WATANG SOREANG
					</h3>
				</center>
			</td>
			<td><img src="../dist/img/LogoWeb.png"></td>
		</tr>
	</table>
	<?php
	$sql_tampil = "select * from tb_lahir where id_lahir ='$id'";

	$query_tampil = mysqli_query($koneksi, $sql_tampil);
	$no = 1;
	while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
	?>

		<center>
			<h4>
				<u>SURAT KETERANGAN KELAHIRAN</u>
			</h4>
			<h4>No Surat :
				<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
				<?php echo $tanggal; ?>
			</h4>
		</center>
		<p>Yang bertandatangan dibawah ini Lurah Watang Soreang, Kecamatan Soreang, Kabupaten Parepare, dengan ini menerangkan
			bahwa :</P>
		<table>
			<tbody>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<?php echo $data['nama']; ?>
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<?php echo $data['jekel']; ?>
					</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td>
						<?php echo $data['tgl_lh']; ?>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<p>Telah benar-benar Lahir diKelurahan Watang Soreang, Kecamatan Soreang, Kabupuaten Parepare.
			Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
		<br>
		<br>
		<br>
		<br>
		<p align="center" class="ttd">
			Watang Soreang,
			<?php echo $tgl; ?>
			<br>Lurah Watang Soreang
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>(Hikmayani Sulaeman SE., MM.)
		</p>


		<script>
			window.print();
		</script>

</body>

</html>