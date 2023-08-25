@extends('layouts.master')
@section('title', 'Update About')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > About</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update About
                        </div>
                    </div>
                    
                    <div class="card-body table-card-body">
                        
                            <form method="post" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title" value="{{ $about->title }}" class="form-control form-control-sm shadow-none">
                                                @error('title') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" value="{{ $about->name }}" class="form-control form-control-sm shadow-none">
                                                @error('name') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Designation</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="designation" value="{{ $about->designation }}" class="form-control form-control-sm shadow-none">
                                                @error('designation') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Signation </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="signature" class="form-control shadow-none" id="signature" onchange="mainSignature(this)">
                                                @error('signature') <span style="color: red">{{$message}}</span> @enderror
                                                
                                                <div class="">
                                                    <img src="{{ (!empty($about)) ? asset($about->signature) : asset('images/no.png') }}" id="mainThmb" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                                </div>
                                            </div>

                                            <label for="inputPassword" class="col-sm-3 col-form-label">Image </label>
                                            <div class="col-sm-9 mt-1">
                                                <input type="file" name="image" class="form-control shadow-none" id="image" onchange="mainThambUrl(this)">
                                                @error('image') <span style="color: red">{{$message}}</span> @enderror
                                                
                                                <div class="">
                                                    <img src="{{ (!empty($about)) ? asset($about->image) : asset('images/no.png') }}" id="mainThmb" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ @$about->description }}</textarea>
                                                @error('description') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2">
                                <div class="clearfix">
                                    <div class="text-end m-auto">
                                        <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                        <button type="submit" class="btn btn-success shadow-none">Update</button>
                                    </div>
                                </div>
                            </form> 
                        
                         
                    </div>
                </div>  
            </div>
            
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(100)
                  .height(100);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    function mainSignature(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(100)
                  .height(100);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

</script>

<script>
    CKEDITOR.replace( 'editor' );
</script>

@endpush

