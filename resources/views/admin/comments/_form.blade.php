{!! Form::model($comment, ['route' => ['admin.comments.update', $comment], 'method' =>'PUT' ]) !!}

    <div class="my-4">

        {!! Form::hidden('recipe_id', $comment->recipe->id) !!}

        {!! Form::label('name', "Nom utilisateur", ['class' => 'label-form']) !!}
        {!! Form::text('name', null, ['class' => 'input-text-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="my-4">
        {!! Form::label('content', "Commentaire", ['class' => 'label-form']) !!}
        {!! Form::textarea('content', null, ['class' => 'textarea-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

        @error('content')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="my-4">
        {{ link_to_route('admin.comments.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}

{!! Form::model($comment, ['method' => 'DELETE', 'route' => ['admin.comments.destroy', $comment], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.comments.delete')]) !!}
    {!! Form::button('Supprimer', ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
{!! Form::close() !!}
