<div class="container" style="height: 800px;">
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah User
    </button>
    <div class="row">
        <div class="table-responsive" id="user_data">
            
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User</label>
                        <input type="text" class="form-control" name="username" placeholder="Tuliskan User Baru" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Tuliskan Password">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    load_data();
    function load_data(hlm){
        $.ajax({
            url : "user_data.php",
            method : "POST",
            data : {
					            hlm: hlm
				           },
            success : function(data){
                    $('#user_data').html(data);
            }
        })
    } 
    $(document).on('click', '.halaman', function(){
    var hlm = $(this).attr("id");
    load_data(hlm);
});
});
</script>

<?php
include "upload_foto.php";

if (isset($_POST['simpan'])) {
    // Validasi input username
    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        echo "<script>
            alert('Username tidak boleh kosong');
            document.location='admin.php?page=user';
        </script>";
        die;
    }

    // Ambil password, gunakan md5 jika diisi, jika kosong biarkan null
    $password = isset($_POST['password']) && !empty($_POST['password']) ? md5($_POST['password']) : null;

    // Proses foto
    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $cek_upload = upload_foto($_FILES['foto']);
        if ($cek_upload['status']) {
            $foto = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=user';
            </script>";
            die;
        }
    }

    // Jika ID tersedia, lakukan update
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Gunakan foto lama jika tidak ada foto baru
        if (empty($foto)) {
            $foto = isset($_POST['foto_lama']) ? $_POST['foto_lama'] : '';
        } else {
            // Hapus foto lama jika ada foto baru
            if (isset($_POST['foto_lama']) && file_exists("assets/" . $_POST['foto_lama'])) {
                unlink("assets/" . $_POST['foto_lama']);
            }
        }

        // Query untuk update data
        $stmt = $conn->prepare("
            UPDATE user 
            SET 
                username = ?, 
                password = IFNULL(?, password), 
                foto = ? 
            WHERE id = ?
        ");
        $stmt->bind_param("sssi", $username, $password, $foto, $id);
    } else {
        // Jika tidak ada ID, lakukan insert data baru
        // Pastikan username dan password tidak kosong
        if ($password === null) {
            echo "<script>
                alert('Password tidak boleh kosong');
                document.location='admin.php?page=user';
            </script>";
            die;
        }

        $stmt = $conn->prepare("INSERT INTO user (username, password, foto) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $foto);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=user';
        </script>";
    }

    $stmt->close();
}

// Jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '') {
        // Hapus file gambar
        unlink("assets/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=user';
        </script>";
    }

    $stmt->close();
}
?>
