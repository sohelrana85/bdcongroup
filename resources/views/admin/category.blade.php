@extends('layouts.master')
@section('title', 'Category Page')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Category</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fab fa-bandcamp"></i> Category Entry</div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form id="form" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="parentId" class="col-sm-3 col-form-label">Parent Category</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" id="parentId" class="form-control shadow-none form-control-sm">
                                        <option value="">-- select one --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control shadow-none form-control-sm @error('name') is-invalid @enderror">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="inputPassword" class="col-sm-3 col-form-label">Category Image</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" id="image" onchange="readURL(this);">
                                    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <img id="preview" src="{{ asset('images/no.png') }}" width="100" height="80" alt="Preview">
                                    </div>
                                    
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">Save</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
            <div class="col-lg-7">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Category List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Parent Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>{{ $item->parent_id != 0 ? $item->parent->name : '' }}</td>
                                        <td>
                                            <a data-id="{{$item->id}}" class="btn btn-edit edit-category" href="javascript:void(0)"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-delete shadow-none" onclick="deleteCategory({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$item->id}}" action="{{ route('category.delete',$item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>
    function deleteCategory(id) {
        swal({
            title: 'Are you sure?',
            text: "You want to Delete this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            }
        })
    }

    $(document).on('click', '.edit-category', function(e){
        e.preventDefault();
        let url = "{{url('category/edit')}}/"+$(this).data('id');
        $.ajax({
            url,
            type: 'get',
            success: function(res){
                let category    = res.category;
                let action  = res.action;

                $('#parentId').val(category.parent_id);
                $('#name').val(category.name);
                $('#form').attr('action', action);
                $('#preview').attr('src', category.image);
            }
        })
    })

    $("document").ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
        }, 3000 ); // 5 secs
    });

    // Preview Image
    function readURL(input, id) {
        id = id || '#preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
            reader.readAsDataURL(input.files[0]);
            $('#preview').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
@endpush
