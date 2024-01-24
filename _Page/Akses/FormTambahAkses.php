<div class="row">
    <div class="col-md-6 mt-3">
        <label for="nama_akses">Nama Lengkap</label>
        <input type="text" name="nama_akses" id="nama_akses" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
        <label for="kontak_akses">Nomor Kontak</label>
        <input type="text" name="kontak_akses" id="kontak_akses" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="email_akses">Email</label>
        <input type="email" name="email_akses" id="email_akses" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
        <label for="akses">Akses</label>
        <select name="akses" id="akses" class="form-control">
            <option value="">Pilih</option>
            <?php
                include "../../_Config/Connection.php";
                //Jumlah Partner
                $Jumlah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_entitas"));
                if(!empty($Jumlah)){
                    //Array Data Mitra
                    $QryMitra = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses_entitas ORDER BY akses ASC");
                    while ($DataMitra = mysqli_fetch_array($QryMitra)) {
                        $akses= $DataMitra['akses'];
                        echo '<option value="'.$akses.'">'.$akses.'</option>';
                    }
                }else{
                    echo '<option value="">Tidak Ada Entitas Akses</option>';
                }
            ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="">Pilih..</option>
            <option value="Active">Active</option>
            <option value="Pending">Pending</option>
        </select>
    </div>
    <div class="col-md-6 mt-3">
        <label for="image_akses">Photo Profile</label>
        <input type="file" name="image_akses" id="image_akses" class="form-control">
        <small class="credit">Maximum File 2 Mb (PNG, JPG, JPEG, GIF)</small>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="password1">Password</label>
        <input type="password" name="password1" id="password1" class="form-control">
        <small class="credit">Password hanya boleh terdiri dari 6-20 karakter angka dan huruf</small>
    </div>
    <div class="col-md-6 mt-3">
        <label for="password2">Ulangi Password</label>
        <input type="password" name="password2" id="password2" class="form-control">
        <small class="credit">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword" name="TampilkanPassword">
                <label class="form-check-label" for="TampilkanPassword">
                    Tampilkan Password
                </label>
            </div>
        </small>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3" id="NotifikasiTambahAkses">
        <small class="text-primary">Pastkan data yang anda input sudah benar</small>
    </div>
</div>