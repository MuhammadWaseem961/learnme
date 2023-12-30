<form id="edit-form" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Parent Category</label>
            <select name="parent_category" class="form-control ">
                <option value="-1" selected>Select Parent Category</option>
                @foreach($categories as $cat)
                    <option @if($category->category_id==$cat->id) selected @endif value="{{ $cat->id }}">{{ ucwords($cat->title) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Title*</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $category->title }}" autocomplete="name" placeholder="Enter Category Name" />
        </div>
        
        <div class="form-group">
            <label >Image</label>
            <div class="input-group mb-3">
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
        <button type="button" class="btn btn-md bg-3AC574 text-white" onclick="addUpdateResource('{{route('categories.update',$category->id)}}','{{route('categories.index')}}','post','edit-form')"></i> Update Category</button>
    </div>
</form>
