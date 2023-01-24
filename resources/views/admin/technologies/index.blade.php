@extends('layouts.admin')

@section('title')
  | Admin
@endsection

@section('content')
  <div class="container-fluid overflow-auto">
    <h1 class="my-5">Manage technologies</h1>

    @if (session('message'))
      <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    <div class="w-50">
      <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="New technology">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="fa-solid fa-circle-plus"></i>Add
          </button>
        </div>
      </form>
    </div>

    <table class="table">
      <tr>
        <th scope="col">Technology</th>
        <th scope="col">Project count</th>
      </tr>

      <tbody>
        @foreach ($technologies as $technology)
          <tr>
            <td class="d-flex">
              @include('admin.partials.form-update', [
                  'route' => 'technologies',
                  'message' => "Do you want to update type $technology->name ?",
                  'entity' => $technology,
              ])

              @include('admin.partials.form-delete', [
                  'route' => 'technologies',
                  'message' => "Do you want to delete technology $technology->name ?",
                  'entity' => $technology,
              ])
            </td>
            <td>{{ count($technology->projects) }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>

  </div>
@endsection
