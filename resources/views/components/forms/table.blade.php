@php
    $id = $element['id'];
    $tdComponentMap = [
        'matrixCheckbox' => 'matrix.check-box-td',
        'matrixTextInput' => 'matrix.text-input-td',
    ];

    $tdComponent = $tdComponentMap[$element['config']['type']] ?? null;

@endphp
<table class="form-matrix-table w-full border-collapse">
    <thead>
        <tr>
            <th class="p-3 border border-gray-300 text-left bg-gray-100 w-1/4"></th> {{-- Empty header for row labels --}}
            @foreach ($element['config']['columns'] as $colIndex => $col)
                <th class="p-3 border border-gray-300 text-left bg-gray-100">{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($element['config']['rows'] as $rowIndex => $row)
            <tr>
                <td class="p-3 border border-gray-300 bg-gray-100 font-medium">{{ $row['label'] }}</td>
                @foreach ($row['values'] as $colIndex => $value)
                    <td class="p-3 border border-gray-300">
                        <x-dynamic-component :component="$tdComponent" :id="$id" :rowIndex="$rowIndex" :colIndex="$colIndex"
                            :value="$value" />
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
