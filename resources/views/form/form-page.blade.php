<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class=""></div>
    @foreach ($form['elements'] as $element)
        @php
            $componentMap = [
                'multipleChoice' => 'forms.multiple-choice',
                'starRating' => 'forms.star-rating',
            ];
            $component = $componentMap[$element['type']] ?? null;
        @endphp
        @if ($element)
            <x-dynamic-component :component="$component" :element="$element" />
        @else
            <p class="text-red-600">Unknown form type: {{ $elemtnt['type'] }}</p>
        @endif
    @endforeach
</body>

</html>
