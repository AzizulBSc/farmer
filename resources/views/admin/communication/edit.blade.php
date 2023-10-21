@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Communication</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Communication</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('flash-message')

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Edit Communication</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('communication.update',$communication->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="ans">Answer:</label>
                        <textarea type="text" value="{{ $communication->details}}" class="form-control" id="summernote" name="details"
                            placeholder="">{!! $communication->details !!} </textarea>
                        @error('details')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(function () {
    // Summernote
    $('#summernote').summernote()

  })
</script>
@endsection
