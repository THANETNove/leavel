<script>

//----------หน้าเเรก------//
  var urlPath = window.location.pathname;
  var strPath = urlPath.split("/");
  var pathName =  strPath[4];

$( "#".''.pathName ).addClass( "active" );
</script>