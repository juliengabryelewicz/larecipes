<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Titre</th>
                <th scope="col" class="py-3 px-6"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">{{ link_to_route('admin.recipes.edit', $recipe->title, $recipe) }}</td>
                    <td class="py-4 px-6">
                        @can('recipe-edit')
                            <a href="{{ route('admin.recipes.edit', $recipe) }}" class='button-admin-primary'>
                                Editer
                            </a>
                        @endcan

                        @can('recipe-delete')
                            {!! Form::model($recipe, ['method' => 'DELETE', 'route' => ['admin.recipes.destroy', $recipe], 'class' => 'inline', 'data-confirm' => "Etes-vous sur?"]) !!}
                                {!! Form::button('Supprimer', ['class' => 'button-admin-confirm', 'name' => 'submit', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

