@csrf

    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="first-name">First Name</label>
        <input type="text" value="{{old('firstname', $user->firstname)}}" name="firstname" id="first-name" class="form-control col-md-9 {{ $errors->has('firstname') ? 'is-invalid' : '' }}">
        
        @if($errors->has('firstname'))

                <div class="invalid-feedback col-md-6">
                <strong>{{ $errors->first('firstname')}}</strong>
                </div>
        @endif

    </div>

    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="last-name">Last Name</label>
        <input type="text" value="{{old('lastname', $user->lastname)}}" name="lastname" id="last-name" class="form-control col-md-9 {{ $errors->has('lastname') ? 'is-invalid' : '' }}">

        @if($errors->has('lastname'))

                <div class="invalid-feedback col-md-6">
                        <strong>{{ $errors->first('lastname')}}</strong>
                </div>
        @endif
    </div>

    @isset($user->id)

    @else
    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="user-name">Username</label>
        <input type="text" value="{{old('username')}}" name="username" id="user-name" class="form-control col-md-9 {{ $errors->has('username') ? 'is-invalid' : '' }}">

        @if($errors->has('username'))

                <div class="invalid-feedback col-md-6">
                        <strong>{{ $errors->first('username')}}</strong>
                </div>
        @endif
    </div>
    @endisset
    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="phone">Phone</label>
        <input type="text" value="{{old('phone', $user->phone)}}" name="phone" id="phone" class="form-control col-md-9 {{ $errors->has('phone') ? 'is-invalid' : '' }}">
        @if($errors->has('phone'))

                <div class="invalid-feedback col-md-6">
                        <strong>{{ $errors->first('phone')}}</strong>
                </div>
        @endif
    </div>

    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="e-mail">E-mail</label>
    <input type="email" value="{{old('email', $user->email)}}" name="email" id="e-mail" class="form-control col-md-9 {{ $errors->has('email') ? 'is-invalid' : '' }}">
        @if($errors->has('email'))

                <div class="invalid-feedback col-md-6">
                        <strong>{{ $errors->first('email')}}</strong>
                </div>
        @endif
    </div>

    <div class="row border py-4">
            <label class="col-form-label col-md-2" for="note">Note</label>
            <textarea rows="5" type="textarea"  name="note" id="note" class="form-control col-md-9 ">{{old('note', $user->note)}}</textarea>
    </div>

    @if(Auth::user()->level == 'admin')
    <div class="row border py-4">
        <label class="col-form-label col-md-2" for="level">Level</label>
        <select name="level" class="form-control col-md-9 {{ $errors->has('level') ? 'is-invalid' : '' }}">
                <option {{ 'therapist' == $user->level ? 'selected' : '' }} value="Therapist">Therapist</option>
                <option {{ 'doctor' == $user->level ? 'selected' : '' }} value="Doctor">Doctor</option>
                <option {{ 'admin' == $user->level ? 'selected' : '' }} value="Admin">Admin</option>
        </select>
        @if($errors->has('level'))

                <div class="invalid-feedback col-md-6">
                        <strong>{{ $errors->first('level')}}</strong>
                </div>
        @endif  
            
    </div>
    @endif
    @isset($user->id)
        <div class="row border py-4">
                <label class="col-form-label col-md-2" for="created_at">Created</label>
                <input type="text" value="{{$user->created_at}}" name="created_at" id="created_at" class=" disable form-control col-md-9" disabled>
                    
        </div>
    @endisset

    <div class="row border py-4">
        <button type="submit" class="btn btn-primary form-control col-md-5">Sumbit</button>
        <a class="btn btn-primary form-control ml-2 col-md-5" href="{{ route('admin')}}" role="button">Cancel</a>
    
    </div>