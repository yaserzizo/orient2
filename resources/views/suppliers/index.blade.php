
@extends('layouts.app')

@section('content-title', 'Suppliers Management')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


{{--    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins ">
                <div class="ibox-content">
                    <div class="bs-example">--}}
                        <ul id="tabs" class="nav nav-tabs">
                            <li id="suppliers_tab" class="active"><a data-toggle="tab" data-show="supplier" data-edit="supplier" data-create="supplier" data-delete="suppliers" href="#supplier"><h4>Supplier</h4></a></li>
                            <li id="sproducts_tab"><a data-toggle="tab" data-show="category" data-edit="category" data-create="category" data-delete="categories" href="#sproducts"><h4 id="tab2">Supplier products</h4></a></li>

                        </ul>


                    {{--</div>--}} <!-- <div class="bs-example"> -->
                    {{--                <div class="ibox-title"><h5>Products</h5>
                                        <div class="ibox-tools"> <button type="button" class="add-modal btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal" data-keyboard="true" ><i class="fa fa-plus"></i>Add Product</button></div>
                                    </div>--}}
                    {{-- <button type="button" class="show-modal btn btn-success btn-xs" data-toggle="modal" data-target="#showModal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row +'"><i class="fa fa-edit"></i></button>--}}

                    @component('partials.modal')
                        @slot('title')

                        @endslot
                            @slot('footer')

                            @endslot

                    @endcomponent
                    @component('partials.deleteModal')
                        products
                    @endcomponent
                    <div class="tab-content">
                        <div id="supplier" class="tab-pane fade in active">

                            {{--                    @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif--}}


                            @component('partials.indexTable')
                                suppliers
                            @endcomponent
                        </div>

                        <div id="sproducts" data-id="0" class="tab-pane fade">
                            @component('suppliers.sproducts',['category_id'=>$category_id,'sproducts'=>$sproducts])
                                sasa
                            @endcomponent

                        </div>
                    </div>


               {{--     </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection



@section('scripts')
    @parent
    @include('partials.javascripts')


    @include('partials.dtable')
    <script>
        function activaTab(tab){
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        }
        $(document).on('click', '.list-products', function() {
            $('#suppliers_tab').hide();

            $('#tab2').text($(this).data('title'));
            var id =$(this).data('id');
            $('#supplier_id').val(id);
            $('#sproducts_tab').show();

            activaTab('sproducts');
            var data=[];
            $.post('/api/suppliers/products',
                {

                    id: id
                },
                function(data, status){

                    data.forEach(function(prod) {
                        //console.log(JSON.stringify(prod));
                        var brnd = (prod.brand == null ? null : prod.brand["brand"])
                        //console.log(prod.name);

                            sptable.row.add([
                                prod.id,
                                prod.name,
                                prod.sub_category['category']['name'],
                                prod.sub_category['name'],
                                brnd,
                                prod.model,
                                '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'+prod.id+ '">Delete</button>'

                            ]);

                    });
                    sptable.draw(  );
                });



        });
    </script>
@endsection

