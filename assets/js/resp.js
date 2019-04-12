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
        table.reload();
      }
    });
  });  

});  