<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/parigimoutong.png') ?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ."  ". ucfirst($this->uri->segment(2)) ?></title>

<!-- Bootstrap core CSS-->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">


<link href="<?php echo base_url('css/animate.css') ?>" rel="stylesheet">
<style type="text/css">
	.navbar.navbar-expand.navbar-dark.bg-info.static-top {
  box-shadow: 0px 1px 20px #2b7986;}
</style>

<script type="text/javascript">
      function cek_db(){
        var id = $("#id").val(); 
        $.ajax({
          url : '<?php echo base_url('tampil_data.php') ?>', // file proses penginputan
          data : "id="+id,
          dataType: 'json',
        }).success(function (data){
          var json = data,
          console.log(json); 
          obj = JSON.parse(json);
          $('#nama').val(obj.nama); 
 
        })
      }
</script>


</head>
