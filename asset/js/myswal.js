// sweetalert controller login
const flashDataLogin = $('.flashdata-login').data('flashdata');
if (flashDataLogin == "gagal_salah"){
	Swal.fire({
		title: 'Login Gagal',
		text: 'Username atau password salah',
		icon: 'warning',
		timer: 2000
	});
}

if (flashDataLogin == "tidak_login"){
	Swal.fire({
		title: 'Anda belum login',
		text: 'Silahkan login untuk mengakses dashboard',
		icon: 'warning',
		timer: 2000
	});
}
// sweetalert controller login end



// sweetalert controller ganti password
const flashData_dashboard = $('.flashdata-dashboard').data('flashdata');

if (flashData_dashboard){
	Swal.fire({
		title: 'Ganti Password',
		text: 'Password anda berhasil diganti',
		icon: 'success',
		timer: 2000
	});
}
// sweetalert controller ganti password end


// sweetalert controller jadwal
const flashData_Jadwal = $('.flashdata-jadwal-list').data('flashdata');

if (flashData_Jadwal){
	Swal.fire({
		title: 'Data Jadwal',
		text: 'Berhasil ' + flashData_Jadwal,
		icon: 'success',
		timer: 2000
	});
}

$('.hapus-jadwal').on('click', function (e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus data jadwal (Data yang sudah dihapus tidak dapat dikembalikan)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Data Jadwal!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
// sweetalert controller asisten end
// sweetalert controller jadwal end



// sweetalert controller asisten
const flashDataAsisten_list = $('.flashdata-asisten-list').data('flashdata');
const flashDataAsisten_add = $('.flashdata-asisten-add').data('flashdata');

if (flashDataAsisten_list){
	Swal.fire({
		title: 'Data Asisten',
		text: 'Berhasil ' + flashDataAsisten_list,
		icon: 'success',
		timer: 2000
	});
}

if (flashDataAsisten_add){
	Swal.fire({
		title: 'Gagal Menambah Data Asisten',
		text: 'NPM yang anda masukkan sudah terdaftar',
		icon: 'warning',
	});
}

$('.hapus-asisten').on('click', function (e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus data asisten (termasuk data jadwal pada asisten tersebut)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Data Asisten!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
// sweetalert controller asisten end



// sweetalert controller profil
const flashData_Profil = $('.flashdata-profil').data('flashdata');

if (flashData_Profil){
	Swal.fire({
		title: 'Update Profil',
		text: 'Berhasil mengubah gambar profil',
		icon: 'success',
		timer: 2000
	});
}
// sweetalert controller profil end



// sweetalert controller matprak
const flashDataMatprak_list = $('.flashdata-matprak-list').data('flashdata');

if (flashDataMatprak_list){
	Swal.fire({
		title: 'Data Mata Praktikum',
		text: 'Berhasil ' + flashDataMatprak_list,
		icon: 'success',
		timer: 2000
	});
}

$('.hapus-matprak').on('click', function (e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus data mata praktikum (termasuk data jadwal pada mata praktikum tersebut)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Data Matprak!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
// sweetalert controller matprak end



// sweetalert controller konfigurasi
const flashData_konfig_semester = $('.flashdata-konfigurasi-semester').data('flashdata');
const flashData_konfig_at = $('.flashdata-konfigurasi-at').data('flashdata');
const flashData_konfig_jadwalDrop = $('.flashdata-konfigurasi-jadwalDrop').data('flashdata');
const flashData_konfig_logDrop = $('.flashdata-konfigurasi-logDrop').data('flashdata');

if (flashData_konfig_semester){
	Swal.fire({
		title: 'Konfigurasi Semester',
		text: flashData_konfig_semester,
		icon: 'success',
		timer: 2000
	});
}

if (flashData_konfig_at){
	Swal.fire({
		title: 'Konfigurasi Role Asisten Tetap',
		text: flashData_konfig_at,
		icon: 'success',
		timer: 2000
	});
}

if (flashData_konfig_jadwalDrop){
	Swal.fire({
		title: 'Kosongkan Semua Jadwal Asisten',
		text: flashData_konfig_jadwalDrop,
		icon: 'success',
		timer: 2000
	});
}

if (flashData_konfig_logDrop){
	Swal.fire({
		title: 'Kosongkan Semua Log Aktifitas',
		text: flashData_konfig_logDrop,
		icon: 'success',
		timer: 2000
	});
}

$('.jadwalDrop').on('click', function (e){
	e.preventDefault();
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus seluruh data jadwal asisten. (Data yang sudah dihapus tidak dapat dikembalikan)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Data Asisten!'
	}).then((result) => {
		if (result.value) {
			$('#jadwalDropForm').submit();
		}
	});
});

$('.logDrop').on('click', function (e){
	e.preventDefault();
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus seluruh data log aktifitas. (Data yang sudah dihapus tidak dapat dikembalikan)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Data Log!'
	}).then((result) => {
		if (result.value) {
			$('#logDropForm').submit();
		}
	});
});
// sweetalert controller konfigurasi end



//// sweetalert controller konfigurasi rekap
const flashData_konfig_gaji_perjam = $('.flashdata-konfigurasi-gaji-perjam').data('flashdata');
const flashData_konfig_variabel_mhs = $('.flashdata-konfigurasi-variabel-mhs').data('flashdata');
const flashData_konfig_konstanta_mhs = $('.flashdata-konfigurasi-konstanta-mhs').data('flashdata');

if (flashData_konfig_gaji_perjam){
	Swal.fire({
		title: 'Konfigurasi Gaji Perjam',
		text: flashData_konfig_gaji_perjam,
		icon: 'success',
		timer: 2000
	});
}

if (flashData_konfig_variabel_mhs){
	Swal.fire({
		title: 'Konfigurasi Variabel Mahasiswa',
		text: flashData_konfig_variabel_mhs,
		icon: 'success',
		timer: 2000
	});
}

if (flashData_konfig_konstanta_mhs){
	Swal.fire({
		title: 'Konfigurasi Konstanta Mahasiswa',
		text: flashData_konfig_konstanta_mhs,
		icon: 'success',
		timer: 2000
	});
}
//// sweetalert controller konfigurasi rekap end


//// sweetalert controller rekap
const flashData_rekap_absen = $('.flashdata-rekap-absen').data('flashdata');

if (flashData_rekap_absen){
	Swal.fire({
		title: 'Rekap Absen',
		text: 'Rekap berhasil '+flashData_rekap_absen,
		icon: 'success',
		timer: 2000
	});
}
//// sweetalert controller rekap end



//// sweetalert controller list rekap
const flashData_rekap_harian = $('.flashdata-rekap-harian').data('flashdata');

if (flashData_rekap_harian){
	Swal.fire({
		title: 'Rekap Absen',
		text: 'Rekap berhasil '+flashData_rekap_harian,
		icon: 'success',
		timer: 2000
	});
}

$('.hapus-rekap').on('click', function (e){
	e.preventDefault();
	var val = $(this).val();
	var form = `<form action="" method="post" id="delete"> <input type="text" name="delete" value="` + val + `" /></form>`;
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Anda akan menghapus seluruh rekap absen asisten. (Data yang sudah dihapus tidak dapat dikembalikan)",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Rekap!'
	}).then((result) => {
		if (result.value) {
			$('body').append(form);
			$('#delete').submit();
		}
	});
});
//// sweetalert controller list rekap end