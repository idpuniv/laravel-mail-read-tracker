<div class="input-group mb-3">
    <input 
        type="{{$type}}" 
        class="form-control" 
        name="{{$name}}" 
        required 
        autocomplete="{{$autocomplete}}"
        placeholder="{{$placeholder}}"
        required="{{$required}}" 
        value="{{ old($name, $value !== '' ? $value : '') }}"
        class="{{ $errors->has($name) ? 'invalid' : '' }}" 
    >
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-{{$icon}}"></span>
        </div>
    </div>
</div>