<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['demo', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Edit demo</h1>
</div>

<?= $this->getContent() ?>

<form action="../../demo/save" class="form-horizontal" method="post">
    <div class="form-group">
        <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['nombre', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombre']) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="fieldApellido" class="col-sm-2 control-label">Apellido</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['apellido', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldApellido']) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="fieldCel" class="col-sm-2 control-label">Cel</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['cel', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCel']) ?>
        </div>
    </div>


    <?= $this->tag->hiddenField(['id']) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Send', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
</form>