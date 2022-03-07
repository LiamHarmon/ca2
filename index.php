<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();


?>
<div class="main-container">
<?php
include('includes/header.php');
?>



<aside>
<!-- display a list of categories -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shoes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach ($categories as $category) : ?>
      <a class="dropdown-item" href=".?category_id=<?php echo $category['categoryID']; ?>"><?php  echo $category['categoryName']; ?></a>
      <?php endforeach; ?>
</div>
</li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="category_list.php">Manage Catagorie</a>
          <a class="dropdown-item" href="add_record_form.php">Add Record</a>
          
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="form.php">
      <input class="form-control mr-sm-2" type="text" name="search" required>
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
    </form>
  </div>
</nav>         
</aside>
<section>
<!-- display a table of records -->
<h2><?php echo $category_name; ?></h2>
<div class="table-responive-sm">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Name</th>
<th scope="col">Price</th>
<th scope="col">Description</th>
<th scope="col">Sizes</th>
<th scope="col">Delete</th>
<th scope="col">Edit</th>
</tr>
</thead>
</div>
<?php foreach ($records as $record) : ?>
<tr>
<td><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $record['name']; ?></td>
<td class="right"><?php echo $record['price']; ?></td>
<td><?php echo $record['description']; ?></td>
<td class="right"><?php echo $record['sizes_in_stock']; ?></td>
<td><form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<button type="submit" class="btn btn-outline-danger" value="Delete">Delete</button>
</form></td>
<td><form action="edit_record_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<button type="submit" class="btn btn-outline-primary" value="Edit">Edit</button>
</form></td>
</tr>
<?php endforeach; ?>
</table>
<a href="add_record_form.php"><button class="btn btn-outline-primary">Add Record</button></a>
<p></p>
<a href="category_list.php"><button class="btn btn-outline-primary">Manage Categories</button></a>
<p></p>
</section>
<?php
include('includes/footer.php');
?>