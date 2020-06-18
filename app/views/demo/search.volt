<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("demo/index", "Go Back") }}</li>
            <li class="next">{{ link_to("demo/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cel</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% for demo in page.getItems() %}
            <tr>
                <td>{{ demo['id'] }}</td>
            <td>{{ demo['nombre'] }}</td>
            <td>{{ demo['apellido'] }}</td>
            <td>{{ demo['cel'] }}</td>

                <td>{{ link_to("demo/edit/"~demo['id'], "Edit") }}</td>
                <td>{{ link_to("demo/delete/"~demo['id'], "Delete") }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.getCurrent()~"/"~page.getTotalItems() }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("demo/search", "First", false, "class": "page-link", 'id': 'first') }}</li>
                <li>{{ link_to("demo/search?page="~page.getPrevious(), "Previous", false, "class": "page-link", 'id': 'previous') }}</li>
                <li>{{ link_to("demo/search?page="~page.getNext(), "Next", false, "class": "page-link", 'id': 'next') }}</li>
                <li>{{ link_to("demo/search?page="~page.getLast(), "Last", false, "class": "page-link", 'id': 'last') }}</li>
            </ul>
        </nav>
    </div>
</div>
