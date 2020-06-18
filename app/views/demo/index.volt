<div class="page-header">
    <h1>Search demo</h1>
    <p>{{ link_to("demo/new", "Create demo") }}</p>
</div>

{{ content() }}

{{ flash.output() }}

<form action="demo/search" class="form-horizontal" method="get">
    <div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>

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
            {{ submit_button('Search', 'class': 'btn btn-default') }}
        </div>
    </div>
</form>
