
    <!-- page content -->


    <div id="targetmodal" data-target="product"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @php
                                $method='POST';
                            $url='/products';
                            @endphp
                            <h2>@if($productId)
                                    @php
                                    $method='PUT';
                                    $url=$url.'/'.$productId->id;
                                    @endphp
                                    {{$productId->name}}
                                    @else
                                    Add New Product
                                    @endif
                                    <small>Type all inputs</small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            {{--<form method="POST" id="Register">--}}
                               {{-- {{ csrf_field() }}--}}
{{$method}}

                           {!! Form::open(array('url' => route('products.store'),'method'=>$method,'id'=>'Register')) !!}

  {{--                          <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Category </label>
                                <select class="form-control" name="category"><option selected="selected" value="" hidden="hidden">

                                    </option><option value="1">Laron Abernathy</option><option value="2">Natalie Dare</option><option value="3">Francesca Mueller</option><option value="4">Maryse Muller</option></select>
                                <span class="fa fa-book form-control" aria-hidden="true"></span>
                            </div>--}}




                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Product Category </label>
                                {!! Form::select('category', $category_id,($productId)?$productId->sub_category_id:null,array('placeholder' => '','class' => 'form-control')) !!}
                               {{-- {!! Form::text('code', null, array('placeholder' => 'Code','class' => 'form-control')) !!}
--}}                               {{-- <span class="fa fa-book form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="category-error"></strong>
                            </span>

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Product Brand </label>
                                {!! Form::select('brand_id', $brand_id,($productId)?$productId->brand_id:null,array('placeholder' => '','class' => 'form-control')) !!}
                                {{-- {!! Form::text('code', null, array('placeholder' => 'Code','class' => 'form-control')) !!}
 --}}                              {{--  <span class="fa fa-book form-control" aria-hidden="true"></span>--}}
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Product Code </label>
                                {!! Form::text('code', ($productId)?$productId->code:null, array('placeholder' => '','class' => 'form-control')) !!}
                               {{-- <span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Product Model </label>
                                {!! Form::text('model', ($productId)?$productId->model:null, array('placeholder' => '','class' => 'form-control')) !!}
                               {{-- <span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Product Name </label>
                                {!! Form::text('name', ($productId)?$productId->name:null, array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>UOM </label>
                                {!! Form::select('uom', $uom_id,($productId)?$productId->uom_id:null,array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="uom-error"></strong>
                            </span>

                            </div>

                            <div class="col-md-12 column">
                                <label>Extra Options </label>
                                <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr>

                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Value
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($productId )
                                        @if($productId->options)
                                            @php
                                                $i = 0
                                            @endphp
                                        @foreach($productId->options  as $key => $value)



                                            <tr id="row{{$i}}">
                                                <td>
                                                    <input type="text" name="options[name][]" value='{{$key ? $key:""}}' placeholder='Enter Option Name' class="form-control"/>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name='options[value][]' value='{{$value ? $value:""}}'  placeholder='Enter Option Value' class="form-control" />
                                                        <span class="input-group-btn">
                                                                @if ($loop->last)
                                                                <button id="btn{{$i}}" type="button" class="btn btn-primary" onclick="addRow(this)">
                                                                     <span id="icon{{$i}}" class="glyphicon glyphicon-plus"></span>
                                                                </button>

                                                            @else
                                                                <button id="btn{{$i}}" type="button" class="btn btn-primary" onclick="remRow(this)">
                                                                 <span id="icon{{$i}}" class="glyphicon glyphicon-minus"></span>
                                                                </button>
                                                            @endif


                                                </span>
                                                    </div>
                                                </td>
                                            </tr>

                                            @php
                                                $i++
                                            @endphp
                                        @endforeach

@endif
                                     @else
                                    <tr id="row0">
                                        <td>
                                            <input type="text" name="options[name][]"  placeholder='Enter Option Name' class="form-control" required/>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name='options[value][]'  placeholder='Enter Option Value' class="form-control" />
                                                <span class="input-group-btn">
                                                     <button id="btn0" type="button" class="btn btn-primary" onclick="addRow(this)">
                                                          <span id="icon0" class="glyphicon glyphicon-plus"></span>
                                                     </button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label>Descriptions </label>
                                {!! Form::textArea('description', null, array('placeholder' => 'Descriptions','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>

        function addRow(input) {
            var table = document.getElementById("myTable");
            var i = parseInt(input.id.substring(3, input.id.length));
            document.getElementById('icon' + i).className = "glyphicon glyphicon-minus";
            var row = table.insertRow(table.rows.length);
            row.id = "row" + (i + 1);
            var fcell = row.insertCell(0);
            fcell.innerHTML =  '<input type="text" name='+'options[name][]'+'  placeholder="Enter Option Name" class="form-control"/>';


            var cell = row.insertCell(1);
            cell.innerHTML = '<div class="input-group">'+
                '<input type="text" name='+'options[value][]'+' placeholder="Enter Option Value" class="form-control" />'+
                '<span class="input-group-btn">'+
                '<button id="btn'+(i+1)+'" type="button" class="btn btn-primary" onclick="addRow(this)">'+
                '<span id="icon'+(i+1)+'" class="glyphicon glyphicon-plus"></span>'+
                '</button>'+
                '</span>'+
                '</div>';
            $('#btn'+i).attr('onclick', 'remRow(this)');
        }

        function remRow(input) {
            var table = document.getElementById("myTable");
            var i = parseInt(input.id.substring(3, input.id.length));
            var ind = table.rows["row" +i].rowIndex;
            table.deleteRow(ind);
        }


    </script>

    <script type="text/javascript">
        $('#Register').submit(function(event) {
            event.preventDefault();

        });
        $('body').on('click', '#submitForm', function(){
            sessionStorage.clear();

            var registerForm = $("#Register");
            var formData = registerForm.serialize();
            $( '#name-error' ).html( "" );


            $.ajax({
                url:'{{$url}}',
                type:'{{$method}}',
                data:formData,
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        toastr.error("Operation Failed!!!", "Title", {
                            "timeOut": "5000",
                            "extendedTImeout": "5000"
                        });
                        if(data.errors.name){

                            $( '#name-error' ).html( data.errors.name[0] );
                        }
                        if(data.errors.category){
                            $( '#category-error' ).html( data.errors.category[0] );
                        }
                        if(data.errors.uom){
                            $( '#uom-error' ).html( data.errors.uom[0] );
                        }

                    }
                    if(data.success) {

                      var success_msg=  $('#success-msg');
                        success_msg.removeClass('hide');
                        refreshDatatable('products');
                        $('#modal').modal('hide');
                        success_msg.addClass('hide');
/*                        setInterval(function(){

                            $('#success-msg').addClass('hide');
                        }, 3000);*/

                        toastr.success("Operation Done Succesfuly!!!", "Title", {
                            "timeOut": "2000",
                            "extendedTImeout": "2000"
                        });
                    }
                },
            });
        });
    </script>
