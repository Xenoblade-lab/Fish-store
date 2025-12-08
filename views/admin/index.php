<?php 
     $categories = new \Models\Categories();
?>
<h1>Ajouter un article</h1>

<form action="<?= Router\Router::route('product/create') ?>" method="post" enctype="multipart/form-data">
    <label for="product-name">Nom de l article</label>
    <input type="text" name="product" id="product-name">
    <label for="product-price">Prix de l article</label>
    <input type="text" name="price" id="product-price">
    <label for="product-description">Description de l article</label>
    <textarea name="describe" id="product-description"></textarea>
    <label for="product-category">Categorie de l article</label>
    <select name="category_id" id="product-category">
        <?php foreach($categories->all() as $category): ?>
            <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
        <?php endforeach; ?>
    </select>
    <label for="product-image">Image de l article</label>
    <input type="file" name="image" id="product-image">
</form>

<h1>Ajouter une categorie</h1>

<form action="<?= Router\Router::route('category/create') ?>" method="post">
      <label for="#">Catagorie</label>
      <input type="text" name="category">
      <button type="submit">Ajouter</button>
</form>