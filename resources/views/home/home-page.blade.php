<div>
    Home page

    <form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
</form>
</div>
