<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("demo", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Create demo</h1>
</div>

{{ content() }}

<form action="../demo/create" class="form-horizontal" method="post">
    <div class="form-group">
        <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre") }}
        </div>
    </div>

    <div class="form-group">
        <label for="fieldApellido" class="col-sm-2 control-label">Apellido</label>
        <div class="col-sm-10">
            {{ text_field("apellido", "size" : 30, "class" : "form-control", "id" : "fieldApellido") }}
        </div>
    </div>

    <div class="form-group">
        <label for="fieldCel" class="col-sm-2 control-label">Cel</label>
        <div class="col-sm-10">
            {{ text_field("cel", "size" : 30, "class" : "form-control", "id" : "fieldCel") }}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Save', 'class': 'btn btn-default') }}
        </div>
    </div>
</form>