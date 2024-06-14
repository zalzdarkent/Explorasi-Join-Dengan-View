<?php
$query_max_kode_pengguna = "SELECT MAX(CAST(SUBSTRING(kode_pengguna, 5) AS UNSIGNED)) as max_kode_pengguna FROM users WHERE kode_pengguna LIKE 'USR-%'";
$result_max_kode_pengguna = $conn->query($query_max_kode_pengguna);
$row_max_kode_pengguna = $result_max_kode_pengguna->fetch_assoc();
$max_kode_pengguna = $row_max_kode_pengguna['max_kode_pengguna'];

if ($max_kode_pengguna === null) {
    $max_kode_pengguna = 0;
}

$new_max_kode_pengguna = $max_kode_pengguna + 1;
$kode_pengguna = 'USR-' . str_pad($new_max_kode_pengguna, 2, '0', STR_PAD_LEFT);

?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="pengguna/kontrol/create.php" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode pengguna</label>
                                <input type="text" class="form-control" name="kode_pengguna" value="<?php echo $kode_pengguna; ?>" id="kode_pengguna" readonly required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nama pengguna</label>
                                <input type="text" class="form-control" name="pengguna" id="pengguna" placeholder="Masukkan nama pengguna" required />
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="inputGroupSelect01">Jabatan</label>
                                    <select class="form-select" id="jabatan" name="jabatan">
                                        <option selected>Pilih...</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Pegawai">Pegawai</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="basic-default-company">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email pengguna" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="konfirmasi_password" class="form-control" name="konfirmasi_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container col-md-5">
                <div class="embed-responsive embed-responsive-16by9">
                    <dotlottie-player src="https://lottie.host/ca8f018b-6e8d-4f43-a18c-4083320d907f/9OgKGCsNT2.json" background="transparent" speed="1" style="max-width: 400px; height: 400px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var selectedOption = document.getElementById("jabatan").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("konfirmasi_password").value;

        if (selectedOption === "Pilih...") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silakan pilih jabatan!'
            });
            return false;
        }

        if (password !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password dan konfirmasi password tidak cocok!'
            });
            return false;
        }

        return true;
    }
</script>