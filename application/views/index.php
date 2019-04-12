<!DOCTYPE html>
<html>
<head>
	<title>Biodata</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dataTable/DataTables-1.10.18/css/dataTables.bootstrap4.css">

</head>
<body>

    <div class="container"><br>
        <h1 class="text-center">Biodata Siswa</h1>

        <hr>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAdd">
          Tambah
      </button>
      <table id="table" class="table table-bordered table-stripped table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Rayon</th>
                <th>Rombel</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th width="20%;">Nama</th>
                <th>Alamat</th>
                <th>Rayon</th>
                <th>Rombel</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table><br><br>
</div>






<!-- MODAL ADD-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>

  <div class="modal-body">
    <form method="POST">
      <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control">
      </div>
      <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control">
      </div>
      <div class="form-group">
          <label for="rayon">Rayon</label>
          <select name="rayon" id="rayon" class="form-control">
              <option disabled selected class="text-center">--Pilih Rayon--</option>
              <option value="Cluwak">Cluwak</option>
              <option value="Wikrama">Wikrama</option>
              <option value="Keling">Keling</option>
              <option value="Kelet">Kelet</option>
              <option value="Tunahan">Cluwak</option>
              <option value="Banyumanis">Banyumanis</option>
              <option value="Blingoh">Blingoh</option>
          </select>
      </div>
      <div class="form-group">
          <label for="rombel">Rombel</label>
          <select id="rombel" class="form-control" name="rombel">
              <option disabled selected>--Pilih Rombel--</option>
              <option value="X-RPL 1">X-RPL 1</option>
              <option value="X-RPL 2">X-RPL 2</option>
              <option value="X-TKJ">X-TKJ</option>
              <option value="XI-RPL">XI-RPL</option>
              <option value="XI-TKJ">XI-TKJ</option>
              <option value="XII-RPL">XII-RPL</option>
              <option value="XII-TKJ 1">XII-TKJ 1</option>
              <option value="XII-TKJ 1">XII-TKJ 1</option>
          </select>
      </div>
      <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control">
              <option disabled selected>--Pilih Jurusan--</option>
              <option>Rekayasa Perangkat Lunak</option>
              <option>Teknik Komputer dan Jaringan</option>
          </select>
      </div>
  </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="simpan">Save changes</button>
</div>
</div>
</div>
</div>
<!-- END MODAL ADD -->





<!-- Modal  Hapus-->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hapus_id" id="hapus_id">
    <p>Apakah Anda Yakin Ingin Mengapus data ini ?  </p>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-danger btn-delete" id="hapus_biodata">Hapus</button>

</div>
</div>
</div>
</div>

<!-- END MODAL HAPUS -->




<!-- Modal  edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" id="formEdit">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" class="form-control idkat">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="namaUpdate" class="form-control namaUpdate">
                </div>
                <div class="form-group">
                    <label for="alamatUpdate">Alamat</label>
                    <input type="text" name="alamatUpdate" id="alamatUpdate" class="form-control alamatUpdate">
                </div>
                <div class="form-group">
                    <label for="rayonUpdate">Rayon</label>
                    <select name="rayonUpdate" id="rayonUpdate" class="form-control">
                        <option disabled selected class="text-center">--Pilih Rayon--</option>
                        <option value="Cluwak">Cluwak</option>
                        <option value="Wikrama">Wikrama</option>
                        <option value="Keling">Keling</option>
                        <option value="Kelet">Kelet</option>
                        <option value="Tunahan">Cluwak</option>
                        <option value="Banyumanis">Banyumanis</option>
                        <option value="Blingoh">Blingoh</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rombelUpdate">Rombel</label>
                    <select id="rombelUpdate" class="form-control" name="rombelUpdate">
                        <option disabled selected>--Pilih Rombel--</option>
                        <option value="X-RPL 1">X-RPL 1</option>
                        <option value="X-RPL 2">X-RPL 2</option>
                        <option value="X-TKJ">X-TKJ</option>
                        <option value="XI-RPL">XI-RPL</option>
                        <option value="XI-TKJ">XI-TKJ</option>
                        <option value="XII-RPL">XII-RPL</option>
                        <option value="XII-TKJ 1">XII-TKJ 1</option>
                        <option value="XII-TKJ 1">XII-TKJ 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusanUpdate">Jurusan</label>
                    <select name="jurusanUpdate" id="jurusanUpdate" class="form-control">
                        <option disabled selected>--Pilih Jurusan--</option>
                        <option>Rekayasa Perangkat Lunak</option>
                        <option>Teknik Komputer dan Jaringan</option>
                    </select>
                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-update" id="update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- End Modal Edit -->














<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/swal/sweetalert2.all.min.js"></script>
<script type="text/javascript">
 var table;
 $(document).ready(function(){  
    var table = $('#table').DataTable({  
       "processing":true,  
       "serverSide":true,  
       "order":[],  
       "ajax":{  
        url:"<?php echo base_url() .'user/datauser'; ?>",  
        type:"POST"  
    },  
        "columnDefs":[  
        {  
            "targets":[0, 3, 4, 5],  // sesuaikan order table dengan jumlah column
            "orderable":true,  
            },  
        ],  
    }); 

    setInterval(function(){
        table.ajax.reload();
    }, 30000);

    $('#simpan').click(function(){
        $.ajax({
            url: "<?php echo base_url('User/insert'); ?>",
            method:"POST",
            data:{
                nama : $('#nama').val(),
                alamat : $('#alamat').val(),
                rayon : $('#rayon').val(),
                rombel : $('#rombel').val(),
                jurusan : $('#jurusan').val()
            },
            success:function(data){
                if(data=="berhasil"){
                    Swal.fire({
                        title: 'Done!',
                        text: 'Data Berhasil Ditambah!',
                        type: 'success'
                    });
                }else{
                    Swal.fire({
                        title: 'Error!',
                        text: 'Data Gagal Ditambah!',
                        type: 'error'
                    });
                }
                $('#modalAdd').modal('hide');
                table.ajax.reload();
                $('#nama').val('');
                $('#alamat').val('');
                $('#rayon').val('');
                $('#rombel').val('');
                $('#jurusan').val('');
            }
        });
    });
    $(document).on('click','#tmb-hapus',function(){
        $('#modalHapus').modal('show');
        var id = $(this).data('kode');
        $('#hapus_id').val(id);
    });

    $(document).on('click','.btn-delete', function(){
        $.ajax({
            url : '<?php echo base_url() ?>user/delete',
            method : 'POST',
            data: {
              id : $('#hapus_id').val()
        },
        success:function(response){
                if(response=="berhasil"){
                    Swal.fire({
                        title: 'Done!',
                        text: 'Data Berhasil Dihapus!',
                        type: 'success'
                    });
                }else{
                    Swal.fire({
                      title: 'Error!',
                      text: 'Data Gagal Dihapus!',
                      type: 'error'
                    });
            }
            $('#modalHapus').modal('hide');
            table.ajax.reload();
            }
        });
    });


    $(document).on('click', '.tmb-edit',function(){
        var id = $(this).data('kode');
        $('#id').val(id); 
        $.ajax({
            url : '<?php echo site_url('User/biodataById'); ?>',
            method : 'POST',
            data : {
                id : id
            },
            success:function(hasil){
                var json_data = JSON.parse(hasil);
                $('#namaUpdate').val(json_data.nama);
                $('#alamatUpdate').val(json_data.alamat);
                $('#rayonUpdate').val(json_data.rayon)
                $('#rombelUpdate').val(json_data.rombel)
                $('#jurusanUpdate').val(json_data.jurusan)
                $('#modalEdit').modal('show');
            }
        })
    });

    $(document).on('click', '#update', function(){
        $.ajax({
            url : '<?php echo site_url() ?>User/update',
            method : 'POST',
            data : {
                id : $('#id').val(),
                nama : $('#namaUpdate').val(),
                alamat : $('#alamatUpdate').val(),
                rayon : $('#rayonUpdate').val(),
                rombel : $('#rombelUpdate').val(),
                jurusan : $('#jurusanUpdate').val()
            },
            success: function(response){
                if(response=="berhasil"){
                    Swal.fire({
                        title: 'Done!',
                        text: 'Data Berhasil Diedit!',
                        type: 'success'
                    });
                }else{
                    Swal.fire({
                        title: 'Error!',
                        text: 'Data Gagal Diedit!',
                        type: 'error'
                    });
                }
                $('#modalEdit').modal('hide');
                table.ajax.reload();
            }
        });
    });
});  
</script>

</body>
</html>


































