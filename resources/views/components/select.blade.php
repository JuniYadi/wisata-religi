<select name="{{ $name }}" id="{{ $name }}" class="{{ $class ?? '' }}">
    @foreach($options as $key => $value)
        <option value="{{ $key }}" {{ old($name, $selected ?? '') == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>
