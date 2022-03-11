<?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
  // (B1) SEARCH FOR USERS
  require "search.php";
  if (count($results) > 0) { foreach ($results as $r) {
  }} else { echo "No results found"; }
}
  
?>
<div class="main-container">
<?php
include('includes/header.php');
?>
<h2>Search Results</h2>

<table class="table table-hover">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Name</th>
<th scope="col">Price</th>
<th scope="col">Description</th>
<th scope="col">Sizes</th>
</tr>
</thead>
<tr>
<td><img src="image_uploads/<?php echo $r['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $r['name']; ?></td>
<td class="right"><?php echo $r['price']; ?></td>
<td><?php echo $r['description']; ?></td>
<td class="right"><?php echo $r['sizes_in_stock']; ?></td>
  </tr>
  </table>

  <p><a href="index.php"><button class="btn btn-outline-primary">Home Page</button></a></p>
</div>
<?php
include('includes/footer.php');
?>