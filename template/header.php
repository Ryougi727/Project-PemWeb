<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= $mainUrl ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= $mainUrl ?>vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= $mainUrl ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= $mainUrl ?>images/auth/ilmi.jpg" />
  <!--ckeditor-->
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" />
  <!--data table-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">

  <style>
    .ck-editor__editable[role="textbox"]{
      min-height: 100px;
    }


  </style>
</head>
<body class="<?=$_SESSION ['ssRole'] == 2 ? 'sidebar-icon-only' : null ?>">
  <div class="container-scroller">