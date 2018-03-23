

{{--<link href="/css/dataTables/datatable.base.css" rel="stylesheet"/>--}}






<!-- Page-Level Scripts -->
<script>
    function getUrl(method) {
        var url = $(".nav-tabs .active > a").data(method);
        url = "/api/"+url;
        return url;

    }
    var dtable ="";
    function indexView(url) {

    }
    function   testfun(){
       // alert('hi');
        var tabValue = $(".nav-tabs .active > a").attr("href");
      //  alert(tabValue);

    }

    $(document).ready(function(){
        $('.toolba').text('Custom tool bar  etc');
        $('.data-table').each(function() {
           var table = this.id;
            var data = [];
            var columns = [];

            var url = '/api/'+table;
            $.get({url:url,dataType: 'json',   success:function(json, status){
                   // alert(JSON.stringify(json));
                    data = json.data;
                    // result['data'].push(json['data']);
                    //  alert(JSON.stringify(json.data));
                    for (var x in json.columns) {
                        columns.push(json.columns[x]);
                    }

                     dtable =   $('#'+table).DataTable({
                        // ajax:'/api/products',
                        data:data,
                        columns: columns,
                         sScrollY:"50vh",
                        /*  dom: '<"html5buttons"B>lTfgitp',*/
columnDefs:[{
    render: function(d){
        return moment(d).format("YYYY:MM:DD");
    },target:"updated_at"
},            {"targets":-1, "data":"index", "render": function(data,type,row,full,meta)
    {
        return    @component('partials.actionButton') @endcomponent
    }}
]


                    });
                 //   $('#container').css( 'display', 'block' );
                 //   dtable.columns.adjust().draw();

                    /*
                    <button class="btn btn-default dropdown-toggle btn-group-xs" type="button" data-toggle="dropdown" aria-expanded="false">
   <i class="glyphicon glyphicon-cog"></i>
   <span class="caret"></span>
  </button>
  */




                    dtable.on('order.dt search.dt', function () {

                        dtable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {

                            cell.innerHTML = i + 1;

                        });

                    }).draw();
                }});








        });



        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });



    });


    // Show a post
    $(document).on('click', '.show-modal', function() {
        //$('#categories_tab').hide();
        $('#submitForm').hide();
        var url = getUrl("show");


//$.fn.DataTable.isDataTable($('table#products').ajax.reload();

        $( "#modal-id" ).load( url,{action:null,id:$(this).data('id')} );

        $('#modal').modal('show');
    });
    $(document).on('click', '.edit-modal', function() {

        var url = getUrl("edit");
        $('.base-modal-Title').text('Edit');
        $( "#modal-id" ).load( url,{action:"edit",id:$(this).data('id')} );
        $('#submitForm').show();
        $('#modal').modal('show');
    });




</script>

<!-- AJAX CRUD operations -->
<script type="text/javascript">
    // add a new post
    $(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Add');
        $('#addModal').modal('show');
    });
    $('.modal-footer').on('click', '.add', function() {
        $.ajax({
            type: 'POST',
            url: 'posts',
            data: {
                '_token': $('input[name=_token]').val(),
                'title': $('#title_add').val(),
                'content': $('#content_add').val()
            }

        });
    });

    function refreshDatatable(table) {
       // var table = this.id;
       // var data = [];
        var columns = [];
        var url = '/api/'+table;
        $.get({url:url,dataType: 'json',   success:function(json, status) {
            //console.log(JSON.stringify(json.data));
                //alert(JSON.stringify(json));
               var data = json.data;
                // result['data'].push(json['data']);
                //  alert(JSON.stringify(json.data));
                for (var x in json.columns) {
                    columns.push(json.columns[x]);
                }

                $('#'+table).DataTable()
                    .clear()
                    .rows.add(data)
                    .draw();
                   // .clear();
              //  $('#products').DataTable().fnAddData(data);
            }});
//alert(JSON.stringify(data));
      //  return [data,columns];

    }


    </script>
<script>
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Delete');
        $('#id_delete').val($(this).data('id'));
        $('#title_delete').val($(this).data('title'));
        $('#deleteModal').modal('show');
        id = $('#id_delete').val();
    });
    $('.modal-footer').on('click', '.delete', function() {
var targettable = $(".nav-tabs .active > a").data("delete");

       var targeturl= '/'+ targettable +'/';
        $.ajax({
            type: 'DELETE',
            url: targeturl + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Successfully deleted Item!', 'Success Alert', {timeOut: 5000});
                refreshDatatable(targettable);

            }
        });
    });
</script>

