@extends('layouts.admin.admin') @section('title','Profile') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style type="text/css">
    .dropdown-toggle::after {
        display: none;
    }

    body {
        background-image: none;
    }

    .nav-pills .nav-link.active {
        background-color: #3ac574 !important;
    }

    
  

    .px-50 {
        padding-left: 50px !important;
        padding-right: 50px !important;
    }

    

</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

<section class="main_padding pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>
@endsection
@section('content')


<p class="border-bottom pl-3 f-21 cl-616161">Edit Your Personal Settings</p>

<p class="pl-3 f-21 cl-000000">Categories</p>
@include('common.messages')
<button title="Click to Add Service" data-toggle="modal" data-target="#addCatModal"
        class="btn btn-sm bg-3AC574 text-white m-2 mr-3" style="float: right;">Add Category</button>
<div class="table-responsive catTableData p-3" id="catTableData">
    <table id="example1" class="table table-bordered table-striped example1">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Parent Category</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
                <tr id="target_{{ $category->id }}">
                    <td>{{ $key+1 }}</td>
                
                    <td class="text-capitalize">{{ $category->title }}</td>
                    <td class="text-capitalize">
                        @if($category->category_id !=-1)
                            @if(App\Category::where('id',$category->category_id)->first()!=null)
                                {{ App\Category::where('id',$category->category_id)->first()->title }}
                            @endif
                        @else
                            ....
                        @endif
                            
                    </td>
                    <td>
                        @if($category->image!='')
                            <img src="{{ $category->image }}" style='height:100px;width:100px;' />
                        @endif
                    </td>
                    
                    <td style="min-width: 135px !important;">
                        <button title="Click to Update Category" class="btn btn-warning btn-sm editCatBtn" id="editCatBtn" data-target=".editCatModal" data-toggle="modal" data-catid="{{ $category->id }}"><i class="fa fa-pencil"></i> </button>
                        <button title="Click to Delete Category" type="button" class="btn btn-danger btn-sm"  onclick="deleteResource('{{route('categories.destroy',$category->id)}}','{{route('categories.index')}}')"><i class="fa fa-trash"></i> </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

 <!-- Modal For Adding Category-->
        <div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="addCatModalArea" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCatModalArea" style="font-size: 18px !important;">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="add-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Parent Category</label>
                                <select name="parent_category" class="form-control ">
                                    <option value="-1" selected>Select Parent Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->title) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Title*</label>
                                <input id="name" type="text" class="form-control text-capitalize" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter Category Name" required />
                            </div>

                            <div class="form-group">
                                <label >Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="inputGroupFile01" name="image" accept=".jpg,.jpeg,.png,.gif">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="custom-control custom-switch d-flex">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" checked>
                                <label class="custom-control-label p-0 m-0" for="customSwitch1">Active</label>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-md bg-3AC574 text-white" onclick="addUpdateResource('{{route('categories.store')}}','{{route('categories.index')}}','post','add-form')">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal For Editing Category-->
        <div class="modal fade editCatModal" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcatedit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelcatedit" style="font-size: 18px !important;">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="requestCatData"></div>
                </div>
            </div>
        </div>

        <!-- Modal For Deleting Category-->
        <div class="modal fade deleteCatModal" id="deleteCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcatdelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelcatdelete" style="font-size: 18px !important;">Delete Confirmation !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure, you want to delete this Category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">No, Cancel</button>
                        <button type="button" class="btn btn-md bg-3AC574 text-white deleteCatBtn" id="deleteCatBtn">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
@endsection 

@section('extra-script')

    <script>
         // open edit categoory modal
        $('.editCatBtn').on('click', function() {
            var catID = $(this).data('catid');
            $.ajax({
                type: 'get',
                url: url + '/admin/categories/' + catID + '/edit',
                success: function(data) {
                    $('.requestCatData').html(data);
        
                }
            });
        });
        
         /*** Open Deleting Category  Modal ***/
         $('.catDelete').on('click', function() {
             var catID = $(this).data('catid');
             $('#deleteCatBtn').val(catID);
         });
        
         /*** Deleting Category  ***/
        $('#deleteCatBtn').on('click', function() {
            var catID = $(this).val();
             $.ajax({
                 type: 'post',
                 url: url + '/admin/categories/' + catID,
                 data: { id: catID, _token: token, _method: 'DELETE' },
                 success: function(data) {
                     $("#target_" + catID).hide();
                     $("#deleteCatModal .close").click();
                     swal({
                         icon: "success",
                         text: "Category Deleted Successfuly!",
                         icon: 'success'
                     });
                 },
        
        
             });
        });
    </script>
    

@endsection