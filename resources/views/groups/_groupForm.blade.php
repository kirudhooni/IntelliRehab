@csrf

    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="name">Name</label>
        <input type="text" value="{{old('name', $group->name)}}" name="name" id="name" class="form-control col-md-9 {{ $errors->has('name') ? 'is-invalid' : '' }}">
        
        @if($errors->has('name'))

                <div class="invalid-feedback col-md-6">
                <strong>{{ $errors->first('name')}}</strong>
                </div>
        @endif

    </div>

    <div class="row border py-4">
            <label class="col-form-label col-md-2" for="description">Description</label>
            <textarea rows="5" type="textarea"  name="description" id="description" class="form-control col-md-9 ">{{old('description', $group->description)}}</textarea>
    </div>

    @isset($group->id)
        <div class="row border py-4">
                <label class="col-form-label col-md-2" for="created_at">Created</label>
                <input type="text" value="{{$group->created_at}}" name="created_at" id="created_at" class=" disable form-control col-md-9" disabled>
                    
        </div>
    @endisset

    <div class="row border py-4">
        <button type="submit" class="btn btn-primary form-control col-md-5">Sumbit</button>
        <a class="btn btn-primary form-control ml-2 col-md-5" href="{{ route('admin')}}" role="button">Cancel</a>
    
    </div>