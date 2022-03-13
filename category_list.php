<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="category-container">
<?php
include('includes/header.php');
?>
<div class="category-form">
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">

        <label for="formGroupExampleInput2">Name:</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="name">
        <input id="add_category_button" class="btn btn-outline-primary" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php"><button class="btn btn-outline-danger">Cancel</button></a></p>
        </div>
    <?php
include('includes/footer.php');
?>
</div>