<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data pengguna</h5>
            <div class="table-responsive text-nowrap">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM users");
                $rowCount = mysqli_num_rows($query);

                if (isset($_SESSION['success_message'])) {
                    echo '
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Data berhasil disimpan</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ' . $_SESSION['success_message'] . '
                            </div>
                        </div>';
                    unset($_SESSION['success_message']);
                }
                ?>
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>Kode pengguna</th>
                            <th>Nama pengguna</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        if ($rowCount > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><strong><?php echo $data['kode_pengguna']; ?></strong></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['role']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="dashboard.php?page=edit-pengguna&& id=<?php echo $data['id']; ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="btn btn-sm btn-danger" href="#" onclick="confirmDelete(<?php echo $data['id']; ?>)"><i class="bx bx-trash me-1"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7" class="text-danger text-center">Belum ada data pengguna.</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <a class="btn btn-sm btn-primary" href="index.php?page=tambah-pengguna"><i class="bx bx-plus-circle me-1"></i>Tambah Mata Kuliah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    myToast.show();

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'pengguna/kontrol/delete.php?page=hapus-pengguna&&id=' + id;
            }
        });
    }

    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchData");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>