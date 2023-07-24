Hey, {{  $name->name  }}!
You post was liked!
Someone liked one of your posts.

View post {{ route('posts.show', $post) }}
{{-- <x-mail::message>
# You post was liked

{{ $liker->name }} liked one of your posts

<x-mail::button :url=route('posts.show', $post)>
    View post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
