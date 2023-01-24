<form action="{{ route('admin.' . $route . '.update', $entity) }}" method="POST">
  @csrf
  @method('PATCH')
  <input class="border-0" type="text" name="name" value="{{ $entity->name }}">
  <button type="submit" class="btn btn-warning me-3"><i class="fa-solid fa-pen-to-square"></i></button>
</form>
