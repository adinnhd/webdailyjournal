<?php

$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);


$jumlah_article = $hasil1->num_rows;

$sql2 = "SELECT * FROM gallery";
$hasil2 = $conn->query($sql2);

$jumlah_gallery = $hasil2->num_rows;

$sql3 = "SELECT * FROM user";
$hasil3 = $conn->query($sql3);

$jumlah_user = $hasil3->num_rows;


?>
<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4" style="height: 670px;">
    <div class="col">
        <div class="card border border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card border border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card border border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-person"></i> User</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_user; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>