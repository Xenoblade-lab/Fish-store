<div class="stats">
     <div class="stat">
        <h1>Utilisateurs</h1>
        <p><?= count($users->all()) ?></p>
     </div>
     <div class="stat">
        <h1>Produits</h1>
        <p><?= count($products->all()) ?></p>
     </div>
     <div class="stat">
        <h1>Catégories</h1>
        <p><?= count($categories->all()) ?></p>
     </div>
</div>
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
    <button type="submit">Ajouter</button>
</form>

<h1>Ajouter une categorie</h1>

<form action="<?= Router\Router::route('category/create') ?>" method="post">
      <label for="#">Catagorie</label>
      <input type="text" name="category">
      <button type="submit">Ajouter</button>
</form>

<h1>Utilisateurs</h1>
 <table>
    <thead>
        <tr>Id</tr>
        <tr>Noms</tr>
        <tr>Email</tr>
        <tr>Role</tr>
        <tr>Action</tr>
    </thead>
    <tbody>
     <?php foreach($users->all() as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->role ?></td>
            <td>
                <button>-</button>
                <button>+</button>
            </td>
        </tr>
     <?php endforeach?>
    </tbody>

 </table>

  <div class="container">
            <h1 class="page-title">Ajouter un utilisateur</h1>

            <div class="contact-form" style="max-width: 500px; margin: 0 auto;">
                <form action="<?= Router\Router::route('register') ?>" method="post">
                    
                    <div class="form-group">
                        <label for="nom">Nom complet</label>
                        <input type="text" id="nom" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmer le mot de passe de l utilisateur à  Ajouter</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Ajouter</button>
                </form>
             
            </div>
        </div>

<h1>Produits</h1>
<table>
    <thead>
        <tr>Id</tr>
        <tr>Noms</tr>
        <tr>Prix</tr>
        <tr>Description</tr>
        <tr>Categorie</tr>
        <tr>Image</tr>
        <tr>Featured</tr>
        <tr>Action</tr>
    </thead>
    <tbody>
     <?php foreach($products->all() as $product): ?>
        <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
            <td><?= $product->description ?></td>
            <td><?= $product->category_name ?></td>
            <td><?= $product->image ?></td>
            <td><?= $product->featured ?></td>
            <td>
                <button>-</button>
                <button>+</button>
            </td>
        </tr>
     <?php endforeach?>
    </tbody>
</table>

<h1>Categories</h1>
<table>
    <thead>
        <tr>Id</tr>
        <tr>Noms</tr>
        <tr>Action</tr>
    </thead>
    <tbody>
     <?php foreach($categories->all() as $category): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->category_name ?></td>
            <td>
                <form action="<?= Router\Router::route('category/'.$category->id.'/delete') ?>" method="post">
                    <button type="submit">-</button>
                </form>
                <button>
                    <a href="<?= Router\Router::route('category/'.$category->id.'/edit') ?>">+</a>
                </button>
            </td>
        </tr>
     <?php endforeach?>
    </tbody>
</table>