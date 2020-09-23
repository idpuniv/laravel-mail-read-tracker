
<div class="input-group mb-3">
   <input type="{{$type}}" 
        class="form-control @error($name) is-invalid @enderror"
        name="{{$name}}" 
        placeholder="{{$placeholder}}"
        value="{{ old($name, $value !== '' ? $value : '') }}"
        {{ $required ? 'required' : '' }} 
        {{ $autofocus ? 'autofocus' : '' }}
    >
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div class="input-group-append">
    <div class="input-group-text">
        <span class="fas fa-{{$icon}}"></span>
    </div>
    </div>
  </div>
</div>