@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit উৎপাদন প্রযুক্তি</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit উৎপাদন প্রযুক্তি</li>
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
                    <h3 class="card-title">Edit উৎপাদন প্রযুক্তি</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('prodtech.update',$prodtech->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="question" class="required">Category:</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option value=""> Select Category </option>
                                @forelse ($categories as $category )
                                <option value="{{ $category->id }}" {{$prodtech->category_id
                                ==$category->id?"selected":""}}>{{ $category->name }}</option>
                                @empty
                                <option>No category Added</option>
                                @endforelse
                            </select>
                            @error('parent_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="question">Parent Tech:</label>
                            <select name="parent_id" class="form-control select2" id="parent_id">
                                <option value=""> Select Parent Tech </option>
                                @forelse($prodtechs as $prodtech1 )
                                <option value="{{ $prodtech1->id }}" {{$prodtech->parent_id
                                ==$prodtech1->id?"selected":""}}>{{ $prodtech1->title }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('parent_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="required">Title:</label>
                            <input type="text" value="{{ $prodtech->title }}" class="form-control" id="title" required
                                name="title" placeholder="Enter Title" required>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="summernote" value="{{ $prodtech->description }}"
                                name="description" >{!! $prodtech->description !!}</textarea>
                            @error('description')
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
@section('js')
<script>
    $(function () {
    // Summernote
    $('#summernote').summernote()

  })
</script>
@endsection
@endsection
