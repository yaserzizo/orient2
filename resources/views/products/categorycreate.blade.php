
    <!-- page content -->


    <div id="targetmodal" data-target="category"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @php
                                $method='POST';
                            $url='/categories';
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

                           {!! Form::open(array('url' => route('categories.store'),'method'=>$method,'id'=>'Register')) !!}

  {{--                          <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label>Category </label>
                                <select class="form-control" name="category"><option selected="selected" value="" hidden="hidden">

                                    </option><option value="1">Laron Abernathy</option><option value="2">Natalie Dare</option><option value="3">Francesca Mueller</option><option value="4">Maryse Muller</option></select>
                                <span class="fa fa-book form-control" aria-hidden="true"></span>
                            </div>--}}






                            <div class="col-md-6 col-sm-6 col-xs-12 form-group required">
                                <label>Category Name </label>
                                {!! Form::text('name', ($productId)?$productId->name:null, array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
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


                    }
                    if(data.success) {

                        $('#success-msg').removeClass('hide');
                        refreshDatatable('categories');
                        $('#modal').modal('hide');
/*
                        setInterval(function(){
                            $('#modal').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 1000);
*/

                        toastr.success("Operation Done Succesfuly!!!", "Title", {
                            "timeOut": "2000",
                            "extendedTImeout": "2000"
                        });
                    }
                },
            });
        });
    </script>
