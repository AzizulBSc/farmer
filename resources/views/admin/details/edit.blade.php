@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
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
                    <h3 class="card-title">Edit {{ $Category->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('Categorys.update',$Category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="CategoryName">Category Name:</label>
                            <input type="text" class="form-control" value="{{ $Category->name }}" id="name" name="name" placeholder="Enter Category name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Category_dateTime">Category Time & Date:</label>
                            <input type="datetime-local" value="{{ $Category->Category_dateTime }}" class="form-control" id="Category_dateTime" name="Category_dateTime" placeholder="Enter Category Time and Date" required>
                            @error('Category_dateTime')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="CategoryParticipants">Category Judges:</label>
                            <select class="form-control select2" id="judges" name="judges[]" multiple="multiple">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }} ({{ $user->name }})</option>
                                @endforeach
                            </select>
                            @error('judges')
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
    var currentJudges = "{{ implode(',',$Category->users->pluck('id')->toArray() ?? []) }}".split(',');
    $(document).ready(function() {
        $('#judges').val(currentJudges);
        $('#judges').trigger("change");
    });
</script>
@endsection
