<!--==================================================================================-->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
    });
</script>


<script type="text/javascript">

	function loadFormModul() {
        $('#modal-form-modul').modal('show');
        $('#modal-form-modul form')[0].reset();
        $('.modal-title').text('Form upload modul');
      }

      function loadFormLaporan() {
        $('#modal-form-laporan').modal('show');
        $('#modal-form-laporan form')[0].reset();
        $('.modal-title').text('Form upload laporan');
      }

      function loadFormSertifikat() {
        $('#modal-form-sertifikat').modal('show');
        $('#modal-form-sertifikat form')[0].reset();
        $('.modal-title').text('Form upload sertifikat');
      }

      function loadFormDiklat() {
        $('#modal-form-diklat').modal('show');
        $('#modal-form-diklat form')[0].reset();
        $('.modal-title').text('Form upload diklat');
      }

      function loadFormSubKtg() {
        $('#modal-form-sub-ktg').modal('show');
        $('#modal-form-sub-ktg form')[0].reset();
        $('.modal-title').text('Form upload sub kategori');
      }

</script>


    </body>
</html>