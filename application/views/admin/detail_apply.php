<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Detail Rekomendasi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Prediksi Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reco as $nama_company => $apply_rating) : ?>
                            <tr>
                                <td><?= $nama_company ?></td>
                                <td><?= $apply_rating ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>