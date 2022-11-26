<div class="xl:w-1/4 md:w-1/2 p-4">
  <div class="bg-gray-100 p-6 rounded-lg">
    <a href="{{ route('recipes.show', $recipe) }}">
      <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ '/images_recipes/' . $recipe->image }}" alt="content">
    </a>
    @each('categories/_item', $recipe->categories, 'category')
    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ link_to_route('recipes.show', $recipe->title, $recipe) }}</h2>
    <p class="leading-relaxed text-base">{{ Str::limit(strip_tags($recipe->content), 50) }}</p>
  </div>
</div>

