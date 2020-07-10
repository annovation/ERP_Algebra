@component('Centaur::components.form.main', [
    'id'        => $id ?? '',
    'name'      => $name ?? '',
    'class'     => $class ?? '',
    'method'    => $method ?? '',
    'param'     => $param ?? '',
    'route'     => $route ?? ''
])
    @slot('csrf')
        @csrf
    @endslot
    @slot('elements')
        <div class="form-group @error('city') has-error @enderror">
            <label for="city">City*</label>
            <input class="form-control" name="city" id="city" type="text" value="{{ $param->city }}">
            @error('city')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group @error('phone') has-error @enderror">
                <label for="phone">Phone*</label>
                <input class="form-control" name="phone" id="phone" type="text" value="{{ $param->phone }}">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group @error('addressLine1') has-error @enderror">
                <label for="addressLine1">Address*</label>
                <input class="form-control" name="addressLine1" id="addressLine1" type="text" value="{{ $param->addressLine1 }}">
                @error('addressLine1')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group">
                <label for="addressLine2">Address2</label>
                <input class="form-control" name="addressLine2" id="addressLine2" type="text" value="{{ $param->addressLine2 }}">
        </div>
        <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" name="state" id="state" type="text" value="{{ $param->state }}">
        </div>
        <div class="form-group @error('country') has-error @enderror">
                <label for="country">Country*</label>
                <input class="form-control" name="country" id="country" type="text" value="{{ $param->country }}">
                @error('country')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group @error('postalCode') has-error @enderror">
                <label for="postalCode">Postal code*</label>
                <input class="form-control" name="postalCode" id="postalCode" type="text" value="{{ $param->postalCode }}">
                @error('postalCode')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group @error('territory') has-error @enderror">
                <label for="territory">Territory*</label>
                <input class="form-control" name="territory" id="territory" type="text" value="{{ $param->territory }}">
                @error('territory')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <p style="padding-bottom: 5%;">* Mandatory data</p>
    @endslot
    @slot('hidden')
        @method('PUT')
    @endslot
    @slot('buttons')
        <div class="col-md-12">
            <div class ="col-md-5">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Save changes">
            </div>
            <div class ="col-md-5 col-md-offset-2">
                <a href="{{ route('offices.index') }}" type="button" class="btn btn-lg btn-warning btn-block">Cancel</a>
            </div>
        </div>
    @endslot
@endcomponent
