<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Nom</th>
                <th scope="col" class="py-3 px-6">Contenu</th>
                <th scope="col" class="py-3 px-6">Recette</th>
                <th scope="col" class="py-3 px-6">Statut</th>
                <th scope="col" class="py-3 px-6"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">{{ link_to_route('admin.recipes.edit', $comment->recipe->title, $comment->recipe) }}</td>
                    <td class="py-4 px-6">{{ $comment->name }}</td>
                    <td class="py-4 px-6">{{ $comment->content }}</td>
                    <td class="py-4 px-6">{{ $comment->approved }}</td>
                    <td class="py-4 px-6">

                    @can('comment-approve-reject')
                        <a href="{{ route('admin.comments.approve', $comment) }}" class='button-admin-confirm'>
                            Approuver
                        </a>

                        <a href="{{ route('admin.comments.reject', $comment) }}" class='button-admin-primary'>
                            Rejeter
                        </a>
                    @endcan

                    @can('comment-delete')
                    {!! Form::model($comment, ['method' => 'DELETE', 'route' => ['admin.comments.destroy', $comment], 'class' => 'form-inline', 'data-confirm' => "Etes-vous sur?"]) !!}
                        {!! Form::button('Supprimer', ['class' => 'button-admin-confirm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
