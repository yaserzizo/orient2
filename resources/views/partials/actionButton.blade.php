'<div class="btn-group ">'+
    '<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle " aria-expanded="true" aria-labelledby="dropdownMenu1"><i class="glyphicon glyphicon-cog"></i> <span class="caret"></span></button>'+
    '<ul class="dropdown-menu actionsmenu " >'+
        '<li class="show-modal " data-toggle="modal" data-target="showModal" data-keyboard="true" data-id="' + row.id +'" data-nam="' + row.attributes.name +'" data-title="' + row.attributes.name +'"><a href="#">Show</a></li>'+
        '<li class=" edit-modal " data-toggle="modal" data-target="editModal" data-keyboard="true" data-id="' + row.id +'"><a href="#">Edit</a></li>'+
        '<li  class="delete-modal" data-toggle="modal" data-target="deleteModal" data-keyboard="true" data-title="' + row.attributes.name +'" data-id="' + row.id +'"><a href="#">Delete</a></li>'+
        @if(isset($suppliers))
            '<li class="divider"></li>'+ '<li  class="list-products" data-toggle="modal" data-target="deleteModal" data-keyboard="true" data-title="' + row.attributes.name +'" data-id="' + row.id +'"><a href="#">Products</a></li>'+

        @endif

    '</ul>'+
'</div>'


{{--
class="delete-modal btn btn-danger btn-xs" data-toggle="modal" data-target="deleteModal" data-url="' + table +'" data-keyboard="true" data-title="' + row.attributes.name +'" data-id="' + row.id +'">--}}
