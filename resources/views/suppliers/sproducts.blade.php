
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
<div class="container">
       <form class="form-inline" action="javascript:goBack()">
           <div class="col-md-1 col-sm-1 col-xs-1 form-group">
               <button style="font-size:16px"> <i class="fa fa-angle-double-left"></i></button>
          </div>

        <div class="col-md-3 col-sm-3 col-xs-12 form-group">
            <input id="supplier_id" type="hidden"  value="test">
            <label for="category">Category:</label>
            {!! Form::select('category', $category_id,null,array('placeholder' => '','class' => 'form-control select2 ','style' =>'width:100%')) !!}
        </div>
        <div id='multiWrapper' class="col-md-6 col-sm-6 col-xs-12 input-group">
            <label for="multi">Product:</label>
            {!! Form::select('multi', [],null,array('id'=>'multi','data-allow-clear' => true,'multiple'=>"multiple",'class' => 'select2 ','style' =>'width:100%')) !!}

        </div>
           <span col-md-1 col-sm-1 col-xs-1>
                <button id="addproducts" class="btn btn-default" type="button">Add</button>
            </span>
           <span col-md-1 col-sm-1 col-xs-1>
                <button id="saveproducts" class="btn btn-info" type="button">Save</button>
            </span>

    </form>
</div><hr />

<table id="example2" class=" table-striped table-bordered table-hover display nowrap compact" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>id</th>
        <th>Product</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Brand</th>
        <th>Model</th>
        <th></th>

    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<style>
    .my-group .form-control{
        width:50%;
    }

    .def-cursor {
        cursor: default;
    }
    .select2-container {
        width: 80% !important;
    }

    .select2-container .select-all {
        position: absolute;
        top: 6px;
        right: 4px;
        width: 20px;
        height: 20px;
        margin: auto;
        display: block;
        background: url('data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDc0LjggNDc0LjgwMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc0LjggNDc0LjgwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zOTYuMjgzLDI1Ny4wOTdjLTEuMTQtMC41NzUtMi4yODItMC44NjItMy40MzMtMC44NjJjLTIuNDc4LDAtNC42NjEsMC45NTEtNi41NjMsMi44NTdsLTE4LjI3NCwxOC4yNzEgICAgYy0xLjcwOCwxLjcxNS0yLjU2NiwzLjgwNi0yLjU2Niw2LjI4M3Y3Mi41MTNjMCwxMi41NjUtNC40NjMsMjMuMzE0LTEzLjQxNSwzMi4yNjRjLTguOTQ1LDguOTQ1LTE5LjcwMSwxMy40MTgtMzIuMjY0LDEzLjQxOCAgICBIODIuMjI2Yy0xMi41NjQsMC0yMy4zMTktNC40NzMtMzIuMjY0LTEzLjQxOGMtOC45NDctOC45NDktMTMuNDE4LTE5LjY5OC0xMy40MTgtMzIuMjY0VjExOC42MjIgICAgYzAtMTIuNTYyLDQuNDcxLTIzLjMxNiwxMy40MTgtMzIuMjY0YzguOTQ1LTguOTQ2LDE5LjctMTMuNDE4LDMyLjI2NC0xMy40MThIMzE5Ljc3YzQuMTg4LDAsOC40NywwLjU3MSwxMi44NDcsMS43MTQgICAgYzEuMTQzLDAuMzc4LDEuOTk5LDAuNTcxLDIuNTYzLDAuNTcxYzIuNDc4LDAsNC42NjgtMC45NDksNi41Ny0yLjg1MmwxMy45OS0xMy45OWMyLjI4Mi0yLjI4MSwzLjE0Mi01LjA0MywyLjU2Ni04LjI3NiAgICBjLTAuNTcxLTMuMDQ2LTIuMjg2LTUuMjM2LTUuMTQxLTYuNTY3Yy0xMC4yNzItNC43NTItMjEuNDEyLTcuMTM5LTMzLjQwMy03LjEzOUg4Mi4yMjZjLTIyLjY1LDAtNDIuMDE4LDguMDQyLTU4LjEwMiwyNC4xMjYgICAgQzguMDQyLDc2LjYxMywwLDk1Ljk3OCwwLDExOC42Mjl2MjM3LjU0M2MwLDIyLjY0Nyw4LjA0Miw0Mi4wMTQsMjQuMTI1LDU4LjA5OGMxNi4wODQsMTYuMDg4LDM1LjQ1MiwyNC4xMyw1OC4xMDIsMjQuMTNoMjM3LjU0MSAgICBjMjIuNjQ3LDAsNDIuMDE3LTguMDQyLDU4LjEwMS0yNC4xM2MxNi4wODUtMTYuMDg0LDI0LjEzNC0zNS40NSwyNC4xMzQtNTguMDk4di05MC43OTcgICAgQzQwMi4wMDEsMjYxLjM4MSw0MDAuMDg4LDI1OC42MjMsMzk2LjI4MywyNTcuMDk3eiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik00NjcuOTUsOTMuMjE2bC0zMS40MDktMzEuNDA5Yy00LjU2OC00LjU2Ny05Ljk5Ni02Ljg1MS0xNi4yNzktNi44NTFjLTYuMjc1LDAtMTEuNzA3LDIuMjg0LTE2LjI3MSw2Ljg1MSAgICBMMjE5LjI2NSwyNDYuNTMybC03NS4wODQtNzUuMDg5Yy00LjU2OS00LjU3LTkuOTk1LTYuODUxLTE2LjI3NC02Ljg1MWMtNi4yOCwwLTExLjcwNCwyLjI4MS0xNi4yNzQsNi44NTFsLTMxLjQwNSwzMS40MDUgICAgYy00LjU2OCw0LjU2OC02Ljg1NCw5Ljk5NC02Ljg1NCwxNi4yNzdjMCw2LjI4LDIuMjg2LDExLjcwNCw2Ljg1NCwxNi4yNzRsMTIyLjc2NywxMjIuNzY3YzQuNTY5LDQuNTcxLDkuOTk1LDYuODUxLDE2LjI3NCw2Ljg1MSAgICBjNi4yNzksMCwxMS43MDQtMi4yNzksMTYuMjc0LTYuODUxbDIzMi40MDQtMjMyLjQwM2M0LjU2NS00LjU2Nyw2Ljg1NC05Ljk5NCw2Ljg1NC0xNi4yNzRTNDcyLjUxOCw5Ny43ODMsNDY3Ljk1LDkzLjIxNnoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K') no-repeat center;
        background-size: contain;
        cursor: pointer;
        z-index: 999999;
    }
</style>
<script>
 var sptable;
function goBack() {

    $("[name='category']").val(null).trigger('change');
    var table = $('#example2').DataTable();

    table
        .clear()
        .draw();

    $('#sproducts_tab').hide();
    $('#suppliers_tab').show();
    activaTab('supplier');

}

    function selectAllSelect2(that) {

        var selectAll = true;
        var existUnselected = false;
        var id = that.parents("span[class*='select2-container']").siblings('select[multiple]').attr('id');
        var item = $("#" + id);

        item.find("option").each(function (k, v) {
            if (!$(v).prop('selected')) {
                existUnselected = true;
                return false;
            }
        });

        selectAll = existUnselected ? selectAll : !selectAll;

        item.find("option").prop('selected', selectAll).trigger('change');
    }

    function formatResultMulti(data) {
      //  console.log(JSON.stringify(data));
        var model = $(data.element).data('model');

        var brand = $(data.element).data('brand');
        var classAttr = $(data.element).attr('class');
        var hasClass = typeof classAttr != 'undefined';
        classAttr = hasClass ? ' ' + classAttr : '';

        var $result = $(
            '<div class="row">' +
            '<div class="col-md-4 col-xs-4' + classAttr + '">' + data.text + '</div>' +
            '<div class="col-md-4 col-xs-4' + classAttr + '">' + model + '</div>' +
            '<div class="col-md-4 col-xs-4' + classAttr + '">' + brand + '</div>' +
            '</div>'
        );
        return $result;
    }
function buildProducts(data,id) {
    auxArr = [];

    $.each(data, function(i, option)
    {
        //alert(option.model);
        auxArr[i] = '<option data-model=' + (option.model == null ? "-" : option.model) + ' data-brand=' + (option.brand == null ? "-" : option.brand["brand"])+ ' value=' + option.id + '>' + option.name + '</option>';

    });
    id.append("<optgroup class='def-cursor' label='Product' data-brand='Brand' data-model='Model'>");
    id.append(auxArr.join(''));
    id.append("</optgroup>") ;

}

    $(document).ready(function () {




         sptable = $('#example2').DataTable({
            pageLength: 25,
            buttons:[],
            dom: "trlip"

        });





        var products = $('#multi');
        var categories = $("[name='category']");
        var modl = {!! $sproducts->toJson() !!};
        categories.select2({
            width: '100%',
            placeholder: 'select Category'

        });
        categories.val(null).trigger('change');

        products.select2({
            width: '100%',
            placeholder: 'select product',
            templateResult: formatResultMulti
        });

        categories.on("change", function (e) {
            var x = categories.val();

           var numbers = $.grep(modl, function(v)  // filter array based on function
            {
                return(v.sub_category_id == x);
            });
            products.empty();
            buildProducts(numbers,products);
            products.val(null).trigger('change');
/*            $('.select2').select2({
                placeholder: ' '
            });*/

            $('.select2[multiple]').siblings('.select2-container').append('<span class="select-all"></span>');

            $(document).on('click', '.select-all', function (e) {
                selectAllSelect2($(this).siblings('.selection').find('.select2-search__field'));
            });
        });

        $(document).on("click","#addproducts",function() {
            var z = products.val();
            //console.log(JSON.stringify(z));
            var numbers = $.grep(modl, function(v)  // filter array based on function
            {
                return( $.inArray(v.id.toString(),z)>=0 );
            });
           // console.log(JSON.stringify(numbers));
            var rowData = sptable.column(0).data();
            numbers.forEach(function(prod) {
                //console.log(JSON.stringify(prod));
               var brnd = (prod.brand == null ? null : prod.brand["brand"])
                //console.log(prod.name);
                if($.inArray(prod.id,rowData)<0) {
                    sptable.row.add([
                        prod.id,
                        prod.name,
                        prod.sub_category['category']['name'],
                        prod.sub_category['name'],
                        brnd,
                        prod.model,
                        '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'+prod.id+ '">Delete</button>'

                    ]);
                }
            });
            sptable.draw(  );
            var dataArr = [];

            $.each($(rowData),function(key,value){
                dataArr.push(value); //"name" being the value of your first column.
            });
            console.log(JSON.stringify(dataArr));
       /* <th>id</th>
            <th>Product</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Brand</th>
            <th>Model</th>*/


        });

        $(document).on("click","#saveproducts",function() {
            var currentproducts = [];
            var id = $('#supplier_id').val();
            var columndata = sptable.column(0).data();
            $.each($(columndata),function(key,value){
                currentproducts.push(value); //"name" being the value of your first column.
            });
/*            if(jQuery.isEmptyObject(currentproducts))
            {
                return;
            }*/
          //  alert(id);
            $.post('/api/suppliers/'+id + '/products',
            {
                products: currentproducts,
                    id: id
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
           // console.log(JSON.stringify(dataArr));

        });

        var myTable = $('#example2').DataTable();

        $('#example2 tbody').on( 'click', 'button', function () {

            myTable.row( $(this).parents('tr')  ).remove().draw();
        } );

    });
</script>

</script>