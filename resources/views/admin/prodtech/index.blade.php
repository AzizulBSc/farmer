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
                <h1>Production Technologies</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Production Technologies</li>
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
                    <h3 class="card-title">Production Technologies</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category Name</th>
                                <th>Parent Tech Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodtechs as $key => $prodtech)
                            <tr>
                                <th scope="row">{{ $prodtechs->firstItem() + $key }}</th>
                                <td>{{ $prodtech->title }}</td>
                                <td>{{ $prodtech->category->name??"" }}</td>
                                <td>{{ $prodtech->parent->title??"" }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('prodtech.show', $prodtech->id) }}"
                                        class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    &nbsp;
                                    <a href="{{ route('prodtech.edit', $prodtech->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp;
                                    <form action="{{ route('prodtech.destroy',$prodtech->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure to delete?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item">
                            <p class="text-center">Showing {{ $prodtechs->firstItem() }} to
                                {{ $prodtechs->lastItem() }} of {{ $prodtechs->total() }} entries</p>
                            {{$prodtechs->links('pagination::bootstrap-4')}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
