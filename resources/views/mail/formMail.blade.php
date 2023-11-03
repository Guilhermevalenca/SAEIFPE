<h1>{{ $data['title'] }}</h1>
<p>{{ $data['text'] }}</p>
<a href="{{ route('forms_show_response', ['id' => $data['form_id']]) }}">Ir para o formulário</a>
