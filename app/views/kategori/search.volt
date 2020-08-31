<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("kategori/index", "Go Back") }}</li>
            <li class="next">{{ link_to("kategori/new", "Create ") }}</li>
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
            <th>Nama</th>
            <th>Created</th>
            <th>Modified</th>
{#            <th>Is Of Deleted</th>#}
{#            <th>Deleted</th>#}

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for kategori in page.items %}
            <tr>
                <td>{{ kategori.id }}</td>
            <td>{{ kategori.nama }}</td>
            <td>{{ kategori.created_at }}</td>
            <td>{{ kategori.modified_at }}</td>
{#            <td>{{ kategori.is_deleted }}</td>#}
{#            <td>{{ kategori.deleted_at }}</td>#}

                <td>{{ link_to("kategori/edit/"~kategori.id, "Edit") }}</td>
                <td>{{ link_to("kategori/delete/"~kategori.id, "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("kategori/search", "First") }}</li>
                <li>{{ link_to("kategori/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("kategori/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("kategori/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
