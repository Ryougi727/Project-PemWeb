</div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/classic/ckeditor.js"></script>

  

        <script>
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } = CKEDITOR;

            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    licenseKey: '',
                    plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>

  <!-- plugins:js -->
  <script src="<?= $mainUrl ?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- chart js -->
  <script src="js/chart.js"></script>

  <!--data table-->
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

  <script>
    let table = new DataTable('#mytable');
  </script>
</body>
</html>