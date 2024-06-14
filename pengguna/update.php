<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="pengguna/kontrol/update.php" onsubmit="return validateForm()">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $view['id']; ?>" id="id" />
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode pengguna</label>
                                <input type="text" class="form-control" name="kode_pengguna" value="<?php echo $view['kode_pengguna']; ?>" id="kode_pengguna" readonly required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nama pengguna</label>
                                <input type="text" class="form-control" name="pengguna" value="<?php echo $view['nama']; ?>" id="pengguna" placeholder="Masukkan nama pengguna" required />
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="inputGroupSelect01">Jabatan</label>
                                    <select class="form-select" id="jabatan" name="jabatan">
                                        <option selected disabled>Pilih...</option>
                                        <?php
                                        $jabatanOptions = array("Owner", "Pegawai");

                                        foreach ($jabatanOptions as $jabatan) {
                                            $selected = ($view['role'] == $jabatan) ? "selected" : "";
                                            echo "<option value='$jabatan' $selected>$jabatan</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="basic-default-company">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $view['email']; ?>" id="email" placeholder="Masukkan email pengguna" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="konfirmasi_password" class="form-control" name="konfirmasi_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
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
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("konfirmasi_password").value;
        if (password !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Konfirmasi password tidak cocok!',
            });
            return false;
        }
        return true;
    }
</script>