@foreach($options as $option)
    <div class="m-2">
        <label for="{{ $name }}_{{ $option['value'] }}">
            <input type="radio" id="{{ $name }}_{{ $option['value'] }}" name="{{ $name }}" value="{{ $option['value'] }}">
            {{ $option['label'] }}
        </label>
    </div>
@endforeach


