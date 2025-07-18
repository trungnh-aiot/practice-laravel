<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-gray-100 min-h-screen flex flex-col justify-center">
    <span class="text-blue-500 text-2xl font-bold self-center mb-4">〇〇〇〇のアンケート</span>
    <span class="text-red-500 font-extrabold self-center mb-1">※会員の表示</span>
    <div class="mb-1">
        <div>回答期間：2025/4/24(木)～8/25(月)</div>
        <div>質問数：全●●問</div>
        <div>回答にかかる時間：およそ●●分</div>
    </div>
    <hr class="border-t border-dashed border-gray-400 mb-4">
    <span class="self-center font-bold">アンケート説明見出し（任意)</span>
    @for ($i = 1; $i <= 6; $i++)
        <span>アンケート説明本文。アンケート説明本文。</span>
    @endfor
    <hr class="border-t border-dashed border-gray-400 mt-2 mb-4">
    <span class="font-bold">質問1：ラジオボタンですか？</span>
    <span class="">説明文を任意で入れる。説明文を任意で入れる。説明文を任意で入れる。説明文を任意で入れる。</span>
    <img src="images/description.png" class="max-w-120" />
    <form method="POST" action="{{ route('form.submit') }}">
        @csrf
        @foreach ($form['elements'] as $element)
            @php
                $componentMap = [
                    'multipleChoice' => 'forms.multiple-choice',
                    'rating' => 'forms.rating',
                    'table' => 'forms.table',
                ];
                $component = $componentMap[$element['type']] ?? null;
            @endphp
            @if ($element)
                <x-dynamic-component :component="$component" :element="$element" />
            @else
                <p class="text-red-600">Unknown form type: {{ $elemtnt['type'] }}</p>
            @endif
        @endforeach
        <button type="submit">
            <span>submit</span>
        </button>
    </form>
    <span class="font-bold">質問2：チェックボックスですか？ </span>
    <span class="">説明文を任意で入れる。説明文を任意で入れる。説明文を任意で入れる。説明文を任意で入れる。</span>
    <img src="images/description.png" class="max-w-120" />
</body>

</html>
