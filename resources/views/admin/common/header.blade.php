<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a href="{{ route('home') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <span class="ml-3 text-xl">Larecipes</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a href="{{ route('admin.recipes.index') }}" class="mr-5 hover:text-gray-900">Recettes</a>
      <a href="{{ route('admin.categories.index') }}" class="mr-5 hover:text-gray-900">Catégories</a>
      <a href="{{ route('admin.comments.index') }}" class="mr-5 hover:text-gray-900">Commentaires</a>
      <a href="{{ route('admin.users.index') }}" class="mr-5 hover:text-gray-900">Utilisateurs</a>
      <a href="{{ route('admin.roles.index') }}" class="mr-5 hover:text-gray-900">Rôles</a>
      <a class="mr-5 hover:text-gray-900" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </nav>
  </div>
</header>