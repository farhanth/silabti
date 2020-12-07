<?php

print_r($_POST);
echo "<br>";
echo "<br>";
echo "<br>";

echo "<h3>Penanggung Jawab</h3>";
echo "Shift Rekap : ".$this->input->post('shift');
echo "<br>";

if ($this->input->post('shift') > 4) {
	$kategori_shhift = "Malam";
}else{
	$kategori_shhift = "Pagi";
}
echo "Kategori Shift Rekap : ".$kategori_shhift;
echo "<br>";

echo "Kelas Rekap : ".$this->input->post('kelas');
echo "<br>";

echo "Matprak Rekap : ".$this->input->post('materi');
echo "<br>";

echo "Kelas Rekap : ".$this->input->post('kelas');
echo "<br>";

$tingkat = substr($this->input->post('kelas'), 0,1);
if ($tingkat == 1 || $tingkat == 2) {
	$lab_tingkat_rekap = "Dasar";
} else if ($tingkat == 3) {
	$lab_tingkat_rekap = "Menengah";
} else{
	$lab_tingkat_rekap = "Lanjut";
}
echo "Lab Tingkat : ".$lab_tingkat_rekap;
echo "<br>";

if ($this->input->post('pengganti_pj') == NULL) {
	echo "Nama Asisten : ".$this->input->post('pj');
	echo "<br>";
}else{
	echo "Nama Asisten : ".$this->input->post('pengganti_pj');
	echo "<br>";
}

echo "Role Rekap : PJ";
echo "<br>";

echo "Jumlah Mhs : ";
echo "<br>";

if ($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Aktif") {
	$variabel_mhs_rekap = $konstanta_mhs['konstanta_mhs'] + 1;
	echo "Variabel Mhs Rekap : ".$variabel_mhs_rekap;
	echo "<br>";
} else{
	$variabel_pembagi = $variabel_mhs['variabel_mhs'];
	$variabel_mhs_rekap = max($this->input->post('baris_asisten')) / $variabel_pembagi ;
	if (number_format($variabel_mhs_rekap) == 0) {
		$variabel_mhs_rekap = 1;
	}
	$variabel_mhs_rekap = number_format($variabel_mhs_rekap) + 1;
	echo "Variabel Mhs Rekap : ".$variabel_mhs_rekap;
	echo "<br>";
}

$nilai_rekap = number_format($variabel_mhs_rekap) * 2;
echo "Nilai Rekap : ".$nilai_rekap;
echo "<br>";

echo "<h3>Asisten</h3>";

$field_asist_array = $this->input->post('asist');
$field_pengganti_asist_array = $this->input->post('pengganti_asist');
$field_baris_asisten_array = $this->input->post('baris_asisten');

for ($i=0; $i < count($field_baris_asisten_array); $i++) { 
	echo "Shift Rekap : ".$this->input->post('shift');
	echo "<br>";

	if ($this->input->post('shift') > 4) {
		$kategori_shhift = "Malam";
	}else{
		$kategori_shhift = "Pagi";
	}
	echo "Kategori Shift Rekap : ".$kategori_shhift;
	echo "<br>";

	echo "Kelas Rekap : ".$this->input->post('kelas');
	echo "<br>";

	echo "Matprak Rekap : ".$this->input->post('materi');
	echo "<br>";

	echo "Kelas Rekap : ".$this->input->post('kelas');
	echo "<br>";

	$tingkat = substr($this->input->post('kelas'), 0,1);
	if ($tingkat == 1 || $tingkat == 2) {
		$lab_tingkat_rekap = "Dasar";
	} else if ($tingkat == 3) {
		$lab_tingkat_rekap = "Menengah";
	} else{
		$lab_tingkat_rekap = "Lanjut";
	}
	echo "Lab Tingkat : ".$lab_tingkat_rekap;
	echo "<br>";

	if ($field_pengganti_asist_array[$i] == NULL) {
		echo "Nama Asisten : ".$field_asist_array[$i];
		echo "<br>";
	}else{
		echo "Nama Asisten : ".$field_pengganti_asist_array[$i];
		echo "<br>";
	}

	echo "Role Rekap : Asisten";
	echo "<br>";

	echo "Jumlah Mhs : ".$field_baris_asisten_array[$i];
	echo "<br>";

	if ($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Aktif") {
		$variabel_mhs_rekap = $konstanta_mhs['konstanta_mhs'];
		echo "Variabel Mhs Rekap : ".$variabel_mhs_rekap;
		echo "<br>";
	} else{
		$variabel_pembagi = $variabel_mhs['variabel_mhs'];
		$variabel_mhs_rekap = $field_baris_asisten_array[$i] / $variabel_pembagi;
		if (number_format($variabel_mhs_rekap) == 0) {
			$variabel_mhs_rekap = 1;
		}
		echo "Variabel Mhs Rekap : ".number_format($variabel_mhs_rekap);
		echo "<br>";
	}

	$nilai_rekap = number_format($variabel_mhs_rekap) * 2;
	echo "Nilai Rekap : ".$nilai_rekap;
	echo "<br>";
	echo "<br>";
	echo "<br>";
}
?>