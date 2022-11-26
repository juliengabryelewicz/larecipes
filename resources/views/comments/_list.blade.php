@include ('comments/_form')

<h3 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Commentaire(s)</h3>

<div class="container px-5 py-24 mx-auto">
    <div class="-my-8 divide-y-2 divide-gray-100">
        @each('comments/_show', $comments, 'comment', 'comments/_empty')
    </div>
</div>
