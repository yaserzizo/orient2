
    <!-- page content -->


    <div id="targetmodal" data-target="product"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @php
                                $method='POST';
                            $url='/suppliers';
                            @endphp
                            <h2>@if($productId)
                                    @php
                                    $method='PUT';
                                    $url=$url.'/'.$productId->id;
                                    @endphp
                                    {{$productId->name}}
                                    @else
                                    Add New Supplier
                                    @endif
                                    <small></small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            {{--<form method="POST" id="Register">--}}
                               {{-- {{ csrf_field() }}--}}
{{$method}}

                           {!! Form::open(array('url' => route('suppliers.store'),'method'=>$method,'id'=>'Register')) !!}



                            <div class="col-md-6 col-sm-6 col-xs-12 form-group required">
                                <label>Supplier Name </label>
                                {!! Form::text('name', ($productId)?$productId->name:null, array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                <label>Address </label>
                                {!! Form::text('address', ($productId)?$productId->address:null, array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="address-error"></strong>
                            </span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                <label>Notes </label>
                                {!! Form::textarea('notes', ($productId)?$productId->notes:null, array('placeholder' => '','class' => 'form-control')) !!}
                                {{--<span class="fa fa-user form-control" aria-hidden="true"></span>--}}
                                <span class="text-danger">
                                <strong id="notes-error"></strong>
                            </span>
                            </div>

                            <div class="col-md-12 column">
                                <label>Contacts </label>
                                <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr>

                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Phone
                                        </th>
                                        <th class="text-center">
                                            Other Phone
                                        </th>
                                        <th class="text-center">
                                            Email
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($productId )
                                        @if($productId->contacts)
                                            @php
                                                $i = 0
                                            @endphp
                                        @foreach($productId->contacts  as $key )



                                            <tr id="row{{$i}}">
                                                <td>
                                                    <input type="text" name="contacts[][name]" value='{{$key->name}}' placeholder='Enter Name' class="form-control required"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="contacts[][phone]" value='{{$key->phone}}' placeholder='Enter Phone' class="form-control required"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="contacts[][phone2]" value='{{$key->phone2}}' placeholder='Enter Other Phone' class="form-control"/>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="email" name="contacts[][email]" value='{{$key->email}}'  placeholder='Enter Option Value' class="form-control" />
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
                                            <input type="text" name="contacts[0][name]" placeholder='Enter Name' class="form-control required"/>
                                        </td>
                                        <td>
                                            <input type="text" name="contacts[0][phone]" placeholder='Enter Phone' class="form-control required"/>
                                        </td>
                                        <td>
                                            <input type="text" name="contacts[0][phone2]"  placeholder='Enter Other Phone' class="form-control"/>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="email" name='contacts[0][email]'  placeholder='Enter Option Value' class="form-control" />
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
            var cell1 = row.insertCell(0);
            cell1.innerHTML =  '<input type="text" name="contacts['+ (i+1) +'][name]"  placeholder="Enter Name" class="form-control"/>';

            var cell2 = row.insertCell(1);
            cell2.innerHTML =  '<input type="text" name="contacts['+ (i+1) +'][phone]"  placeholder="Enter Phone" class="form-control"/>';

            var cell3 = row.insertCell(2);
            cell3.innerHTML =  '<input type="text" name="contacts['+ (i+1) +'][phone2]  placeholder="Enter Other Phone" class="form-control"/>';

            var cell = row.insertCell(3);
            cell.innerHTML = '<div class="input-group">'+
                '<input type="email" name="contacts['+ (i+1) +'][email]" placeholder="Enter E-mail " class="form-control" />'+
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
                        if(data.errors.address){
                            $( '#address-error' ).html( data.errors.address[0] );
                        }
                        if(data.errors.notes){
                            $( '#notes-error' ).html( data.errors.notes[0] );
                        }

                    }
                    if(data.success) {

                        $('#success-msg').removeClass('hide');
                        refreshDatatable('suppliers');
                        $('#modal').modal('hide');
                        $('#success-msg').addClass('hide');
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
