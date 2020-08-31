<div class="page-header">
    <h1>
        Search kategori
    </h1>
    <p>
        {{ link_to("kategori/new", "Create kategori") }}
    </p>
</div>

{{ content() }}

{{ form("kategori/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

{#<div class="form-group">#}
{#    <label for="fieldId" class="col-sm-2 control-label">Id</label>#}
{#    <div class="col-sm-10">#}
{#        {{ text_field("id", "size" : 30, "class" : "form-control", "id" : "fieldId") }}#}
{#    </div>#}
{#</div>#}

<div class="form-group">
    <label for="fieldNama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
        {{ text_field("nama", "size" : 30, "class" : "form-control", "id" : "fieldNama") }}
    </div>
</div>

{#<div class="form-group">#}
{#    <label for="fieldCreatedAt" class="col-sm-2 control-label">Created</label>#}
{#    <div class="col-sm-10">#}
{#        {{ text_field("created_at", "size" : 30, "class" : "form-control", "id" : "fieldCreatedAt") }}#}
{#    </div>#}
{#</div>#}

{#<div class="form-group">#}
{#    <label for="fieldModifiedAt" class="col-sm-2 control-label">Modified</label>#}
{#    <div class="col-sm-10">#}
{#        {{ text_field("modified_at", "size" : 30, "class" : "form-control", "id" : "fieldModifiedAt") }}#}
{#    </div>#}
{#</div>#}

{#<div class="form-group">#}
{#    <label for="fieldIsDeleted" class="col-sm-2 control-label">Is Of Deleted</label>#}
{#    <div class="col-sm-10">#}
{#        {{ text_field("is_deleted", "type" : "numeric", "class" : "form-control", "id" : "fieldIsDeleted") }}#}
{#    </div>#}
{#</div>#}

{#<div class="form-group">#}
{#    <label for="fieldDeletedAt" class="col-sm-2 control-label">Deleted</label>#}
{#    <div class="col-sm-10">#}
{#        {{ text_field("deleted_at", "size" : 30, "class" : "form-control", "id" : "fieldDeletedAt") }}#}
{#    </div>#}
{#</div>#}


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
