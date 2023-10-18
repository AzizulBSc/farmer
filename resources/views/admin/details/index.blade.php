@extends('layouts.main')
@section('styles')
<style>

</style>

@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All Details</li>
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
                    <h3 class="card-title">All Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category Name (Parent)</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $key => $detail)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $detail->category->name }} ({{ $detail->category->ParentCategory->name }})</td>
                                <td><a href="{{route('details.show',$detail->id)}}" class="btn btn-sm btn-success" title="Show Details"><i
                                        class="fa fa-eye"></i></a></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('details.edit', $detail->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    &nbsp;
                                    <form action="{{ route('details.destroy',$detail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to delete?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            @empty

                            @endforelse
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item">
                            {{-- <p class="text-center">Showing {{ $Category->firstItem() }} to {{
                                $Category->lastItem()
                                }} of {{ $Category->total() }} entries</p>
                            {{$Category->links('pagination::bootstrap-4')}} --}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endSection
@section('js')
<script>
</script>
@endsection
