<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
?>
<!-- the head section -->
 <div class="edit-container">
<?php
include('includes/header.php');
?>
        <h1 class="edit-title">Edit Product</h1>
        <form class="edit-form" action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">
              
       <div class="form-group">
               <label for="formGroupExampleInput">Category ID:</label>
               <select class="form-control" id="exampleFormControlSelect2" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
       </div>

       <div class="form-group">
    <label for="formGroupExampleInput">Name:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                   value="<?php echo $records['name']; ?>">
       </div>

       <div class="form-group">
    <label for="formGroupExampleInput">List Price:</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" name="price"
                   value="<?php echo $records['price']; ?>">
       </div>

       <div class="form-group">
    <label for="formGroupExampleInput">Description:</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="description"
                   value="<?php echo $records['description']; ?>">
       </div>

       <div class="form-group">
       <label for="exampleFormControlSelect2">Shoe Size</label>
            <select class="form-control" id="exampleFormControlSelect2" name="sizes_in_stock"
                   value="<?php echo $records['sizes_in_stock']; ?>">
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
    <label for="formGroupExampleInput">Image:</label>
    <input type="file" name="image" accept="image/*" id="formGroupExampleInput2"  />
            <br>            
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            </div>
            
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-outline-primary" value="Save Changes">Save Changes</button>
            <br>
        </form>
        <p><a href="index.php"><button class="btn btn-outline-danger">View Homepage</button></a></p>
    <?php
include('includes/footer.php');
?>