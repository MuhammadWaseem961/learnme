<form id="edit-form" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Title*</label>
            <input id="name" type="text" class="form-control" name="title" value="{{ $category->title }}" autocomplete="name" placeholder="Enter Category Name" />
        </div>
        
        <div class="form-group">
            
            <label >Image</label>
            <div class="input-group">
                <div class="custom-file">
                <input type="file" class="form-control-file" id="inputGroupFile01" name="image">
                    </div>
                </div>
            @if($category->image!='')
                <img src="{{ $category->image }}" style='height:100px;width:100px;' />
            @endif
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal"></i> Cancel</button>
        <button type="button" class="btn btn-md bg-3AC574 text-white" onclick="addUpdateResource('{{route('eventCategories.update',$category->id)}}','{{route('eventCategories.index')}}','post','edit-form')"></i> Update Category</button>
    </div>
</form>
