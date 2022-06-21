<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="create" method="post">
    <?= csrf_field() ?>

    <div class="mt-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" type="input" name="name" />
    </div>

    <div class="mt-3">
        <label class="form-label" for="cost">Cost</label>
        <input class="form-control" type="number" name="cost" />
    </div>

    <div class="mt-3">
        <label class="form-label" for="pages">Description</label>
        <input class="form-control" type="input" name="description" />
    </div>

    <input class="btn btn-success mt-4" type="submit" name="submit" value="Add Food" />
</form>