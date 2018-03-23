<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
{{--<script src="https://cdn.datatables.net/scroller/1.4.4/js/dataTables.scroller.min.js"></script>--}}

<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>


<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/scroller/1.4.4/css/scroller.bootstrap.min.css" rel="stylesheet"/>

<link href="https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css"/>

{{--<script src="/js/dataTables/ColReorderWithResize.js"></script>--}}
<style>

</style>

<script>
            @if(Session::has('message'))

    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    window._token = '{{ csrf_token() }}';

</script>

<script>
   var datatable = $.extend(true, $.fn.dataTable.defaults, {
        language: {
            "url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
        },
        pageLength: 25,
        responsive: true,
/*       scrollY:    '50vh',
       scrollCollapse: true,*/
        dom: "R<'row'<'col-sm-4'B><'col-sm-8'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'li><'col-sm-6'p>>",
        renderer: 'bootstrap',

        buttons: [
            {
                extend: 'collection',
                background:true,

                //  text: 'Export',
                text:' <a class="glyphicon glyphicon-export dropdown-toggle  float-left mb-10 p-0"  data-toggle="dropdown" data-toggle="tooltip" title="Export"  style="font-size: .8em" ></a><span class="caret"></span>',
                /*'<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export' +
                '  <a class="glyphicon glyphicon-export dropdown-toggle"  data-toggle="dropdown"  style="font-size:10px;"></a><span class="caret"></span></button>',
*/
                buttons: [

                    {
                        extend: 'copy',
                        text: '<div class="fa fa-files-o" style="color:orange;font-size: 1.1em">&emsp;Copy</div>',
                        titleAttr: 'Copy to Clipboard',
                        //  title: 'Efficax Export'
                    },
                    {
                        extend: 'excel',
                        text: '<a class="fa fa-file-text-o" style="color:green;font-size: 1.1em;">&emsp;Excel</a>',
                        titleAttr: 'Excel',
                        //title: 'Efficax Export',

                    },
                    {
                        extend: 'csv',
                        text: '<div class="fa fa-file-text-o" style="color:blue;font-size: 1.1em"> &emsp;CSV</div>',
                        titleAttr: 'CSV',
                        // title: 'Efficax Export'
                    },
                    {
                        extend: 'pdf',
                        text: '<div class="fa fa-file-pdf-o" style="color:brown;font-size: 1.1em">&emsp;PDF</div>',
                        titleAttr: 'PDF',
                        // title: 'Efficax Export'
                    },
                    {
                        extend: 'print',
                        text: '<div class="fa fa-print" style="color:black;font-size: 1.1em">&emsp;Print</div>',
                        titleAttr: 'Imprimir',
                        //title: 'Efficax Export'

                    }
                ]
            }, {text: ' <a class="fa fa-plus float-left mb-10 p-0" data-test="tft"  data-toggle="tooltip" title="Add New"   style="font-size: .8em" >Add</a>',
       action: function ( e, dt, node, config ) {
           var tabValue = $(".nav-tabs .active > a").attr("href");

/*           $.ajax({
               type: 'GET',
               url : "/api/category",
               success : function (data) {
                   $(".modalbody").html(data);
               }
           });*/

           $('#modal').modal('toggle');
           tabValue = tabValue.replace("#", "/api/");
           if ($("#targetmodal").length){

/*               if("/api/" + $("#targetmodal").data('target') == tabValue)
               {
                   return;
               }*/
           }
           $( "#modal-id" ).load( tabValue,{action:"create"} );

         //  alert(tabValue);
     //  alert($(e.target).data('test')+'Button activated' );
   }}
        ],
        columnDefs: [/*{

            "render": function (data, type, row, meta, full) {
                return '<span data-toggle="tooltip" title="' + row.attributes.name + '">' + data + '</span>';
            },
            "targets": [3]
        },*/
            {"targets":-1, "data":"index", "render": function(data,type,row,full,meta)
                {
                    return '<button type="button" class="show-modal btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row +'"><i class="fa fa-eye"></i></button>'+
                        '<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditEmailModal" data-keyboard="true" data-id="' + row.id +'"><i class="fa fa-edit"></i></button>'
                        + ' <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteEmailModal" data-keyboard="true" data-id="' + row.id +'"><i class="fa fa-times"></i></button>'
                }}
        ],

    });


</script>


<script>
    function csrfSafeMethod(method) {
        // these HTTP methods do not require CSRF protection
        return (/^(GET|HEAD|OPTIONS|TRACE)$/.test(method));
    }
    $(document).ready(function(){

        $(window).on('shown.bs.modal', function() {
            $("#modal-id input[name=_token]").each(function( index ) {
                 $( this ).val(window._token);
            });
        });

        $('#modal-id').on('change', 'select', function(e){
            // alert(window._token);
        });
        $.ajaxSetup({
            beforeSend: function(xhr, settings) {
                if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                    xhr.setRequestHeader("X-CSRFToken", window._token);
                }
            }
        });
    });
</script>
<style>
    /*.loading {
        background: lightgrey;
        padding: 15px;
       // position: fixed;
        border-radius: 4px;
        left: 50%;
        top: 50%;
        text-align: center;
        margin: 0 auto;
        z-index: 2000;
        display: none;
        height: 60%;
        position: absolute;
        transform: translate(-50%, -50%);
    }*/

    .form-group.required label:after {
        content: " *";
        color: red;
        font-weight: bold;
    }
</style>
<script>
    (function() {
        // hold onto the drop down menu
        var dropdownMenu;

        // and when you show it, move it to the body
        $(window).on('show.bs.dropdown', function(e) {

            // grab the menu
            dropdownMenu = $(e.target).find('.dropdown-menu');

            // detach it and append it to the body
            $('body').append(dropdownMenu.detach());

            // grab the new offset position
            var eOffset = $(e.target).offset();

            // make sure to place it where it would normally go (this could be improved)
            dropdownMenu.css({
                'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left
            });
        });

        // and when you hide it, reattach the drop down, and hide it normally
        $(window).on('hide.bs.dropdown', function(e) {
            $(e.target).append(dropdownMenu.detach());
            dropdownMenu.hide();
        });
    })();
</script>

@yield('javascript')