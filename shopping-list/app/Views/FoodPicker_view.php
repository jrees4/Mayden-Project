

 
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="food-nav">
        <a class="" >Fruit</a>
    </li>
    <li class="food-nav">
        <a class="" >Veg</a>
    </li>
    <li class="food-nav">
        <a class="" >Mushrooms</a>
    </li>
</ul>
            
<?php if (! empty($foods) && is_array($foods)): ?>
    <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($foods as $foods):?>
                <tr>
                    <td><label for="">aaa</label></td>
                </tr>
            <?php endforeach ?>
            </tbody>
    </table>

<?php else: ?>
    <h2>You don't have a basket yet!</h3>
    
    
<?php endif ?>

<a href="create">
    <button class="btn btn-primary mt-4">Add a food</button>
</a>