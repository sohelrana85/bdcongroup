@extends('layouts.master')
@section('title', 'Mission Vision page')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Mission Vision</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update Mission Vision
                        </div>
                    </div>
                    
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('mission.vision.update', $mission_vision->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            
                                            <label for="" class="col-sm-2 col-form-label">Mission</label>
                                            <div class="col-sm-10">
                                                <textarea name="mission_desc" id="editor" rows="2" class="form-control form-control-sm shadow-none">{{ $mission_vision->mission_desc }}</textarea>
                                                @error('mission_desc') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Vission</label>
                                            <div class="col-sm-10">
                                                <textarea name="vision_desc" id="editor1" rows="2" class="form-control form-control-sm shadow-none">{{ $mission_vision->vision_desc }}</textarea>
                                                @error('vision_desc') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

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
            </div>
            
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.replace( 'editor1' );
</script>

@endpush




