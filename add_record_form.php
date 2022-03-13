<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="add-container">
<?php
include('includes/header.php');
?>
        <h1 class="add-title">Add Record</h1>
        <form class="add-form" action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form" >

              <div class="form-group">
            <label for="exampleFormControlSelect2">Category:</label>
            <select class="form-control" id="exampleFormControlSelect2" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            </div>
<div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="name" id="name" class="form-control" id="formGroupExampleInput" placeholder="Name" onBlur="productName_validation();" /><span id="name_err"></span>
  </div>

            
  <div class="form-group">
    <label for="formGroupExampleInput2">Price</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Price">
  </div>
            
  <div class="form-group">
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" name="description" id="description" class="form-control" id="formGroupExampleInput2" placeholder="Description" onBlur="productDescription_validation();" /><span id="desc_err"></span>
  </div>

            <div class="form-group">
            <label for="exampleFormControlSelect2">Shoe Size</label>
            <select class="form-control" id="exampleFormControlSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            </select>
            </div>
            
            <div class="form-group">
            <label for="formGroupExampleInput2">Image</label>
            <input type="file" name="image" accept="image/*" id="formGroupExampleInput2" />
            </div>
            
            <div class="form-group">
            <label>&nbsp;</label>
            <button class="btn btn-outline-primary" type="submit" value="Add Record">Add Record</button>
            </div>
        </form>
        <a href="index.php"> <button class="btn btn-outline-danger">Cancel</button></a>
    <?php
include('includes/footer.php');
?>