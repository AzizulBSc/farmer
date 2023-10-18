@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create উৎপাদন প্রযুক্তি</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create উৎপাদন প্রযুক্তি</li>
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
                    <h3 class="card-title">Create উৎপাদন প্রযুক্তি</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('prodtech.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="question" class="required">Category:</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option value=""> Select Category </option>
                                @forelse ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                @forelse ($prodtechs as $prodtech )
                                <option value="{{ $prodtech->id }}">{{ $prodtech->title }}</option>
                                @empty
                                <option>No category Added</option>
                                @endforelse
                            </select>
                            @error('parent_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="required">Title:</label>
                            <input type="text" value="{{ old('title') }}" class="form-control" id="title" required
                                name="title" placeholder="Enter Title" required>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="summernote" value="{{ old('description') }}"
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
