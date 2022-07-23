<!DOCTYPE html>
<html>
  <body>
<?php 
    include "nav.php";

?>
    <form method="post" action="controller/findProduct.php">
      <h2>SEARCH FOR PRODUCT</h2>
      <input type="text" name="p_name" />
      <input type="submit" name="findproduct" value="Search"/>
    </form>


 
  </body>
</html>