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
                    <h3 class="card-title">Edit {{ $category->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('category.update',$category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="CategoryName">Category Name:</label>
                            <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name"
                                placeholder="Enter Category name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <select class="form-control select2" id="parent_id" name="parent_id">
                                @if ($category->parent_id == null)
                                <option value=""></option>
                                @endif
                                @foreach(\App\Models\Category::all() as $item)
                                <option value="{{ $item->id }}" {{$category->parent_id
                                    ==$item->id?"selected":""}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
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

</script>
@endsection
