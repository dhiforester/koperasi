<script>
    
</script>
<div class="card mt-5">
    <div class="card-header">
        <form action="javascript:void(0);" id="ProsesCariRiwayatTransaksi">
            <input type="hidden" name="id_barang" value="<?php echo "$id_barang"; ?>">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <b class="card-title">
                        <i class="bi bi-cart-check"></i> Riwayat Transaksi
                    </b>
                </div>
                <div class="col-md-1 mb-2">
                    <select name="batas" id="batas" class="form-control">
                        <option value="5">5</option>
                        <option selected value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                    </select>
                    <small>Data</small>
                </div>
                <dv class="col-md-3 mb-2">
                    <input type="date" name="periode1" id="periode1" class="form-control">
                    <small>Periode Awal</small>
                </dv>
                <dv class="col-md-3 mb-2">
                    <input type="date" name="periode2" id="periode2" class="form-control">
                    <small>Periode Akhir</small>
                </dv>
                <dv class="col-md-1 mb-2">
                    <button type="submit" class="btn btn-md btn-dark w-100" title="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </dv>
                <dv class="col-md-1 mb-2">
                    <button type="button" class="btn btn-md btn-success w-100" data-bs-toggle="modal" data-bs-target="#ModalExportRiwayatTransaksi" title="Export Riwayat">
                        <i class="bi bi-download"></i>
                    </button>
                </dv>
            </div>
        </form>
    </div>
    <div id="TampilkanRiwayatTransaksi">

    </div>
</div>